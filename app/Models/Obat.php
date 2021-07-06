<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obats';
    protected $primaryKey = 'id_obat';
    protected $fillable = ['no_obat', 'nama_obat', 'jenis', 'stok', 'harga'];
}
