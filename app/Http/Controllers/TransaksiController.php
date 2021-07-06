<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunggu = DB::table('transaksis')
            ->join('periksas', 'periksas.id_periksa', '=', 'transaksis.id_periksa')
            ->join('pendaftarans', 'pendaftarans.id_daftar', '=', 'periksas.id_daftar')
            // ->join('periksa_details', 'periksa_details.id_periksa', '=', 'periksas.id_periksa')
            ->select('nama', 'transaksis.id_periksa', 'id_transaksi', 'no_id', 'alamat', 'total', 'transaksis.status as status', 'tgl_transaksi',)
            ->where('transaksis.status', '=', 0)
            ->orderByDesc('tgl_transaksi')
            ->paginate(10);
        // \dd($tunggu);


        $selesai = DB::table('transaksis')
            ->join('periksas', 'periksas.id_periksa', '=', 'transaksis.id_periksa')
            ->join('pendaftarans', 'pendaftarans.id_daftar', '=', 'periksas.id_daftar')
            ->select('nama', 'id_transaksi', 'no_id', 'alamat', 'total', 'transaksis.status')
            ->where('transaksis.status', '=', 1)
            ->orderByDesc('tgl_transaksi')
            ->paginate(10);
        return view('v_transaksi', \compact('tunggu', 'selesai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'id_periksa' => $request->id,
            'total' => $request->total,
            'tgl_transaksi' => \date('Y-m-d'),
            'status' => 0,
        ];
        DB::table('transaksis')->insert($data);
        // return \view('v_pendaftaran');
        return redirect()->route('periksa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Transaksi::findOrFail($request->get('id_transaksi'));
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {

        $data = [

            'id_transaksi' => Request()->id_transaksi,
            'id_periksa' => Request()->id_periksa,
            'total' => Request()->total,
            'bayar' => Request()->bayar,
            'kembali' => Request()->kembali,
            'tgl_transaksi' => date('Y-m-d'),
            'status' => 1

        ];
        DB::table('transaksis')
            ->where('id_transaksi', $data['id_periksa'])
            ->update($data);

        return redirect()->route('transaksi')->with('pesan', 'Data Berhasil dibayarkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
