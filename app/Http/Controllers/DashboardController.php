<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $coba = '2021-07-06';
        // $tahun = \substr($coba, 0, -3); tahun-bulan
        // $tahun = \substr($coba, 0, 4); tahun
        // $bulan = \substr($coba, 5, -3); bulan
        // $bulan = \substr($coba, 5); bulan-tanggal
        // $tanggal = \substr($coba, 8); tanggal
        $sekarang = Carbon::now()->toDateString();
        $kunjungan = DB::table('pendaftarans')->select(DB::Raw('count(*) as kunjungan'))
            ->where('tgl_daftar', '=', $sekarang)
            ->get();

        $daftar = DB::table('pendaftarans')->select(DB::Raw('count(*) as daftar'))
            ->where('tgl_daftar', '=', $sekarang)
            ->where('status', '=', 0)
            ->get();

        $pemasukan = DB::table('transaksis')
            ->select('tgl_transaksi', DB::raw('SUM(total) as total'))
            ->groupBy('tgl_transaksi')
            ->where('tgl_transaksi', '=', $sekarang)
            ->where('status', '=', 1)
            ->get();

        $pembayaran = DB::table('transaksis')
            ->select('tgl_transaksi', DB::raw('count(*) as pembayaran'))
            ->groupBy('tgl_transaksi')
            ->where('tgl_transaksi', '=', $sekarang)
            ->where('status', '=', 0)
            ->get();
        // dd($tanggal);
        return view('v_dashboard', \compact('pembayaran', 'pemasukan', 'kunjungan', 'daftar'));
    }
}
