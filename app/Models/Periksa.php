<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class Periksa extends Model
{
    protected $table = 'periksas';
    protected $primaryKey = 'id_periksa';
    protected $fillable = [
        'id_daftar', 'id_tindakan',  'keterangan'
    ];
}
