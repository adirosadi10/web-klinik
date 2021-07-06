<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriksaDetail extends Model
{
    protected $table = 'periksa_details';
    protected $primaryKey = 'id_detail';
    protected $fillable = [
        'id_periksa', 'id_obat', 'jumlah'
    ];
}
