<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $tindakan = DB::table('tindakans')
                // ->where('no_tindakan', 'like', '%' . $request->cari . '%')
                ->where('tindakan', 'like', '%' . $request->cari . '%')
                ->get();
        } else {

            $tindakan = DB::table('tindakans')->get();
        }
        return view('v_tindakan', ['tindakan' => $tindakan], ['request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'tindakan' => $request->tindakan,
            'tarif' => $request->tarif,
        ];
        DB::table('tindakans')->insert($data);
        return redirect()->route('tindakan')->with('pesan', 'Data Berhasil ditambahkan');
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
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function show(Tindakan $tindakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tindakan  $tindakan
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
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tindakan)
    {
        DB::table('tindakans')
            ->where('id_tindakan', $id_tindakan)
            ->delete();
        return redirect()->route('tindakan')->with('pesan', 'Data Berhasil dihapus');
    }
}
