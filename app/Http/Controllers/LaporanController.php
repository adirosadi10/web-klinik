<?php

namespace App\Http\Controllers;

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
    }
}
