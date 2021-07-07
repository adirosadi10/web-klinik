<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TindakanController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $tindakan = DB::table('tindakans')
                ->where('tindakan', 'like', '%' . $request->cari . '%')
                ->get();
        } else {

            $tindakan = DB::table('tindakans')->get();
        }
        return view('tindakan.v_tindakan', ['tindakan' => $tindakan], ['request' => $request]);
    }
    public function create(Request $request)
    {
        $data = [
            'tindakan' => $request->tindakan,
            'tarif' => $request->tarif,
        ];
        DB::table('tindakans')->insert($data);
        return redirect()->route('tindakan')->with('pesan', 'Data Berhasil ditambahkan');
    }

    public function store(Request $request)
    {
        //
    }
    public function show(Tindakan $tindakan)
    {
        //
    }
    public function edit(Request $request)
    {
        $data = Tindakan::findOrFail($request->get('id_tindakan'));
        echo json_encode($data);
    }
    public function update(Request $request, Tindakan $tindakan)
    {
        $data = [
            'id_tindakan' => Request()->id_tindakan,
            'tindakan' => Request()->tindakan,
            'tarif' => Request()->tarif,
        ];
        DB::table('tindakans')
            ->where('id_tindakan', $data['id_tindakan'])
            ->update($data);
        return redirect()->route('tindakan')->with('pesan', 'Data Berhasil diupdate');
    }
    public function destroy($id_tindakan)
    {
        DB::table('tindakans')
            ->where('id_tindakan', $id_tindakan)
            ->delete();
        return redirect()->route('tindakan')->with('pesan', 'Data Berhasil dihapus');
    }
}
