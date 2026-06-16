@extends('tiket.admin')

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
    </div>
    <div class="card-body">
        <table class="table align-middle mb-0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Event</th>
                        <th>Nama Tiket</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($tikets as $t)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $t->acara->id ?? '-' }}</td>

                    <td>{{ $t->nama_tiket }}</td>

                    <td>Rp {{ number_format($t->harga) }}</td>

                    <td>{{ $t->stok }}</td>

                    <td>{{ $t->jenis_tiket }}</td>

                    <td class="text-nowrap">
                        <a href="{{ route('tikets.edit',$t->id) }}"
                           class="btn btn-warning btn-sm me-1">
                            <i class="ti ti-edit"></i> Edit
                        </a>

                        <form action="{{ route('tikets.destroy',$t->id) }}"
                              method="POST"
                              class="d-inline-block">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Yakin hapus data?')"
                                    class="btn btn-danger btn-sm">
                                <i class="ti ti-trash"></i> Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection