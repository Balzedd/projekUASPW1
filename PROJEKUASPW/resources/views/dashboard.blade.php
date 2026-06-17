<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>TicketIn – Platform Tiket Event & Turnamen MPL Indonesia</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link rel="stylesheet" href="{{ asset('assets2/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 

</head>
<body>

<!-- TOPBAR -->
<div id="topbar">
  <div class="container">
    <div class="tb-left">
      <span><i class="fas fa-bolt"></i>PROMO: Diskon 20% tiket early bird MPL Season 18!</span>
    </div>
    <div class="tb-right">
      <a href="https://www.instagram.com/yancikk_11?igsh=dDQ3NTR5ZXltNDhm"><i class="fab fa-instagram"></i></a>
      <a href="https://www.tiktok.com/@adriaannnn30?_r=1&_t=ZS-97HiqNyEDYd"><i class="fab fa-tiktok"></i></a>
      <a href="https://youtube.com/@jonanathn?si=xOiyGmBS0_k6MdzX"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
</div>

<!-- NAVBAR -->
<nav id="nav">
  <div class="container">
    <div class="nav-inner">
      <a href="#" class="logo">
        <div class="logo-icon"><i class="fas fa-ticket-alt"></i></div>
        <div>
          <div class="logo-name">TicketIn</div>
          <div class="logo-sub">Platform Tiket Indonesia</div>
        </div>
      </a>
      <ul class="nav-links">
        <li><a href="#hero" class="active">Beranda</a></li>
        <li><a href="#events">Event</a></li>
        <li><a href="#spotlight">Featured</a></li>
        <li><a href="#teams">Tim</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
      <div class="nav-actions">
         <a href="#orders" class="btn-primary"><i class="fas fa-ticket-alt"></i>Beli Tiket</a>
        <button class="hamburger" onclick="document.getElementById('mobile-nav').classList.add('open')"><i class="fas fa-bars"></i></button>
      <div class="profile-dropdown " style="margin-left:40px;">

    <button class="profile-button" onclick="toggleProfileMenu()">

        <div class="avatar">
            {{ strtoupper(substr(Auth::user()->name,0,3)) }}
        </div>

        <div class="profile-info">
            <div class="profile-name">
                {{ Auth::user()->name }}
            </div>
            <div class="profile-role">
                Halo,  {{ Auth::user()->name }}
            </div>
        </div>

        <i class="fas fa-chevron-down"></i>

    </button>

    <div class="profile-menu" id="profileMenu">

        <a href="#">
            <i class="fas fa-user"></i>
            Profile
        </a>

        <a href="#">
            <i class="fas fa-cog"></i>
            Account Settings
        </a>

        <hr>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i>
                Sign Out
            </button>
        </form>

    </div>

</div>
       
      </div>
    </div>
  </div>
</nav>

<!-- MOBILE NAV -->
<div id="mobile-nav">
  <button id="mobile-close" onclick="document.getElementById('mobile-nav').classList.remove('open')"><i class="fas fa-times"></i></button>
  <a href="#hero" onclick="document.getElementById('mobile-nav').classList.remove('open')">Beranda</a>
  <a href="#events" onclick="document.getElementById('mobile-nav').classList.remove('open')">Event</a>
  <a href="#spotlight" onclick="document.getElementById('mobile-nav').classList.remove('open')">Featured</a>
  <a href="#teams" onclick="document.getElementById('mobile-nav').classList.remove('open')">Tim</a>
  <a href="#contact" onclick="document.getElementById('mobile-nav').classList.remove('open')">Kontak</a>
  <a href="#events" class="btn-primary btn-lg" onclick="document.getElementById('mobile-nav').classList.remove('open')"><i class="fas fa-ticket-alt"></i>Beli Tiket</a>
</div>

