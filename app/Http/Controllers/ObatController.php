<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $obat = DB::table('obats')
                ->where('nama_obat', 'like', '%' . $request->cari . '%')
                ->get();
        } else {

            $obat = DB::table('obats')->get();
        }
        return view('obat.v_obat', \compact('obat', 'request'));
    }
    public function create(Request $request)
    {
        $data = [
            'no_obat' => $request->no_obat,
            'nama_obat' => $request->nama_obat,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
        ];
        DB::table('obats')->insert($data);
        return redirect()->route('obat')->with('pesan', 'Data Berhasil ditambahkan');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Obat $obat)
    {
        //
    }
    public function edit(Request $request)
    {
        $data = Obat::findOrFail($request->get('id_obat'));
        echo json_encode($data);
    }
    public function update(Request $request, Obat $obat)
    {
        $data = [
            'id_obat' => Request()->id_obat,
            'no_obat' => Request()->no_obat,
            'nama_obat' => Request()->nama_obat,
            'jenis' => Request()->jenis,
            'harga' => Request()->harga,
        ];
        DB::table('obats')
            ->where('id_obat', $data['id_obat'])
            ->update($data);
        return redirect()->route('obat')->with('pesan', 'Data Berhasil diupdate');
    }
    public function destroy($id_obat)
    {
        DB::table('obats')
            ->where('id_obat', $id_obat)
            ->delete();
        return redirect()->route('obat')->with('pesan', 'Data Berhasil dihapus');
    }
}
