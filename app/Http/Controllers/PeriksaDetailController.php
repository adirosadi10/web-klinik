<?php

namespace App\Http\Controllers;

use App\Models\PeriksaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriksaDetailController extends Controller
{

    public function index()
    {
        $obat = DB::table('obats')->select('id_obat', 'nama_obat')->get();

        $periksa = DB::table('periksas')
            ->join('pendaftarans', 'periksas.id_daftar', '=', 'pendaftarans.id_daftar')
            ->join('tindakans', 'periksas.id_tindakan', '=', 'tindakans.id_tindakan')
            ->select('pendaftarans.*', 'periksas.id_periksa', 'periksas.keterangan', 'tindakans.tindakan')
            ->orderByDesc('id_periksa')
            ->limit(1)
            ->get();
        $id = DB::table('periksas')->select('id_periksa')->orderByDesc('id_periksa')
            ->limit(1)
            ->get();
        return view('v_proses', compact('obat', 'periksa',));
    }
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
        return \view('detailPeriksa.v_detail', \compact('periksa', 'obat', 'detail', 'total'));
    }


    public function store(Request $request)
    {
        //
    }

    public function show(PeriksaDetail $periksaDetail)
    {
        //
    }


    public function edit(PeriksaDetail $periksaDetail)
    {
        //
    }

    public function update(Request $request, PeriksaDetail $periksaDetail)
    {
    }

    public function destroy($id_detail)
    {
    }
}
