<?php

namespace App\Http\Controllers\Peran\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Peran\Admin\LogAkunController;
use App\Services\LogoutService;
use Illuminate\Http\Request;

/**
 * AdminController class
 * 
 * Used to handle admin requests.
 */
class AdminController extends Controller
{
    private $dashboardController, $profilController, $dataAlumniController, $logAkunController, $logoutService;

    /**
     * AdminController constructor
     * @param \App\Http\Controllers\Peran\Admin\DashboardController $dashboardController
     * @param \App\Http\Controllers\Peran\Admin\ProfilController $profilController
     * @param \App\Http\Controllers\Peran\Admin\DataAlumniController $dataAlumniController
     * @param \App\Http\Controllers\Peran\Admin\LogAkunController $logAkunController
     * @param \App\Services\LogoutService $logoutService
     */
    public function __construct(
        DashboardController $dashboardController,
        ProfilController $profilController,
        DataAlumniController $dataAlumniController,
        LogAkunController $logAkunController,
        LogoutService $logoutService
    ) {
        $this->dashboardController = $dashboardController;
        $this->profilController = $profilController;
        $this->dataAlumniController = $dataAlumniController;
        $this->logAkunController = $logAkunController;
        $this->logoutService = $logoutService;
    }

    /**
     * Handle dashboard request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Dashboard(Request $request)
    {
        return $this->dashboardController->Dashboard($request);
    }

    /**
     * Handle 'profil' request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Profil(Request $request)
    {
        return $this->profilController->Profil($request);
    }

    /**
     * Handle 'perbarui-profil' request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PerbaruiProfil(Request $request)
    {
        return $this->profilController->PerbaruiProfil($request);
    }

    /**
     * Handle 'data-alumni' request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function DataAlumni(Request $request)
    {
        return $this->dataAlumniController->DataAlumni($request);
    }

    /**
     * Handle 'tambah-data-alumni' request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahDataAlumni(Request $request)
    {
        return $this->dataAlumniController->TambahDataAlumni($request);
    }

    /**
     * Handle 'edit-data-alumni' request
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditDataAlumni(Request $request, int $id)
    {
        return $this->dataAlumniController->EditDataAlumni($request, $id);
    }

    /**
     * Handle 'hapus-data-alumni' request
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusDataAlumni(Request $request, int $id)
    {
        return $this->dataAlumniController->HapusDataAlumni($request, $id);
    }

    /**
     * Handle 'log' request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Log(Request $request)
    {
        return $this->logAkunController->LogAkun($request);
    }

    /**
     * Handle 'hapus-log' request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusLog(Request $request)
    {
        return $this->logAkunController->HapusLog($request);
    }

    /**
     * Handle 'logout' request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Logout(Request $request)
    {
        return $this->logoutService->Logout();
    }
}
