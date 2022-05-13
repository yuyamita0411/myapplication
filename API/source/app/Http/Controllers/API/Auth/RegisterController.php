<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use App\Models\AppliUser;
use App\Models\CompanyInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \Symfony\Component\HttpFoundation\Response;
use App\module\Values;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validateflag = true;
        $emptyinfoarr = [
            'name' => "",
            "email" => "",
            "password" => "",
            "password_confirmation" => "",
            "companyname" => "",
            "companyaddress" => "",
            "companytel" => "",
            "companymail" => "",
            "companyindustry" => ""
        ];
        $returnarr = [
            'userdata' => [],
            'companydata' => [],
            'message' => '登録が完了しました。',
            'error' => '',
            'EmptyCheck' => $emptyinfoarr,
            'RegisterStatus' => 'success'
        ];

        if(empty($request->name)){
            $emptyinfoarr["name"] = Values::$NameRequired;
            $validateflag = false;
        }
        if(200 < mb_strlen($request->name)){
            $emptyinfoarr["name"] = Values::$LessThan200Cha;
            $validateflag = false;
        }

        if (!preg_match(Values::$ValidMailaddress, $request->email)) {
            $emptyinfoarr["email"] = Values::$MailFormInvalid;
            $validateflag = false;
        }
        if(200 < mb_strlen($request->email)){
            $emptyinfoarr["email"] = Values::$LessThan200Cha;
            $validateflag = false;
        }
        if(empty($request->email)){
            $emptyinfoarr["email"] = Values::$MailRequired;
            $validateflag = false;
        }

        if(empty($request->password)){
            $emptyinfoarr["password"] = Values::$PasswordRequired;
            $validateflag = false;
        }
        if(255 < mb_strlen($request->password)){
            $emptyinfoarr["password"] = Values::$LessThan255Cha;
            $validateflag = false;
        }
        if($request->password != $request->password_confirmation){
            $emptyinfoarr["password"] = Values::$PasswordIsNotSame;
            $validateflag = false;
        }

        if(empty($request->password_confirmation)){
            $emptyinfoarr["password_confirmation"] = Values::$PasswordConfirmRequired;
            $validateflag = false;
        }
        if(255 < mb_strlen($request->password_confirmation)){
            $emptyinfoarr["password_confirmation"] = Values::$LessThan255Cha;
            $validateflag = false;
        }
        if($request->password != $request->password_confirmation){
            $emptyinfoarr["password_confirmation"] = Values::$PasswordIsNotSame;
            $validateflag = false;
        }

        if(255 < mb_strlen($request->companyname)){
            $emptyinfoarr["companyname"] = Values::$LessThan255Cha;
            $validateflag = false;
        }

        if(255 < mb_strlen($request->companyaddress)){
            $emptyinfoarr["companyaddress"] = Values::$LessThan255Cha;
            $validateflag = false;
        }

        if (!preg_match(Values::$OnlyIntPattern, $request->companytel) && !empty($request->companytel)) {
            $emptyinfoarr["companytel"] = Values::$OnlyInt;
            $validateflag = false;
        }
        if(255 < mb_strlen($request->companytel)){
            $emptyinfoarr["companytel"] = Values::$LessThan255Cha;
            $validateflag = false;
        }

        if(mb_strlen($request->companymail) != 0 && !preg_match(Values::$ValidMailaddress, $request->companymail)){
            $emptyinfoarr["companymail"] = Values::$MailFormInvalid;
            $validateflag = false;
        }
        if(255 < mb_strlen($request->companymail)){
            $emptyinfoarr["companymail"] = Values::$LessThan255Cha;
            $validateflag = false;
        }

        if(255 < mb_strlen($request->companyindustry)){
            $emptyinfoarr["companyindustry"] = Values::$LessThan255Cha;
            $validateflag = false;
        }

        if($validateflag != true){
            $returnarr['message'] = '登録できませんでした';
            $returnarr['error'] = 'cannot registerd';
            $returnarr['EmptyCheck'] = $emptyinfoarr;
            $returnarr['RegisterStatus'] = 'failed';
            return response()->json($returnarr, Response::HTTP_OK);
        }

        if(AppliUser::where('mail_address', '=', $request->email)->exists() == true){
            $returnarr['message'] = '既に存在するユーザーのため登録できませんでした';
            $returnarr['error'] = 'cannot registerd';
            $returnarr['EmptyCheck'] = $emptyinfoarr;
            $returnarr['RegisterStatus'] = 'duplicated';
            return response()->json($returnarr, Response::HTTP_OK);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //バリエーションで問題がなかった場合にはユーザを作成する。
        $user = AppliUser::create([
            'type' => '管理者',
            'name' => $request->name,
            'mail_address' => $request->email,
            'password' => Hash::make($request->password),
            'companyid' => CompanyInfo::max('id')
        ]);

        $company = CompanyInfo::create([
            'name' => $request->companyname,
            'address' => $request->companyaddress,
            'telnum' => $request->telnum,
            'mail' => $request->companymail,
            'industry' => $request->companyindustry
        ]);

        //ユーザの作成が完了するとjsonを返す
        $returnarr['userdata'] = $user;
        $returnarr['companydata'] = $company;
        return response()->json( $returnarr, Response::HTTP_OK);
    }
}
