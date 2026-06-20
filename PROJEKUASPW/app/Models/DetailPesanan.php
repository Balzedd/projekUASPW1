<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
     protected $fillable = [
        'pesanan_id',
        'kode_tiket',
        'status_tiket'
    ];

    public function pesanan()
{
    return $this->belongsTo(Pesanan::class);
}
}
