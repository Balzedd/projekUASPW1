@extends('acara.admin')

@section('content')

<div class="content-top mb-4">

```
<div>

    <h1>Edit Acara</h1>

    <p class="subtitle">
        Kelola dan perbarui data acara
    </p>

</div>
```

</div>

<div class="card">

```
<div class="card-header">

    <h3 class="mb-0">
        Form Edit Acara
    </h3>

</div>

<div class="card-body">

    <form action="{{ route('acara.update', $acara->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Nama Acara
                </label>

                <input type="text"
                       name="nama_acara"
                       class="form-control"
                       value="{{ $acara->nama_acara }}">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Lokasi
                </label>

                <input type="text"
                       name="lokasi"
                       class="form-control"
                       value="{{ $acara->lokasi }}">

            </div>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Tanggal
            </label>

            <input type="date"
                   name="tanggal"
                   class="form-control"
                   value="{{ $acara->tanggal }}">

        </div>

        <div class="mb-4">

            <label class="form-label">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      rows="5"
                      class="form-control">{{ $acara->deskripsi }}</textarea>

        </div>

        <div class="d-flex gap-2">

            <button type="submit"
                    class="btn btn-warning">

                <i class="ti ti-device-floppy"></i>
                Update

            </button>

            <a href="{{ route('acara.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>
```

</div>

@endsection
