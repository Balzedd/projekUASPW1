@extends('layout.admin')

@section('content')

<div class="content-top mb-4">

    <div>
        <h1>Tambah Tiket</h1>
        <p class="subtitle">Isi data tiket baru untuk acara</p>
    </div>

    <a href="{{ route('tikets.index') }}" class="btn btn-warning">
        <i class="ti ti-arrow-left"></i>
        Kembali
    </a>

</div>

<div class="card">

    <div class="card-header">
        <h3 class="mb-0">Form Tiket</h3>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tikets.store') }}" method="POST">

            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Acara</label>

                    <select name="acara_id" class="form-control form-control-dark @error('acara_id') is-invalid @enderror">
                        <option value="">Pilih Acara</option>
                        @foreach($acaras as $acara)
                            <option value="{{ $acara->id }}" {{ old('acara_id') == $acara->id ? 'selected' : '' }}>
                                {{ $acara->nama_acara ?? 'Acara #' . $acara->id }}
                            </option>
                        @endforeach
                    </select>

                    @error('acara_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Tiket</label>

                    <input type="text"
                           name="nama_tiket"
                           class="form-control form-control-dark @error('nama_tiket') is-invalid @enderror"
                           value="{{ old('nama_tiket') }}">

                    @error('nama_tiket')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Harga</label>

                    <input type="number"
                           name="harga"
                           class="form-control form-control-dark @error('harga') is-invalid @enderror"
                           value="{{ old('harga') }}">

                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Stok</label>

                    <input type="number"
                           name="stok"
                           class="form-control form-control-dark @error('stok') is-invalid @enderror"
                           value="{{ old('stok') }}">

                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Tiket</label>

                    <select name="jenis_tiket" class="form-control form-control-dark @error('jenis_tiket') is-invalid @enderror">
                        <option value="Regular" {{ old('jenis_tiket') == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="VIP" {{ old('jenis_tiket') == 'VIP' ? 'selected' : '' }}>VIP</option>
                        <option value="VVIP" {{ old('jenis_tiket') == 'VVIP' ? 'selected' : '' }}>VVIP</option>
                    </select>

                    @error('jenis_tiket')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label">Deskripsi</label>

                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control form-control-dark @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('tikets.index') }}" class="btn btn-secondary-dark">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy"></i>
                    Simpan Tiket
                </button>
            </div>

        </form>

    </div>

</div>

@endsection