<!-- HERO -->
<section id="hero">
  <div class="hero-bg"></div>
  <div class="hero-grid"></div>
  <div class="container">
    <div class="hero-content">
      <div>
        <div class="hero-badge"><i class="fas fa-star"></i>#1 Platform Tiket Event Indonesia</div>
        <h1 class="hero-title">
          TIKET<br/>
          <span class="line2">MPL</span><br/>
          <span class="line3">&amp; KONSER</span>
        </h1>
        <p class="hero-desc">Dapatkan tiket MPL dan Konser terbaik Indonesia. Aman, mudah, cepat, dan langsung di tangan kamu.</p>
        <div class="hero-btns">
          <a href="#events" class="btn-primary btn-lg"><i class="fas fa-search"></i>Cari Event</a>
          <button class="btn-outline"><i class="fas fa-play"></i>Cara Beli</button>
        </div>
        <div class="hero-stats">
          <div class="hstat"><div class="hstat-num">98<span>%</span></div><div class="hstat-lbl">Kepuasan Pembeli</div></div>
         <div class="hstat">
          <div class="hstat-num">
              {{ \App\Models\Acara::count() }}<span>+</span>
          </div>
           <div class="hstat-lbl">Event Yang Sedang Aktif</div></div>
          <div class="hstat"><div class="hstat-num">50<span>+</span></div><div class="hstat-lbl">Kota di Indonesia</div></div>
        </div>
      </div>
      <div style="position:relative;">
        <div class="fbadge f1" style="z-index: 10;"><i class="fas fa-fire"></i><span><strong>Hot</strong>&nbsp;MPL S18 — Tiket Hampir Habis!</span></div>
        <div class="hero-card">
          <div class="hero-card-img">
            <div class="event-label">🔴 LIVE SOON</div>
            <span class="hero-card-img-icon">🏆</span>
            <span style="font-size:5rem;position:relative;z-index:2;">🏆</span>
          </div>
          <div class="hero-card-body">
            <div class="hero-card-tag">⚡ Esports · MPL Indonesia</div>
            <div class="hero-card-title">MPL ID Season 18 — Grand Finals</div>
            <div class="hero-card-meta">
              <span class="meta-item"><i class="fas fa-calendar-alt"></i>28 September 2026</span>
              <span class="meta-item"><i class="fas fa-map-marker-alt"></i>Jakarta International Expo</span>
              <span class="meta-item"><i class="fas fa-users"></i>15,000 Kursi</span>
            </div>
            <div class="hero-card-price">
              <div class="price-tag"><small>Mulai dari</small>Rp 180.000</div>
              <a href="#spotlight" class="btn-primary btn-sm">Pesan Sekarang</a>
            </div>
          </div>
        </div>
        <div class="fbadge f2"><i class="fas fa-star"></i><span><strong>4.9/5</strong>&nbsp;· 8.500+ ulasan</span></div>
      </div>
    </div>
  </div>
</section>

<!-- MARQUEE -->
<div class="marquee-sec">
  <div class="marquee-track">
    <div class="mq-item"><i class="fas fa-gamepad"></i>MPL Indonesia Season 18</div>
    <div class="mq-item"><i class="fas fa-music"></i>Dewa 19 Reunion Concert</div>
    <div class="mq-item"><i class="fas fa-music"></i>Euphoria life festival 2026</div>
   <div class="mq-item"><i class="fas fa-music"></i>Egsclusive Festival 2026</div>
   <div class="mq-item"><i class="fas fa-car"></i>World Rally Championship</div>
    <div class="mq-item"><i class="fas fa-user-tie"></i>The Power of Personal Branding</div>
    <div class="mq-item"><i class="fas fa-microphone"></i>Singphoria Lampung 2026 Vol.5</div>
    <div class="mq-item"><i class="fas fa-microphone"></i>Mantra In Summer</div>
     <div class="mq-item"><i class="fas fa-microphone"></i>MotionIme Fest</div>
    



    <div class="mq-item"><i class="fas fa-gamepad"></i>MPL Indonesia Season 18</div>
     <div class="mq-item"><i class="fas fa-music"></i>Dewa 19 Reunion Concert</div>
    <div class="mq-item"><i class="fas fa-music"></i>Euphoria life festival 2026</div>
   <div class="mq-item"><i class="fas fa-music"></i>Egsclusive Festival 2026</div>
     <div class="mq-item"><i class="fas fa-car"></i>World Rally Championship</div>
    <div class="mq-item"><i class="fas fa-user-tie"></i>The Power of Personal Branding</div>
    <div class="mq-item"><i class="fas fa-microphone"></i>Singphoria Lampung 2026 Vol.5</div>
     <div class="mq-item"><i class="fas fa-microphone"></i>Mantra In Summer</div>
      <div class="mq-item"><i class="fas fa-microphone"></i>MotionIme Fest</div>
  </div>
</div>

