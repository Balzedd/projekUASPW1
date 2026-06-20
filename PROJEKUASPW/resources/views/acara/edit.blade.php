@extends('layout.admin')

@section('content')

<div class="content-top mb-4">

    <div>

        <h1>Edit Acara</h1>

        <p class="subtitle">
            Kelola dan perbarui data acara
        </p>

    </div>

    <a href="{{ route('acara.index') }}"
       class="btn btn-warning">

        <i class="ti ti-arrow-left"></i>
        Kembali

    </a>

</div>

<div class="card">

    <div class="card-header">
        <h3 class="mb-0">
            Form Edit Acara
        </h3>
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

        <form action="{{ route('acara.update', $acara->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nama Acara</label>
                    <input type="text"
                           name="nama_acara"
                           class="form-control form-control-dark @error('nama_acara') is-invalid @enderror"
                           value="{{ old('nama_acara', $acara->nama_acara) }}">
                    @error('nama_acara')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
   <div class="col-md-12">
               <select name="kategori"
        class="form-control-dark @error('kategori') is-invalid @enderror">

    <option value="Esport" {{ $acara->kategori == 'Esport' ? 'selected' : '' }}>Esport</option>
<option value="Olahraga" {{ $acara->kategori == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
<option value="Seminar" {{ $acara->kategori == 'Seminar' ? 'selected' : '' }}>Seminar</option>
<option value="Festival" {{ $acara->kategori == 'Festival' ? 'selected' : '' }}>Festival</option>
<option value="Konser" {{ $acara->kategori == 'Konser' ? 'selected' : '' }}>Konser</option>

</select>
@error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
</div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           class="form-control form-control-dark @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal', $acara->tanggal) }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Lokasi</label>
                    <input type="text"
                           name="lokasi"
                           class="form-control form-control-dark @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi', $acara->lokasi) }}">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control form-control-dark @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $acara->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label">Poster Acara</label>

                    <div class="current-poster">
                        <img src="{{ asset('gambar_acara/' . $acara->gambar) }}"
                             alt="{{ $acara->nama_acara }}">
                        <span class="cell-muted">Poster saat ini</span>
                    </div>

                    <input type="file"
                           name="gambar"
                           accept="image/*"
                           class="form-control form-control-dark @error('gambar') is-invalid @enderror">
                    <small class="form-hint">Kosongkan jika tidak ingin mengganti poster.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('acara.index') }}" class="btn btn-secondary-dark">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy"></i>
                    Update Acara
                </button>
            </div>

        </form>

    </div>

</div>

@endsection