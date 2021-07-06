<?php

namespace App\Http\Controllers;

use App\Models\PeriksaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriksaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = DB::table('obats')->select('id_obat', 'nama_obat')->get();

        $periksa = DB::table('periksas')
            ->join('pendaftarans', 'periksas.id_daftar', '=', 'pendaftarans.id_daftar')
            ->join('tindakans', 'periksas.id_tindakan', '=', 'tindakans.id_tindakan')
            ->select('pendaftarans.*', 'periksas.id_periksa', 'periksas.keterangan', 'tindakans.tindakan')
            ->orderByDesc('id_periksa')
            ->limit(1)
            // ->where('periksas.id_periksa', $id_periksa)
            ->get();
        $id = DB::table('periksas')->select('id_periksa')->orderByDesc('id_periksa')
            ->limit(1)
            // ->where('periksas.id_periksa', $id_periksa)
            ->get();
        // foreach ($periksa as $key => $value) {
        //     $id = $key>$value["id_daftar"];
        // };
        // $a = $id[0]["id_periksa"];
        // \var_dump($a);
        // \dd($periksa);
        // 

        return view('v_proses', compact('obat', 'periksa',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'id_periksa' => $request->id_periksa,
            'id_obat' => $request->id_obat,
            'jumlah' => $request->jumlah,
        ];
        DB::table('periksa_details')->insert($data);
        $periksa = DB::table('periksas')
            ->join('pendaftarans', 'periksas.id_daftar', '=', 'pendaftarans.id_daftar')
            ->join('tindakans', 'periksas.id_tindakan', '=', 'tindakans.id_tindakan')
            ->select('pendaftarans.*', 'periksas.id_periksa', 'periksas.keterangan', 'tindakans.tindakan', 'tindakans.tarif')
            ->orderByDesc('id_periksa')
            ->limit(1)
            ->get();
        $obat = DB::table('obats')->select('id_obat', 'nama_obat')->get();
        $detail = DB::table('periksa_details')
            ->join('obats', 'periksa_details.id_obat', '=', 'obats.id_obat')
            ->select('periksa_details.*', 'obats.nama_obat', 'obats.harga',)
            ->where('id_periksa', $data['id_periksa'])
            ->get();
        $total = DB::table('periksa_details')
            ->join('obats', 'periksa_details.id_obat', '=', 'obats.id_obat')
            ->selectRaw("SUM(harga*jumlah) as total")
            ->where('id_periksa', $data['id_periksa'])
            ->get();
        // \dd($total);
        return \view('v_detail', \compact('periksa', 'obat', 'detail', 'total'));
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
     * @param  \App\Models\PeriksaDetail  $periksaDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PeriksaDetail $periksaDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeriksaDetail  $periksaDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriksaDetail $periksaDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeriksaDetail  $periksaDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeriksaDetail $periksaDetail)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeriksaDetail  $periksaDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeriksaDetail $periksaDetail)
    {
        //
    }
}
