<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

/**
 * JurusanController class
 *
 * Used to handle jurusan requests
 */
class JurusanController extends Controller
{
    /**
     * Display RPL major page.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Rpl(Request $request)
    {
        $totalAlumni = Alumni::with("jurusan")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Rekayasa Perangkat Lunak");
            })
            ->count();

        $alumniPerTahun = Alumni::selectRaw("tahun_lulus, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Rekayasa Perangkat Lunak");
            })
            ->groupBy("tahun_lulus")
            ->get()
            ->toArray();

        $alumniPerJenisKelamin = Alumni::selectRaw("jenis_kelamin, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Rekayasa Perangkat Lunak");
            })
            ->groupBy("jenis_kelamin")
            ->get()
            ->toArray();

        return view("jurusan.jurusan", compact("totalAlumni", "alumniPerTahun", "alumniPerJenisKelamin"));
    }

    /**
     * Display TKJ major page.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Tkj()
    {
        $totalAlumni = Alumni::with("jurusan")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Komputer dan Jaringan");
            })
            ->count();

        $alumniPerTahun = Alumni::selectRaw("tahun_lulus, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Komputer dan Jaringan");
            })
            ->groupBy("tahun_lulus")
            ->get()
            ->toArray();

        $alumniPerJenisKelamin = Alumni::selectRaw("jenis_kelamin, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Komputer dan Jaringan");
            })
            ->groupBy("jenis_kelamin")
            ->get()
            ->toArray();

        return view("jurusan.jurusan", compact("totalAlumni", "alumniPerTahun", "alumniPerJenisKelamin"));
    }

    /**
     * Display TITL major page.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Titl()
    {
        $totalAlumni = Alumni::with("jurusan")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Instalasi Tenaga Listrik");
            })
            ->count();

        $alumniPerTahun = Alumni::selectRaw("tahun_lulus, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Instalasi Tenaga Listrik");
            })
            ->groupBy("tahun_lulus")
            ->get()
            ->toArray();

        $alumniPerJenisKelamin = Alumni::selectRaw("jenis_kelamin, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Instalasi Tenaga Listrik");
            })
            ->groupBy("jenis_kelamin")
            ->get()
            ->toArray();

        return view("jurusan.jurusan", compact("totalAlumni", "alumniPerTahun", "alumniPerJenisKelamin"));
    }

    /**
     * Display TKR major page.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Tkr()
    {
        $totalAlumni = Alumni::with("jurusan")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Kendaraan Ringan");
            })
            ->count();

        $alumniPerTahun = Alumni::selectRaw("tahun_lulus, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Kendaraan Ringan");
            })
            ->groupBy("tahun_lulus")
            ->get()
            ->toArray();

        $alumniPerJenisKelamin = Alumni::selectRaw("jenis_kelamin, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Kendaraan Ringan");
            })
            ->groupBy("jenis_kelamin")
            ->get()
            ->toArray();

        return view("jurusan.jurusan", compact("totalAlumni", "alumniPerTahun", "alumniPerJenisKelamin"));
    }

    /**
     * Display TBSM major page.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Tbsm()
    {
        $totalAlumni = Alumni::with("jurusan")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Bisnis dan Sepeda Motor");
            })
            ->count();

        $alumniPerTahun = Alumni::selectRaw("tahun_lulus, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Bisnis dan Sepeda Motor");
            })
            ->groupBy("tahun_lulus")
            ->get()
            ->toArray();

        $alumniPerJenisKelamin = Alumni::selectRaw("jenis_kelamin, COUNT(nama_lengkap) as jumlah")
            ->whereHas("jurusan", function ($query) {
                $query->where("nama", "Teknik Bisnis dan Sepeda Motor");
            })
            ->groupBy("jenis_kelamin")
            ->get()
            ->toArray();

        return view("jurusan.jurusan", compact("totalAlumni", "alumniPerTahun", "alumniPerJenisKelamin"));
    }
}
