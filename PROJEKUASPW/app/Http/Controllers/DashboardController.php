<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Acara;
use App\Models\User;
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

            return view('admin.dashboardAdm', compact(
                'pelangganBaru',
                'totalPelanggan'
            ));
        }

        // USER
        $acara = Acara::where('kategori', 'Esports')
            ->latest()
            ->first();

        $acaras = Acara::with('tikets')
            ->latest()
            ->get();

        return view('dashboard', compact('acara', 'acaras'));
    }
}