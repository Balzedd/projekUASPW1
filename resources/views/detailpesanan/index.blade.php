<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=JetBrains+Mono:wght@400;700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pesanan.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>
<body>

   <header class="simple-header" data-aos="fade-down">
    <div class="container">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <div>
                <div class="logo-name">TICKET<span>IN</span></div>
            </div>
        </div>

        <div style="display:flex;align-items:center;gap:15px;">

            <a href="{{ route('tiket-saya') }}" class="btn-outline btn-sm">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>

           <div class="profile-dropdown">
    <button class="profile-button" onclick="toggleProfileMenu()">
        <div class="avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 3)) }}
        </div>

        <div class="profile-info">
            <div class="profile-name">{{ Auth::user()->name }}</div>
            <div class="profile-role">Member</div>
        </div>

        <i class="fas fa-chevron-down"></i>
    </button>

    <div class="profile-menu" id="profileMenu">
        <a href="{{ route('profile.user') }}">
            <i class="fas fa-user"></i> Profile
        </a>

        <a href="{{ route('tiket-saya') }}">
            <i class="fas fa-ticket-alt"></i> Tiket Saya
        </a>

        


    </div>
</div>

        </div>
    </div>
</header>

    <div class="page-section">
        <div class="container">

           <div class="page-head" data-aos="fade-up">
                <span class="sec-label"><i class="fa-solid fa-ticket"></i> Detail Pesanan</span>
                <h1 class="sec-title">Detail <span>Pesanan</span></h1>
                <p style="color:var(--muted); font-size:.85rem; margin-top:6px;">
                    Lihat informasi pesanan dan tiket Anda.
                </p>
            </div>

            {{-- Informasi Pesanan --}}
           <div class="card" data-aos="fade-up" data-aos-duration="800">
                <div class="info-grid">

                    <div class="info-box">
                        <span>Nama Pemesan</span>
                        <strong>{{ $pesanan->user->name }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Email</span>
                        <strong>{{ $pesanan->user->email }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Nama Acara</span>
                        <strong>{{ $pesanan->acara->nama_acara }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Metode Pembayaran</span>
                        <strong>{{ $pesanan->metode_pembayaran }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Total Pembayaran</span>
                        <strong>Rp {{ number_format($pesanan->total_harga,0,',','.') }}</strong>
                    </div>

                    <div class="info-box">
                        <span>Status Pesanan</span>
                        <span class="badge-status {{ $pesanan->status }}">
                            {{ strtoupper($pesanan->status) }}
                        </span>
                    </div>

                </div>
            </div>

            {{-- Daftar Tiket --}}
           <div class="card" data-aos="fade-up" data-aos-duration="800">

                <h2 style="font-size:1.2rem; font-weight:700; margin-bottom:20px;">
                    <i class="fa-solid fa-ticket" style="color:var(--gold);"></i> Tiket Saya
                </h2>

                <div class="ticket-grid">

                    @foreach($pesanan->detailPesanans as $detail)

                        <div class="ticket-card">

                            <div class="ticket-card-title">
                                <i class="fa-solid fa-ticket"></i> {{ $pesanan->acara->nama_acara }}
                            </div>

                            <div class="ticket-code">
                                {{ $detail->kode_tiket }}
                            </div>

                            <div class="ticket-qr">
                                {!! QrCode::size(180)->generate($detail->kode_tiket) !!}
                            </div>

                            <div class="ticket-status-row">
                                @if($detail->status_tiket == 'aktif')
                                    <span class="tk-aktif">Tiket Aktif</span>
                                @else
                                    <span class="tk-digunakan">Tiket Digunakan</span>
                                @endif
                            </div>

                        </div>

                    @endforeach

                </div>
            </div>

        </div>
    </div>
<script src="{{ asset('assets/main.js') }}"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    offset: 80
});
</script>
</body>
</html>