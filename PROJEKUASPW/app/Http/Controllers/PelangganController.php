<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
 $pelanggan = User::where('role', 'U')->get();
    return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
         $pelanggan = User::findOrFail($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->name = $request->input('name');
        $pelanggan->email = $request->input('email');
        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan updated successfully.');        
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan deleted successfully.');
    }
}
