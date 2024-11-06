<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\Peran\Admin\AdminController;
use App\Http\Controllers\Peran\AdminManager\AdminManagerController;
use App\Http\Controllers\RootController;
use App\Http\Middleware\AdminManagerMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix("")->group(function () {
    Route::get("/", [RootController::class, "Beranda"])->name("beranda");
    Route::get("/data-alumni", [RootController::class, "DataAlumni"])->name("data-alumni");
    Route::get("/tentang", [RootController::class, "Tentang"])->name("tentang");

    Route::prefix("/jurusan")->group(function (): void {
        Route::get("/rpl", [JurusanController::class, "Rpl"])->name("rpl");
        Route::get("/tkj", [JurusanController::class, "Tkj"])->name("tkj");
        Route::get("/titl", [JurusanController::class, "Titl"])->name("titl");
        Route::get("/tkr", [JurusanController::class, "Tkr"])->name("tkr");
        Route::get("/tbsm", [JurusanController::class, "Tbsm"])->name("tbsm");
    });
});

Route::prefix("/login")->middleware(GuestMiddleware::class)->group(function () {
    Route::get("", [RootController::class, "Login"])->name("login");
    Route::post("/proses")->middleware(AuthMiddleware::class)->name("proses-login");
});

Route::prefix("/admin")->middleware(AdminMiddleware::class)->group(function () {
    Route::get("/dashboard", [AdminController::class, "Dashboard"])->name("dashboard-admin");
    Route::get("/profil", [AdminController::class, "Profil"])->name("profil-admin");
    Route::put("/profil/perbarui", [AdminController::class, "PerbaruiProfil"])->name("perbarui-profil-admin");

    Route::prefix("/data-alumni")->group(function () {
        Route::get("/", [AdminController::class, "DataAlumni"])->name("admin-data-alumni");
        Route::post("/tambah", [AdminController::class, "TambahDataAlumni"])->name("tambah-data-alumni");
        Route::put("/edit/{id}", [AdminController::class, "EditDataAlumni"])->name("edit-data-alumni");
        Route::delete("/hapus/{id}", [AdminController::class, "HapusDataAlumni"])->name("hapus-data-alumni");
    });

    Route::prefix("/log")->group(function () {
        Route::get("", [AdminController::class, "Log"])->name("log-admin");
        Route::delete("/hapus/{id}", [AdminController::class, "HapusLog"])->name("hapus-log-admin");
    });

    Route::post("/logout", [AdminController::class, "Logout"])->name("logout-admin");
});

Route::prefix("/admin-manager")->middleware(AdminManagerMiddleware::class)->group(function () {
    Route::get("/dashboard", [AdminManagerController::class, "Dashboard"])->name("dashboard-admin-manager");
    Route::get("/profil", [AdminManagerController::class, "Profil"])->name("profil-admin-manager");
    Route::put("/profil/perbarui", [AdminManagerController::class, "PerbaruiProfil"])->name("perbarui-profil-admin-manager");

    Route::get("/data-admin", [AdminManagerController::class, "DataAdmin"])->name("data-admin");
    Route::post("/data-admin/tambah", [AdminManagerController::class, "TambahDataAdmin"])->name("tambah-data-admin");
    Route::put("/data-admin/edit/{id}", [AdminManagerController::class, "EditDataAdmin"])->name("edit-data-admin");
    Route::delete("/data-admin/hapus/{id}", [AdminManagerController::class, "HapusDataAdmin"])->name("hapus-data-admin");

    Route::prefix("/log")->group(function () {
        Route::get("", [AdminManagerController::class, "Log"])->name("log-admin-manager");
        Route::delete("/hapus/{id}", [AdminManagerController::class, "HapusLog"])->name("hapus-log-admin-manager");
    });

    Route::post("/logout", [AdminManagerController::class, "Logout"])->name("logout-admin-manager");
});