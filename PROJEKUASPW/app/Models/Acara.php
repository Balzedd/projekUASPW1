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

    public function tikets()
{
    return $this->hasMany(Tiket::class);
}

public function pesanans()
{
    return $this->hasMany(Pesanan::class);
}

public function transaksis()
{
    return $this->hasMany(Transaksi::class);
}
}