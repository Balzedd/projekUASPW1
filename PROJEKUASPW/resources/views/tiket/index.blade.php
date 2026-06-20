@extends('layout.admin')


@section('content')

<div class="content-top mb-4">
    <div>
        <h1>Data Tiket</h1>
        <p class="subtitle">Kelola tiket acara dan stok penjualan</p>
    </div>
    <a href="{{ route('tikets.create') }}" class="btn btn-primary">
        <i class="ti ti-plus"></i> Tambah Tiket
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Daftar Tiket</h3>
        <span class="link" style="cursor:default;">{{ $tikets->count() }} tiket</span>
    </div>
    <div class="card-body p-0">

        @if($tikets->count() > 0)
        <table class="table table-data align-middle mb-0">

            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Event</th>
                    <th>Nama Tiket</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Jenis</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @foreach($tikets as $t)

                @php
                    $stok = $t->stok;
                    $stockClass = $stok == 0 ? 'stock-empty' : ($stok <= 20 ? 'stock-low' : 'stock-ok');
                    $stockIcon = $stok == 0 ? 'ti-circle-x' : ($stok <= 20 ? 'ti-alert-triangle' : 'ti-circle-check');
                @endphp

                <tr>
                    <td>
                        <span class="row-number">{{ $loop->iteration }}</span>
                    </td>

                    <td class="cell-muted">{{ $t->acara->nama_acara ?? $t->acara->id ?? '-' }}</td>

                    <td class="cell-strong">{{ $t->nama_tiket }}</td>

                    <td class="cell-price">Rp {{ number_format($t->harga, 0, ',', '.') }}</td>

                    <td>
                        <span class="stock-badge {{ $stockClass }}">
                            <i class="ti {{ $stockIcon }}"></i> {{ $stok }}
                        </span>
                    </td>

                    <td>
                        <span class="type-badge">{{ $t->jenis_tiket }}</span>
                    </td>

                    <td class="text-end text-nowrap">
    <a href="{{ route('tikets.edit', $t->id) }}"
       class="btn btn-warning btn-sm me-1">
        <i class="ti ti-edit"></i> Edit
    </a>

    <button type="button" 
            onclick="showDeleteModal({{ $t->id }}, '{{ addslashes($t->nama_tiket) }}')"
            class="btn btn-danger btn-sm">
        <i class="ti ti-trash"></i> Hapus
    </button>

    <form id="delete-form-{{ $t->id }}" 
          action="{{ route('tikets.destroy', $t->id) }}" 
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
            <i class="ti ti-ticket-off"></i>
            <p class="mb-1">Belum ada data tiket</p>
            <a href="{{ route('tikets.create') }}" class="link">Tambah tiket pertama</a>
        </div>
        @endif

    </div>
</div>

<!-- Modal Konfirmasi Hapus Tiket -->
<div id="deleteModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-content">
        <div class="warning-icon">
            <i class="ti ti-alert-triangle"></i>
        </div>
        
        <h2>Yakin Hapus Tiket?</h2>
        
        <p class="modal-message" id="deleteMessage">
            Apakah Anda yakin ingin menghapus tiket ini?
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