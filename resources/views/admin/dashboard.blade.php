<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin — TK/PAUD Azzahra</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --color-primary: #212161;
            --color-primary-light: #2d2d8a;
            --color-secondary: #669933;
            --color-secondary-light: #7ab842;
            --color-secondary-dark: #527a29;
            --color-accent: #f0c040;
            --color-text: #212529;
            --color-text-light: #ffffff;
            --color-text-muted: #585858;
            --color-text-disabled: #828282;
            --color-surface: #f8f9fa;
            --color-surface-white: #ffffff;
            --color-surface-dark: #0a0a2e;
            --color-border: #e9ecef;
            --font-primary: 'Inter', -apple-system, sans-serif;
            --font-display: 'Playfair Display', Georgia, serif;
            --radius-sm: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --radius-full: 50%;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
            --shadow-lg: rgba(0,0,0,0.06) 0px 1px 6px 0px, rgba(0,0,0,0.16) 0px 2px 32px 0px;
        }
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: var(--font-primary);
            color: var(--color-text);
            background: var(--color-surface);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: 260px;
            background: var(--color-surface-dark);
            padding: 1.5rem 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }
        .sidebar-brand {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 1rem;
        }
        .sidebar-logo {
            width: 40px; height: 40px;
            border-radius: var(--radius-full);
            background: linear-gradient(135deg, var(--color-secondary), var(--color-accent));
            display: flex; align-items: center; justify-content: center;
            font-family: var(--font-display);
            font-size: 1.125rem; font-weight: 900; color: white;
            flex-shrink: 0;
        }
        .sidebar-brand-text h2 {
            font-size: 0.938rem; font-weight: 700; color: white; line-height: 1.2;
        }
        .sidebar-brand-text span {
            font-size: 0.688rem; color: rgba(255,255,255,0.5);
        }
        .sidebar-nav {
            flex: 1;
            padding: 0 0.75rem;
        }
        .sidebar-label {
            font-size: 0.625rem; font-weight: 700;
            color: rgba(255,255,255,0.3);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 1rem 0.75rem 0.5rem;
        }
        .sidebar-link {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.625rem 0.75rem;
            border-radius: var(--radius-md);
            color: rgba(255,255,255,0.6);
            font-size: 0.875rem; font-weight: 500;
            transition: all 150ms ease;
            text-decoration: none;
            margin-bottom: 2px;
        }
        .sidebar-link i { width: 20px; height: 20px; }
        .sidebar-link:hover {
            background: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.9);
        }
        .sidebar-link.active {
            background: rgba(102,153,51,0.15);
            color: var(--color-secondary-light);
        }
        .sidebar-footer {
            padding: 1rem 0.75rem;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .btn-logout {
            display: flex; align-items: center; gap: 0.5rem;
            width: 100%;
            padding: 0.625rem 0.75rem;
            border: none;
            border-radius: var(--radius-md);
            background: rgba(231,76,60,0.1);
            color: #e74c3c;
            font-family: var(--font-primary);
            font-size: 0.813rem; font-weight: 600;
            cursor: pointer;
            transition: all 150ms ease;
        }
        .btn-logout i { width: 18px; height: 18px; }
        .btn-logout:hover { background: rgba(231,76,60,0.2); }

        /* ===== MAIN CONTENT ===== */
        .main {
            margin-left: 260px;
            padding: 2rem;
            min-height: 100vh;
        }

        /* ===== TOP BAR ===== */
        .topbar {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 2rem;
        }
        .topbar h1 {
            font-family: var(--font-display);
            font-size: 1.75rem; font-weight: 800;
            color: var(--color-primary);
        }
        .topbar-date {
            font-size: 0.813rem;
            color: var(--color-text-muted);
            display: flex; align-items: center; gap: 0.375rem;
        }
        .topbar-date i { width: 16px; height: 16px; }

        /* ===== STATS GRID ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: var(--color-surface-white);
            border-radius: var(--radius-lg);
            padding: 1.25rem;
            border: 1px solid var(--color-border);
            transition: all 250ms ease;
            position: relative;
            overflow: hidden;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 3px;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        .stat-card.total::before { background: var(--color-primary); }
        .stat-card.pending::before { background: var(--color-accent); }
        .stat-card.verified::before { background: #3498db; }
        .stat-card.accepted::before { background: var(--color-secondary); }
        .stat-card.rejected::before { background: #e74c3c; }

        .stat-icon {
            width: 40px; height: 40px;
            border-radius: var(--radius-md);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 0.75rem;
        }
        .stat-icon i { width: 20px; height: 20px; }
        .stat-card.total .stat-icon { background: rgba(33,33,97,0.08); color: var(--color-primary); }
        .stat-card.pending .stat-icon { background: rgba(240,192,64,0.12); color: #b8860b; }
        .stat-card.verified .stat-icon { background: rgba(52,152,219,0.1); color: #3498db; }
        .stat-card.accepted .stat-icon { background: rgba(102,153,51,0.1); color: var(--color-secondary); }
        .stat-card.rejected .stat-icon { background: rgba(231,76,60,0.08); color: #e74c3c; }

        .stat-number {
            font-size: 1.75rem; font-weight: 800; color: var(--color-text);
            line-height: 1;
        }
        .stat-label {
            font-size: 0.75rem; font-weight: 500;
            color: var(--color-text-muted);
            margin-top: 0.25rem;
        }

        /* ===== TABLE CARD ===== */
        .table-card {
            background: var(--color-surface-white);
            border-radius: var(--radius-lg);
            border: 1px solid var(--color-border);
            overflow: hidden;
        }
        .table-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--color-border);
            flex-wrap: wrap;
            gap: 1rem;
        }
        .table-header h2 {
            font-size: 1.125rem; font-weight: 700; color: var(--color-text);
            display: flex; align-items: center; gap: 0.5rem;
        }
        .table-header h2 i { width: 20px; height: 20px; color: var(--color-primary); }
        .table-actions {
            display: flex; align-items: center; gap: 0.75rem;
        }
        .search-box {
            display: flex; align-items: center;
            border: 2px solid var(--color-border);
            border-radius: var(--radius-md);
            padding: 0.375rem 0.75rem;
            background: var(--color-surface);
            transition: border-color 150ms ease;
        }
        .search-box:focus-within { border-color: var(--color-primary); }
        .search-box i { width: 16px; height: 16px; color: var(--color-text-disabled); margin-right: 0.5rem; }
        .search-box input {
            border: none; outline: none; background: transparent;
            font-family: var(--font-primary);
            font-size: 0.813rem; color: var(--color-text);
            width: 200px;
        }
        .filter-select {
            padding: 0.5rem 2rem 0.5rem 0.75rem;
            border: 2px solid var(--color-border);
            border-radius: var(--radius-md);
            font-family: var(--font-primary);
            font-size: 0.813rem;
            color: var(--color-text);
            background: var(--color-surface);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23585858' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px center;
            cursor: pointer;
            outline: none;
            transition: border-color 150ms ease;
        }
        .filter-select:focus { border-color: var(--color-primary); }

        /* ===== TABLE ===== */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table thead th {
            padding: 0.75rem 1rem;
            font-size: 0.688rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--color-text-muted);
            text-align: left;
            background: var(--color-surface);
            border-bottom: 1px solid var(--color-border);
            white-space: nowrap;
        }
        .data-table tbody tr {
            border-bottom: 1px solid var(--color-border);
            transition: background 100ms ease;
        }
        .data-table tbody tr:last-child { border-bottom: none; }
        .data-table tbody tr:hover { background: rgba(33,33,97,0.02); }
        .data-table td {
            padding: 0.875rem 1rem;
            font-size: 0.875rem;
            vertical-align: middle;
        }

        .reg-number {
            font-weight: 700;
            color: var(--color-primary);
            font-size: 0.813rem;
            font-family: 'Courier New', monospace;
        }
        .student-info {
            display: flex; flex-direction: column;
        }
        .student-name { font-weight: 600; color: var(--color-text); }
        .student-meta { font-size: 0.75rem; color: var(--color-text-muted); }

        .parent-info {
            font-size: 0.813rem; color: var(--color-text-muted);
        }

        /* Status Badge */
        .badge {
            display: inline-flex; align-items: center; gap: 0.25rem;
            padding: 0.25rem 0.625rem;
            border-radius: 2rem;
            font-size: 0.688rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .badge i { width: 12px; height: 12px; }
        .badge.pending {
            background: rgba(240,192,64,0.12); color: #b8860b;
        }
        .badge.verified {
            background: rgba(52,152,219,0.1); color: #2980b9;
        }
        .badge.accepted {
            background: rgba(102,153,51,0.1); color: var(--color-secondary-dark);
        }
        .badge.rejected {
            background: rgba(231,76,60,0.08); color: #c0392b;
        }

        .date-cell {
            font-size: 0.813rem; color: var(--color-text-muted);
            white-space: nowrap;
        }

        /* Action Buttons */
        .action-btns {
            display: flex; gap: 0.375rem;
        }
        .action-btn {
            display: flex; align-items: center; justify-content: center;
            width: 32px; height: 32px;
            border-radius: var(--radius-sm);
            border: none;
            cursor: pointer;
            transition: all 150ms ease;
            text-decoration: none;
        }
        .action-btn i { width: 16px; height: 16px; }
        .action-btn.view {
            background: rgba(33,33,97,0.06); color: var(--color-primary);
        }
        .action-btn.view:hover {
            background: rgba(33,33,97,0.12);
        }
        .action-btn.accept {
            background: rgba(102,153,51,0.08); color: var(--color-secondary);
        }
        .action-btn.accept:hover {
            background: rgba(102,153,51,0.15);
        }
        .action-btn.reject {
            background: rgba(231,76,60,0.06); color: #e74c3c;
        }
        .action-btn.reject:hover {
            background: rgba(231,76,60,0.12);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }
        .empty-state i {
            width: 48px; height: 48px;
            color: var(--color-text-disabled);
            margin-bottom: 1rem;
        }
        .empty-state h3 {
            font-size: 1rem; font-weight: 600;
            color: var(--color-text-muted); margin-bottom: 0.375rem;
        }
        .empty-state p {
            font-size: 0.813rem; color: var(--color-text-disabled);
        }

        /* Pagination */
        .table-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--color-border);
            font-size: 0.813rem;
            color: var(--color-text-muted);
        }
        .pagination-links {
            display: flex; gap: 0.25rem;
        }
        .pagination-links a,
        .pagination-links span {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 32px; height: 32px;
            padding: 0 0.5rem;
            border-radius: var(--radius-sm);
            font-size: 0.813rem; font-weight: 500;
            text-decoration: none;
            transition: all 150ms ease;
        }
        .pagination-links a {
            color: var(--color-text-muted);
            border: 1px solid var(--color-border);
        }
        .pagination-links a:hover {
            background: var(--color-primary);
            color: white;
            border-color: var(--color-primary);
        }
        .pagination-links span.current {
            background: var(--color-primary);
            color: white;
            border: 1px solid var(--color-primary);
        }
        .pagination-links span.disabled {
            color: var(--color-text-disabled);
            border: 1px solid var(--color-border);
            opacity: 0.5;
        }

        /* Toast */
        .toast {
            position: fixed;
            top: 1.5rem; right: 1.5rem;
            background: var(--color-surface-white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            padding: 1rem 1.5rem;
            display: flex; align-items: center; gap: 0.75rem;
            z-index: 2000;
            border-left: 4px solid var(--color-secondary);
            animation: toastIn 0.4s ease, toastOut 0.4s ease 3.6s forwards;
            max-width: 400px;
        }
        .toast i { width: 20px; height: 20px; color: var(--color-secondary); flex-shrink: 0; }
        .toast span { font-size: 0.875rem; font-weight: 500; color: var(--color-text); }
        @keyframes toastIn { from { opacity: 0; transform: translateX(100%); } to { opacity: 1; transform: translateX(0); } }
        @keyframes toastOut { from { opacity: 1; transform: translateX(0); } to { opacity: 0; transform: translateX(100%); } }

        /* Mobile toggle */
        .mobile-sidebar-toggle {
            display: none;
            position: fixed;
            top: 1rem; left: 1rem;
            z-index: 200;
            background: var(--color-primary);
            color: white;
            border: none;
            width: 40px; height: 40px;
            border-radius: var(--radius-md);
            cursor: pointer;
            align-items: center; justify-content: center;
        }
        .mobile-sidebar-toggle i { width: 20px; height: 20px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; }
            .mobile-sidebar-toggle { display: flex; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .table-actions { flex-wrap: wrap; }
            .search-box input { width: 140px; }
            .data-table { display: block; overflow-x: auto; }
        }
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .main { padding: 1rem; padding-top: 4rem; }
        }
    </style>
