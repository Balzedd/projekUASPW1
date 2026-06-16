<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin Pelanggan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.44.0/tabler-icons.min.css" />
  <link rel="stylesheet" href="{{ asset('assets3/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
  <div class="layout">

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
      <div class="sidebar-header">
        <div class="brand">
          <div class="brand-icon"><i class="ti ti-ticket"></i></div>
          <span id="logoText" class="nav-label brand-text">Pelanggan</span>
        </div>
        <button id="toggleBtn" class="toggle-btn" aria-label="Toggle sidebar">
          <i class="ti ti-menu-2"></i>
        </button>
      </div>
      <nav class="nav">
        <p class="nav-label nav-section-title">Menu utama</p>
        <a href="{{ route('dashboard') }}" class="nav-item active" data-page="dashboard">
          <i class="ti ti-layout-dashboard"></i>
          <span class="nav-label">Dashboard</span>
        </a>
        <a href="{{ route('tikets.index') }}" class="nav-item" data-page="tiket">
          <i class="ti ti-ticket"></i>
          <span class="nav-label">Tiket</span>
          <span class="nav-badge nav-label">12</span>
        </a>
        <a href="{{ route('acara.index') }}" class="nav-item" data-page="acara">
          <i class="ti ti-calendar-event"></i>
          <span class="nav-label">Acara</span>
        </a>
        <a href="#" class="nav-item" data-page="pelanggan">
          <i class="ti ti-users"></i>
          <span class="nav-label">Pelanggan</span>
        </a>
        <a href="#" class="nav-item" data-page="transaksi">
          <i class="ti ti-receipt"></i>
          <span class="nav-label">Transaksi</span>

    
    <!-- Main content -->

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
     <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Edit Data Pelanggan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
    <label class="form-label">Nama Pelanggan</label>
    <input type="text"
           name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $pelanggan->name) }}">

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $pelanggan->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon', $pelanggan->no_telepon) }}">
                        @error('no_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">Perbarui Data</button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>


  
        

<script src="{{ asset('assets3/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html> 