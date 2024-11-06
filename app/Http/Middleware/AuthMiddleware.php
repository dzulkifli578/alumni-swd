<?php

namespace App\Http\Middleware;

use App\Models\Akun;
use App\Services\LogAkunService;
use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    private $logAkunService;

    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $kredensial = $request->only("nis", "kata_sandi");
        $akun = Akun::where("nis", $kredensial["nis"])->first();

        if (!$akun)
            return redirect()->back()->with("error", "Nama pengguna tidak ada.");

        if (!password_verify($kredensial["kata_sandi"], $akun->kata_sandi))
            return redirect()->back()->with("error", "Kata sandi tidak cocok.");

            Session::put([
                "id" => $akun->id,
                "nama_pengguna" => $akun->nama_pengguna,
                "nis" => $akun->nis,
                "foto" => $akun->foto,
                "peran" => $akun->peran
            ]);

        $this->logAkunService->log("Login", session("nama_pengguna") . " sudah login");

        return match (Session::get("peran"))
        {
            "admin" => redirect()->route("dashboard-admin"),
            "admin-manager" => redirect()->route("dashboard-admin-manager"),
            default => redirect()->route("login")
        };
    }
}
