<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\AppliUser;
use App\Models\GroupInfo;
use App\Models\GroupRelation;

use App\module\Values;

class GroupInfoController extends Controller
{
    public function __construct()
    {
        $this->Values = new Values();
    }

    public function delete(Request $request){

        $GroupInfo = new GroupInfo;
        $GroupInfo->where('id', $request->groupid)->delete();

        return redirect(url()->previous());
    }

    public function search(Request $request){
        $AInfo = DB::table('appli_users')
        ->leftjoin('group_relations', 'appli_users.id', '=', 'group_relations.userid')
        ->where('group_relations.userid', NULL)
        ->where('appli_users.id', '!=', $request->memberitself)
        ->where('appli_users.id', '!=', Auth::user()->id)
        ->where('appli_users.name', 'LIKE', '%'.addcslashes($request->addgroupmember, '%_\\').'%')
        ->Where('appli_users.companyid', Auth::user()->companyid)
        ->select(
            'appli_users.id',
            'group_relations.groupid',
            'appli_users.type',
            'appli_users.name',
            'appli_users.mail_address',
            'appli_users.created_at',
            'appli_users.updated_at'
        )->get();
        return response()->json($AInfo);
    }

    public function SearchUserNow(Request $request){
        $AInfo = DB::table('appli_users')
        ->join('group_relations', 'appli_users.id', '=', 'group_relations.userid')
        ->where('group_relations.groupid', '=', $request->addgroupidnow)
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
        return response()->json($AInfo);
    }

    public function AddUser(Request $request){
        foreach($request->UserToAdd as $key => $value){
            $GroupRelation = new GroupRelation;
            $GroupRelation->userid = $value;
            $GroupRelation->groupid = $request->GOpenNow;
            $GroupRelation->save();
        }
        return redirect(url()->previous());
    }

    public function index(Request $request){
        $GroupInfoObj = DB::table('group_infos')
        ->Where('group_infos.companyid', Auth::user()->companyid);

        /*$GroupInfoObj = DB::table('group_relations')
        ->join('group_infos', 'group_relations.groupid', '=', 'group_infos.id')
        ->Where('group_infos.companyid', Auth::user()->companyid);*/

        if(!empty($request->searchGroupInfo)){
            $GroupInfoObj = $GroupInfoObj->where(function($GroupInfoObj) use ($request){
                $GroupInfoObj
                ->orwhere('group_infos.cname', 'LIKE', "%{$request->searchGroupInfo}%")
                ->orwhere('group_infos.groupdescription', 'LIKE', "%{$request->searchGroupInfo}%");
            });
        }

        $GroupInfoObj = $GroupInfoObj->orderby('group_infos.created_at', 'desc');

        $SendGroupInfo = $GroupInfoObj->select(
            'group_infos.id',
            'group_infos.cname',
            'group_infos.cid',
            'group_infos.groupname',
            'group_infos.groupdescription',
            'group_infos.companyid',
            'group_infos.created_at',
            'group_infos.cid',
            'group_infos.cname'
        )->paginate($this->Values->pagenationNum);

        return view('layout.groupinfo', 
            [
                'Groupinfos' => $SendGroupInfo
            ]
        );

    }

    private function GroupRelatedAppliUsers(){
        $query = DB::table('group_relations')
        ->join('group_infos', 'group_relations.groupid', '=', 'group_infos.id')
        ->Where('group_infos.companyid', Auth::user()->companyid)
        ->orderby('group_infos.created_at', 'desc')
        ->select(
            'group_infos.id',
            'group_relations.groupid',
            'group_infos.cname',
            'group_infos.cid',
            'group_infos.groupname',
            'group_infos.groupdescription',
            'group_infos.companyid',
            'group_infos.created_at',
            'group_infos.cid',
            'group_infos.cname'
        );
        return $query;
    }

    public function CreateGroup(Request $request){
        $GroupInfo = new GroupInfo;
        $GroupInfo->groupname = $request->CreateGroupName;
        $GroupInfo->cid = Auth::user()->id;
        $GroupInfo->cname = Auth::user()->name;
        $GroupInfo->groupdescription = $request->CreateGroupDescription;
        $GroupInfo->companyid = Auth::user()->companyid;
        $GroupInfo->created_at = date('Y-m-d');
        $GroupInfo->save();
        $last_insert_cid = $GroupInfo->cid;
        $last_insert_id = $GroupInfo->id;

        $GroupCRelation = new GroupRelation;
        $GroupCRelation->userid = $last_insert_cid;
        $GroupCRelation->groupid = $last_insert_id;
        $GroupCRelation->save();

        foreach($request->UserToAdd as $key => $value){
            $GroupRelation = new GroupRelation;
            $GroupRelation->userid = $value;
            $GroupRelation->groupid = $last_insert_id;
            $GroupRelation->save();
        }

        return redirect(url()->previous());
    }
}