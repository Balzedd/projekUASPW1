@extends('layout.admin')

@section('content')

<div class="content-top">
  <div>
    <h1>Dashboard Penjualan Tiket</h1>
    <p class="subtitle">{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</p>
  </div>
</div>

@unless($hasTransaksi)
<div class="alert alert-warning">
  <i class="ti ti-alert-triangle"></i>
  Tabel <code>transaksis</code> belum tersedia. Statistik penjualan masih menampilkan nol hingga migration dijalankan.
</div>
@endunless

<!-- Stat cards -->
<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-top">
      <p>Tiket Terjual</p>
      <i class="ti ti-ticket"></i>
    </div>
    <p class="stat-value">{{ number_format($tiketTerjual, 0, ',', '.') }}</p>
    @php
      $selisih = $tiketTerjualKemarin > 0
        ? round((($tiketTerjualHariIni - $tiketTerjualKemarin) / $tiketTerjualKemarin) * 100, 1)
        : null;
    @endphp
    @if(!is_null($selisih))
      <p class="stat-trend">
        <i class="ti ti-arrow-{{ $selisih >= 0 ? 'up' : 'down' }}-right"></i>
        {{ abs($selisih) }}% dari kemarin
      </p>
    @else
      <p class="stat-sub">Belum ada perbandingan</p>
    @endif
  </div>

  <div class="stat-card stat-purple">
    <div class="stat-top">
      <p>Total Pendapatan</p>
      <i class="ti ti-cash"></i>
    </div>
    <p class="stat-value">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
    <p class="stat-sub">Dari transaksi berstatus lunas</p>
  </div>

  <div class="stat-card stat-violet">
    <div class="stat-top">
      <p>Total Tiket</p>
      <i class="ti ti-ticket"></i>
    </div>
    <p class="stat-value">{{ $totalTiket ?? 0 }}</p>
    <p class="stat-sub">Total tiket yang tersedia</p>
  </div>

  <div class="stat-card stat-neutral">
    <div class="stat-top">
      <p>Acara Aktif</p>
      <i class="ti ti-calendar-event"></i>
    </div>
    <p class="stat-value">{{ $totalAcara }}</p>
    <p class="stat-sub">{{ $totalAcara }} acara terdaftar</p>
  </div>
</div>

<!-- Chart grid -->
<div class="chart-grid">

  <div class="chart-card chart-wide">
    <div class="card-header">
      <h3>Tren tiket terjual (7 hari terakhir)</h3>
    </div>
    <div id="chart-tren" class="chart-canvas">
      <div class="chart-loading">Memuat grafik...</div>
    </div>
  </div>

  <div class="chart-card">
    <div class="card-header">
      <h3>Status transaksi</h3>
      <p class="subtitle" style="margin:2px 0 0;font-size:.74rem;">Lunas vs menunggu pembayaran</p>
    </div>
    <div id="chart-status" class="chart-canvas">
      <div class="chart-loading">Memuat grafik...</div>
    </div>
  </div>

</div>

<!-- Bottom grid -->
<div class="bottom-grid">

  <!-- Transaksi terbaru -->
<div class="card transaksi-card">
    <div class="card-header">
      <h3>Transaksi terbaru (LUNAS)</h3>
      <a href="{{ route('transaksi.index') }}" class="link">Lihat semua</a>
    </div>

    @if($transaksiTerbaru->count() > 0)
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
        @foreach($transaksiTerbaru as $t)
        <tr>
          <td>{{ $t->user->name ?? '-' }}</td>
          <td class="truncate">{{ $t->acara->nama_acara ?? '-' }}</td>
          <td class="text-right">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
          <td class="text-right">
            @if($t->status == 'lunas' || $t->status == 'dibayar')
              <span class="badge badge-success">Lunas</span>
            @elseif($t->status == 'pending')
              <span class="badge badge-warning">Pending</span>
            @else
              <span class="badge badge-danger">{{ ucfirst($t->status) }}</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="table-empty">
      <i class="ti ti-receipt"></i>
      <p class="mb-1">Belum ada transaksi</p>
    </div>
    @endif
  </div>

</div>

@endsection

@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
(function () {
    'use strict';

    // Tunggu sampai DOM dan semua resource siap
    if (document.readyState === 'complete') {
        initCharts();
    } else {
        window.addEventListener('load', initCharts);
    }

    function initCharts() {
        const COLOR = {
            text:    '#f0eefc',
            muted:   '#888aa8',
            grid:    'rgba(255,255,255,.06)',
            gold:    '#d4af37',
            goldLt:  '#f0d060',
            emerald: '#00c4a7',
            violet:  '#7c5cbf',
            crimson: '#e8405a',
        };

        // Cek apakah Highcharts tersedia
        if (typeof Highcharts === 'undefined') {
            console.error('Highcharts not loaded!');
            return;
        }

        Highcharts.setOptions({
            chart: {
                backgroundColor: 'transparent',
                style: { fontFamily: "'Outfit', sans-serif" }
            },
            title: { text: null },
            credits: { enabled: false },
            legend: { itemStyle: { color: COLOR.muted, fontSize: '11px' } },
            xAxis: {
                labels: { style: { color: COLOR.muted, fontSize: '11px' } },
                lineColor: COLOR.grid,
                tickColor: COLOR.grid
            },
            yAxis: {
                labels: { style: { color: COLOR.muted, fontSize: '11px' } },
                gridLineColor: COLOR.grid,
                title: { text: null }
            },
            tooltip: {
                backgroundColor: '#16162a',
                borderColor: 'rgba(212,175,55,.25)',
                style: { color: COLOR.text },
                borderRadius: 8
            }
        });

        // ── 1. Tren tiket terjual ──
        const trenData = @json($trenHarian);
        const chartTren = document.getElementById('chart-tren');

        if (chartTren) {
            try {
                Highcharts.chart('chart-tren', {
                    chart: { type: 'areaspline', height: 260 },
                    xAxis: {
                        categories: trenData.map(d => d.tanggal),
                        labels: { style: { color: COLOR.muted, fontSize: '11px' } }
                    },
                    yAxis: {
                        allowDecimals: false,
                        gridLineColor: COLOR.grid,
                        title: { text: null }
                    },
                    series: [{
                        name: 'Tiket terjual',
                        data: trenData.map(d => d.jumlah),
                        color: COLOR.gold,
                        fillColor: {
                            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                            stops: [
                                [0, 'rgba(212,175,55,.35)'],
                                [1, 'rgba(212,175,55,0)']
                            ]
                        },
                        lineWidth: 2.5,
                        marker: {
                            fillColor: COLOR.goldLt,
                            lineColor: COLOR.gold,
                            lineWidth: 2,
                            radius: 4
                        }
                    }],
                    legend: { enabled: false },
                    plotOptions: {
                        areaspline: { marker: { enabled: true } }
                    }
                });
            } catch (e) {
                console.error('Error creating tren chart:', e);
                chartTren.innerHTML = '<div class="chart-error">Error memuat grafik</div>';
            }
        }

        // ── 2. Status transaksi: Lunas vs Pending ──
        const statusData = @json($statusCount);
        const chartStatus = document.getElementById('chart-status');

        if (chartStatus) {
            try {
                const hasData = statusData.lunas > 0 || statusData.pending > 0;

                if (hasData) {
                    Highcharts.chart('chart-status', {
                        chart: { type: 'pie', height: 260 },
                        plotOptions: {
                            pie: {
                                innerSize: '68%',
                                borderWidth: 2,
                                borderColor: '#16162a',
                                dataLabels: { enabled: false }
                            }
                        },
                        series: [{
                            name: 'Transaksi',
                            data: [
                                { name: 'Lunas', y: statusData.lunas, color: COLOR.emerald },
                                { name: 'Pending', y: statusData.pending, color: COLOR.gold }
                            ]
                        }],
                        legend: {
                            enabled: true,
                            align: 'center',
                            verticalAlign: 'bottom',
                            itemStyle: { color: COLOR.muted, fontSize: '11px', fontWeight: '500' }
                        },
                        tooltip: {
                            pointFormat: '<b>{point.y}</b> transaksi ({point.percentage:.1f}%)'
                        }
                    });
                } else {
                    chartStatus.innerHTML =
                        '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#888aa8;font-size:0.9rem;flex-direction:column;">' +
                        '<i class="ti ti-pie-chart" style="font-size:2.5rem;margin-bottom:10px;color:#555670;"></i>' +
                        '<span>Belum ada data transaksi</span>' +
                        '</div>';
                }
            } catch (e) {
                console.error('Error creating status chart:', e);
                chartStatus.innerHTML = '<div class="chart-error">Error memuat grafik</div>';
            }
        }

        // ── 3. Tiket terjual per acara ──
        const acaraData = @json($acaraPopuler->map(fn($a) => ['nama' => $a->nama_acara, 'jumlah' => $a->tiket_terjual]));
        const chartAcara = document.getElementById('chart-acara');

        if (chartAcara) {
            try {
                const hasData = acaraData.some(d => d.jumlah > 0);

                if (acaraData.length > 0 && hasData) {
                    Highcharts.chart('chart-acara', {
                        chart: { type: 'bar', height: 280 },
                        xAxis: {
                            categories: acaraData.map(d => d.nama),
                            labels: {
                                style: { color: COLOR.muted, fontSize: '11px' },
                                overflow: 'justify'
                            }
                        },
                        yAxis: {
                            allowDecimals: false,
                            gridLineColor: COLOR.grid,
                            title: { text: null }
                        },
                        series: [{
                            name: 'Tiket terjual',
                            data: acaraData.map(d => d.jumlah),
                            color: COLOR.violet,
                            borderRadius: 4,
                            borderWidth: 0
                        }],
                        legend: { enabled: false },
                        plotOptions: {
                            bar: {
                                borderWidth: 0,
                                pointPadding: 0.15,
                                groupPadding: 0.1
                            }
                        },
                        tooltip: {
                            pointFormat: '<b>{point.y}</b> tiket terjual'
                        }
                    });
                } else {
                    chartAcara.innerHTML =
                        '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#888aa8;font-size:0.9rem;flex-direction:column;">' +
                        '<i class="ti ti-chart-bar" style="font-size:2.5rem;margin-bottom:10px;color:#555670;"></i>' +
                        '<span>Belum ada data penjualan per acara</span>' +
                        '</div>';
                }
            } catch (e) {
                console.error('Error creating acara chart:', e);
                chartAcara.innerHTML = '<div class="chart-error">Error memuat grafik</div>';
            }
        }
    }

})();
</script>
@endpush