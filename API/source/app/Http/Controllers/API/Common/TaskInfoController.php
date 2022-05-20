<?php

namespace App\Http\Controllers\API\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\Factory;

use App\Models\Notification;
use App\Models\TaskInfo;
use App\Models\AppliUser;
use App\Models\TaskMessage;
use App\module\Values;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskInfoController extends Controller
{
    public function __construct(Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
        $this->Values = new Values();
    }

    public function index(Request $request){
        //同じ会社のユーザー、タスクを取得する。
        $TaskInfo = new TaskInfo;
        $Alltaskobj = $TaskInfo
            ->where('companyid', '=', Auth::user()->companyid)
            ->orderby('startdate', 'desc');

        $AppliUser = new AppliUser;
        $companydata = $AppliUser
        ->where('companyid', '=', Auth::user()->companyid)
        ->where('id', '!=', Auth::user()->id)
        ->get();

        //検索条件を入れる
        $searchTaskTitle = "";
        if(!empty($request->searchTaskTitle)){
            $Alltaskobj = $Alltaskobj->where(function($Alltaskobj) use ($request){
                $Alltaskobj
                ->orwhere('taskname', 'LIKE', '%'.addcslashes($request->searchTaskTitle, '%_\\').'%')
                ->orwhere('taskdescription', 'LIKE', '%'.addcslashes($request->searchTaskTitle, '%_\\').'%')
                ->orwhere('username', 'LIKE', '%'.addcslashes($request->searchTaskTitle, '%_\\').'%')
                ->orwhere('fromusername', 'LIKE', '%'.addcslashes($request->searchTaskTitle, '%_\\').'%')
                ->orwhere('groupname', 'LIKE', '%'.addcslashes($request->searchTaskTitle, '%_\\').'%');
            });
            $searchTaskTitle = $request->searchTaskTitle;
        }

        $by = ""; $bm = ""; $bd = "";
        $ey = ""; $em = ""; $ed = "";
        if(
            preg_match("/^[0-9]+$/", $request->deadlinebeginmonth.$request->deadlinebegindate.$request->deadlinebeginyear.$request->deadlineendmonth.$request->deadlineenddate.$request->deadlineendyear) &&
            checkdate($request->deadlinebeginmonth, $request->deadlinebegindate, $request->deadlinebeginyear) &&
            checkdate($request->deadlineendmonth, $request->deadlineenddate, $request->deadlineendyear)
        ){
            $begintime = $request->deadlinebeginyear.'-'.$request->deadlinebeginmonth.'-'.$request->deadlinebegindate;
            $endtime = $request->deadlineendyear.'-'.$request->deadlineendmonth.'-'.$request->deadlineenddate;
            $by = $request->deadlinebeginyear; $bm = $request->deadlinebeginmonth; $bd = $request->deadlinebegindate;
            $ey = $request->deadlineendyear; $em = $request->deadlineendmonth; $ed = $request->deadlineenddate;

            $Alltaskobj->whereDate('deadline', '>', date('Y-m-d',strtotime($begintime)))
            ->whereDate('deadline', '<', date('Y-m-d',strtotime($endtime)));
        }

        $selectincharge = "";
        $selectinchargename = "";
        if(!empty($request->selectincharge)){
            $Alltaskobj->where('username', '=', explode(':', $request->selectincharge)[0]);
            $selectincharge = explode(':', $request->selectincharge)[0];
            $selectinchargename = explode(':', $request->selectincharge)[1];
        }
        $taskcount = count($Alltaskobj->get());

        $taskobj = $Alltaskobj->paginate($this->Values->pagenationNum);//初期状態で表示しておくデータ

        $taskdata = [];
        $YourGroupUser = [
            [
                'userid' => NULL,
                'username' => '-'
            ]
        ];
        foreach ($taskobj as $key => $value) {
            $taskdata[$value->id] = [
                ['key' => 'taskname', 'labelname' => 'タスク名', 'value' => $value->taskname],
                ['key' => 'username', 'labelname' => '担当者', 'value' => $value->username],
                ['key' => 'groupname', 'labelname' => 'グループ', 'value' => $value->groupname],
                ['key' => 'deadline', 'labelname' => '期日', 'value' => $value->deadline],
                ['key' => 'status', 'labelname' => 'ステータス', 'value' => $value->status],
                ['key' => 'id', 'labelname' => 'ID', 'value' => $value->id],
                ['key' => 'userid', 'labelname' => 'USERID', 'value' => $value->userid],
                ['key' => 'startdate', 'labelname' => '依頼日', 'value' => $value->startdate]
            ];

            $eacharr = [
                'userid' => $value->id,
                'username' => $value->username
            ];
            array_push($YourGroupUser, $eacharr);
        }

        $taskdata = [
            'Pagecount' => ceil($taskcount / $this->Values->pagenationNum),
            'taskdata' => $taskdata,
            'taskobj' => $taskobj
        ];

        return response()->json((object)[
            'companydata' => $companydata,
            'taskdata' => $taskdata,
            'paraminfo' => [
                'searchTaskTitle' => $searchTaskTitle, 
                'by' => $by,
                'bm' => $bm,
                'bd' => $bd,
                'ey' => $ey,
                'em' => $em,
                'ed' => $ed,
                'selectincharge' => $selectincharge,
                'selectinchargename' => $selectinchargename
            ]
        ]);
    }

    public function TaskDetail($id){
        $TaskInfo = new TaskInfo;
        $TaskMessage = new TaskMessage;
        $taskobj = $TaskInfo
            ->where('companyid', '=', Auth::user()->companyid)
            ->where('id', '=', $id)
            ->get();

        $taskmsgobj = $TaskMessage->where('taskid', '=', $id)
            ->orderby('created_at')
            ->get();

        return response()->json((object)[
            'id' => $id,
            'taskobj' => $taskobj,
            'taskmsgobj' => $taskmsgobj
        ]);
    }

    public function SendTaskMsg(Request $request){
        if(Auth::user()->id != $request->input('userid')){
            self::AppendNotification(
                [
                    'title' => $request->input('messaagetitle'),
                    'sendCommentMsg' => $request->input('messagepassage'),
                    'fromuserid' => Auth::user()->id,
                    'fromuser' => Auth::user()->name,
                    'touserid' => $request->input('userid'),
                    'notificationlink' => route('taskdetail', ['id' => $request->input('taskid')]),
                    'companyid' => Auth::user()->companyid
                ]
            );
        }
        return response()->json((object)[
            'title' => $request->input('messaagetitle'),
            'sendCommentMsg' => $request->input('messagepassage'),
            'fromuserid' => Auth::user()->id,
            'fromuser' => Auth::user()->name,
            'touserid' => $request->input('userid'),
            'notificationlink' => route('taskdetail', ['id' => $request->input('taskid')]),
            'companyid' => Auth::user()->companyid
        ]);
    }

    public function AssignTask(Request $request){
        $TaskInfo = new TaskInfo;
        
        $TaskInfo->taskname = $request->sendTaskTitle;
        $TaskInfo->taskdescription = $request->sendTaskMsg;
        $TaskInfo->userid = explode(':', $request->selectincharge)[0];
        $TaskInfo->username = explode(':', $request->selectincharge)[1];
        $TaskInfo->fromuserid = Auth::user()->id;
        $TaskInfo->fromusername = Auth::user()->name;

        $TaskInfo->groupname = '-';
        $TaskInfo->deadline = $request->deadlineyear.'-'.$request->deadlinemonth.'-'.$request->deadlinedate;
        $TaskInfo->status = '未';
        $TaskInfo->startdate = date("Y-m-d");

        $TaskInfo->companyid = Auth::user()->companyid;
        $TaskInfo->save();

        return response()->json($TaskInfo);
    }

    public function TaskInfoSearch(Request $request){
        $query = TaskInfo::Where('companyid', Auth::user()->companyid);
        if(!empty($request['searchTaskTitle'])){
            $query = $query->where(function($query) use ($request){
                $query
                ->orwhere('taskname', 'LIKE', "%{$request->searchTaskTitle}%")
                ->orwhere('taskdescription', 'LIKE', "%{$request->searchTaskTitle}%")
                ->orwhere('username', 'LIKE', "%{$request->searchTaskTitle}%")
                ->orwhere('fromusername', 'LIKE', "%{$request->searchTaskTitle}%")
                ->orwhere('groupname', 'LIKE', "%{$request->searchTaskTitle}%");
            });
        }
        if(!empty($request['selectincharge']) && $request['selectincharge'] != ""){
            $query = $query->where('userid', '=', $request->selectincharge);
        }
        if(!empty($request['deadlinebeginyear']) &&
        !empty($request['deadlinebeginmonth']) && 
        !empty($request['deadlinebegindate']) && 
        !empty($request['deadlineendyear']) && 
        !empty($request['deadlineendmonth']) && 
        !empty($request['deadlineenddate'])){
            $query = $query->where(function($query) use ($request){
                $query
                ->where('deadline', '>', $request->deadlinebeginyear."-".$request->deadlinebeginmonth."-".$request->deadlinebegindate)
                ->where('deadline', '<', $request->deadlineendyear."-".$request->deadlineendmonth."-".$request->deadlineenddate);
            });
        }

        $SArr = $query->paginate($this->Values->pagenationNum);
        return response()->json($SArr);
    }

    public function TaskDetailAddComments(Request $request, $id){
        $TaskMessage = new TaskMessage;
        $TaskMessage->taskid = $id;
        $TaskMessage->commenttitle = $request->sendCommentTitle;
        $TaskMessage->commentpassage = $request->sendCommentMsg;
        $TaskMessage->save();

        if($request->TaskObjId != Auth::user()->id){
            self::AppendNotification(
                [
                    'title' => Auth::user()->name.'さんからコメントがありました。',
                    'sendCommentMsg' => $request->sendCommentMsg,
                    'fromuserid' => Auth::user()->id,
                    'fromuser' => Auth::user()->name,
                    'touserid' => $request->TaskObjId,
                    'notificationlink' => route('taskdetail', ['id' => $id]),
                    'TaskObjId' => $request->TaskObjId,
                    'companyid' => Auth::user()->companyid
                ]
            );
        }
        return response()->json($TaskInfo);
    }

    public function TaskDetailSearchComment(Request $request, $id){
        $query = TaskMessage::Where('taskid', $id)
            ->where(function($query) use ($request){
                $query
                ->orwhere('commenttitle', 'LIKE', "%{$request->TaskCommentSearchArea}%")
                ->orwhere('commentpassage', 'LIKE', "%{$request->TaskCommentSearchArea}%");
        });

        $MsgInfo = [];
        $SArr = $query->get();
        foreach($SArr as $key => $value){
            $MsgInfo[$value->id]["taskid"] = $value->taskid;
            $MsgInfo[$value->id]["commenttitle"] = $value->commenttitle;
            $MsgInfo[$value->id]["commentpassage"] = $value->commentpassage;
            $MsgInfo[$value->id]["created_at"] = $value->created_at;
            $MsgInfo[$value->id]["updated_at"] = $value->updated_at;
        }
        return response()->json($MsgInfo);
    }

    private function AppendNotification($array){
        $Notification = new Notification;
        $Notification->title = $array['title'];
        $Notification->passage = $array['sendCommentMsg'];
        $Notification->fromuserid = $array['fromuserid'];
        $Notification->fromuser = $array['fromuser'];
        $Notification->touserid = $array['touserid'];
        $Notification->notificationlink = $array['notificationlink'];

        $AppliUser = new AppliUser;
        $Userobj = $AppliUser->where('id', '=', $array['touserid'])->get();

        foreach ($Userobj as $key => $value) {
            $Notification->touser = $value->name;
        }        

        $Notification->companyid = $array['companyid'];
        $Notification->save();

    }
}
