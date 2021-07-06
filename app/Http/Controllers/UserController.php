<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class UserController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request)) {
            $user = DB::table('users')->where('level' . '=' . '1')->get();
        } else {
            $user = DB::table('users')
                // ->where('no_obat', 'like', '%' . $request->cari . '%')
                ->where('name', 'like', '%' . $request->cari . '%')
                // ->where('level' . '=' . 1)
                ->get();
        }
        return view('user.dataUser', \compact('user', 'request'));
    }
    public function create(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'level' => 1,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(50),

        ];
        // \dd($data);

        DB::table('users')->insert($data);
        return redirect()->route('dataUser')->with('pesan', 'Data Berhasil ditambahkan');
    }
    public function edit(Request $request)
    {
        $data = User::findOrFail($request->get('id'));
        echo json_encode($data);
    }
    public function update(Request $request, User $user)
    {
        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'id' => Request()->id,

        ];
        DB::table('users')
            ->where('id', $data['id'])
            ->update($data);
        return redirect()->route('dataUser')->with('pesan', 'Data Berhasil diupdate');
    }
    public function destroy($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();
        return redirect()->route('dataUser')->with('pesan', 'Data Berhasil dihapus');
    }
}
