<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'A') {
            return view('admin.dashboardAdm');
        }

        return view('dashboard');   
       
    }
}