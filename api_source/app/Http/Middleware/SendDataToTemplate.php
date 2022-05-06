<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use App\Models\TaskInfo;
use App\Models\AppliUser;
use App\module\Values;

class SendDataToTemplate
{
    public function __construct(Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
        $this->Values = new Values();
    }

    public function handle(Request $request, Closure $next)
    {
        $AppliUser = new AppliUser;
        $companydata = $AppliUser
        ->where('companyid', '=', Auth::user()->companyid)
        ->where('id', '!=', Auth::user()->id)
        ->get();
/**使い回ししそうなものを書いておく**/
        $SlugArr = [
            '管理者' => 'admin',
            '一般ユーザー' => 'general'
        ];

        $LinkInfoArr = [
            '一般ユーザー' => [
                [
                    'name' => '予定一覧',
                    'link' => route('schedule'),
                    'img' => 'asset/Schedule.png',
                ],
                [
                    'name' => 'グループ一覧',
                    'link' => route('groupinfo'),
                    'img' => 'asset/groupicon.png',
                ],
                [
                    'name' => 'タスク進捗',
                    'link' => route('taskinfo'),
                    'img' => 'asset/Allist.png',
                ]
            ],
            '管理者' => [
                [
                    'name' => 'アカウント管理',
                    'link' => 'manageuser',
                    'img' => 'asset/manageicon.png',
                ],
                [
                    'name' => 'タスク進捗',
                    'link' => route('taskinfo'),
                    'img' => 'asset/Allist.png',
                ]
            ]
        ];
        $Iconinfo = [
            'タスク名' => 'asset/taskicon.png',
            '担当者' => 'asset/personicon.png',
            'グループ' => 'asset/groupicon.png',
            '期日' => 'asset/deadlineicon.png',
            'ステータス' => 'asset/statusicon.png',
            //'依頼日' => 'asset/ordereddate.png'
        ];
        $LoadingIcon = 
        '<div class="w-100 d-inline-block text-center position-relative" style="top:5rem;">
            <img id="loadingicon" src="/asset/loadingicon.png" class="col-2 m-auto d-block">
            <p class="mt-3">Loading</p>
        </div>';
/**使い回ししそうなものを書いておく**/

        $commondata = [
            //'taskdevidenum' => $this->Values->pagenationNum,//何ページ表示するかを定義
            //'Pagecount' => ceil($taskcount / $this->Values->pagenationNum),
            //'taskdata' => $taskdata,
            //'taskobj' => $taskobj,
            'companydata' => $companydata,
            'SlugArr' => $SlugArr,
            'LinkInfoArr' => $LinkInfoArr,
            'Iconinfo' => $Iconinfo,
            'LoadingIcon' => $LoadingIcon,
            'useridnow' => Auth::user()->id
        ];

        $this->viewFactory->share('commondata', $commondata);
        return $next($request);
    }
}
