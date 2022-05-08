<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use App\Models\AppliUser;
use App\Models\CompanyInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password-confirm' => 'required'
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
        $json = [
            'userdata' => $user,
            'companydata' => $company,
            'message' => '登録が完了しました!',
            'error' => ''
        ];
        return response()->json( $json, Response::HTTP_OK);
    }
}