<!-- CATEGORY -->
<section id="category">
  <div class="container">
    <div class="text-center" style="text-align:center;">
      <span class="sec-label">Jelajahi Event</span>
      <h2 class="sec-title">Kategori <span>Event</span></h2>
      <div class="sec-line"></div>
    </div>
    <div class="cat-grid">
     <div class="catcard active" onclick="filterEvents('all',this)">
    <span class="cat-icon">🎫</span>
    <div class="cat-name">Semua Event</div>
    <div class="cat-count">{{ \App\Models\Acara::count() }} event</div>
</div>

<div class="catcard" onclick="filterEvents('esports',this)">
    <span class="cat-icon">🎮</span>
    <div class="cat-name">Esports</div>
    <div class="cat-count">
        {{ \App\Models\Acara::where('kategori','Esports')->count() }} event
    </div>
</div>

<div class="catcard" onclick="filterEvents('concert',this)">
    <span class="cat-icon">🎵</span>
    <div class="cat-name">Konser</div>
    <div class="cat-count">
        {{ \App\Models\Acara::where('kategori','Konser')->count() }} event
    </div>
</div>

<div class="catcard" onclick="filterEvents('sport',this)">
    <span class="cat-icon">⚽</span>
    <div class="cat-name">Olahraga</div>
    <div class="cat-count">
        {{ \App\Models\Acara::where('kategori','Olahraga')->count() }} event
    </div>
</div>

<div class="catcard" onclick="filterEvents('seminar',this)">
    <span class="cat-icon">🎤</span>
    <div class="cat-name">Seminar</div>
    <div class="cat-count">
        {{ \App\Models\Acara::where('kategori','Seminar')->count() }} event
    </div>
</div>
    </div>
  </div>
</section>

