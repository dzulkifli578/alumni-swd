<?php

namespace App\Http\Controllers\Peran\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Jurusan;
use Illuminate\Http\Request;

/**
 * DataAlumniController class
 * 
 * Used to handle 'data alumni' requests.
 */
class DataAlumniController extends Controller
{
    /**
     * Display list of 'data alumni'.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function DataAlumni(Request $request)
    {
        $alumni = Alumni::join("jurusan", 'alumni.jurusan_id', 'jurusan.id')
            ->select('alumni.*', 'jurusan.nama as jurusan')
            ->orderBy('alumni.id')
            ->get();

        $jurusan = Jurusan::all();
        $tahunLulus = Alumni::select("tahun_lulus")->distinct()->get();

        return view("peran.admin.data-alumni.data-alumni", compact("alumni", "jurusan", "tahunLulus"));
    }

    /**
     * Add new 'data alumni'.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahDataAlumni(Request $request)
    {
        $validate = $request->validate([
            "nama_lengkap" => "required|string",
            "jenis_kelamin" => "required|string|in:Laki-laki,Perempuan",
            "tahun_lulus" => "required|integer",
            "jurusan_id" => "required|integer|exists:jurusan, id"
        ]);

        $alumni = Alumni::create($validate);

        if (!$alumni)
            return redirect()->back()->with("error", "Gagal menambah data alumni.");

        return redirect()->back()->with("sukses", "Berhasil menambah data alumni.");
    }

    /**
     * Edit 'data alumni'.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditDataAlumni(Request $request, int $id)
    {
        $validate = $request->validate([
            "nama_lengkap" => "required|string",
            "jenis_kelamin" => "required|string",
            "tahun_lulus" => "required|integer",
            "jurusan_id" => "required|integer"
        ]);

        $alumni = Alumni::find($id);

        if (!$alumni)
            return redirect()->back()->with("error", "Gagal menemukan data alumni.");

        $alumni->update($validate);

        if (!$alumni)
            return redirect()->back()->with("error", "Gagal mengedit data alumni.");

        return redirect()->back()->with("sukses", "Berhasil mengedit data alumni.");
    }

    /**
     * Delete 'data alumni'.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusDataAlumni(Request $request, int $id)
    {
        $alumni = Alumni::find($id);

        if (!$alumni)
            return redirect()->back()->with("error", "Gagal menemukan data alumni.");

        $alumni->delete();

        if (!$alumni)
            return redirect()->back()->with("error", "Gagal menghapus data alumni.");

        return redirect()->back()->with("sukses", "Berhasil menghapus data alumni.");
    }
}
