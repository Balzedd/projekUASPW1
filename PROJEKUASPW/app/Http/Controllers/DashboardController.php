<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use app\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
       if (Auth::user()->role == 'A') {
            // Hitung pelanggan baru (role bukan Admin)
            $pelangganBaru = User::where('role', '!=', 'A')
                                 ->whereDate('created_at', today())
                                 ->count();

            // Tambahan: total semua pelanggan
            $totalPelanggan = User::where('role', '!=', 'A')->count();

            return view('admin.dashboardAdm', compact('pelangganBaru', 'totalPelanggan'));
        }

        return view('dashboard');   
       
    }
}