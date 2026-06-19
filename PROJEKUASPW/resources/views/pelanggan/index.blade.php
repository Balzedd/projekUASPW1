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

        <a href="{{ route('admin.dashboard') }}" class="nav-item" data-page="dashboard">
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
        <a href="{{ route('pelanggan.index') }}" class="nav-item  active  " data-page="pelanggan">
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
                    <a class="dropdown-item" href="#">
                        Account Settings
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
            <h1>Dashboard Pelanggan</h1>
            <p class="subtitle">Ringkasan aktivitas pelanggan hari ini, 15 Juni 2026</p>
          </div>
          <button class="btn-primary">
            <i class="ti ti-plus"></i> Pelanggan baru
          </button>
        </div>
        <!-- Stat cards -->
        <!-- Bottom grid -->
<div class="card">
    <div class="card-header">
        <h3>Daftar Pelanggan</h3>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Bergabung</th>
                <th>Aksi</th>
            </tr>
        </thead>

<tbody>
@foreach ($pelanggan as $p)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->email }}</td>
    <td>{{ $p->created_at->format('d-m-Y') }}</td>
    <td>
        <a href="{{ route('pelanggan.edit', $p->id) }}"
           class="btn btn-warning btn-sm">
            <i class="ti ti-edit"></i>
            Edit
        </a>

        <form action="{{ route('pelanggan.destroy', $p->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">
                <i class="ti ti-trash"></i>
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
    </table>
</div>
        

<script src="{{ asset('assets3/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html> 