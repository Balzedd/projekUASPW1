@extends('layout.admin')

@section('content')

<div class="content-top mb-4">

    <div>

        <h1>Tambah Acara</h1>

        <p class="subtitle">
            Tambahkan data acara atau event baru
        </p>

    </div>

    <a href="{{ route('acara.index') }}"
       class="btn btn-warning">

        <i class="ti ti-arrow-left"></i>
        Kembali

    </a>

</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">

    <div class="card-header">
        <h3 class="mb-0">
            Form Acara
        </h3>
    </div>

    <div class="card-body">

        <form action="{{ route('acara.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nama Acara</label>
                    <input type="text"
                           name="nama_acara"
                           class="form-control form-control-dark @error('nama_acara') is-invalid @enderror"
                           value="{{ old('nama_acara') }}"
                           placeholder="cth. Konser Musik Akhir Tahun">
                    @error('nama_acara')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

              <div class="col-md-6">
    <label class="form-label">Kategori</label>

    <select name="kategori"
            class="form-control form-control-dark @error('kategori') is-invalid @enderror">

        <option value="">Pilih Kategori</option>

        <option value="Esport" {{ old('kategori') == 'Esport' ? 'selected' : '' }}>
            Esport
        </option>

        <option value="Olahraga" {{ old('kategori') == 'Olahraga' ? 'selected' : '' }}>
            Olahraga
        </option>

        <option value="Seminar" {{ old('kategori') == 'Seminar' ? 'selected' : '' }}>
            Seminar
        </option>

        <option value="Festival" {{ old('kategori') == 'Festival' ? 'selected' : '' }}>
            Festival
        </option>

        <option value="Konser" {{ old('kategori') == 'Konser' ? 'selected' : '' }}>
            Konser
        </option>

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
                           value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Lokasi</label>
                    <input type="text"
                           name="lokasi"
                           class="form-control form-control-dark @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi') }}"
                           placeholder="cth. GOR Senayan, Jakarta">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

              <div class="col-md-12">
    <label class="form-label">Deskripsi</label>

    <textarea
        name="deskripsi"
        rows="6"
        class="form-control form-control-dark @error('deskripsi') is-invalid @enderror"
        placeholder="Masukkan deskripsi acara..."
    >{{ old('deskripsi') }}</textarea>

    <small class="form-hint">
        Format:<br>
        Waktu: 19:00 - 22:00 WIB<br>
        Kapasitas: 20.000 Pengunjung<br>
        Deskripsi acara...
    </small>

    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
                <div class="col-md-12">
                    <label class="form-label">Poster Acara</label>
                    <input type="file"
                           name="gambar"
                           accept="image/*"
                           class="form-control form-control-dark @error('gambar') is-invalid @enderror">
                    <small class="form-hint">Format JPG/PNG, disarankan rasio 16:9.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('acara.index') }}" class="btn btn-secondary-dark">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy"></i>
                    Simpan Acara
                </button>
            </div>

        </form>

    </div>

</div>

@endsection