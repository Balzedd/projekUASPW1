@extends('layout.admin')

@section('content')

<div class="content-top mb-4">

    <div>
        <h1>Riwayat Transaksi</h1>
        <p class="subtitle">
            Daftar transaksi yang sudah selesai dan tercatat
        </p>
    </div>

</div>

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Daftar Transaksi</h3>
        <span class="link" style="cursor:default;">{{ $transaksis->count() }} transaksi</span>
    </div>

    <div class="card-body p-0">

        @if($transaksis->count() > 0)

        <table class="table table-data align-middle mb-0">

            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Pelanggan</th>
                    <th>Acara</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Metode Bayar</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($transaksis as $t)

                <tr>

                    <td>
                        <span class="row-number">{{ $loop->iteration }}</span>
                    </td>

                    <td class="cell-strong">{{ $t->user->name ?? '-' }}</td>

                    <td class="cell-muted">{{ $t->acara->nama_acara ?? '-' }}</td>

                    <td class="cell-muted">{{ $t->jumlah }}</td>

                    <td class="cell-muted">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>

                    <td class="cell-muted">{{ $t->metode_pembayaran ?? '-' }}</td>

                    <td>
                        @if($t->status == 'dibayar' || $t->status == 'lunas')
                            <span class="badge badge-success">Lunas</span>
                        @elseif($t->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @else
                            <span class="badge badge-danger">{{ ucfirst($t->status) }}</span>
                        @endif
                    </td>

                    <td class="cell-muted">{{ $t->created_at->translatedFormat('d M Y, H:i') }}</td>


                     <td>
            <button type="button" 
            onclick="showDeleteModal({{ $t->id }}, '{{ $t->user->name ?? 'Transaksi' }}')"
            class="btn btn-danger btn-sm">
        <i class="ti ti-trash"></i> Hapus
            </button>
    
            <form id="delete-form-{{ $t->id }}" 
          action="{{ route('transaksi.destroy', $t->id) }}" 
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
            <i class="ti ti-receipt"></i>
            <p class="mb-1">Belum ada riwayat transaksi</p>
        </div>
        @endif

    </div>

</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-content">
        <div class="warning-icon">
            <i class="ti ti-alert-triangle"></i>
        </div>
        
        <h2>Yakin Hapus Transaksi?</h2>
        
        <p class="modal-message" id="deleteMessage">
            Apakah Anda yakin ingin menghapus transaksi ini?
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

<!-- Modal Notifikasi Sukses -->
<div id="successModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-content">
        <div class="success-icon">
            <i class="ti ti-circle-check"></i>
        </div>
        <h2>Transaksi Berhasil Dihapus</h2>
        <p class="modal-message">Data transaksi telah berhasil dihapus dari sistem.</p>
        <div class="modal-actions">
            <button onclick="closeModal()" class="btn-primary-modal">
                <i class="ti ti-check"></i> Tutup
            </button>
        </div>
    </div>
</div>
@endsection