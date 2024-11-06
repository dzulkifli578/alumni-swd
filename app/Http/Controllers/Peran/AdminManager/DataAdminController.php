<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Services\LogAkunService;
use Illuminate\Http\Request;

/**
 * DataAdminController class
 * 
 * Used to handle 'data admin' requests.
 */
class DataAdminController extends Controller
{
    private $logAkunService;

    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Display list of data admins.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function DataAdmin(Request $request)
    {
        $akun = Akun::select("*")->where("peran", "admin")->get();
        return view("peran.admin-manager.data-admin.data-admin", compact("akun"));
    }

    /**
     * Add a new data admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahDataAdmin(Request $request)
    {
        $validate = $request->validate([
            "nama_pengguna" => "required|string",
            "nis" => "required|string",
            "kata_sandi" => "required|string",
            "peran" => "required|string|in:admin",
            "foto" => "nullable|image|mimes:jpeg,jpg,png"
        ]);

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("img/admin-manager"), $filename);
            $validate["foto"] = "img/admin-manager/" . $filename;
        }

        $akun = Akun::create($validate);

        if (!$akun)
            return redirect()->back()->with("error", "Gagal menambah data admin.");

        $this->logAkunService->log('Menambah data admin', session('nama_pengguna') . ' menambah data admin: ' . $validate["nama_pengguna"]);

        return redirect()->back()->with("sukses", "Berhasil menambah data admin.");
    }

    /**
     * Edit data admin.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditDataAdmin(Request $request, int $id)
    {
        $data = [];

        $akun = Akun::find($id);

        if (!$akun)
            return redirect()->back()->with("error", "Data admin tidak ditemukan.");

        if ($request->filled("nama_pengguna"))
            $data["nama_pengguna"] = $request->input("nama_pengguna");

        if ($request->filled("nis"))
            $data["nis"] = $request->input("nis");

        if ($request->filled("kata_sandi"))
            $data["kata_sandi"] = password_hash($request->input("kata_sandi"), PASSWORD_ARGON2I);

        if ($request->filled("peran"))
            $data["peran"] = $request->input("peran");

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("img/admin/" . $id), $filename);

            if ($akun->foto && file_exists(public_path($akun->foto)))
                unlink(public_path($akun->foto));

            $data["foto"] = "img/admin/" . $id . "/" . $filename;
        }

        $akun->update($data);

        if (!$akun)
            return redirect()->back()->with("error", "Gagal mengedit data admin.");

        $this->logAkunService->log('Mengedit data admin', session('nama_pengguna') . ' mengedit data admin: ' . $data["nama_pengguna"]);

        return redirect()->back()->with("sukses", "Berhasil mengedit data admin");
    }

    /**
     * Delete data admin.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusDataAdmin(Request $request, int $id)
    {
        $akun = Akun::find($id);

        if (!$akun)
            return redirect()->back()->with("error", "Data admin tidak ditemukan.");

        $akun->delete();

        return redirect()->back()->with("sukses", "Berhasil menghapus data admin.");
    }
}

