@extends('layout.admin')

@section('content')

<div class="content-top mb-4">

    <div>
        <h1>Data Transaksi</h1>
        <p class="subtitle">
            Kelola dan verifikasi transaksi pemesanan tiket
        </p>
    </div>

</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Daftar Transaksi</h3>
        <span class="link" style="cursor:default;">{{ $pesanans->count() }} transaksi</span>
    </div>

    <div class="card-body p-0">

        @if($pesanans->count() > 0)

        <table class="table table-data align-middle mb-0">

            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Pelanggan</th>
                    <th>Acara</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($pesanans as $pesanan)

                <tr>

                    <td>
                        <span class="row-number">{{ $loop->iteration }}</span>
                    </td>

                    <td class="cell-strong">{{ $pesanan->user->name }}</td>

                    <td class="cell-muted">{{ $pesanan->acara->nama_acara }}</td>

                    <td class="cell-muted">{{ $pesanan->jumlah }}</td>

                    <td>
                        @if($pesanan->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @else
                            <span class="badge badge-success">Sudah Dibayar</span>
                        @endif
                    </td>

                    <td class="text-end text-nowrap">

                        @if($pesanan->status == 'pending')
                            <form action="{{ route('pesanan.accept', $pesanan->id) }}"
                                  method="POST"
                                  class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="ti ti-check"></i>
                                    Accept
                                </button>
                            </form>
                        @else
                            <span class="badge badge-success">
                                <i class="ti ti-check"></i>
                                Lunas
                            </span>
                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        @else
        <div class="table-empty">
            <i class="ti ti-receipt"></i>
            <p class="mb-1">Belum ada data transaksi</p>
        </div>
        @endif

    </div>

</div>

@endsection