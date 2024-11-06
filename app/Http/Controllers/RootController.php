<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jurusan;
use Illuminate\Http\Request;

/**
 * RootController class
 *  
 * Used to handle root requests.
 */
class RootController extends Controller
{
    /**
     * Display 'beranda' page.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function beranda(Request $request)
    {
        $jurusan = Jurusan::all();

        $alumniPerTahunLulus = Alumni::selectRaw("tahun_lulus, COUNT(nama_lengkap) as jumlah")
            ->groupBy("tahun_lulus")
            ->orderBy("tahun_lulus")
            ->get()
            ->toArray();

        $totalAlumni = Alumni::count("nama_lengkap");

        $tahunLulus = Alumni::distinct()->pluck("tahun_lulus");

        $alumniTerbanyakPerTahun = Alumni::selectRaw("tahun_lulus, COUNT(nama_lengkap) as jumlah")
            ->groupBy("tahun_lulus")
            ->orderByDesc("tahun_lulus")
            ->first();

        $alumniTerbanyakPerJurusan = Alumni::join("jurusan", "alumni.jurusan_id", "jurusan.id")
            ->selectRaw("jurusan.nama, COUNT(nama_lengkap) as jumlah")
            ->groupBy("jurusan.nama")
            ->orderByDesc("jumlah")
            ->first();

        return view("beranda.beranda", compact("jurusan", "alumniPerTahunLulus", "totalAlumni", "tahunLulus", "alumniTerbanyakPerTahun", "alumniTerbanyakPerJurusan"));
    }

    /**
     * Display 'data-alumni' page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function DataAlumni()
    {
        $alumni = Alumni::join("jurusan", 'alumni.jurusan_id', 'jurusan.id')
            ->select('alumni.*', 'jurusan.nama as jurusan')
            ->orderBy('alumni.id')
            ->get();

        $jurusan = Jurusan::all();
        $tahunLulus = Alumni::select("tahun_lulus")->distinct()->get();

        return view("data-alumni.data-alumni", compact("alumni", "jurusan", "tahunLulus"));
    }

    /**
     * Display 'tentang' page.
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Tentang()
    {
        return view("tentang.tentang");
    }

    /**
     * Display login page.
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Login()
    {
        return view("login");
    }
}
