@extends('tiket.admin')

@section('content')

<div class="content-top mb-4">
    <div>
        <h1>Tambah Tiket</h1>
        <p class="subtitle">Isi data tiket baru untuk acara</p>
    </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="mb-0">Form Tiket</h3>
  </div>

<div class="card-body">

<form action="{{ route('tikets.store') }}"
      method="POST">

@csrf

<div class="mb-3">

<label>Acara</label>

<select name="acara_id"
        class="form-control">

@foreach($acaras as $acara)

<option value="{{ $acara->id }}">
{{ $acara->nama_acara ?? 'Acara #' . $acara->id }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Nama Tiket</label>

<input type="text"
       name="nama_tiket"
       class="form-control">

</div>

<div class="mb-3">

<label>Harga</label>

<input type="number"
       name="harga"
       class="form-control">

</div>

<div class="mb-3">

<label>Stok</label>

<input type="number"
       name="stok"
       class="form-control">

</div>

<div class="mb-3">

<label>Jenis Tiket</label>

<select name="jenis_tiket"
        class="form-control">

<option value="Regular">Regular</option>
<option value="VIP">VIP</option>
<option value="VVIP">VVIP</option>

</select>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control"></textarea>

</div>

<div class="d-flex justify-content-end mt-3">
    <a href="{{ route('tikets.index') }}" class="btn btn-secondary me-2">Batal</a>
    <button class="btn btn-success">Simpan</button>
</div>

</form>

</div>
</div>
</div>

@endsection