<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\module\Values;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Values = new Values();
    }

    public function index()
    {
        $Notification = new Notification;
        //同じ会社のユーザー、タスクを取得する。
        $notificationObj = 
            $Notification
                ->where('companyid', '=', Auth::user()->companyid)
                ->where('touserid', '=', Auth::user()->id)
                ->orderby('created_at', 'desc')
                ->get();

        return view('layout.dashboard', ['Notification' => $notificationObj]);
    }

    public function GetNotification(Request $request)
    {
        $Notification = new Notification;
        //同じ会社のユーザー、タスクを取得する。
        $notificationObj = 
            $Notification
                ->where('companyid', '=', Auth::user()->companyid)
                ->where('touserid', '=', Auth::user()->id)
                ->orderby('created_at', 'desc');

            $ncount = ceil(count($notificationObj->get()) / $this->Values->pagenationNum); 
       
        if(empty($request->PageNow)){
            $notificationObj = $notificationObj->limit($this->Values->pagenationNum)->offset(0);
        }
        if(!empty($request->PageNow)){
            if($request->PageNow == 1){
                $notificationObj = $notificationObj->limit($this->Values->pagenationNum)->offset(0);
            }else{
                $notificationObj = $notificationObj->limit($this->Values->pagenationNum)->offset((($request->PageNow - 1) * $this->Values->pagenationNum) + 1);
            }
        }

        $nobj = $notificationObj->get();
        $nobjarr = [];
        foreach($nobj as $key => $value){
            $nobjarr[$value->id]["title"] = $value->title;
            $nobjarr[$value->id]["passage"] = $value->passage;
            $nobjarr[$value->id]["fromuserid"] = $value->fromuserid;
            $nobjarr[$value->id]["fromuser"] = $value->fromuser;
            $nobjarr[$value->id]["touserid"] = $value->touserid;
            $nobjarr[$value->id]["touser"] = $value->touser;
            $nobjarr[$value->id]["companyid"] = $value->companyid;
            $nobjarr[$value->id]["notificationlink"] = $value->notificationlink;
            $nobjarr[$value->id]["created_at"] = $value->created_at;
        } 
       
        $nobjarr['PageAmount'] = $ncount;
        return response()->json($nobjarr);
    }
}
