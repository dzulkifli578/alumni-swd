<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use Illuminate\Http\Request;

/**
 * DashboardController class
 * 
 * Used to handle admin dashboard requests.
 */
class DashboardController extends Controller
{
    /**
     * Display admin manager dashboard page.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Dashboard(Request $request)
    {
        $akun = Akun::select("*")->where("peran", "admin")->get();
        $totalAdmin = Akun::where("peran", "admin")->count();
        return view("peran.admin-manager.dashboard.dashboard", compact("akun", "totalAdmin"));
    }
}
