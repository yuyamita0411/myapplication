<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppliUser;
use App\Models\CompanyInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        return view('auth.register');
    }
    public function Register(Request $request){
        $validatestatus = false;

        $CompanyInfo = new CompanyInfo;
        $CompanyInfo->name = $request->companyname;
        $CompanyInfo->address = $request->companyaddress;
        $CompanyInfo->telnum = $request->telnum;
        $CompanyInfo->mail = $request->companymail;
        $CompanyInfo->industry = $request->companyindustry;
        $CompanyInfo->save();

        $AppliUser = new AppliUser;
        $AppliUser->type = '管理者';
        $AppliUser->name = $request->name;
        $AppliUser->mail_address = $request->email;
        $AppliUser->password = Hash::make($request->password);
        $AppliUser->companyid = CompanyInfo::max('id');

        if($request->name && $request->email && $request->password && $request->password_confirmation){
            $validatestatus = true;
        }
        if($validatestatus == false){
            $statusmsg = "入力内容に不備があります。";
        }
        if($validatestatus == true){
            $statusmsg = "登録が完了しました。";
            $AppliUser->save();
            return redirect()->route('dashboard');
        }
        return view('auth.register', ['statusmsg' => $statusmsg]);
    }
}
