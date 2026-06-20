@php
if (!$featured) {
    $featured = (object)[
        'nama_acara' => 'Tidak ada event',
        'gambar' => '',
        'kategori' => '',
        'tanggal' => now(),
        'lokasi' => '-',
        'deskripsi' => '',
    ];
}

preg_match('/Waktu:\s*(.+)/i', $featured->deskripsi ?? '', $mWaktu);
preg_match('/Kapasitas:\s*(.+)/i', $featured->deskripsi ?? '', $mKap);

$waktu = trim($mWaktu[1] ?? '-');
$kapasitas = trim($mKap[1] ?? '-');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>TicketIn – Platform Tiket Event Indonesia</title>

  {{-- Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet"/>

  {{-- Icons --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  {{-- AOS (Animate On Scroll) --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.css"/>

  {{-- Our styles --}}
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

  <link rel="stylesheet"
      href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>
<body>

{{-- ══ TOPBAR ══ --}}
<div id="topbar">
  <div class="container">
    <div class="tb-left">
      <i class="fas fa-bolt"></i>
      <span>PROMO: Diskon 20% tiket early bird MPL Season 18!</span>
    </div>
    <div class="tb-right">
      <a href="https://www.instagram.com/yancikk_11"><i class="fab fa-instagram"></i></a>
      <a href="https://www.tiktok.com/@adriaannnn30"><i class="fab fa-tiktok"></i></a>
      <a href="https://youtube.com/@jonanathn"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
</div>

{{-- ══ NAVBAR ══ --}}
<nav id="nav">
  <div class="container">
    <div class="nav-inner">
      <a href="#" class="logo">
        <div class="logo-icon"><i class="fas fa-ticket-alt"></i></div>
        <div>
          <div class="logo-name">Ticket<span>In</span></div>
          <div class="logo-sub">Platform Tiket Indonesia</div>
        </div>
      </a>
      <ul class="nav-links">
        <li><a href="#hero" class="active">Beranda</a></li>
        <li><a href="#events">Event</a></li>
        <li><a href="#spotlight">Featured</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
      <div class="nav-actions">
        <a href="{{ route('login') }}" class="btn-outline">
          <i class="fas fa-sign-in-alt"></i>Masuk
        </a>
        <a href="{{ route('register') }}" class="btn-primary">
          <i class="fas fa-user-plus"></i>Daftar
        </a>
        <button class="hamburger" onclick="document.getElementById('mobile-nav').classList.add('open')">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </div>
</nav>

{{-- ══ MOBILE NAV ══ --}}
<div id="mobile-nav">
  <button id="mobile-close" onclick="document.getElementById('mobile-nav').classList.remove('open')">
    <i class="fas fa-times"></i>
  </button>
  <a href="#hero">Beranda</a>
  <a href="#events">Event</a>
  <a href="#spotlight">Featured</a>
  <a href="#how">Cara Beli</a>
  <a href="#contact">Kontak</a>
  <a href="{{ route('login') }}" class="btn-outline btn-lg"><i class="fas fa-sign-in-alt"></i>Masuk</a>
  <a href="{{ route('register') }}" class="btn-primary btn-lg"><i class="fas fa-user-plus"></i>Daftar</a>
</div>

{{-- ══════════════════════════════════════
     HERO — parallax layers
     ══════════════════════════════════════ --}}
<section id="hero">
  {{-- Parallax background layers --}}
  <div class="hero-grid-bg" id="pxGrid"></div>
  <div class="px-orb px-orb-1" id="pxOrb1"></div>
  <div class="px-orb px-orb-2" id="pxOrb2"></div>
  <div class="px-orb px-orb-3" id="pxOrb3"></div>
  {{-- Floating particles --}}
  <div class="hero-particles" id="heroParticles"></div>

  <div class="container">
    <div class="hero-cols">
      {{-- LEFT --}}
      <div class="hero-left">
        <div class="hero-badge" data-aos="fade-down" data-aos-duration="700">
          <i class="fas fa-star"></i>#1 Platform Tiket Event Indonesia
        </div>
        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
          <span class="line-white">TEMUKAN</span>
          <span class="line-gold">& BELI</span>
          <span class="line-white">EVENT</span>
          <span class="line-gold">DI TICKETIN</span>
        </h1>
        <p class="hero-desc" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
          Temukan tiket konser, esports, festival, olahraga, dan seminar terbaik
          dengan mudah, cepat, dan 100% aman.
        </p>
        <div class="hero-btns" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
          <a href="#events" class="btn-primary btn-lg"><i class="fas fa-search"></i>Cari Event</a>
          <a href="#how" class="btn-outline"><i class="fas fa-play-circle"></i>Cara Beli</a>
        </div>
        <div class="hero-stats" data-aos="fade-up" data-aos-delay="420" data-aos-duration="800">
          <div class="hstat">
            <div class="hstat-num">98<span>%</span></div>
            <div class="hstat-lbl">Kepuasan Pembeli</div>
          </div>
          <div class="hstat">
    <div class="hstat-num">{{ $acaras->count() }}<span>+</span></div>
    <div class="hstat-lbl">Event Aktif</div>
</div>
          <div class="hstat">
            <div class="hstat-num">50<span>+</span></div>
            <div class="hstat-lbl">Kota di Indonesia</div>
          </div>
        </div>
      </div>

      {{-- RIGHT --}}
      <div class="hero-right" data-aos="fade-left" data-aos-delay="200" data-aos-duration="900">
        <div class="fbadge">
          <i class="fas fa-fire"></i>
          <span><strong>Hot</strong> — {{ $featured->nama_acara }} — Buruan!</span>
        </div>
        <div class="hero-card" id="heroCard">
          <div class="hero-card-img">

            <div class="event-label" >🔴 LIVE SOON</div>

            <img src="{{ asset('gambar_acara/' . $featured->gambar) }}" alt="{{ $featured->nama_acara }}" class="px-card-img" id="pxCardImg">
          </div>
          <div class="hero-card-body">
            <div class="hero-card-tag">{{ $featured->kategori }}</div>
            <div class="hero-card-title">{{ $featured->nama_acara }}</div>
            <div class="hero-card-meta">
              <span class="meta-item"><i class="fas fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($featured->tanggal)->translatedFormat('d F Y') }}</span>
              <span class="meta-item"><i class="fas fa-map-marker-alt"></i>{{ $featured->lokasi }}</span>
              <span class="meta-item"><i class="fas fa-users"></i>{{ $kapasitas }}</span>
            </div>
            <div class="hero-card-price">
              <div class="price-tag">
                <small>Mulai dari</small>
                Rp {{ number_format($featured->tikets->min('harga') ?? 0, 0, ',', '.') }}
              </div>
              <a href="{{ route('login') }}" class="btn-primary btn-sm">Pesan Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Scroll indicator --}}
  <div class="scroll-hint" data-aos="fade-up" data-aos-delay="900">

    <div class="scroll-line"></div>
  </div>
</section>

{{-- ══ MARQUEE ══ --}}
<div class="marquee-sec">
  <div class="marquee-track">
    @foreach (['MPL Indonesia Season 18'=>'gamepad','Dewa 19 Reunion Concert'=>'music','Euphoria Life Festival 2026'=>'music','Egsclusive Festival 2026'=>'music','World Rally Championship'=>'car','The Power of Personal Branding'=>'user-tie','Singphoria Lampung 2026 Vol.5'=>'microphone','Mantra In Summer'=>'microphone','MotionIme Fest'=>'microphone'] as $name=>$icon)
      <div class="mq-item"><i class="fas fa-{{$icon}}"></i>{{$name}}</div>
    @endforeach
    @foreach (['MPL Indonesia Season 18'=>'gamepad','Dewa 19 Reunion Concert'=>'music','Euphoria Life Festival 2026'=>'music','Egsclusive Festival 2026'=>'music','World Rally Championship'=>'car','The Power of Personal Branding'=>'user-tie','Singphoria Lampung 2026 Vol.5'=>'microphone','Mantra In Summer'=>'microphone','MotionIme Fest'=>'microphone'] as $name=>$icon)
      <div class="mq-item"><i class="fas fa-{{$icon}}"></i>{{$name}}</div>
    @endforeach
  </div>
</div>

{{-- ══════════════════════════════════════
     CATEGORY
     ══════════════════════════════════════ --}}
<section id="category">
  {{-- Parallax background orb --}}
  <div class="section-px-bg" data-px-speed="0.3" data-px-dir="up"></div>
  <div class="container">
    <div style="text-align:center;" data-aos="fade-up">
      <span class="sec-label">Jelajahi Event</span>
      <h2 class="sec-title">Kategori <span>Event</span></h2>
      <div class="sec-line"></div>
    </div>
  <div class="cat-grid">
  <div class="catcard active" onclick="filterEvents('all',this)">
    <span class="cat-icon">🎫</span>
    <div class="cat-name">Semua Event</div>
    <div class="cat-count">{{ $acaras->count() }} event</div>
  </div>

  <div class="catcard" onclick="filterEvents('esport',this)">
    <span class="cat-icon">🎮</span>
    <div class="cat-name">Esport</div>
    <div class="cat-count">{{ \App\Models\Acara::where('kategori','Esport')->count() }} event</div>
  </div>

  <div class="catcard" onclick="filterEvents('konser',this)">
    <span class="cat-icon">🎵</span>
    <div class="cat-name">Konser</div>
    <div class="cat-count">{{ \App\Models\Acara::where('kategori','Konser')->count() }} event</div>
  </div>

  <div class="catcard" onclick="filterEvents('festival',this)">
    <span class="cat-icon">🎸</span>
    <div class="cat-name">Festival</div>
    <div class="cat-count">{{ \App\Models\Acara::where('kategori','Festival')->count() }} event</div>
  </div>

  <div class="catcard" onclick="filterEvents('olahraga',this)">
    <span class="cat-icon">⚽</span>
    <div class="cat-name">Olahraga</div>
    <div class="cat-count">{{ \App\Models\Acara::where('kategori','Olahraga')->count() }} event</div>
  </div>

  <div class="catcard" onclick="filterEvents('seminar',this)">
    <span class="cat-icon">🎤</span>
    <div class="cat-name">Seminar</div>
    <div class="cat-count">{{ \App\Models\Acara::where('kategori','Seminar')->count() }} event</div>
  </div>
</div>
  </div>
</section>

{{-- ══════════════════════════════════════
     EVENTS — MENGGUNAKAN $acaras DARI CONTROLLER
     ══════════════════════════════════════ --}}
<section id="events">
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:16px;margin-bottom:32px;" data-aos="fade-up">
      <div>
        <span class="sec-label">Jadwal Terdekat</span>
        <h2 class="sec-title" style="margin-bottom:0;">Event <span>Mendatang</span></h2>
      </div>
    </div>
  <div class="filter-row" data-aos="fade-up" data-aos-delay="80">
  <button class="filtbtn active" onclick="filterEv('all',this)">Semua</button>
  <button class="filtbtn" onclick="filterEv('esport',this)">Esport</button>
  <button class="filtbtn" onclick="filterEv('konser',this)">Konser</button>
  <button class="filtbtn" onclick="filterEv('festival',this)">Festival</button>
  <button class="filtbtn" onclick="filterEv('olahraga',this)">Olahraga</button>
  <button class="filtbtn" onclick="filterEv('seminar',this)">Seminar</button>
</div>
    <div class="events-grid" id="events-grid">
      @forelse($acaras as $i => $acara)
      <div class="ecard" data-cat="{{ strtolower($acara->kategori) }}"
           data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 80 }}" data-aos-duration="600">
        <div class="ecard-body">
          <div class="ecat">{{ strtoupper($acara->kategori) }}</div>
          <div class="etitle">{{ $acara->nama_acara }}</div>
          <div class="emeta">
            <span><i class="fas fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($acara->tanggal)->translatedFormat('d F Y') }}</span>
            <span><i class="fas fa-map-marker-alt"></i>{{ $acara->lokasi }}</span>
          </div>
          <div class="efoot">
            <div class="eprice">
              <small>Mulai dari</small>
              Rp {{ number_format($acara->tikets->min('harga') ?? 0, 0, ',', '.') }}
            </div>
            <a href="{{ route('login') }}" class="btn-primary">
              Beli Tiket
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center" style="padding: 40px 0;">
        <p style="color: var(--muted);">Belum ada event yang tersedia</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════
     SPOTLIGHT
     ══════════════════════════════════════ --}}
