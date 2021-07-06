<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayahs';
    protected $primaryKey = 'id_wilayah';
    protected $fillable = [
        'provinsi', 'distrik', 'kecamatan', 'kelurahan'
    ];
}
