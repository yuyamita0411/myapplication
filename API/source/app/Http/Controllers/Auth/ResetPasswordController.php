<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function credentials(Request $request)
    {
        return $request->only(
            'mail_address', 'password', 'token'
        );
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'mail_address' => 'required|email',
            'password' => 'required|confirmed',
        ];
    }

}