<!-- EVENTS -->
<section id="events">
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:16px;margin-bottom:10px;">
      <div>
        <span class="sec-label">Jadwal Terdekat</span>
        <h2 class="sec-title" style="margin-bottom:0;">Event <span>Mendatang</span></h2>
      </div>
    </div>
    <div class="filter-row" style="margin-top:24px;">
      <button class="filtbtn active" onclick="filterEv('all',this)">Semua</button>
      <button class="filtbtn" onclick="filterEv('esports',this)">Esports</button>
      <button class="filtbtn" onclick="filterEv('concert',this)">Konser</button>
      <button class="filtbtn" onclick="filterEv('sport',this)">Olahraga</button>
      <button class="filtbtn" onclick="filterEv('seminar',this)">Seminar</button>
    </div>
    <div class="events-grid" id="events-grid">

      <div class="ecard" data-cat="esports">
        <div class="ecard-img esports">
          <div class="ecard-img-glow v" style="left:30%;top:20%;"></div>
          <div class="ecard-img-icon">🏆</div>
          <div class="ebdg hot">🔥 Hot</div>
          <div class="efav"><i class="far fa-heart"></i></div>
        </div>
        <div class="ecard-body">
          <div class="ecat">⚡ Esports</div>
          <div class="etitle">MPL ID Season 18 Grand Finals</div>
          <div class="emeta">
            <span><i class="fas fa-calendar-alt"></i>28 September 2026</span>
            <span><i class="fas fa-map-marker-alt"></i>Jakarta International Expo</span>
          </div>
          <div class="efoot">
            <div><div class="eprice"><small>Mulai</small>Rp 150.000</div></div>
            <a href="#spotlight" class="btn-primary btn-sm">Beli Tiket</a>
          </div>
          <div class="esold-bar">
            <div class="esold-bar-label"><span>Tiket Terjual</span><span>87%</span></div>
            <div class="esold-bar-track"><div class="esold-bar-fill" style="width:87%;background:var(--rose);"></div></div>
          </div>
        </div>
      </div>

      <div class="ecard" data-cat="concert">
        <div class="ecard-img concert">
          <div class="ecard-img-glow c" style="left:20%;top:30%;"></div>
          <div class="ecard-img-icon">🎤</div>
          <div class="ebdg new">✨ Baru</div>
          <div class="efav"><i class="far fa-heart"></i></div>
        </div>
        <div class="ecard-body">
          <div class="ecat">🎵 Konser</div>
          <div class="etitle">Dewa 19 Reunion Tour 2026</div>
          <div class="emeta">
            <span><i class="fas fa-calendar-alt"></i>5 Agu 2026</span>
            <span><i class="fas fa-map-marker-alt"></i>GBK, Jakarta</span>
          </div>
          <div class="efoot">
            <div><div class="eprice"><small>Mulai</small>Rp 350.000</div></div>
            <button class="btn-primary btn-sm">Beli Tiket</button>
          </div>
          <div class="esold-bar">
            <div class="esold-bar-label"><span>Tiket Terjual</span><span>62%</span></div>
            <div class="esold-bar-track"><div class="esold-bar-fill" style="width:62%;"></div></div>
          </div>
        </div>
      </div>

      <div class="ecard" data-cat="esports">
        <div class="ecard-img esports">
          <div class="ecard-img-glow v" style="right:20%;top:15%;"></div>
          <div class="ecard-img-icon">🎯</div>
          <div class="ebdg hot">🔥 Hot</div>
          <div class="efav"><i class="far fa-heart"></i></div>
        </div>
        <div class="ecard-body">
          <div class="ecat">⚡ Esports</div>
          <div class="etitle">Valorant Champions Tour — Indonesia Qualifier</div>
          <div class="emeta">
            <span><i class="fas fa-calendar-alt"></i>12 Agu 2026</span>
            <span><i class="fas fa-map-marker-alt"></i>Bali Nusa Dua Convention</span>
          </div>
          <div class="efoot">
            <div><div class="eprice"><small>Mulai</small>Rp 75.000</div></div>
            <button class="btn-primary btn-sm">Beli Tiket</button>
          </div>
          <div class="esold-bar">
            <div class="esold-bar-label"><span>Tiket Terjual</span><span>45%</span></div>
            <div class="esold-bar-track"><div class="esold-bar-fill" style="width:45%;"></div></div>
          </div>
        </div>
      </div>

      <div class="ecard" data-cat="sport">
        <div class="ecard-img sport">
          <div class="ecard-img-glow s" style="left:40%;top:25%;"></div>
          <div class="ecard-img-icon">⚽</div>
          <div class="ebdg new">⚡ Baru</div>
          <div class="efav"><i class="far fa-heart"></i></div>
        </div>
        <div class="ecard-body">
          <div class="ecat">⚽ Sepak Bola</div>
          <div class="etitle">Piala Presiden 2026 — Final</div>
          <div class="emeta">
            <span><i class="fas fa-calendar-alt"></i>20 Agu 2026</span>
            <span><i class="fas fa-map-marker-alt"></i>Stadion GBK, Jakarta</span>
          </div>
          <div class="efoot">
            <div><div class="eprice"><small>Mulai</small>Rp 100.000</div></div>
            <button class="btn-primary btn-sm">Beli Tiket</button>
          </div>
          <div class="esold-bar">
            <div class="esold-bar-label"><span>Tiket Terjual</span><span>71%</span></div>
            <div class="esold-bar-track"><div class="esold-bar-fill" style="width:71%;background:#00cc55;"></div></div>
          </div>
        </div>
      </div>

      <div class="ecard" data-cat="concert">
        <div class="ecard-img concert">
          <div class="ecard-img-glow c" style="left:30%;top:20%;"></div>
          <div class="ecard-img-icon">🎸</div>
          <div class="ebdg free">🎁 Ada Free</div>
          <div class="efav"><i class="far fa-heart"></i></div>
        </div>
        <div class="ecard-body">
          <div class="ecat">🎵 Konser</div>
          <div class="etitle">Viva La Vida Music Festival</div>
          <div class="emeta">
            <span><i class="fas fa-calendar-alt"></i>2–3 Sep 2026</span>
            <span><i class="fas fa-map-marker-alt"></i>Ancol Beach City</span>
          </div>
          <div class="efoot">
            <div><div class="eprice"><small>Mulai</small>Rp 500.000</div></div>
            <button class="btn-primary btn-sm">Beli Tiket</button>
          </div>
          <div class="esold-bar">
            <div class="esold-bar-label"><span>Tiket Terjual</span><span>39%</span></div>
            <div class="esold-bar-track"><div class="esold-bar-fill" style="width:39%;"></div></div>
          </div>
        </div>
      </div>

      <div class="ecard" data-cat="seminar">
        <div class="ecard-img seminar">
          <div class="ecard-img-glow y" style="left:35%;top:20%;"></div>
          <div class="ecard-img-icon">💡</div>
          <div class="ebdg sold">📌 Hampir Habis</div>
          <div class="efav"><i class="far fa-heart"></i></div>
        </div>
        <div class="ecard-body">
          <div class="ecat">🎤 Seminar</div>
          <div class="etitle">Indonesia Startup Summit 2026</div>
          <div class="emeta">
            <span><i class="fas fa-calendar-alt"></i>15 Sep 2026</span>
            <span><i class="fas fa-map-marker-alt"></i>ICE BSD, Tangerang</span>
          </div>
          <div class="efoot">
            <div><div class="eprice"><small>Mulai</small>Rp 250.000</div></div>
            <button class="btn-primary btn-sm">Beli Tiket</button>
          </div>
          <div class="esold-bar">
            <div class="esold-bar-label"><span>Tiket Terjual</span><span>93%</span></div>
            <div class="esold-bar-track"><div class="esold-bar-fill" style="width:93%;background:var(--gold);"></div></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- SPOTLIGHT -->
