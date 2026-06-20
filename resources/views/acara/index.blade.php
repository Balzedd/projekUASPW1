@extends('layout.admin')

@section('content')

<div class="content-top mb-4">

    <div>

        <h1>Data Acara</h1>

        <p class="subtitle">
            Kelola data acara dan event
        </p>

    </div>

    <a href="{{ route('acara.create') }}"
       class="btn btn-primary">

        <i class="ti ti-plus"></i>
        Tambah Acara

    </a>

</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h3 class="mb-0">
            Daftar Acara
        </h3>
        <span class="link" style="cursor:default;">{{ $acaras->count() }} acara</span>

    </div>

    <div class="card-body p-0">

        @if($acaras->count() > 0)

        <table class="table table-data align-middle mb-0">

            <thead>

                <tr>

                    <th style="width:50px;">No</th>
                    <th style="width:110px;">Poster</th>
                    <th>Nama Acara</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th class="text-end">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($acaras as $acara)

                <tr>

                    <td>
                        <span class="row-number">{{ $loop->iteration }}</span>
                    </td>

                    <td>

                        <img src="{{ asset('gambar_acara/' . $acara->gambar) }}"
                             width="80"
                             height="56"
                             style="object-fit:cover; border-radius:8px; border:1px solid var(--border-color);">

                    </td>

                    <td class="cell-strong">{{ $acara->nama_acara }}</td>

                    <td>
                        <span class="type-badge">{{ $acara->kategori }}</span>
                    </td>

                    <td class="cell-muted">{{ $acara->tanggal }}</td>

                    <td class="cell-muted">{{ $acara->lokasi }}</td>

                    <td class="text-end text-nowrap">
    <a href="{{ route('acara.edit', $acara->id) }}"
       class="btn btn-warning btn-sm me-1">
        <i class="ti ti-edit"></i> Edit
    </a>

    <button type="button" 
            onclick="showDeleteModal({{ $acara->id }}, '{{ addslashes($acara->nama_acara) }}')"
            class="btn btn-danger btn-sm">
        <i class="ti ti-trash"></i> Hapus
    </button>

    <form id="delete-form-{{ $acara->id }}" 
          action="{{ route('acara.destroy', $acara->id) }}" 
          method="POST" 
          style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</td>

                </tr>

                @endforeach

            </tbody>

        </table>

        @else
        <div class="table-empty">
            <i class="ti ti-calendar-event"></i>
            <p class="mb-1">Belum ada data acara</p>
            <a href="{{ route('acara.create') }}" class="link">Tambah acara pertama</a>
        </div>
        @endif

    </div>

</div>

<!-- Modal Konfirmasi Hapus Acara -->
<div id="deleteModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-content">
        <div class="warning-icon">
            <i class="ti ti-alert-triangle"></i>
        </div>
        
        <h2>Yakin Hapus Acara?</h2>
        
        <p class="modal-message" id="deleteMessage">
            Apakah Anda yakin ingin menghapus acara ini?
        </p>
        
        <div class="modal-actions">
            <button onclick="closeDeleteModal()" class="btn-secondary-modal">
                Batal
            </button>
            <button onclick="confirmDelete()" class="btn-danger-modal">
                <i class="ti ti-trash"></i> Hapus
            </button>
        </div>
    </div>
</div>

@endsection