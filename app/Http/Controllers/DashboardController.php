<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Models\Acara;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Pesanan;
use App\Models\Tiket;

class DashboardController extends Controller
{
    public function index()
    {
        // ADMIN
        if (Auth::user()->role == 'A') {

            $pelangganBaru = User::where('role', '!=', 'A')
                ->whereDate('created_at', today())
                ->count();

            $totalPelanggan = User::where('role', '!=', 'A')->count();

            $hasTransaksi = Schema::hasTable('transaksis');

            if ($hasTransaksi) {
                $tiketTerjual = Transaksi::where('status', 'lunas')->sum('jumlah');
                $totalPendapatan = Transaksi::where('status', 'lunas')->sum('total_harga');

                $tiketTerjualKemarin = Transaksi::where('status', 'lunas')
                    ->whereDate('created_at', Carbon::yesterday())
                    ->sum('jumlah');
                $tiketTerjualHariIni = Transaksi::where('status', 'lunas')
                    ->whereDate('created_at', Carbon::today())
                    ->sum('jumlah');
            } else {
                $tiketTerjual = 0;
                $totalPendapatan = 0;
                $tiketTerjualKemarin = 0;
                $tiketTerjualHariIni = 0;
            }

            $totalAcara = Acara::count();
            $totalTiket = Tiket::count();

        
            $trenHarian = [];
            for ($i = 6; $i >= 0; $i--) {
                $tanggal = Carbon::now()->subDays($i);

                $jumlah = $hasTransaksi
                    ? Transaksi::where('status', 'lunas')
                        ->whereDate('created_at', $tanggal)
                        ->sum('jumlah')
                    : 0;

                $trenHarian[] = [
                    'tanggal' => $tanggal->locale('id')->translatedFormat('d M'),
                    'jumlah' => (int) $jumlah,
                ];
            }

            
            if ($hasTransaksi) {
                $acaraPopuler = Acara::withSum(['transaksis as tiket_terjual' => function ($q) {
                        $q->where('status', 'lunas');
                    }], 'jumlah')
                    ->orderByDesc('tiket_terjual')
                    ->take(5)
                    ->get(['id', 'nama_acara']);

                $acaraPopuler->each(function ($a) {
                    $a->tiket_terjual = $a->tiket_terjual ?? 0;
                });
            } else {
                $acaraPopuler = Acara::take(5)->get(['id', 'nama_acara'])
                    ->map(function ($a) {
                        $a->tiket_terjual = 0;
                        return $a;
                    });
            }

            
            $statusCount = [
                'lunas'   => $hasTransaksi ? Transaksi::where('status', 'lunas')->count() : 0,
                'pending' => Pesanan::where('status', 'pending')->count(),
            ];

            
            $transaksiTerbaru = $hasTransaksi
                ? Transaksi::with(['user', 'acara'])->latest()->take(5)->get()
                : collect();

            return view('admin.dashboardAdm', compact(
                'pelangganBaru',
                'totalPelanggan',
                'tiketTerjual',
                'totalPendapatan',
                'tiketTerjualKemarin',
                'tiketTerjualHariIni',
                'totalAcara',
                'totalTiket',
                'trenHarian',
                'acaraPopuler',
                'statusCount',
                'transaksiTerbaru',
                'hasTransaksi'
            ));
        }

        // USER
        $acara = Acara::where('kategori', 'Esports')
            ->latest()
            ->first();

        $acaras = Acara::with('tikets')
            ->latest()
            ->get();

        $featured = Acara::with('tikets')
            ->withSum(['transaksis' => function ($q) {
                $q->where('status', 'lunas');
            }], 'jumlah')
            ->orderByDesc('transaksis_sum_jumlah')
            ->first();

        $totalAcara = Acara::count();
        $totalTiket = Tiket::count();

        $eventTerbaru = Acara::latest()->take(3)->get();

        $eventPopuler = Acara::withCount(['transaksis as total_terjual' => function ($q) {
                $q->where('status', 'lunas');
            }])
            ->orderByDesc('total_terjual')
            ->take(4)
            ->get();

        return view('dashboard', compact(
            'acara',
            'acaras',
            'featured',
            'totalAcara',
            'totalTiket',
            'eventTerbaru',
            'eventPopuler'
        ));
    }
}