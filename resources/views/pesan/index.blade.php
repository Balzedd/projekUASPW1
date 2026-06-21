<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket - {{ $acara->nama_acara }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=JetBrains+Mono:wght@400;700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pesanan.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>
<body>

    <header class="simple-header"data-aos="fade-down">
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

            <a href="{{ route('dashboard') }}#events" class="btn-outline btn-sm">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>

           <div class="profile-dropdown">
    <button
    type="button"
    class="profile-button"
    onclick="toggleProfileMenu()">
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
                <span class="sec-label"><i class="fa-solid fa-ticket"></i> Pemesanan Tiket</span>
                <h1 class="sec-title">Pesan <span>Tiket Anda</span></h1>
            </div>

            <div class="booking-grid">

                {{-- Ringkasan Acara --}}
                <div class="card" data-aos="fade-up" data-aos-duration="800">
                    <div class="event-summary-img">
                       <img src="{{ $acara->gambar ?: 'https://via.placeholder.com/600x400' }}"
     alt="{{ $acara->nama_acara }}">
                    </div>
                    <span class="hero-card-tag">{{ strtoupper($acara->kategori) }}</span>
                    <h2 style="font-size:1.3rem; font-weight:700; margin:12px 0 18px;">
                        {{ $acara->nama_acara }}
                    </h2>

                    <div class="emeta" style="margin-bottom:0;">
                        <span>
                            <i class="fa-solid fa-calendar-days"></i>
                            {{ \Carbon\Carbon::parse($acara->tanggal)->translatedFormat('d F Y') }}
                        </span>
                        <span>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $acara->lokasi }}
                        </span>
                    </div>
                </div>

                {{-- Form Pemesanan --}}
              <div class="cform" data-aos="fade-up" data-aos-duration="800">
                    <form action="{{ route('pesan.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="acara_id" value="{{ $acara->id }}">

                        <div class="frow">
                            <div>
                                <label class="flbl">Nama Pemesan</label>
                                <input type="text" class="fctrl" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div>
                                <label class="flbl">Email</label>
                                <input type="email" class="fctrl" value="{{ auth()->user()->email }}" readonly>
                            </div>
                        </div>

                        <div style="margin-bottom:16px;">
                            <label class="flbl">Pilih Jenis Tiket</label>
                            <div class="ticket-types" style="margin-bottom:0;">
                                @foreach($acara->tikets as $i => $tiket)
                                    <label class="ttype {{ $i == 0 ? 'selected' : '' }}"
       data-ttype
       data-aos="flip-left"
       data-aos-delay="{{ $i * 100 }}">
                                        <input type="radio"
                                               name="tiket_id"
                                               value="{{ $tiket->id }}"
                                               {{ $i == 0 ? 'checked' : '' }}
                                               required
                                               style="display:none;">
                                        <div class="ttype-name">{{ $tiket->nama_tiket }}</div>
                                        <div class="ttype-price">
                                            Rp {{ number_format($tiket->harga,0,',','.') }}
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div style="margin-bottom:20px;">
                            <label class="flbl">Jumlah Tiket</label>
                            <input type="number" name="jumlah" class="fctrl" min="1" value="1" required>
                        </div>

                        <div style="margin-bottom:24px;">
                            <label class="flbl">Metode Pembayaran</label>
                            <select name="metode_pembayaran" class="fctrl" required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="BCA">BCA</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="Dana">Dana</option>
                                <option value="OVO">OVO</option>
                                <option value="GoPay">GoPay</option>
                                <option value="ShopeePay">ShopeePay</option>
                                <option value="QRIS">QRIS</option>
                            </select>
                        </div>

                       <button type="submit" class="btn-primary btn-lg" style="width:100%; justify-content:center;"> 
                        <i class="fa-solid fa-bag-shopping"></i> Pesan Tiket </button>

                    </form>
                </div>

            </div>
        </div>
    </div>

   

@if(session('success'))
<div id="successModal" class="custom-modal">
    <div class="custom-modal-content">
        <div class="success-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <h2>Pesanan Berhasil!</h2>

        <p>
            Tiket berhasil dipesan dan telah masuk ke daftar tiket Anda.
        </p>

        <div class="modal-actions">
            <a href="{{ route('tiket-saya') }}" class="btn-primary"> Lihat Tiket Saya</a>
        </div>
    </div>
</div>
@endif

    <script>
        document.querySelectorAll('[data-ttype]').forEach(function (label) {
            label.addEventListener('click', function () {
                document.querySelectorAll('[data-ttype]').forEach(l => l.classList.remove('selected'));
                label.classList.add('selected');
            });
        });
    </script>

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