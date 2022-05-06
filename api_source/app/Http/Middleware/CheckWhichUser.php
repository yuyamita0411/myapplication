<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\module\Values;
class CheckWhichUser
{
    public function handle(Request $request, Closure $next)
    {
        $userTypename = [
            '一般ユーザー' => 'general',
            '管理者' => 'admin'
        ];

        //管理者、一般ユーザーで権限を分ける
        $urlnow = $_SERVER['REQUEST_URI'];
        $CurrentUserCan = [
            'admin' => [
                '/v1/dashboard',
                '/v1/dashboard/notification',
                '/v1/manageuser',
                '/v1/manageuser/import',
                '/v1/taskinfo/assign'
            ],
            'general' => [
                '/v1/dashboard',
                '/v1/dashboard/notification',
                '/v1/schedule',
                '/v1/taskinfo/assign',
                '/v1/taskinfo/search',
                '/v1/groupinfo/delete',
                '/v1/groupinfo/search',
                '/v1/groupinfo/search/usernow',
                '/v1/groupinfo/add/user',
                '/v1/groupinfo/search/keyword',
                '/v1/groupinfo/create'
            ],

            'paramurl' => [
                'admin' => [
                    '/v1/taskinfo'
                ],
                'general' => [
                    '/v1/taskinfo',
                    '/v1/groupinfo'
                ]
            ]

        ];
        if(!in_array($urlnow , $CurrentUserCan[$userTypename[Auth::user()->type]])){
            $flg = false;
            foreach ($CurrentUserCan['paramurl'][$userTypename[Auth::user()->type]] as $key => $val) {
                if(preg_match('{'.$val.'}', $urlnow)){
                    $flg = true;
                }
            }
            if($flg == true){
                return $next($request);
            }
            return redirect()->route('dashboard');
        }else{
            return $next($request);
        }
    }
}
