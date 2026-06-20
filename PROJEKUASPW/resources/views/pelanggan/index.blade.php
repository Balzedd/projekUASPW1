@extends('layout.admin')


@section('content')

 <div class="content-top mb-4">
    <div>
        <h1>Data Pelanggan</h1>
        <p class="subtitle">Kelola Pelanggan</p>
    </div>
</div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Daftar Pelanggan</h3>
                <span class="link" style="cursor:default;">{{ $pelanggan->count() }} pelanggan</span>
            </div>

            <div class="card-body p-0">

                @if($pelanggan->count() > 0)
                <table class="table table-data align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width:50px;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Bergabung</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($pelanggan as $p)
                    <tr>
                        <td>
                            <span class="row-number">{{ $loop->iteration }}</span>
                        </td>
                        <td class="cell-strong">{{ $p->name }}</td>
                        <td class="cell-muted">{{ $p->email }}</td>
                        <td class="cell-muted">{{ $p->created_at->format('d-m-Y') }}</td>
                        <td class="text-end text-nowrap">
    <a href="{{ route('pelanggan.edit', $p->id) }}"
       class="btn btn-warning btn-sm me-1">
        <i class="ti ti-edit"></i> Edit
    </a>

    <button type="button" 
            onclick="showDeleteModal({{ $p->id }}, '{{ addslashes($p->name) }}')"
            class="btn btn-danger btn-sm">
        <i class="ti ti-trash"></i> Hapus
    </button>

    <form id="delete-form-{{ $p->id }}" 
          action="{{ route('pelanggan.destroy', $p->id) }}" 
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
                    <i class="ti ti-users"></i>
                    <p class="mb-0">Belum ada data pelanggan</p>
                </div>
                @endif

            </div>
        </div>

      <!-- Modal Konfirmasi Hapus Pelanggan -->
<div id="deleteModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-content">
        <div class="warning-icon">
            <i class="ti ti-alert-triangle"></i>
        </div>
        
        <h2>Yakin Hapus Pelanggan?</h2>
        
        <p class="modal-message" id="deleteMessage">
            Apakah Anda yakin ingin menghapus pelanggan ini?
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