<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin</title>
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

        <a href="{{ route('admin.dashboard') }}" class="nav-item" data-page="dashboard">
          <i class="ti ti-layout-dashboard"></i>
          <span class="nav-label">Dashboard</span>
        </a>
        <a href="{{ route('tikets.index') }}" class="nav-item active " data-page="tiket">
          <i class="ti ti-ticket"></i>
          <span class="nav-label">Tiket</span>
        
        </a>
        <a href="{{ route('acara.index') }}" class="nav-item" data-page="acara">
          <i class="ti ti-calendar-event"></i>
          <span class="nav-label">Acara</span>
        </a>
        <a href="{{ route('pelanggan.index') }}" class="nav-item " data-page="pelanggan">
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


    <div class="main" style="flex:1; width:100%; display:flex; flex-direction:column;">
      <header class="header">
        <div class="search-box"></div>
        <div class="header-right">
          <button class="icon-btn" aria-label="Notifikasi"><i class="ti ti-bell"></i><span class="notif-dot"></span></button>
          <div class="dropdown">
            <button class="profile-button dropdown-toggle d-flex align-items-center border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 3)) }}</div>
              <div class="profile-info ms-2">
                <p class="profile-name mb-0">{{ Auth::user()->name }}</p>
                <p class="profile-role mb-0">Admin</p>
              </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Account Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="dropdown-item">Sign Out</button></form>
              </li>
            </ul>
          </div>
        </div>
      </header>

      <main class="content">
        @yield('content')
      </main>
    </div>
  </div>

  <script src="{{ asset('assets3/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
