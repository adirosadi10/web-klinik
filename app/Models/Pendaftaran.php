<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftarans';
    protected $primaryKey = 'id_daftar';
    protected $fillable = [
        'no_id', 'nama', 'jk', 'tmp_lahir', 'tgl_lahir', 'alamat', 'no_hp', 'tgl_daftar', 'status', 'created_at', 'updated_at'
    ];
    public $timestamps = \true;
}