</head>
<body>
    {{-- Mobile toggle --}}
    <button class="mobile-sidebar-toggle" id="sidebarToggle">
        <i data-lucide="menu"></i>
    </button>

    {{-- ===== SIDEBAR ===== --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            </div>
            <div class="sidebar-brand-text">
                <h2>TK/PAUD Azzahra</h2>
                <span>Panel Admin</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-label">Menu</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link active">
                <i data-lucide="layout-dashboard"></i> Dashboard
            </a>
            <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                <i data-lucide="external-link"></i> Lihat Website
            </a>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <i data-lucide="log-out"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN ===== --}}
    <main class="main">
        {{-- Top Bar --}}
        <div class="topbar">
            <h1>Dashboard</h1>
            <div class="topbar-date">
                <i data-lucide="calendar"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        {{-- Stats --}}
        <div class="stats-grid">
            <div class="stat-card total">
                <div class="stat-icon"><i data-lucide="users"></i></div>
                <div class="stat-number">{{ $stats['total'] }}</div>
                <div class="stat-label">Total Pendaftar</div>
            </div>
            <div class="stat-card pending">
                <div class="stat-icon"><i data-lucide="clock"></i></div>
                <div class="stat-number">{{ $stats['pending'] }}</div>
                <div class="stat-label">Menunggu</div>
            </div>
            <div class="stat-card verified">
                <div class="stat-icon"><i data-lucide="shield-check"></i></div>
                <div class="stat-number">{{ $stats['verified'] }}</div>
                <div class="stat-label">Terverifikasi</div>
            </div>
            <div class="stat-card accepted">
                <div class="stat-icon"><i data-lucide="check-circle"></i></div>
                <div class="stat-number">{{ $stats['accepted'] }}</div>
                <div class="stat-label">Diterima</div>
            </div>
            <div class="stat-card rejected">
                <div class="stat-icon"><i data-lucide="x-circle"></i></div>
                <div class="stat-number">{{ $stats['rejected'] }}</div>
                <div class="stat-label">Ditolak</div>
            </div>
        </div>

        {{-- Table --}}
        <div class="table-card">
            <div class="table-header">
                <h2><i data-lucide="clipboard-list"></i> Daftar Pendaftaran</h2>
                <div class="table-actions">
                    <form action="{{ route('admin.dashboard') }}" method="GET" id="filterForm" style="display:flex;gap:0.75rem;align-items:center;">
                        <div class="search-box">
                            <i data-lucide="search"></i>
                            <input type="text" name="search" placeholder="Cari nama / no. pendaftaran..."
                                   value="{{ request('search') }}">
                        </div>
                        <select class="filter-select" name="status" onchange="document.getElementById('filterForm').submit()">
                            <option value="all" {{ request('status','all') == 'all' ? 'selected' : '' }}>Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                            <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </form>
                </div>
            </div>

            @if($registrations->count() > 0)
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No. Pendaftaran</th>
                            <th>Data Siswa</th>
                            <th>Orang Tua</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $reg)
                            <tr>
                                <td>
                                    <span class="reg-number">{{ $reg->registration_number }}</span>
                                </td>
                                <td>
                                    <div class="student-info">
                                        <span class="student-name">{{ $reg->nama_lengkap }}</span>
                                        <span class="student-meta">{{ $reg->jenis_kelamin }} · {{ $reg->tanggal_lahir->translatedFormat('d M Y') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="parent-info">
                                        {{ $reg->nama_ayah }} & {{ $reg->nama_ibu }}
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $statusConfig = [
                                            'pending'  => ['label' => 'Menunggu', 'icon' => 'clock'],
                                            'verified' => ['label' => 'Terverifikasi', 'icon' => 'shield-check'],
                                            'accepted' => ['label' => 'Diterima', 'icon' => 'check-circle'],
                                            'rejected' => ['label' => 'Ditolak', 'icon' => 'x-circle'],
                                        ];
                                        $sc = $statusConfig[$reg->status];
                                    @endphp
                                    <span class="badge {{ $reg->status }}">
                                        <i data-lucide="{{ $sc['icon'] }}"></i>
                                        {{ $sc['label'] }}
                                    </span>
                                </td>
                                <td class="date-cell">
                                    {{ $reg->created_at->translatedFormat('d M Y') }}
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.show', $reg) }}" class="action-btn view" title="Lihat Detail">
                                            <i data-lucide="eye"></i>
                                        </a>
                                        @if($reg->status !== 'accepted')
                                            <form action="{{ route('admin.updateStatus', $reg) }}" method="POST" style="display:inline;">
                                                @csrf @method('PATCH')
                                                <input type="hidden" name="status" value="accepted">
                                                <button type="submit" class="action-btn accept" title="Terima"
                                                        onclick="return confirm('Terima pendaftaran {{ $reg->nama_lengkap }}?')">
                                                    <i data-lucide="check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if($reg->status !== 'rejected')
                                            <form action="{{ route('admin.updateStatus', $reg) }}" method="POST" style="display:inline;">
                                                @csrf @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="action-btn reject" title="Tolak"
                                                        onclick="return confirm('Tolak pendaftaran {{ $reg->nama_lengkap }}?')">
                                                    <i data-lucide="x"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($registrations->hasPages())
                    <div class="table-footer">
                        <span>Menampilkan {{ $registrations->firstItem() }}–{{ $registrations->lastItem() }} dari {{ $registrations->total() }} data</span>
                        <div class="pagination-links">
                            {{-- Previous --}}
                            @if($registrations->onFirstPage())
                                <span class="disabled">&laquo;</span>
                            @else
                                <a href="{{ $registrations->previousPageUrl() }}">&laquo;</a>
                            @endif

                            {{-- Pages --}}
                            @foreach($registrations->getUrlRange(1, $registrations->lastPage()) as $page => $url)
                                @if($page == $registrations->currentPage())
                                    <span class="current">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if($registrations->hasMorePages())
                                <a href="{{ $registrations->nextPageUrl() }}">&raquo;</a>
                            @else
                                <span class="disabled">&raquo;</span>
                            @endif
                        </div>
                    </div>
                @endif
            @else
                <div class="empty-state">
                    <i data-lucide="inbox"></i>
                    <h3>Belum ada data pendaftaran</h3>
                    <p>Data akan muncul setelah ada calon siswa yang mendaftar.</p>
                </div>
            @endif
        </div>
    </main>

    {{-- Toast --}}
    @if(session('success'))
        <div class="toast" id="toast">
            <i data-lucide="check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            // Mobile sidebar toggle
            const toggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            if (toggle) {
                toggle.addEventListener('click', () => sidebar.classList.toggle('open'));
            }

            // Auto-remove toast
            const toast = document.getElementById('toast');
            if (toast) {
                setTimeout(() => toast.remove(), 4000);
            }
        });
    </script>
</body>
</html>
