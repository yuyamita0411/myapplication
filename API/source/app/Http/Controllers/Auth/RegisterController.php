<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
//use App\Models\User;
use App\Models\AppliUser;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Models\AddressList;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function getGuard(){
        return "web";
    }

    protected function showRegistrationForm(){
        return view('auth.register');
    }

    protected function create(array $array){
        $CompanyInfo = new CompanyInfo;
        $CompanyInfo->name = $array['companyname'];
        $CompanyInfo->address = $array['companyaddress'];
        $CompanyInfo->telnum = $array['companytel'];
        $CompanyInfo->mail = $array['companymail'];
        $CompanyInfo->industry = $array['companyindustry'];
        $CompanyInfo->save();
        $idnow = CompanyInfo::max('id');

        return AppliUser::create([
            'name' => $array['name'],
            'type' => '管理者',
            'mail_address' => $array['email'],
            'password' => Hash::make($array['password']),
            'companyid' => $idnow
        ]);
    }

    public function SendMail($request){
        //send gridの設定を書く
        return $request->email;
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        Auth::guard($this->getGuard())->login($this->create($request->all()));
        $this->SendMail($request);

        return redirect($this->redirectPath());

    }
}