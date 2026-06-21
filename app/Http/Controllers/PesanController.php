<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $request->validate([
            'tiket_id' => 'required|exists:tikets,id',
            'jumlah'   => 'required|integer|min:1',
        ]);

        $tiket = Tiket::findOrFail($request->tiket_id);

        if ($request->jumlah > $tiket->stok) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Stok tiket tidak mencukupi. Sisa stok: ' . $tiket->stok);
        }

        $totalHarga = $tiket->harga * $request->jumlah;

        Pesanan::create([
            'user_id'           => Auth::id(),
            'acara_id'          => $request->acara_id,
            'tiket_id'          => $request->tiket_id,
            'jumlah'            => $request->jumlah,
            'harga_satuan'      => $tiket->harga,
            'total_harga'       => $totalHarga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status'            => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Pesanan berhasil dibuat');
    }

    public function accept($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        DB::transaction(function () use ($pesanan) {

        
            $tiket = Tiket::lockForUpdate()->findOrFail($pesanan->tiket_id);

            if ($pesanan->jumlah > $tiket->stok) {
                throw new \Exception('Stok tiket tidak mencukupi untuk menerima pesanan ini. Sisa stok: ' . $tiket->stok);
            }

            $tiket->decrement('stok', $pesanan->jumlah);

            $pesanan->update([
                'status' => 'dibayar',
            ]);

            for ($i = 1; $i <= $pesanan->jumlah; $i++) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'kode_tiket' => 'EVT-' . strtoupper(Str::random(10)),
                ]);
            }

            Transaksi::create([
                'pesanan_id'        => $pesanan->id,
                'user_id'           => $pesanan->user_id,
                'acara_id'          => $pesanan->acara_id,
                'tiket_id'          => $pesanan->tiket_id,
                'jumlah'            => $pesanan->jumlah,
                'total_harga'       => $pesanan->total_harga,
                'metode_pembayaran' => $pesanan->metode_pembayaran,
                'status'            => 'lunas',
            ]);

        });

        return back()->with('success', 'Pesanan diterima, stok diperbarui, dan transaksi tercatat');
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
        $pesanans = Pesanan::with('user', 'acara')
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('pesanan.index', compact('pesanans'));
    }

    public function riwayatTransaksi()
    {
        $transaksis = Pesanan::with('user', 'acara')
            ->latest()
            ->get();
 
        return view('transaksi.index', compact('transaksis'));
    }

   public function riwayatTransaksiDestroy($id)
{
    $transaksi = Transaksi::findOrFail($id);

    $transaksi->delete();

    return redirect()
        ->back()
        ->with('success', 'Transaksi berhasil dihapus');
}
}