<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Services\LogoutService;
use Illuminate\Http\Request;

/**
 * AdminManagerController class
 * 
 * Used to handle 'admin manager' requests.
 */
class AdminManagerController extends Controller
{
    private $dashboardController, $profilController, $dataAdminController, $logAkunController, $logoutService;

    /**
     * AdminManagerController constructor
     * 
     * @param \App\Http\Controllers\Peran\AdminManager\DashboardController $dashboardController
     * @param \App\Http\Controllers\Peran\AdminManager\ProfilController $profilController
     * @param \App\Http\Controllers\Peran\AdminManager\DataAdminController $dataAdminController
     * @param \App\Http\Controllers\Peran\AdminManager\LogAkunController $logAkunController
     * @param \App\Services\LogoutService $logoutService
     */
    public function __construct(
        DashboardController $dashboardController,
        ProfilController $profilController,
        DataAdminController $dataAdminController,
        LogAkunController $logAkunController,
        LogoutService $logoutService,
    ) {
        $this->dashboardController = $dashboardController;
        $this->profilController = $profilController;
        $this->dataAdminController = $dataAdminController;
        $this->logAkunController = $logAkunController;
        $this->logoutService = $logoutService;
    }

    /**
     * Handle admin manager dashboard request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Dashboard(Request $request)
    {
        return $this->dashboardController->Dashboard($request);
    }

    /**
     * Handle admin manager profile request
     * 
     * @param \Illuminate\Http\Request $request 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Profil(Request $request)
    {
        return $this->profilController->Profil($request);
    }

    /**
     * Handle admin manager update profile request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PerbaruiProfil(Request $request)
    {
        return $this->profilController->PerbaruiProfil($request);
    }

    /**
     * Handle admin manager data admin request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function DataAdmin(Request $request)
    {
        return $this->dataAdminController->DataAdmin($request);
    }

    /**
     * Handle admin manager add data admin request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahDataAdmin(Request $request)
    {
        return $this->dataAdminController->TambahDataAdmin($request);
    }

    /**
     * Handle admin manager edit data admin request
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditDataAdmin(Request $request, int $id)
    {
        return $this->dataAdminController->EditDataAdmin($request, $id);
    }

    /**
     * Handle admin manager delete data admin request
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusDataAdmin(Request $request, int $id)
    {
        return $this->dataAdminController->HapusDataAdmin($request, $id);
    }

    /**
     * Handle admin manager log request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Log(Request $request)
    {
        return $this->logAkunController->LogAkun($request);
    }

    /**
     * Handle admin manager delete log request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusLog(Request $request)
    {
        return $this->logAkunController->HapusLog($request);
    }

    /**
     * Handle admin manager logout request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Logout(Request $request)
    {
        return $this->logoutService->Logout();
    }
}