<section id="spotlight">
  <div class="section-px-bg spotlight-px-bg" data-px-speed="0.25" data-px-dir="down"></div>
  <div class="container">
    <div class="spotlight-wrap">
      {{-- Image with inner parallax --}}
      <div data-aos="fade-right" data-aos-duration="900">
        <div class="spotlight-img">
          <img src="{{ asset('gambar_acara/' . $featured->gambar) }}"
               alt="{{ $featured->nama_acara }}"
               class="px-spotlight-img" id="pxSpotlightImg">
        </div>
      </div>

      <div>
        <div class="spotlight-tag" data-aos="fade-down" data-aos-delay="100">
          <i class="fas fa-star"></i>Event Pilihan Mingguan
        </div>
        <span class="sec-label" data-aos="fade-up" data-aos-delay="150">Featured Event</span>
        <h2 class="sec-title" style="text-align:left;" data-aos="fade-up" data-aos-delay="200">
          {{ $featured->nama_acara }}
        </h2>
        <div class="sec-line left" data-aos="fade-right" data-aos-delay="250"></div>
        <p class="sec-desc" data-aos="fade-up" data-aos-delay="300">{{ $featured->deskripsi }}</p>

        <div class="spotlight-info" data-aos="fade-up" data-aos-delay="350">
          <div class="si-row">
            <span class="si-label"><i class="fas fa-calendar-alt" style="color:var(--gold)"></i>Tanggal</span>
            <span class="si-val">{{ \Carbon\Carbon::parse($featured->tanggal ?? now())->translatedFormat('d F Y') }}</span>
          </div>
          <div class="si-row">
            <span class="si-label"><i class="fas fa-clock" style="color:var(--gold)"></i>Waktu</span>
            <span class="si-val">{{ $waktu }}</span>
          </div>
          <div class="si-row">
            <span class="si-label"><i class="fas fa-map-marker-alt" style="color:var(--gold)"></i>Venue</span>
            <span class="si-val">{{ $featured->lokasi }}</span>
          </div>
          <div class="si-row">
            <span class="si-label"><i class="fas fa-users" style="color:var(--gold)"></i>Kapasitas</span>
            <span class="si-val">{{ $kapasitas }}</span>
          </div>
        </div>

        <div style="font-size:.72rem;color:var(--muted);letter-spacing:.06em;text-transform:uppercase;margin-bottom:12px;font-weight:700;"
             data-aos="fade-up" data-aos-delay="400">Pilih Kategori Tiket</div>

        <div class="ticket-types" data-aos="fade-up" data-aos-delay="450">

          @forelse($featured->tikets as $tiket)
            <div class="ttype {{ $loop->first ? 'selected' : '' }} {{ $tiket->stok <= 0 ? 'sold-out' : '' }}"
                 data-tiket-id="{{ $tiket->id }}"
                 data-harga="{{ $tiket->harga }}">
              <div class="ttype-name">{{ $tiket->nama_tiket }}</div>
              <div class="ttype-price">Rp {{ number_format($tiket->harga, 0, ',', '.') }}</div>
              <div class="ttype-avail">
                @if($tiket->stok > 0)
                  Tersisa {{ $tiket->stok }} tiket
                @else
                  Tiket habis
                @endif
              </div>
            </div>
          @empty
            <p style="color:var(--muted);font-size:.84rem;">Belum ada kategori tiket untuk acara ini.</p>
          @endforelse

        </div>

        <div style="display:flex;gap:12px;margin-top:24px;flex-wrap:wrap;" data-aos="fade-up" data-aos-delay="500">
          <a href="{{ route('login') }}" class="btn-primary btn-lg" id="pesanBtn">
            <i class="fas fa-shopping-cart"></i>Pesan Sekarang
          </a>
          <button class="btn-outline" type="button"><i class="fas fa-share-alt"></i>Bagikan</button>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="countdown">
  <div class="cd-px-layer" id="pxCountdown"></div>

  <div class="container">
    <span class="sec-label" data-aos="fade-down">
      Jangan Sampai Ketinggalan
    </span>

    <div class="cd-event-name" data-aos="zoom-in" data-aos-delay="100">
      🎫 {{ $featured->nama_acara ?? 'Belum Ada Event' }}
    </div>

    <div class="cd-sub" data-aos="fade-up" data-aos-delay="150">
      Dimulai dalam:
    </div>

    <div class="cd-wrap" data-aos="zoom-in" data-aos-delay="200">
      <div class="cd-box">
        <span class="cd-num" id="cdD">00</span>
        <div class="cd-lbl">Hari</div>
      </div>

      <div class="cd-box">
        <span class="cd-num" id="cdH">00</span>
        <div class="cd-lbl">Jam</div>
      </div>

      <div class="cd-box">
        <span class="cd-num" id="cdM">00</span>
        <div class="cd-lbl">Menit</div>
      </div>

      <div class="cd-box">
        <span class="cd-num" id="cdS">00</span>
        <div class="cd-lbl">Detik</div>
      </div>
    </div>

    <input
      type="hidden"
      id="eventDate"
      value="{{ $featured ? \Carbon\Carbon::parse($featured->tanggal)->format('Y-m-d') : now()->format('Y-m-d') }}"
    >

    <a href="{{ route('login') }}"
       class="btn-primary btn-lg"
       data-aos="fade-up"
       data-aos-delay="300">
      <i class="fas fa-ticket-alt"></i>
      Dapatkan Tiket Sekarang
    </a>
  </div>
