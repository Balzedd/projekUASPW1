<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $acaras = Acara::all();
      $featured = Acara::withSum(['transaksis' => function ($q) {$q->where('status', 'lunas');}],'jumlah')
      ->orderByDesc('transaksis_sum_jumlah')
      ->first();

        return view('acara.index', compact('acaras','featured'));
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
              'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
            'lokasi' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $gambar = null;

    if ($request->hasFile('gambar')) {

    $response = Http::attach(
    'file',
    file_get_contents($request->file('gambar')->getRealPath()),
    $request->file('gambar')->getClientOriginalName()
)->post(
    'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/image/upload',
    [
        'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET'),
    ]
);

dd($response->status(), $response->json());

    if ($response->successful()) {
    $gambar = $response->json()['secure_url'];
} else {
    dd($response->json());
}
}
Acara::create([
    'nama_acara' => $validated['nama_acara'],
    'kategori' => $validated['kategori'],
    'deskripsi' => $validated['deskripsi'] ?? null,
    'tanggal' => $validated['tanggal'],
    'lokasi' => $validated['lokasi'],
    'gambar' => $gambar,
]);

        return redirect('/acara')->with('success', 'Acara berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Acara $acara)
    {
          $deskripsi = $acara->deskripsi;

    preg_match('/Waktu:\s*(.+)/i', $deskripsi, $waktu);
    preg_match('/Kapasitas:\s*(.+)/i', $deskripsi, $kapasitas);

    $waktu = trim($waktu[1] ?? '-');
    $kapasitas = trim($kapasitas[1] ?? '-');

    return view('acara.show', compact(
        'acara',
        'waktu',
        'kapasitas'
    ));
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
            'kategori' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
            'lokasi' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $gambar = $acara->gambar;

        if ($request->hasFile('gambar')) {

    $response = Http::attach(
        'file',
        file_get_contents($request->file('gambar')->getRealPath()),
        $request->file('gambar')->getClientOriginalName()
    )->post(
        'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/image/upload',
        [
            'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET'),
        ]
    );

    if ($response->successful()) {
        $gambar = $response->json()['secure_url'];
    }
}
        $acara->update([
    'nama_acara' => $validated['nama_acara'],
    'kategori' => $validated['kategori'],
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