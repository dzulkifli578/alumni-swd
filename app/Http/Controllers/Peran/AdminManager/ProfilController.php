<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Services\LogAkunService;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;
use Session;

/**
 * ProfilController class
 *
 * Used to handle 'profil' requests.
 */
class ProfilController extends Controller
{
    private $logAkunService;

    /**
     * ProfilController constructor
     *
     * @param \App\Services\LogAkunService $logAkunService
     */
    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Display admin manager profile page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Profil(Request $request)
    {
        $akun = Akun::find(session()->get("id"));
        return view("peran.components.profil.profil", compact("akun"));
    }

    /**
     * Handle update profile request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PerbaruiProfil(Request $request)
    {
        $data = [];

        if ($request->filled("nama_pengguna"))
            $data["nama_pengguna"] = $request->input("nama_pengguna");

        if ($request->filled("kata_sandi"))
            $data["kata_sandi"] = password_hash($request->input("kata_sandi"), PASSWORD_ARGON2I);

        if ($request->filled("email"))
            $data["email"] = $request->input("email");

        if (empty($data))
            return redirect()->back()->with("error", "Tidak ada data yang diperbarui.");

        $akun = Akun::find(session()->get("id"));

        if (!$akun)
            return redirect()->back()->with("error", "Akun tidak ditemukan.");

            if ($request->hasFile("foto")) {
                $file = $request->file("foto");
    
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file->getRealPath());
                $filename = time() . "_" . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . ".avif";
                $image->toAvif(100);
    
                $image->save(public_path("img/admin-manager/" . $filename));
    
                if ($akun->foto && file_exists(public_path($akun->foto)))
                    unlink(public_path($akun->foto));
    
                $data["foto"] = "img/admin-manager/" . $filename;
            } else
                $data["foto"] = $akun->foto;

        $akun->update($data);

        if (!$akun)
            return redirect()->back()->with("error", "Gagal memperbarui profil.");

        session()->replace([
            "nama_pengguna" => $akun->nama_pengguna,
            "foto" => $akun->foto
        ]);

        $this->logAkunService->log('Memperbarui profil', session('nama_pengguna') . ' memperbarui profil');

        return redirect()->back()->with("sukses", "Berhasil memperbarui profil.");
    }
}