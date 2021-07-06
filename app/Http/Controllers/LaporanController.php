<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function harian(Request $request)
    {
        $selesai = DB::table('transaksis')
            ->join('periksas', 'periksas.id_periksa', '=', 'transaksis.id_periksa')
            ->join('pendaftarans', 'pendaftarans.id_daftar', '=', 'periksas.id_daftar')
            ->select('nama', 'id_transaksi', 'no_id', 'alamat', 'total', 'transaksis.status')
            ->where('transaksis.status', '=', 1)
            ->orderByDesc('tgl_transaksi')
            ->limit(1);
        // \dd($selesai);
        return view('laporan.laporanHarian', \compact('selesai', 'request'));
    }
    public function bulanan(Request $request)
    {
        

        $selesai = DB::table('transaksis')
        ->select('tgl_transaksi', DB::raw('SUM(total) as total_sales'))
        ->groupBy('tgl_transaksi')
            // ->select('tgl_transaksi','total')
            // ->groupBy('tgl_transaksi')
            ->get();
        dd($selesai);
        return view('laporan.laporanBulanan', \compact('selesai', 'request'));
    }
}
