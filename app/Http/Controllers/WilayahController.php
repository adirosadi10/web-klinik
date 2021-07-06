<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $wilayah = DB::table('wilayahs')
                // ->where('no_wilayah', 'like', '%' . $request->cari . '%')
                ->where('provinsi', 'like', '%' . $request->cari . '%')
                ->get();
        } else {

            $wilayah = DB::table('wilayahs')->get();
        }
        return view('v_wilayah', ['wilayah' => $wilayah], ['request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(Wilayah $wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = wilayah::findOrFail($request->get('id_wilayah'));
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_wilayah)
    {
        DB::table('wilayahs')
            ->where('id_wilayah', $id_wilayah)
            ->delete();
        return redirect()->route('wilayah')->with('pesan', 'Data Berhasil dihapus');
    }
}
