<?php

namespace App\Http\Controllers\API\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\ScheduleRelation;
use App\module\Values;

use Illuminate\Pagination\Paginator;

use Carbon\Carbon;


class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->Values = new Values();
    }
    public function index(Request $request){

        $purifyquery = DB::table('appli_users')
        ->Where('appli_users.id', '!=', Auth::user()->id)
        ->Where('appli_users.companyid', Auth::user()->companyid);

        if(empty($request["orderby"])){
            $purifyquery->orderBy('name', 'asc')->orderBy('id', 'asc');
        }
        if(!empty($request["orderby"])){
            $purifyquery->orderBy('name', $request["orderby"])->orderBy('id', 'asc');
        }

        if(!empty($request["keyword"])){
            $purifyquery->where('appli_users.name', 'LIKE', '%'.addcslashes($request['keyword'], '%_\\').'%');//ok
        }

        $ObjAmount = $purifyquery->get();//全てのページ数を一旦格納しておく

        //ページネーション関係の処理
        $PerPage = $this->Values->pagenationNum;//何もない時はデフォルト値
        if(!empty($request->PerPage)){
            $PerPage = $request->PerPage;
        }
        $PageNow = 0;
        if(!empty($request->PageNow)){
            $PageNow = (($request->PageNow - 1) * $PerPage);
        }
        $purifyquery->limit($PerPage)->offset($PageNow);
        $PageAmount = ceil(count($ObjAmount) / $PerPage);
        //ページネーション関係の処理

        $userarr = [];
        foreach($purifyquery->get() as $key => $value){
            array_push($userarr, $value->id);
        }

        $others = DB::table('appli_users')
        ->join('schedule_relations', 'appli_users.id', '=', 'schedule_relations.userid')
        ->join('schedules', 'schedule_relations.scheduleid', '=', 'schedules.id')
        ->Where('appli_users.id', '!=', Auth::user()->id)
        ->Where('appli_users.companyid', Auth::user()->companyid);

        if(!empty($request["starttime"])){
            $others
            ->whereDate('schedules.starttime', '>', date('Y-m-d',strtotime($request["starttime"].'-1 day')))
            ->whereDate('schedules.starttime', '<', date('Y-m-d',strtotime($request["starttime"].'+7 day')));
        }
        if(empty($request["keyword"])){
            $others->orwhere('name', '=', "NULL");
        }
        $others->orderBy('starttime', 'asc');

        $Scheduleinfo = $others->select(
            'appli_users.id',
            'appli_users.type',
            'appli_users.name',
            'appli_users.mail_address',
            'appli_users.created_at',
            'appli_users.updated_at',
            'schedules.id as scheduleid',
            'schedules.title',
            'schedules.description',
            'schedules.starttime',
            'schedules.endtime',
            'schedules.groupid',
            'schedules.taskid'
        );

        $Othersinfo = $Scheduleinfo->get();
        $Oschedulearr = [];

        $sobj = $purifyquery->get();

        foreach($sobj as $key1 => $val1){
            foreach($Othersinfo as $key2 => $val2){
                if($val1->id == $val2->id){
                    $eacharr = [
                        "id" => $val2->id,
                        "name" => $val2->name,
                        "mail_address" => $val2->mail_address,
                        "created_at" => $val2->created_at,
                        "updated_at" => $val2->updated_at,
                        "scheduleid" => $val2->scheduleid,
                        "title" => $val2->title,
                        "starttime" => $val2->starttime,
                        "endtime" => $val2->endtime,
                        "taskid" => $val2->taskid
                    ];
                    if(in_array($val2->id, $userarr)){
                        $Oschedulearr[$val2->id][] = $eacharr;
                    }
                }
            }
            if(in_array($val1->id, $userarr)){
                $Oschedulearr[$val1->id][] = [
                    "id" => $val1->id,
                    "name" => $val1->name,
                    "mail_address" => $val1->mail_address,
                    "created_at" => $val1->created_at,
                    "updated_at" => $val1->updated_at
                ];
            }
        }

        $Oschedulearr['PageAmount'][] = $PageAmount;

        return response()->json($Oschedulearr);

    }

    public function GetMySchedule(Request $request){
        $me = DB::table('appli_users')
        ->join('schedule_relations', 'appli_users.id', '=', 'schedule_relations.userid')
        ->join('schedules', 'schedule_relations.scheduleid', '=', 'schedules.id')
        ->Where('appli_users.id', '=', Auth::user()->id)
        ->Where('appli_users.companyid', Auth::user()->companyid);

        if(!empty($request["starttime"])){
            $me
            ->whereDate('schedules.starttime', '>', date('Y-m-d',strtotime($request["starttime"].'-1 day')))
            ->whereDate('schedules.starttime', '<', date('Y-m-d',strtotime($request["starttime"].'+7 day')));
        }
        if(empty($request["keyword"])){
            $me->orwhere('name', '=', "NULL");
        }
        $me->orderBy('starttime', 'asc');

        $Scheduleinfo = $me->select(
            'appli_users.id',
            'appli_users.type',
            'appli_users.name',
            'appli_users.mail_address',
            'appli_users.created_at',
            'appli_users.updated_at',
            'schedules.id as scheduleid',
            'schedules.title',
            'schedules.description',
            'schedules.starttime',
            'schedules.endtime',
            'schedules.groupid',
            'schedules.taskid'
        );

        $Myinfo = $Scheduleinfo->get();
        $Mschedulearr = [];
        $usercheck = [];

        foreach($Myinfo as $key => $val){
            $eacharr = [
                "id" => $val->id,
                "name" => $val->name,
                "mail_address" => $val->mail_address,
                "created_at" => $val->created_at,
                "updated_at" => $val->updated_at,
                "scheduleid" => $val->scheduleid,
                "title" => $val->title,
                "starttime" => $val->starttime,
                "endtime" => $val->endtime,
                "taskid" => $val->taskid
            ];
            $Mschedulearr[$val->id][] = $eacharr;
            array_push($usercheck, $val->id);
        }

        return response()->json($Mschedulearr);
    }

    public function GetScheduleFromId(Request $request){
        $query = DB::table('schedules')
        ->join('schedule_relations', 'schedules.id', '=', 'schedule_relations.scheduleid')
        ->join('appli_users', 'schedule_relations.userid', '=', 'appli_users.id')
        ->where('schedules.id', '=', $request->scheduleid)
        ->Where('appli_users.companyid', Auth::user()->companyid)
        ->select(
            'appli_users.id',
            'appli_users.type',
            'appli_users.name',
            'appli_users.mail_address',
            'appli_users.created_at',
            'appli_users.updated_at',
            'schedules.id as scheduleid',
            'schedules.title',
            'schedules.description',
            'schedules.starttime',
            'schedules.endtime',
            'schedules.groupid',
            'schedules.taskid'
        )->get();
        return response()->json($query);
    }

    public function SearchScheduleUserNow(Request $request){
        $query = DB::table('appli_users')
        ->leftJoin('schedule_relations', 'appli_users.id', '=', 'schedule_relations.userid')
        ->leftJoin('schedules', 'schedule_relations.scheduleid', '=', 'schedules.id')
        ->where('schedule_relations.scheduleid', '=', $request->addgroupidnow)
        ->where('appli_users.id', '!=', Auth::user()->id)
        ->Where('appli_users.companyid', Auth::user()->companyid)
        ->select(
            'appli_users.id',
            'appli_users.type',
            'appli_users.name',
            'appli_users.mail_address',
            'appli_users.created_at',
            'appli_users.updated_at'
        )->get();
        return response()->json($query);
    }

    public function AddSchedule(Request $request){
        $ScheduleObj = new Schedule;
        $ScheduleObj->title = $request->schedulename;
        $ScheduleObj->description = $request->scheduledisc;
        $ScheduleObj->starttime = $request->starttime.' '.$request->Sstarttime;
        $ScheduleObj->endtime = $request->starttime.' '.$request->Sendtime;
        $ScheduleObj->companyid = Auth::user()->companyid.' ';
        $ScheduleObj->save();

        $latestid = $ScheduleObj->id;//スケジュールid

        $ScheduleRelationObj1 = new ScheduleRelation;
        $ScheduleRelationObj1->scheduleid = $latestid;
        $ScheduleRelationObj1->userid = $request->mainid;
        $ScheduleRelationObj1->save();

        //もし自分以外に他のユーザーがいた場合
        if($request->UserToAdd ){
            foreach($request->UserToAdd as $key => $val){
                $ScheduleRelationObj2 = new ScheduleRelation;
                $ScheduleRelationObj2->scheduleid = $latestid;
                $ScheduleRelationObj2->userid = $val;
                $ScheduleRelationObj2->save();
            }
        }
        
        return redirect(url()->previous());
    }

    public function RebaseSchedule(Request $request){
        //$request->mainid//一旦消す
        $sid = $request->mainid;
        $stime = $request->starttime.' '.$request->Sstarttime;
        $sendtime = $request->starttime.' '.$request->Sendtime;
        $sname = $request->schedulename;
        $sdisc = $request->scheduledisc;
        $UserToAdd = $request->UserToAdd;

        Schedule::where('id', '=', $request->mainid)->delete();
        ScheduleRelation::where('scheduleid', '=', $request->mainid)->delete();

        $Schedule = new Schedule;
        $Schedule->id = $sid;
        $Schedule->starttime = $stime;
        $Schedule->endtime = $sendtime;

        $Schedule->title = $sname;
        $Schedule->description = $sdisc;
        $Schedule->companyid = Auth::User()->companyid;
        $Schedule->save();

        foreach($UserToAdd as $key => $val){
            $ScheduleRelation = new ScheduleRelation;
            $ScheduleRelation->userid = $val;
            $ScheduleRelation->scheduleid = $sid;
            $ScheduleRelation->save();
        }

        return redirect(url()->previous());
    }

    public function search(Request $request){
        $purifyquery = DB::table('appli_users')
            ->where('appli_users.id', '!=', Auth::user()->id)
            ->where('appli_users.name', 'LIKE', "%{$request->addgroupmember}%")
            ->Where('appli_users.companyid', Auth::user()->companyid)
            ->select(
                'appli_users.id',
                'appli_users.type',
                'appli_users.name',
                'appli_users.mail_address',
                'appli_users.created_at',
                'appli_users.updated_at'
            )->get();

            if($request->addgroupmember == ''){
                $purifyquery = (object)[];
            }
            return response()->json($purifyquery);
    }
}