<section id="spotlight">
  <div class="container">
    <div class="spotlight-wrap">
      <div>
        <div class="spotlight-img">
          <div class="spotlight-img-glow"></div>
          <span class="spotlight-img-icon">🏆</span>
        </div>
      </div>
      <div>
        <div class="spotlight-tag"><i class="fas fa-star"></i>Event Pilihan Mingguan</div>
        <span class="sec-label">Featured Event</span>
        <h2 class="sec-title" style="text-align:left;">MPL ID Season 16<br/><span>Grand Finals</span></h2>
        <div class="sec-line left"></div>
        <p class="sec-desc" style="margin-bottom:0;">Saksikan pertarungan tim-tim terbaik Mobile Legends Indonesia di panggung terbesar sepanjang sejarah MPL. Ratusan juta rupiah hadiah, ribuan penonton, dan aksi yang tidak akan terlupakan.</p>
        <div class="spotlight-info">
          <div class="si-row"><span class="si-label"><i class="fas fa-calendar-alt" style="color:var(--violet2);margin-right:6px;"></i>Tanggal</span><span class="si-val">Sabtu, 28 Juli 2026</span></div>
          <div class="si-row"><span class="si-label"><i class="fas fa-clock" style="color:var(--violet2);margin-right:6px;"></i>Waktu</span><span class="si-val">13:00 – 22:00 WIB</span></div>
          <div class="si-row"><span class="si-label"><i class="fas fa-map-marker-alt" style="color:var(--violet2);margin-right:6px;"></i>Venue</span><span class="si-val">Jakarta International Expo</span></div>
          <div class="si-row"><span class="si-label"><i class="fas fa-users" style="color:var(--violet2);margin-right:6px;"></i>Kapasitas</span><span class="si-val">15,000 Penonton</span></div>
          <div class="si-row"><span class="si-label"><i class="fas fa-trophy" style="color:var(--violet2);margin-right:6px;"></i>Prize Pool</span><span class="si-val" style="color:var(--gold);">Rp 1.5 Miliar</span></div>
        </div>
        <h6 style="font-size:.82rem;color:var(--muted);letter-spacing:.5px;text-transform:uppercase;margin-bottom:10px;">Pilih Kategori Tiket</h6>
        <div class="ticket-types">
          <div class="ttype selected">
            <div class="ttype-name">Festival</div>
            <div class="ttype-price">Rp 150K</div>
            <div class="ttype-avail">Tersisa 342 tiket</div>
          </div>
          <div class="ttype">
            <div class="ttype-name">VIP</div>
            <div class="ttype-price">Rp 350K</div>
            <div class="ttype-avail">Tersisa 98 tiket</div>
          </div>
          <div class="ttype">
            <div class="ttype-name">VVIP Tribun</div>
            <div class="ttype-price">Rp 650K</div>
            <div class="ttype-avail">Tersisa 55 tiket</div>
          </div>
          <div class="ttype">
            <div class="ttype-name">Platinum Pit</div>
            <div class="ttype-price">Rp 1.200K</div>
            <div class="ttype-avail">Tersisa 20 tiket</div>
          </div>
        </div>
        <div style="display:flex;gap:12px;margin-top:22px;flex-wrap:wrap;">
          <button class="btn-primary btn-lg"><i class="fas fa-shopping-cart"></i>Pesan Sekarang</button>
          <button class="btn-outline"><i class="fas fa-share-alt"></i>Bagikan</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- COUNTDOWN -->