</section>

{{-- ══════════════════════════════════════
     HOW IT WORKS
     ══════════════════════════════════════ --}}
<section id="how">
  <div class="container">
    <div style="text-align:center;" data-aos="fade-up">
      <span class="sec-label">Cara Pesan</span>
      <h2 class="sec-title">Mudah, Cepat, <span>Aman</span></h2>
      <div class="sec-line"></div>
    </div>
    <div class="steps-grid">
      <div class="step-card" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
        <div class="step-num">01</div>
        <div class="step-icon"><i class="fas fa-search"></i></div>
        <div class="step-title">Cari Event</div>
        <div class="step-desc">Jelajahi puluhan acara dari turnamen esports, konser, olahraga, festival, dan seminar di seluruh Indonesia.</div>
      </div>
      <div class="step-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
        <div class="step-num">02</div>
        <div class="step-icon"><i class="fas fa-chair"></i></div>
        <div class="step-title">Pilih Kategori</div>
        <div class="step-desc">Pilih kategori tiket sesuai budget dan posisi terbaik yang kamu inginkan.</div>
      </div>
      <div class="step-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
        <div class="step-num">03</div>
        <div class="step-icon"><i class="fas fa-credit-card"></i></div>
        <div class="step-title">Bayar Mudah</div>
        <div class="step-desc">Bayar via transfer bank, QRIS, GoPay, OVO, dan berbagai metode lainnya. Dijamin 100% aman.</div>
      </div>
      <div class="step-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
        <div class="step-num">04</div>
        <div class="step-icon"><i class="fas fa-ticket-alt"></i></div>
        <div class="step-title">Terima E-Tiket</div>
        <div class="step-desc">Tiket digital langsung dikirim ke notifikasi. Scan QR code di pintu masuk. Selesai!</div>
      </div>
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════
     CONTACT
     ══════════════════════════════════════ --}}
