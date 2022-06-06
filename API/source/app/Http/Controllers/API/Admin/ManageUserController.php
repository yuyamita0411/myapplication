<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\AppliUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ManageUserController extends Controller
{
    public function index(){
        return response()->json((object)[]);
    }

    public function InportCompanyUser(Request $request){
        $AppliUser = new AppliUser;
        $AppliUser->type = "一般ユーザー";
        $AppliUser->name = $request->name;
        $AppliUser->mail_address = $request->mail_address;
        $AppliUser->password = Hash::make('general418');
        $AppliUser->companyid = Auth::User()->companyid;
        $AppliUser->save();
        return response()->json($AppliUser);
    }
}
