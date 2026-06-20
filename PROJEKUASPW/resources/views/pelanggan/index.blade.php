@extends('layout.admin')


@section('content')

 <div class="content-top">
          <div>
            <h1>Dashboard Pelanggan</h1>
            <p class="subtitle">Ringkasan aktivitas pelanggan hari ini, 15 Juni 2026</p>
          </div>
          <button class="btn-primary">
            <i class="ti ti-plus"></i> Pelanggan baru
          </button>
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

                            <form action="{{ route('pelanggan.destroy', $p->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">
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
                    <i class="ti ti-users"></i>
                    <p class="mb-0">Belum ada data pelanggan</p>
                </div>
                @endif

            </div>
        </div>
@endsection