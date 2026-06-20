<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Saya</title>

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

            <a href="{{ route('dashboard') }}" class="btn-outline btn-sm">
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
                <span class="sec-label"><i class="fa-solid fa-receipt"></i> Riwayat Transaksi</span>
                <h1 class="sec-title">Tiket <span>Saya</span></h1>
            </div>

            <div class="order-list">
                @forelse($pesanans as $pesanan)

                  <div class="order-card"
     data-aos="fade-up"
     data-aos-delay="{{ $loop->index * 100 }}">

                        <div class="order-card-main">
                            <div class="order-event">{{ $pesanan->acara->nama_acara }}</div>
                            <div class="order-meta">
                                <span>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{ \Carbon\Carbon::parse($pesanan->acara->tanggal)->translatedFormat('d F Y') }}
                                </span>
                                <span>
                                    <i class="fa-solid fa-wallet"></i>
                                    {{ $pesanan->metode_pembayaran }}
                                </span>
                            </div>
                        </div>

                        <div class="order-card-side">
                            <span class="badge-status {{ $pesanan->status }}">
                                {{ strtoupper($pesanan->status) }}
                            </span>

                            <span class="order-total">
                                Rp {{ number_format($pesanan->total_harga,0,',','.') }}
                            </span>

                           @if($pesanan->status == 'dibayar')
<a href="{{ route('detail-pesanan', $pesanan->id) }}"
   class="btn-outline btn-sm">
    Lihat Tiket
</a>
@else
<span class="btn-outline btn-sm">
    Menunggu Pembayaran
</span>
@endif
                        </div>

                    </div>

                @empty

                    <div class="empty-state" data-aos="zoom-in">
                        <i class="fa-solid fa-ticket"></i>
                        <p>Belum ada tiket yang tersedia.</p>
                    </div>

                @endforelse
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