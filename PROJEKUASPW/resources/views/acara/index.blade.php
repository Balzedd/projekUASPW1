@extends('tiket.admin')

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

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h3 class="mb-0">
            Daftar Acara
        </h3>

    </div>

    <div class="card-body">

        <table class="table align-middle mb-0">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Poster</th>
                    <th>Nama Acara</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($acaras as $acara)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        <img src="{{ asset('gambar_acara/' . $acara->gambar) }}"
                             width="100"
                             height="70"
                             style="object-fit:cover; border-radius:10px;">

                    </td>

                    <td>{{ $acara->nama_acara }}</td>

                    <td>{{ $acara->tanggal }}</td>

                    <td>{{ $acara->lokasi }}</td>

                    <td class="text-nowrap">

                        <a href="{{ route('acara.edit', $acara->id) }}"
                           class="btn btn-warning btn-sm me-1">

                            <i class="ti ti-edit"></i>
                            Edit

                        </a>

                        <form action="{{ route('acara.destroy', $acara->id) }}"
                              method="POST"
                              class="d-inline-block">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Yakin hapus acara?')"
                                    class="btn btn-danger btn-sm">

                                <i class="ti ti-trash"></i>
                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada data acara

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection