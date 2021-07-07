<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $tunggu = DB::table('transaksis')
            ->join('periksas', 'periksas.id_periksa', '=', 'transaksis.id_periksa')
            ->join('pendaftarans', 'pendaftarans.id_daftar', '=', 'periksas.id_daftar')
            ->select('nama', 'transaksis.id_periksa', 'id_transaksi', 'no_id', 'alamat', 'total', 'transaksis.status as status', 'tgl_transaksi',)
            ->where('transaksis.status', '=', 0)
            ->orderByDesc('tgl_transaksi')
            ->paginate(10);
        $selesai = DB::table('transaksis')
            ->join('periksas', 'periksas.id_periksa', '=', 'transaksis.id_periksa')
            ->join('pendaftarans', 'pendaftarans.id_daftar', '=', 'periksas.id_daftar')
            ->select('nama', 'id_transaksi', 'no_id', 'alamat', 'total', 'transaksis.status', 'tgl_transaksi')
            ->where('transaksis.status', '=', 1)
            ->orderByDesc('tgl_transaksi')
            ->paginate(10);
        return view('transaksi.v_transaksi', \compact('tunggu', 'selesai'));
    }
    public function create(Request $request)
    {
        $data = [
            'id_periksa' => $request->id,
            'total' => $request->total,
            'tgl_transaksi' => \date('Y-m-d'),
            'status' => 0,
            'created_at' => \date(\now())
        ];
        DB::table('transaksis')->insert($data);
        return redirect()->route('periksa');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Transaksi $transaksi)
    {
        //
    }
    public function edit(Request $request)
    {
        $data = Transaksi::findOrFail($request->get('id_transaksi'));
        echo json_encode($data);
    }
    public function update(Request $request, Transaksi $transaksi)
    {
        $data = [
            'id_transaksi' => Request()->id_transaksi,
            'id_periksa' => Request()->id_periksa,
            'total' => Request()->total,
            'bayar' => Request()->bayar,
            'kembali' => Request()->kembali,
            'tgl_transaksi' => date('Y-m-d'),
            'status' => 1,
            'updated_at' => \date(\now())
        ];
        DB::table('transaksis')
            ->where('id_transaksi', $data['id_transaksi'])
            ->update($data);
        return redirect()->route('Transaksi')->with('pesan', 'Data Berhasil dibayarkan');
    }
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
