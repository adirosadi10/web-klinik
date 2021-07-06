<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $obat = DB::table('obats')
                // ->where('no_obat', 'like', '%' . $request->cari . '%')
                ->where('nama_obat', 'like', '%' . $request->cari . '%')
                ->get();
        } else {

            $obat = DB::table('obats')->get();
        }
        return view('v_obat', \compact('obat', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Obat::findOrFail($request->get('id_obat'));
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_obat)
    {
        DB::table('obats')
            ->where('id_obat', $id_obat)
            ->delete();
        return redirect()->route('obat')->with('pesan', 'Data Berhasil dihapus');
    }
}
