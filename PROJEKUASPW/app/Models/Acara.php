<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $fillable = [

        'nama_acara',
    'kategori',
    'deskripsi',
    'tanggal',
    'lokasi',
    'gambar'

    ];
}