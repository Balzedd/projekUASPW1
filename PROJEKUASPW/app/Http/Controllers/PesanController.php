<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PesanController extends Controller
{
    public function index($id)
    {
        $acara = Acara::with('tikets')->findOrFail($id);

        return view('pesan.index', compact('acara'));
    }

    public function store(Request $request)
{
    $tiket = Tiket::findOrFail($request->tiket_id);

    $totalHarga = $tiket->harga * $request->jumlah;

   Pesanan::create([
    'user_id'            => Auth::id(),
    'acara_id'           => $request->acara_id,
    'tiket_id'           => $request->tiket_id,
    'jumlah'             => $request->jumlah,
    'harga_satuan'       => $tiket->harga,
    'total_harga'        => $totalHarga,
    'metode_pembayaran'  => $request->metode_pembayaran,
    'status'             => 'pending',
]);
  return redirect()->back()
    ->with('success', 'Pesanan berhasil dibuat');
}


public function accept($id)
{
    $pesanan = Pesanan::findOrFail($id);

    $pesanan->update([
        'status' => 'dibayar'
    ]);

    for ($i = 1; $i <= $pesanan->jumlah; $i++) {

        DetailPesanan::create([
            'pesanan_id' => $pesanan->id,
            'kode_tiket' => 'EVT-' . strtoupper(Str::random(10))
        ]);
    }

    return back();
}

public function show($id)
{
    $pesanan = Pesanan::with([
        'user',
        'acara',
        'detailPesanans'
    ])->findOrFail($id);

    return view('detailpesanan.index', compact('pesanan'));
}

public function tiketSaya()
{
    $pesanans = Pesanan::with('acara')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('detailpesanan.list', compact('pesanans'));
}

public function daftarPesanan()
{
    $pesanans = Pesanan::with('user','acara')->get();

    return view('transaksi.index', compact('pesanans'));
}
}