<section id="countdown">
  <div class="container">
    <div style="text-align:center;">
      <span class="sec-label">Jangan Sampai Ketinggalan</span>
      <div class="cd-event-name">🏆 MPL ID Season 16 Grand Finals</div>
      <div class="cd-sub">Dimulai dalam:</div>
      <div class="cd-wrap">
        <div class="cd-box"><span class="cd-num" id="cdD">00</span><div class="cd-lbl">Hari</div></div>
        <div class="cd-box"><span class="cd-num" id="cdH">00</span><div class="cd-lbl">Jam</div></div>
        <div class="cd-box"><span class="cd-num" id="cdM">00</span><div class="cd-lbl">Menit</div></div>
        <div class="cd-box"><span class="cd-num" id="cdS">00</span><div class="cd-lbl">Detik</div></div>
      </div>
      <a href="#spotlight" class="btn-primary btn-lg"><i class="fas fa-ticket-alt"></i>Dapatkan Tiket Sekarang</a>
    </div>
  </div>
</section>

<!-- TEAMS -->
<section id="teams">
  <div class="container">
    <div style="text-align:center;">
      <span class="sec-label">Turnamen MPL S16</span>
      <h2 class="sec-title">Tim yang <span>Bertanding</span></h2>
      <div class="sec-line"></div>
      <p class="sec-desc" style="max-width:500px;margin:0 auto;">8 tim terbaik Indonesia akan berjuang memperebutkan gelar juara dan prize pool Rp 1.5 Miliar.</p>
    </div>
    <div class="teams-grid">
      <div class="team-card"><div class="team-icon">🔵</div><div class="team-name">ONIC Esports</div><div class="team-region">Jakarta</div><div class="team-rank">🥇 Juara Bertahan</div></div>
      <div class="team-card"><div class="team-icon">🔴</div><div class="team-name">RRQ Hoshi</div><div class="team-region">Surabaya</div><div class="team-rank">Unggulan #2</div></div>
      <div class="team-card"><div class="team-icon">🟡</div><div class="team-name">Evos Legends</div><div class="team-region">Jakarta</div><div class="team-rank">Unggulan #3</div></div>
      <div class="team-card"><div class="team-icon">🟢</div><div class="team-name">Alter Ego</div><div class="team-region">Bandung</div><div class="team-rank">Unggulan #4</div></div>
      <div class="team-card"><div class="team-icon">⚪</div><div class="team-name">Rebellion Zion</div><div class="team-region">Yogyakarta</div><div class="team-rank">Unggulan #5</div></div>
      <div class="team-card"><div class="team-icon">🟣</div><div class="team-name">Aura Esports</div><div class="team-region">Medan</div><div class="team-rank">Unggulan #6</div></div>
      <div class="team-card"><div class="team-icon">🟤</div><div class="team-name">Bigetron Alpha</div><div class="team-region">Bali</div><div class="team-rank">Unggulan #7</div></div>
      <div class="team-card"><div class="team-icon">🔶</div><div class="team-name">Geek Fam ID</div><div class="team-region">Surabaya</div><div class="team-rank">Unggulan #8</div></div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section id="testimonials">
  <div class="container">
    <div style="text-align:center;">
      <span class="sec-label">Kata Mereka</span>
      <h2 class="sec-title">Ulasan <span>Pembeli</span></h2>
      <div class="sec-line"></div>
    </div>
    <div class="tes-grid">
      <div class="tes-card">
        <div class="tes-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <p class="tes-text">"Beli tiket MPL Season 15 di sini prosesnya super gampang, bayar QRIS langsung jadi. Tiket digital langsung masuk WA. Recommended banget!"</p>
        <div class="tes-auth"><div class="tes-avatar">AR</div><div><div class="tes-name">Ahmad Rizky</div><div class="tes-role">MPL Fan · Jakarta</div></div></div>
      </div>
      <div class="tes-card">
        <div class="tes-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <p class="tes-text">"Beli tiket konser Dewa 19 VIP, tempat duduk strategis banget. Aplikasinya smooth, ga ada gangguan. Pasti beli lagi untuk event selanjutnya!"</p>
        <div class="tes-auth"><div class="tes-avatar" style="background:var(--rose);">SD</div><div><div class="tes-name">Sari Dewi</div><div class="tes-role">Konser Lover · Surabaya</div></div></div>
      </div>
      <div class="tes-card">
        <div class="tes-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <p class="tes-text">"Beli buat grup 20 orang, customer service responsif banget. Ada diskon early bird juga. Kursi VIP section kami semua berdekatan. 10/10!"</p>
        <div class="tes-auth"><div class="tes-avatar" style="background:#00aa88;">BW</div><div><div class="tes-name">Budi Wicaksono</div><div class="tes-role">Group Buyer · Bandung</div></div></div>
      </div>
      <div class="tes-card">
        <div class="tes-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <p class="tes-text">"Pertama kali nonton langsung MPL via TicketWave. Antri e-ticket lancar, venue MPL luar biasa. Udah daftar waiting list buat Season 17!"</p>
        <div class="tes-auth"><div class="tes-avatar" style="background:var(--gold);color:#050A1F;">NF</div><div><div class="tes-name">Nanda Fitri</div><div class="tes-role">Esports Enthusiast · Bali</div></div></div>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section id="how">
  <div class="container">
    <div style="text-align:center;">
      <span class="sec-label">Cara Pesan</span>
      <h2 class="sec-title">Mudah, Cepat, <span>Aman</span></h2>
      <div class="sec-line"></div>
    </div>
    <div class="steps-grid">
      <div class="step-card"><div class="step-num">01</div><div class="step-icon"><i class="fas fa-search"></i></div><div class="step-title">Cari Event</div><div class="step-desc">Jelajahi ratusan event dari turnamen esports, konser, olahraga, dan seminar di seluruh Indonesia.</div></div>
      <div class="step-card"><div class="step-num">02</div><div class="step-icon"><i class="fas fa-chair"></i></div><div class="step-title">Pilih Kursi &amp; Kategori</div><div class="step-desc">Pilih kategori tiket sesuai budget dan posisi terbaik. Lihat peta venue secara interaktif.</div></div>
      <div class="step-card"><div class="step-num">03</div><div class="step-icon"><i class="fas fa-credit-card"></i></div><div class="step-title">Bayar Mudah</div><div class="step-desc">Bayar via transfer bank, QRIS, GoPay, OVO, dan berbagai metode lainnya. 100% aman.</div></div>
      <div class="step-card"><div class="step-num">04</div><div class="step-icon"><i class="fas fa-ticket-alt"></i></div><div class="step-title">Terima E-Tiket</div><div class="step-desc">Tiket digital langsung dikirim ke email & WhatsApp. Scan QR code di pintu masuk. Selesai!</div></div>
    </div>
  </div>
