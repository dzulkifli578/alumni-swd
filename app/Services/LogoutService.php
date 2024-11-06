<?php

namespace App\Services;

use App\Services\LogAkunService;
use Session;

class LogoutService
{
    private $logAkunService;

    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    public function Logout()
    {
        $this->logAkunService->log("Logout", session("nama_pengguna") . " sudah logout");
        Session::flush();
        return redirect()->route("beranda");
    }
}