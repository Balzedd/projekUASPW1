<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Support\Facades\File;
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
        $validated = $request->validate([
            'nama_acara' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
            'lokasi' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $gambar = null;

        if($request->hasFile('gambar')){

            File::ensureDirectoryExists(public_path('gambar_acara'));

            $gambar = time().'.'.$request->gambar->extension();

            $request->gambar->move(public_path('gambar_acara'), $gambar);

        }

        Acara::create([

            'nama_acara' => $validated['nama_acara'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'tanggal' => $validated['tanggal'],
            'lokasi' => $validated['lokasi'],
            'gambar' => $gambar

        ]);

        return redirect('/acara')->with('success', 'Acara berhasil ditambahkan.');
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

        $validated = $request->validate([
            'nama_acara' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
            'lokasi' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $gambar = $acara->gambar;

        if ($request->hasFile('gambar')) {

            File::ensureDirectoryExists(public_path('gambar_acara'));

            $gambar = time().'.'.$request->gambar->extension();

            $request->gambar->move(public_path('gambar_acara'), $gambar);
        }

        $acara->update([

            'nama_acara' => $validated['nama_acara'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'tanggal' => $validated['tanggal'],
            'lokasi' => $validated['lokasi'],
            'gambar' => $gambar,

        ]);

        return redirect('/acara')->with('success', 'Acara berhasil diperbarui.');
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