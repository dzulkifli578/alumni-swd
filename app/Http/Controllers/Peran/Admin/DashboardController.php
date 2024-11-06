<?php

namespace App\Http\Controllers\Peran\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use DB;
use Illuminate\Http\Request;

/**
 * DashboardController class
 * 
 * Used to handle admin dashboard requests.
 */
class DashboardController extends Controller
{
    /**
     * Display admin dashboard page.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Dashboard(Request $request)
    {
        $data = Alumni::with("jurusan")
            ->orderBy("id")
            ->paginate(5);

        $totalAlumni = Alumni::count();
        $tahunAwalAkhir = Alumni::selectRaw("MIN(tahun_lulus) as tahunAwal, MAX(tahun_lulus) as tahunAkhir")->first();
        $alumniPerTahun = Alumni::selectRaw("tahun_lulus, COUNT(*) as jumlah")
            ->groupBy("tahun_lulus")
            ->orderBy("tahun_lulus", "ASC")
            ->get();

        $alumni = Alumni::select(
            DB::raw('COUNT(*) as total_alumni'),
            DB::raw('(SELECT tahun_lulus FROM alumni GROUP BY tahun_lulus ORDER BY COUNT(*) DESC LIMIT 1) as alumni_terbanyak_tahun'),
            DB::raw('(SELECT COUNT(*) FROM alumni GROUP BY tahun_lulus ORDER BY COUNT(*) DESC LIMIT 1) as jumlah_alumni_terbanyak_tahun'),
            DB::raw('(SELECT tahun_lulus FROM alumni GROUP BY tahun_lulus ORDER BY COUNT(*) ASC LIMIT 1) as alumni_tersedikit_tahun'),
            DB::raw('(SELECT COUNT(*) FROM alumni GROUP BY tahun_lulus ORDER BY COUNT(*) ASC LIMIT 1) as jumlah_alumni_tersedikit_tahun'),
            DB::raw('(SELECT jurusan.nama FROM jurusan JOIN alumni ON alumni.jurusan_id = jurusan.id GROUP BY jurusan.nama ORDER BY COUNT(*) DESC LIMIT 1) as alumni_terbanyak_jurusan'),
            DB::raw('(SELECT COUNT(*) FROM jurusan JOIN alumni ON alumni.jurusan_id = jurusan.id GROUP BY jurusan.nama ORDER BY COUNT(*) DESC LIMIT 1) as jumlah_alumni_terbanyak_jurusan'),
            DB::raw('(SELECT jurusan.nama FROM jurusan JOIN alumni ON alumni.jurusan_id = jurusan.id GROUP BY jurusan.nama ORDER BY COUNT(*) ASC LIMIT 1) as alumni_tersedikit_jurusan'),
            DB::raw('(SELECT COUNT(*) FROM jurusan JOIN alumni ON alumni.jurusan_id = jurusan.id GROUP BY jurusan.nama ORDER BY COUNT(*) ASC LIMIT 1) as jumlah_alumni_tersedikit_jurusan')
        )->first();

        $alumniPerJurusan = Alumni::join('jurusan', 'alumni.jurusan_id', '=', 'jurusan.id')
            ->select('jurusan.nama as jurusan', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('jurusan.nama')
            ->orderBy('jurusan.nama')
            ->get();

        return view("peran.admin.dashboard.dashboard", compact("data", "totalAlumni", "tahunAwalAkhir", "alumniPerTahun", "alumni", "alumniPerJurusan"));
    }
}
