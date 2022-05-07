<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
                '/dashboard',
                '/dashboard/notification',
                '/manageuser',
                '/manageuser/import',
                '/taskinfo/assign'
            ],
            'general' => [
                '/dashboard',
                '/dashboard/notification',
                '/schedule',
                '/taskinfo/assign',
                '/taskinfo/search',
                '/groupinfo/delete',
                '/groupinfo/search',
                '/groupinfo/search/usernow',
                '/groupinfo/add/user',
                '/groupinfo/search/keyword',
                '/groupinfo/create'
            ],

            'paramurl' => [
                'admin' => [
                    '/taskinfo'
                ],
                'general' => [
                    '/taskinfo',
                    '/groupinfo'
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
