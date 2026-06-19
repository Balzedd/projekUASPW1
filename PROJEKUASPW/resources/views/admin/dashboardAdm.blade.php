<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin Penjualan Tiket</title>
 <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <link rel="stylesheet" href="{{ asset('assets3/style.css') }}">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
  <div class="layout">

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
      <div class="sidebar-header">
        <div class="brand">
          <div class="brand-icon"><i class="bi bi-ticket-fill"></i></div>
          <span id="logoText" class="nav-label brand-text">Tiketin Admin</span>
        </div>
        <button id="toggleBtn" class="toggle-btn" aria-label="Toggle sidebar">
          <i class="bi bi-list "></i>
        </button>
      </div>

      <nav class="nav">
        <p class="nav-label nav-section-title">Menu utama</p>

        <a href="{{ route('admin.dashboard') }}" class="nav-item active" data-page="dashboard">
          <i class="ti ti-layout-dashboard"></i>
          <span class="nav-label">Dashboard</span>
        </a>
        <a href="{{ route('tikets.index') }}" class="nav-item" data-page="tiket">
          <i class="ti ti-ticket"></i>
          <span class="nav-label">Tiket</span>
        
        </a>
        <a href="{{ route('acara.index') }}" class="nav-item" data-page="acara">
          <i class="ti ti-calendar-event"></i>
          <span class="nav-label">Acara</span>
        </a>
        <a href="{{ route('pelanggan.index') }}" class="nav-item" data-page="pelanggan">
          <i class="ti ti-users"></i>
          <span class="nav-label">Pelanggan</span>
        
        </a>
        <a href="#" class="nav-item" data-page="transaksi">
          <i class="ti ti-receipt"></i>
          <span class="nav-label">Transaksi</span>
        </a>
        <a href="#" class="nav-item" data-page="laporan">
          <i class="ti ti-chart-bar"></i>
          <span class="nav-label">Laporan</span>
        </a>

      

      </nav>
    </aside>

    
    <!-- Main content -->
    <div class="main">

      <!-- Header / Navbar atas -->
     <header class="header">
    <div class="search-box ">

    </div>

    <div class="header-right">

        <button class="icon-btn" aria-label="Notifikasi">
            <i class="ti ti-bell"></i>
            <span class="notif-dot"></span>
        </button>

        <div class="dropdown">
            <button class="profile-button dropdown-toggle d-flex align-items-center border-0 bg-transparent"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                <div class="avatar"> {{ strtoupper(substr(Auth::user()->name, 0, 3)) }}</div>

                <div class="profile-info ms-2">
                    <p class="profile-name mb-0">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="profile-role mb-0">
                        Admin 
                    </p>
                </div>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        Profile
                    </a>
                </li>

      

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            Sign Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</header>
      <!-- Content -->
      <main class="content">
        <div class="content-top">
          <div>
            <h1>Dashboard penjualan tiket</h1>
            <p class="subtitle">{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</p>
          </div>
        </div>

        <!-- Stat cards -->
        <div class="stats-grid">
          <div class="stat-card stat-purple">
            <div class="stat-top">
              <p>Tiket terjual</p>
              <i class="ti ti-ticket"></i>
            </div>
            <p class="stat-value">1.284</p>
            <p class="stat-trend"><i class="ti ti-arrow-up-right"></i> 8.2% dari kemarin</p>
          </div>

          <div class="stat-card stat-violet">
            <div class="stat-top">
              <p>Total pendapatan</p>
              <i class="ti ti-cash"></i>
            </div>
            <p class="stat-value">Rp 64,2 jt</p>
            <p class="stat-trend"><i class="ti ti-arrow-up-right"></i> 5.1% dari kemarin</p>
          </div>

          <div class="stat-card stat-neutral">
            <div class="stat-top">
              <p>Acara aktif</p>
              <i class="ti ti-calendar-event"></i>
            </div>
            <p class="stat-value">{{ \App\Models\Acara::count() }}</p>
            <p class="stat-sub">{{ \App\Models\Acara::count() }} acara minggu ini</p>
          </div>
          

         <!-- Pelanggan baru -->
<!-- Sesudah (benar) -->
<div class="stat-card stat-neutral">
    <div class="stat-top">
        <p>Pelanggan baru</p>
        <i class="ti ti-users"></i>
    </div>
    <p class="stat-value">{{ $pelangganBaru }}</p>
    <p class="stat-sub">{{ $totalPelanggan }} total pelanggan</p>
</div>
  </div>

        <!-- Bottom grid -->
        <div class="bottom-grid">

          <!-- Transaksi terbaru -->
          <div class="card">
            <div class="card-header">
              <h3>Transaksi terbaru</h3>
              <a href="#" class="link">Lihat semua</a>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>Pelanggan</th>
                  <th>Acara</th>
                  <th class="text-right">Jumlah</th>
                  <th class="text-right">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Rina Putri</td>
                  <td class="truncate">Konser Jazz Malam</td>
                  <td class="text-right">Rp 350rb</td>
                  <td class="text-right"><span class="badge badge-success">Lunas</span></td>
                </tr>
                <tr>
                  <td>Budi Santoso</td>
                  <td class="truncate">Pameran Seni Kota</td>
                  <td class="text-right">Rp 120rb</td>
                  <td class="text-right"><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                  <td>Sari Dewi</td>
                  <td class="truncate">Festival Kuliner</td>
                  <td class="text-right">Rp 75rb</td>
                  <td class="text-right"><span class="badge badge-success">Lunas</span></td>
                </tr>
                <tr>
                  <td>Andi Wijaya</td>
                  <td class="truncate">Konser Jazz Malam</td>
                  <td class="text-right">Rp 350rb</td>
                  <td class="text-right"><span class="badge badge-danger">Gagal</span></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Acara terpopuler -->
          <div class="card">
            <h3>Acara terpopuler</h3>
            <div class="progress-list">

              <div class="progress-item">
                <div class="progress-label">
                  <span>Konser Jazz Malam</span>
                  <span class="progress-count">412 tiket</span>
                </div>
                <div class="progress-bar">
                  <div class="progress-fill fill-1" style="width:85%;"></div>
                </div>
              </div>

              <div class="progress-item">
                <div class="progress-label">
                  <span>Festival Kuliner</span>
                  <span class="progress-count">298 tiket</span>
                </div>
                <div class="progress-bar">
                  <div class="progress-fill fill-2" style="width:62%;"></div>
                </div>
              </div>

              <div class="progress-item">
                <div class="progress-label">
                  <span>Pameran Seni Kota</span>
                  <span class="progress-count">156 tiket</span>
                </div>
                <div class="progress-bar">
                  <div class="progress-fill fill-3" style="width:34%;"></div>
                </div>
              </div>

              <div class="progress-item">
                <div class="progress-label">
                  <span>Pertunjukan Teater</span>
                  <span class="progress-count">98 tiket</span>
                </div>
                <div class="progress-bar">
                  <div class="progress-fill fill-4" style="width:21%;"></div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

<script src="{{ asset('assets3/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>