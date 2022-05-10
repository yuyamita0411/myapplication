<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\AppliUser;
use \Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'mail_address' => 'required',
            'password' => 'required'
        ]);

        $checkmail = AppliUser::where('mail_address', '=', $request->mail_address)->exists();
        $checkpass = AppliUser::where('password', '=', $request->password)->exists();

        if(!empty($checkmail)){
            return response()->json(['data' => 'メールアドレスまたはパスワードが違います。']);
        }
        if(!empty($checkpass)){
            return response()->json(['data' => 'メールアドレスまたはパスワードが違います。']);
        }

        if (Auth::attempt($credentials)) {
            $user = AppliUser::whereMailAddress($request->mail_address)->first(); //トークンの作成と取得

            $user->tokens()->delete();
            $token = $user->createToken("login:user{$user->id}")->plainTextToken;

            return response()->json(['token' => $token], Response::HTTP_OK);
        }
        return response()->json('Can Not Login.', Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    public function logout(){
        Auth::logout();
        return response()->json(['message' => 'Logged out'], 200);
    }
}
