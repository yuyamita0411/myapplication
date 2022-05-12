<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Hash;
use App\Models\AppliUser;
use \Symfony\Component\HttpFoundation\Response;
use App\module\Values;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $emptyinfoarr = ["mail_address" => "", "password" => ""];
        if(empty($request->mail_address)){
            $emptyinfoarr["mail_address"] = Values::$MailEmpty;
        }
        if(empty($request->password)){
            $emptyinfoarr["password"] = Values::$PasswordEmpty;
        }
        if(empty($request->password) || empty($request->mail_address)){
            return response()->json(['EmptyCheck' => $emptyinfoarr], Response::HTTP_OK);
        }

        $credentials = $request->validate([
            'mail_address' => 'required',
            'password' => 'required'
        ]);

        $checkobj = AppliUser::where('mail_address', '=', $request->mail_address);

        if($checkobj->exists() != true){
            return response()->json(['WrongMsg' => Values::$MailOrPassWrong, 'EmptyCheck' => $emptyinfoarr], Response::HTTP_OK);
        }
    
        if (!Hash::check($request->password, $checkobj->first()->password)) {
            return response()->json(['WrongMsg' => Values::$MailOrPassWrong, 'EmptyCheck' => $emptyinfoarr], Response::HTTP_OK);
        }

        if (Auth::attempt($credentials)) {
            $user = AppliUser::whereMailAddress($request->mail_address)->first(); //トークンの作成と取得

            $user->tokens()->delete();
            $token = $user->createToken("login:user{$user->id}")->plainTextToken;

            return response()->json(['token' => $token], Response::HTTP_OK);
        }
        return response()->json(['WrongMsg' => Values::$ErrorProcessing, 'EmptyCheck' => $emptyinfoarr], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    public function logout(){
        Auth::logout();
        return response()->json(['message' => 'Logged out'], 200);
    }
}