</section>

<!-- CTA NEWSLETTER -->
<section id="cta">
  <div class="container">
    <div class="cta-box">
      <span class="sec-label" style="color:var(--cyan);">Notifikasi Event</span>
      <h2 class="cta-title">Jangan Ketinggalan<br/>Event <span>Favoritmu</span></h2>
      <p class="cta-sub">Daftar sekarang dan dapatkan notifikasi event terbaru + diskon eksklusif 15% untuk pembelian pertama.</p>
      <div class="nl-form">
        <input type="email" class="nl-input" id="nlEmail" placeholder="Masukkan alamat email kamu..."/>
        <button class="btn-primary" id="nlBtn" onclick="submitNL()"><i class="fas fa-bell"></i>Daftar</button>
      </div>
      <div class="sucmsg" id="nlOk" style="display:none;justify-content:center;margin-top:14px;"><i class="fas fa-check-circle"></i><span>Berhasil! Cek email kamu untuk konfirmasi.</span></div>
      <p style="color:var(--muted);font-size:.76rem;margin-top:12px;"><i class="fas fa-lock" style="margin-right:4px;"></i>Tidak ada spam. Berhenti kapan saja.</p>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section id="contact">
  <div class="container">
    <div style="text-align:center;margin-bottom:48px;">
      <span class="sec-label">Hubungi Kami</span>
      <h2 class="sec-title">Ada <span>Pertanyaan</span>?</h2>
      <div class="sec-line"></div>
    </div>
    <div class="contact-grid">
      <div class="cinfo">
        <div class="cinfo-title">Informasi Kontak</div>
        <div class="cinfo-sub">Tim kami siap membantu 7 hari seminggu.</div>
        <div class="ci-item"><div class="ci-icon"><i class="fas fa-map-marker-alt"></i></div><div><span class="ci-lbl">Alamat</span><span class="ci-val">Jl. Sudirman No. 88, Jakarta Pusat 10220</span></div></div>
        <div class="ci-item"><div class="ci-icon"><i class="fas fa-phone-alt"></i></div><div><span class="ci-lbl">Telepon</span><span class="ci-val">+62 21 8888-9999</span></div></div>
        <div class="ci-item"><div class="ci-icon"><i class="fas fa-envelope"></i></div><div><span class="ci-lbl">Email</span><span class="ci-val">support@ticketwave.id</span></div></div>
        <div class="ci-item"><div class="ci-icon"><i class="fas fa-clock"></i></div><div><span class="ci-lbl">Jam Operasional</span><span class="ci-val">Senin – Minggu, 08:00 – 22:00 WIB</span></div></div>
        <div style="display:flex;gap:8px;margin-top:20px;">
          <a href="#" style="width:36px;height:36px;background:var(--card-bg);border:1px solid var(--card-bdr);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:.85rem;"><i class="fab fa-instagram"></i></a>
          <a href="#" style="width:36px;height:36px;background:var(--card-bg);border:1px solid var(--card-bdr);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:.85rem;"><i class="fab fa-tiktok"></i></a>
          <a href="#" style="width:36px;height:36px;background:var(--card-bg);border:1px solid var(--card-bdr);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:.85rem;"><i class="fab fa-whatsapp"></i></a>
          <a href="#" style="width:36px;height:36px;background:var(--card-bg);border:1px solid var(--card-bdr);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:.85rem;"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="cform">
        <div class="frow">
          <div><label class="flbl">Nama Lengkap *</label><input type="text" class="fctrl" placeholder="Nama kamu"/></div>
          <div><label class="flbl">Email *</label><input type="email" class="fctrl" placeholder="email@kamu.com"/></div>
        </div>
        <div class="frow">
          <div><label class="flbl">Nomor HP</label><input type="tel" class="fctrl" placeholder="+62 8xx-xxxx-xxxx"/></div>
          <div><label class="flbl">Topik *</label>
            <select class="fctrl">
              <option>Pembelian Tiket</option>
              <option>Keluhan / Refund</option>
              <option>Kerjasama Event Organizer</option>
              <option>Sponsorship</option>
              <option>Pertanyaan Umum</option>
            </select>
          </div>
        </div>
        <div style="margin-bottom:14px;"><label class="flbl">Pesan *</label><textarea class="fctrl" rows="5" placeholder="Tulis pesanmu di sini..."></textarea></div>
        <button class="btn-primary" id="ctcBtn" onclick="submitContact()"><i class="fas fa-paper-plane"></i>Kirim Pesan</button>
        <div class="sucmsg" id="ctcOk" style="display:none;"><i class="fas fa-check-circle"></i><span>Pesan terkirim! Kami akan membalas dalam 2 jam.</span></div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div>
        <a href="#" class="logo" style="margin-bottom:14px;display:inline-flex;"><div class="logo-icon"><i class="fas fa-ticket-alt"></i></div><div><div class="logo-name">Ticket<span>Wave</span></div><div class="logo-sub">Platform Tiket Indonesia</div></div></a>
        <p class="foot-brand-desc">TicketWave adalah platform tiket event terpercaya Indonesia. Beli tiket turnamen esports, konser, olahraga, dan seminar dengan mudah dan aman.</p>
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
          <li><a href="#teams"><i class="fas fa-chevron-right"></i>Jadwal Tim</a></li>
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
          <li><a href="#"><i class="fas fa-chevron-right"></i>Pusat Bantuan</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i>Cara Pembelian</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i>Kebijakan Refund</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i>Syarat & Ketentuan</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i>Kebijakan Privasi</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i>Daftar sebagai EO</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="foot-bottom">
      <p class="foot-copy">&copy; 2026 <span>TicketWave Indonesia</span>. Semua hak dilindungi. Dibuat dengan ❤️ untuk penggemar event Indonesia.</p>
      <div class="foot-policy">
        <a href="#">Privasi</a>
        <a href="#">Syarat</a>
        <a href="#">Cookie</a>
      </div>
    </div>
  </div>
</footer>

<!-- BACK TO TOP -->
<button id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})"><i class="fas fa-chevron-up"></i></button>

<script src="{{ asset('assets2/main.js') }}"></script>
</body>
</html>
