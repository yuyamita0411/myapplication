<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\TaskMessage;
use App\Models\TaskInfo;
use App\Models\AppliUser;
use App\Http\Controllers\Common\TaskInfoController;

class DashbordController extends Controller
{
    public function index(){
        $companyuser = TaskInfoController::GetCommonUser();
        return view('layout.dashboard', ['companyuser' => $companyuser]);
    }
}
