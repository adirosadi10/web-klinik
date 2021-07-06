<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $pegawai = DB::table('pegawais')
                // ->where('no_pegawai', 'like', '%' . $request->cari . '%')
                ->where('nama_pegawai', 'like', '%' . $request->cari . '%')
                ->get();
        } else {

            $pegawai = DB::table('pegawais')->get();
        }
        return view('v_pegawai', ['pegawai' => $pegawai], ['request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'no_pegawai' => $request->no_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'jk' => $request->jk,
            'jabatan' => $request->jabatan,
            'poli' => $request->poli,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ];
        DB::table('pegawais')->insert($data);
        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil ditambahkan');
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
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = pegawai::findOrFail($request->get('id_pegawai'));
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $data = [

            'id_pegawai' => Request()->id_pegawai,
            'no_pegawai' => Request()->no_pegawai,
            'nama_pegawai' => Request()->nama_pegawai,
            'jk' => Request()->jk,
            'jabatan' => Request()->jabatan,
            'poli' => Request()->poli,
            'alamat' => Request()->alamat,
            'no_hp' => Request()->no_hp,
        ];
        DB::table('pegawais')
            ->where('id_pegawai', $data['id_pegawai'])
            ->update($data);
        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai)
    {
        DB::table('pegawais')
            ->where('id_pegawai', $id_pegawai)
            ->delete();
        return redirect()->route('pegawai')->with('pesan', 'Data Berhasil dihapus');
    }
}
