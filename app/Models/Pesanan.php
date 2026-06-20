<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
   protected $fillable = [
    'user_id',
    'acara_id',
    'tiket_id',
    'jumlah',
    'harga_satuan',
    'total_harga',
    'metode_pembayaran',
    'status'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }

    public function detailPesanans()
{
    return $this->hasMany(DetailPesanan::class);
}

    
}