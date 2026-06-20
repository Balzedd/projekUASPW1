@extends('layout.admin')


@section('content')


@foreach($pesanans as $pesanan)

<tr>
    <td>{{ $pesanan->user->name }}</td>
    <td>{{ $pesanan->acara->nama_acara }}</td>
    <td>{{ $pesanan->jumlah }}</td>
    <td>{{ $pesanan->status }}</td>

   <td>
    @if($pesanan->status == 'pending')
        <form action="{{ route('pesanan.accept',$pesanan->id) }}"
              method="POST">
            @csrf
            <button type="submit" class="btn btn-success">
                Accept
            </button>
        </form>
    @else
        <span style="color:green">
            ✔ Sudah Dibayar
        </span>
    @endif
</td>
</tr>

@endforeach
@endsection