<section id="contact">
  <div class="section-px-bg contact-px-bg" data-px-speed="0.2" data-px-dir="up"></div>
  <div class="container">
    <div style="text-align:center;margin-bottom:56px;" data-aos="fade-up">
      <span class="sec-label">Hubungi Kami</span>
      <h2 class="sec-title">Ada <span>Pertanyaan</span>?</h2>
      <div class="sec-line"></div>
    </div>
    <div class="contact-grid">
      <div class="cinfo" data-aos="fade-right" data-aos-duration="800">
        <div class="cinfo-title">Informasi Kontak</div>
        <div class="cinfo-sub">Tim kami siap membantu 24/7.</div>
        <div class="ci-item"><div class="ci-icon"><i class="fas fa-map-marker-alt"></i></div><div><span class="ci-lbl">Alamat</span><span class="ci-val">Jl. Sudirman No. 88, Jakarta Pusat 10220</span></div></div>
        <div class="ci-item"><div class="ci-icon"><i class="fas fa-phone-alt"></i></div><div><span class="ci-lbl">Telepon</span><span class="ci-val">+62 21 8888-9999</span></div></div>
        <div class="ci-item"><div class="ci-icon"><i class="fas fa-envelope"></i></div><div><span class="ci-lbl">Email</span><span class="ci-val">support@ticketin.id</span></div></div>
        <div class="ci-item"><div class="ci-icon"><i class="fas fa-clock"></i></div><div><span class="ci-lbl">Jam Operasional</span><span class="ci-val">Senin – Minggu, 08:00 – 22:00 WIB</span></div></div>
        <div class="foot-soc" style="margin-top:20px;">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="cform" data-aos="fade-left" data-aos-delay="150" data-aos-duration="800">
        <form method="POST" action="{{ route('laporan.store') }}">
          @csrf
          <div class="frow">
            <div>
              <label class="flbl">Nama Lengkap *</label>
              <input type="text" name="nama" class="fctrl" placeholder="Nama kamu" required/>
            </div>
            <div>
              <label class="flbl">Email *</label>
              <input type="email" name="email" class="fctrl" placeholder="email@kamu.com" required/>
            </div>
          </div>
          <div class="frow">
            <div>
              <label class="flbl">Nomor HP</label>
              <input type="tel" name="no_hp" class="fctrl" placeholder="+62 8xx-xxxx-xxxx"/>
            </div>
            <div>
              <label class="flbl">Topik *</label>
              <select name="topik" class="fctrl" required>
                <option>Pembelian Tiket</option>
                <option>Keluhan / Refund</option>
                <option>Kerjasama Event Organizer</option>
                <option>Sponsorship</option>
                <option>Pertanyaan Umum</option>
              </select>
            </div>
          </div>
          <div style="margin-bottom:18px;">
            <label class="flbl">Pesan *</label>
            <textarea name="pesan" class="fctrl" rows="5" placeholder="Tulis pesanmu di sini..." required></textarea>
          </div>
          <button type="submit" class="btn-primary btn-lg" style="width:100%;justify-content:center;">
            <i class="fas fa-paper-plane"></i>Kirim Pesan
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

