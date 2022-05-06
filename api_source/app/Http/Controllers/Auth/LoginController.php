<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use App\module\Values;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = Values::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'mail_address';
    }

    /*public function redirectPath()
    {
        return Values::HOME;
    }*/
}
