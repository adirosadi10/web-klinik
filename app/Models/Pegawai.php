<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['no_pegawai', 'nama_pegawai', 'jk', 'jabatan', 'poli', 'alamat', 'no_hp'];
}
