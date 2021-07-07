<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function cetakHarian($tgl)
    {
        $cetakHarian = DB::table('pendaftarans')
            ->where('tgL_daftar', '=', $tgl)->get();
        // \dd($selesai);
        return view('laporan.cetakLapPertanggal', \compact('cetakHarian', 'tgl'));
    }
    public function formHarian()
    {
        return \view('laporan.FormLapHari');
    }
    public function formBulanan()
    {
        return \view('laporan.FormLapBulan');
    }
    public function cetakBulanan($awal, $akhir)
    {
        $cetakBulan = DB::table('transaksis')->select(DB::raw('DATE(tgl_transaksi) as tanggal'), DB::raw('SUM(total) as total_sales'))
            ->groupBy('tgl_transaksi')
            ->whereBetween('tgl_transaksi', [$awal, $akhir])
            ->get();
        $kunjungan = DB::table('pendaftarans')->select('tgl_daftar', DB::Raw('count(*) as kunjungan'))
            ->groupBy('tgl_daftar')

            ->whereBetween('tgl_daftar', [$awal, $akhir])
            ->get();
        return \view('laporan.cetakLapPerange', \compact('cetakBulan', 'kunjungan'));
    }
}
