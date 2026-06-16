<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acaras = Acara::all();

        return view('acara.index', compact('acaras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gambar = null;

        if($request->hasFile('gambar')){

            $gambar = time().'.'.$request->gambar->extension();

            $request->gambar->move(public_path('gambar_acara'), $gambar);

        }

        Acara::create([

            'nama_acara' => $request->nama_acara,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'gambar' => $gambar

        ]);

        return redirect('/acara');
    }

    /**
     * Display the specified resource.
     */
    public function show(Acara $acara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $acara = Acara::findOrFail($id);

        return view('acara.edit', compact('acara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $acara = Acara::findOrFail($id);

        $acara->update([

            'nama_acara' => $request->nama_acara,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,

        ]);

        return redirect('/acara');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $acara = Acara::findOrFail($id);

        $acara->delete();

        return redirect('/acara');
    }
}