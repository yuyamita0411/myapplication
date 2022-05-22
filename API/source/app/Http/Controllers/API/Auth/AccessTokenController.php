<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PersonalAccessToken;
use App\Models\AppliUser;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AccessTokenController extends Controller
{
    public function UserCheck(Request $request){
        $user = Auth::user();
        return $user->id;
    }
}
