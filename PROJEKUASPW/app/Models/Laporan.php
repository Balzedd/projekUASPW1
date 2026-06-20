<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'topik',
        'pesan',
    ];
}
