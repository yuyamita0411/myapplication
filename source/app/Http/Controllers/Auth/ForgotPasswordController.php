<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $response = $this->broker()->sendResetLink(
            $request->only('mail_address')
        );

        if ($response === 'passwords.user') {
            return back()->with('status', trans($response));
        }
    
        return back()->withErrors(
            ['mail_address' => trans($response)]
        );
    }
}
