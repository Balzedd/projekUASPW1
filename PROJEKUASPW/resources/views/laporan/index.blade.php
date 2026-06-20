@extends('layout.admin')


@section('content')

<div class="content-top mb-4">
    <div>
        <h1>Data Laporan</h1>
        <p class="subtitle">Pesan dari pengguna melalui form contact</p>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Daftar Laporan</h3>
        <span class="link" style="cursor:default;">{{ $laporans->count() }} laporan</span>
    </div>

    <div class="card-body p-0">

        @if($laporans->count() > 0)
        <table class="table table-data align-middle mb-0">

            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Topik</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @foreach($laporans as $l)

                <tr>

                    <td>
                        <span class="row-number">{{ $loop->iteration }}</span>
                    </td>

                    <td class="cell-strong">{{ $l->nama }}</td>

                    <td class="cell-muted">{{ $l->email }}</td>

                    <td class="cell-muted">{{ $l->no_hp ?? '-' }}</td>

                    <td>
                        <span class="type-badge">
                            {{ $l->topik }}
                        </span>
                    </td>

                    <td class="cell-muted" style="max-width:250px;">
                        {{ \Illuminate\Support\Str::limit($l->pesan, 60) }}
                    </td>

                    <td class="cell-muted">
                        {{ $l->created_at->format('d M Y ') }}
                    </td>

                    <td class="text-end text-nowrap">

                        <form action="{{ route('laporan.destroy', $l->id) }}"
                              method="POST"
                              class="d-inline-block">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus laporan ini?')"
                                    class="btn btn-danger btn-sm">
                                <i class="ti ti-trash"></i> Hapus
                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        @else
        <div class="table-empty">
            <i class="ti ti-message-2"></i>
            <p class="mb-0">Belum ada laporan masuk</p>
        </div>
        @endif

    </div>
</div>

@endsection