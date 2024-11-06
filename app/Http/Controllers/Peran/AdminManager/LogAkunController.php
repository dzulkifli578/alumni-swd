<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\LogAkun;
use App\Services\LogAkunService;
use Illuminate\Http\Request;
use Session;

/**
 * LogAkunController class
 *
 * Used to handle 'log akun' requests.
 */
class LogAkunController extends Controller
{
    private $logAkunService;

    /**
     * LogAkunController constructor
     *
     * @param \App\Services\LogAkunService $logAkunService
     */
    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Display list of log accounts for admin manager.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function LogAkun(Request $request)
    {
        $log = LogAkun::select("*")->where("akun_id", session()->get("id"))->get();
        return view("peran.components.log.log", compact("log"));
    }

    /**
     * Delete all log accounts for admin manager.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusLog(Request $request)
    {
        return $this->logAkunService->hapusLog($request->session()->get("id"));
    }
}
