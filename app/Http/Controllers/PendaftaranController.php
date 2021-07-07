<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $pendaftaran = Pendaftaran::where('status', '=', 0)->get();
        return view('pendaftaran.v_pendaftaran', ['pendaftaran' => $pendaftaran]);
    }
    public function create(Request $request)
    {
        $data = [
            'no_id' => $request->no_id,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tgl_daftar' => date('Y-m-d'),
            'status' => 0,
            'created_at' => \date(\now())
        ];
        DB::table('pendaftarans')->insert($data);
        return redirect()->route('pendaftaran')->with('pesan', 'Data Berhasil ditambahkan');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }
    public function edit(Request $request)
    {
        $data = pendaftaran::findOrFail($request->get('id_daftar'));
        echo json_encode($data);
    }
    public function update(Request $request, pendaftaran $pendaftaran)
    {
        $data = [
            'id_daftar' => Request()->id_daftar,
            'no_id' => Request()->no_id,
            'nama' => Request()->nama,
            'jk' => Request()->jk,
            'tmp_lahir' => Request()->tmp_lahir,
            'tgl_lahir' => Request()->tgl_lahir,
            'alamat' => Request()->alamat,
            'no_hp' => Request()->no_hp,
            'tgl_daftar' => Request()->tgl_daftar,
            'status' => 1,
            'updated_at' => \date(\now())
        ];
        DB::table('pendaftarans')
            ->where('id_daftar', $data['id_daftar'])
            ->update($data);
        $proses = [
            'id_daftar' => Request()->id_daftar,
            'status' => 0,
        ];
        DB::table('periksas')->insert($proses);
        return redirect()->route('pendaftaran')->with('pesan', 'Data Berhasil diupdate');
    }
    public function destroy($id_daftar)
    {
        DB::table('pendaftarans')
            ->where('id_daftar', $id_daftar)
            ->delete();
        return redirect()->route('pendaftaran')->with('pesan', 'Data Berhasil dihapus');
    }
}
