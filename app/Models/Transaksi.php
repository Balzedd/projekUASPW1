<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'pesanan_id',
        'user_id',
        'acara_id',
        'tiket_id',
        'jumlah',
        'total_harga',
        'metode_pembayaran',
        'status',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

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
}