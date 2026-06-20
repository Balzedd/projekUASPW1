<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=JetBrains+Mono:wght@400;700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

 <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pesanan.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>
<body>

    <div class="page-section" style="padding-top:80px;">
        <div class="container">

            <div class="profile-card">

                <a href="{{ route('user.dashboard') }}" class="profile-close">
                    <i class="fa-solid fa-xmark"></i>
                </a>

                <div class="profile-head">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 3)) }}
                    </div>
                    <h2 class="profile-title">Profil Saya</h2>
                </div>

                <div class="profile-rows">

                    <div class="profile-row">
                        <div class="profile-label"><i class="fa-solid fa-user"></i> Nama</div>
                        <div class="profile-value">{{ auth()->user()->name }}</div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label"><i class="fa-solid fa-envelope"></i> Email</div>
                        <div class="profile-value">{{ auth()->user()->email }}</div>
                    </div>

                    <div class="profile-row">
                        <div class="profile-label"><i class="fa-solid fa-calendar-days"></i> Tanggal Bergabung</div>
                        <div class="profile-value">{{ auth()->user()->created_at->format('d F Y') }}</div>
                    </div>

                </div>

               <div class="profile-actions">
    <a href="{{ route('dashboard') }}#contact" class="btn-primary btn-lg">
        <i class="fa-solid fa-pen"></i> Edit Profil
    </a>
</div>

            </div>

        </div>
    </div>
<script src="{{ asset('assets/main.js') }}"></script>
</body>
</html>