{{-- ══ FOOTER ══ --}}
<footer data-aos="fade-up" data-aos-duration="600">
  <div class="container">
    <div class="footer-grid">
      <div>
        <a href="#" class="logo" style="margin-bottom:16px;">
          <div class="logo-icon"><i class="fas fa-ticket-alt"></i></div>
          <div>
            <div class="logo-name">Ticket<span>In</span></div>
            <div class="logo-sub">Platform Tiket Indonesia</div>
          </div>
        </a>
        <p class="foot-brand-desc">TicketIn adalah platform tiket event terpercaya Indonesia. Beli tiket turnamen esports, konser, olahraga, dan seminar dengan mudah dan aman.</p>
        <div class="foot-soc">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
      <div>
        <div class="foot-title">Navigasi</div>
        <ul class="foot-links">
          <li><a href="#hero"><i class="fas fa-chevron-right"></i>Beranda</a></li>
          <li><a href="#events"><i class="fas fa-chevron-right"></i>Semua Event</a></li>
          <li><a href="#spotlight"><i class="fas fa-chevron-right"></i>Event Pilihan</a></li>
          <li><a href="#how"><i class="fas fa-chevron-right"></i>Cara Beli</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right"></i>Kontak</a></li>
        </ul>
      </div>
      <div>
        <div class="foot-title">Kategori</div>
        <ul class="foot-links">
          <li><a href="#events"><i class="fas fa-chevron-right"></i>Esports & Gaming</a></li>
          <li><a href="#events"><i class="fas fa-chevron-right"></i>Konser Musik</a></li>
          <li><a href="#events"><i class="fas fa-chevron-right"></i>Olahraga</a></li>
          <li><a href="#events"><i class="fas fa-chevron-right"></i>Seminar & Workshop</a></li>
          <li><a href="#events"><i class="fas fa-chevron-right"></i>Festival</a></li>
          <li><a href="#events"><i class="fas fa-chevron-right"></i>Pameran</a></li>
        </ul>
      </div>
      <div>
        <div class="foot-title">Bantuan</div>
        <ul class="foot-links">
          <li><a href="#contact"><i class="fas fa-chevron-right"></i>Pusat Bantuan</a></li>
          <li><a href="#how"><i class="fas fa-chevron-right"></i>Cara Pembelian</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right"></i>Kebijakan Refund</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right"></i>Syarat & Ketentuan</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right"></i>Kebijakan Privasi</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right"></i>Daftar sebagai EO</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="foot-bottom">
      <p class="foot-copy">&copy; 2026 <span>TicketIn Indonesia</span>. Semua hak dilindungi. Dibuat dengan ❤️ untuk penggemar event Indonesia.</p>
      <div class="foot-policy">
        <a href="#">Privasi</a>
        <a href="#">Syarat</a>
        <a href="#">Cookie</a>
      </div>
    </div>
  </div>
</footer>

{{-- ══ BACK TO TOP ══ --}}
<button id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})">
  <i class="fas fa-chevron-up"></i>
</button>

{{-- AOS Library --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js"></script>
{{-- Our JS --}}
<script src="{{ asset('assets/main.js') }}"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
  // Highlight visual kartu tiket yang dipilih (tidak submit kemana-mana untuk guest)
  document.addEventListener('DOMContentLoaded', function () {
    const types = document.querySelectorAll('.ticket-types .ttype:not(.sold-out)');

    types.forEach(function (el) {
      el.addEventListener('click', function () {
        types.forEach(t => t.classList.remove('selected'));
        el.classList.add('selected');
      });
    });
  });
</script>

</body>
</html>