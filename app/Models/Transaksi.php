<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_periksa', 'total', 'bayar', 'kembali'
    ];
}
