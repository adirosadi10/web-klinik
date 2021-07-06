<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\Tindakan;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periksa = DB::table('periksas')
            ->join('pendaftarans', 'periksas.id_daftar', '=', 'pendaftarans.id_daftar')
            ->select('pendaftarans.*', 'periksas.*')
            ->where('periksas.status', '=', 0)
            ->get();
        $tindakan = DB::table('tindakans')->get();
        $obat = DB::table('obats')->select('id_obat', 'nama_obat')->get();


        return view('v_periksa', ['periksa' => $periksa], ['tindakan' => $tindakan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_periksa)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'id_periksa' => $request->id_periksa,
            'id_obat' => $request->no_obat,
            'jumlah' => $request->jumlah,
        ];
        DB::table('periksa_details')->insert($data);
        return redirect()->route('obat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function show(Periksa $periksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Tindakan::findOrFail($request->get('id_tindakan'));
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periksa $periksa)
    {
        $data = [

            'id_periksa' => Request()->id_periksa,
            'id_daftar' => Request()->id_daftar,
            'id_tindakan' => Request()->id_tindakan,
            'keterangan' => Request()->keterangan,
            'status' => 1

        ];
        DB::table('periksas')
            ->where('id_periksa', $data['id_periksa'])
            ->update($data);
        $periksa = DB::table('periksas')
            ->join('pendaftarans', 'periksas.id_daftar', '=', 'pendaftarans.id_daftar')
            ->join('tindakans', 'periksas.id_tindakan', '=', 'tindakans.id_tindakan')
            ->select('pendaftarans.*', 'periksas.id_periksa', 'periksas.keterangan', 'tindakans.tindakan')
            ->orderByDesc('id_periksa')
            ->limit(1)
            // ->where('periksas.id_periksa', $id_periksa)
            ->get();
        $obat = DB::table('obats')->select('id_obat', 'nama_obat')->get();


        return \view('v_proses', \compact('periksa', 'obat',));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periksa $periksa)
    {
        //
    }
}
