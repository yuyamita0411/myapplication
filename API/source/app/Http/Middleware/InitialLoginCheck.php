<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InitialLoginCheck {

    public function handle(Request $request, Closure $next) {

        $id = Auth::user()->id;
        $table = 'm_address_lists';
        $setPwRoute = '/password/display_initial_set';

        // 初回ログイン時パスワード変更
        //ログインボタンをクリックした瞬間
        if (Auth::user()->updated_at == NULL) {//
            return redirect($setPwRoute);
        }

        DB::table($table)
            ->where('id', $id)
            ->update(['updated_at' => now()]);

        return $next($request);
    }
}