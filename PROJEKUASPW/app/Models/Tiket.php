<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tikets';

    protected $fillable = [
        'acara_id',
        'nama_tiket',
        'deskripsi',
        'harga',
        'stok',
        'jenis_tiket'
    ];

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }

    public function pesanans()
{
    return $this->hasMany(Pesanan::class);
}
}