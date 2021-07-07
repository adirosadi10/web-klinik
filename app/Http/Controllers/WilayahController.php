<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WilayahController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $wilayah = DB::table('wilayahs')
                ->where('kelurahan', 'like', '%' . $request->cari . '%')
                ->get();
        } else {
            $wilayah = DB::table('wilayahs')->get();
        }
        return view('wilayah.v_wilayah', ['wilayah' => $wilayah], ['request' => $request]);
    }
    public function create(Request $request)
    {
        $data = [
            'provinsi' => $request->provinsi,
            'distrik' => $request->distrik,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
        ];
        DB::table('wilayahs')->insert($data);
        return redirect()->route('wilayah')->with('pesan', 'Data Berhasil ditambahkan');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Wilayah $wilayah)
    {
        //
    }
    public function edit(Request $request)
    {
        $data = wilayah::findOrFail($request->get('id_wilayah'));
        echo json_encode($data);
    }
    public function update(Request $request, wilayah $wilayah)
    {
        $data = [
            'id_wilayah' => Request()->id_wilayah,
            'provinsi' => Request()->provinsi,
            'distrik' => Request()->distrik,
            'kecamatan' => Request()->kecamatan,
            'kelurahan' => Request()->kelurahan,
        ];
        DB::table('wilayahs')
            ->where('id_wilayah', $data['id_wilayah'])
            ->update($data);
        return redirect()->route('wilayah')->with('pesan', 'Data Berhasil diupdate');
    }
    public function destroy($id_wilayah)
    {
        DB::table('wilayahs')
            ->where('id_wilayah', $id_wilayah)
            ->delete();
        return redirect()->route('wilayah')->with('pesan', 'Data Berhasil dihapus');
    }
}
