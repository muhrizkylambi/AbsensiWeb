<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanAbsensi()
    {
        $currentRoute = \Request::route()->getName();

        return view('data-laporan.laporan-absensi', [
            'title' => 'Data Laporan Abensi',
            'breadcrumb' => 'Data Laporan Abensi',
            'currentRoute' => $currentRoute
        ]);
    }

    public function laporanAktivitas()
    {
        $currentRoute = \Request::route()->getName();

        return view('data-laporan.laporan-aktivitas', [
            'title' => 'Data Laporan Aktivitas',
            'breadcrumb' => 'Data Laporan Aktivitas',
            'pegawai' => Pegawai::all(),
            'currentRoute' => $currentRoute
        ]);
    }
}
