<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::with('acara')->get();

        return view('layouts.tiket.index', compact('tikets'));
    }

    public function create()
    {
        $acaras = Acara::all();

        return view('layouts.tiket.create', compact('acaras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'acara_id'=>'required',
            'nama_tiket'=>'required',
            'harga'=>'required',
            'stok'=>'required',
            'jenis_tiket'=>'required'
        ]);

        Tiket::create($request->all());

        return redirect()
            ->route('tikets.index')
            ->with('success','Data tiket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);
        $acaras = Acara::all();

        return view('layouts.tiket.edit', compact('tiket','acaras'));
    }

    public function update(Request $request, $id)
    {
        $tiket = Tiket::findOrFail($id);

        $tiket->update($request->all());

        return redirect()
            ->route('tikets.index')
            ->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Tiket::destroy($id);

        return redirect()
            ->route('tikets.index')
            ->with('success','Data berhasil dihapus');
    }
}