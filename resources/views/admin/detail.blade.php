<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran — {{ $registration->registration_number }}</title>
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

        /* Top navbar */
        .top-nav {
            background: var(--color-surface-dark);
            padding: 0.875rem 2rem;
            display: flex; align-items: center; justify-content: space-between;
        }
        .top-nav-brand {
            display: flex; align-items: center; gap: 0.75rem;
            text-decoration: none;
        }
        .top-nav-logo {
            width: 36px; height: 36px;
            border-radius: var(--radius-full);
            background: linear-gradient(135deg, var(--color-secondary), var(--color-accent));
            display: flex; align-items: center; justify-content: center;
            font-family: var(--font-display);
            font-size: 0.938rem; font-weight: 900; color: white;
        }
        .top-nav-text { color: white; font-size: 0.938rem; font-weight: 700; }
        .top-nav-actions { display: flex; gap: 0.5rem; }
        .nav-btn {
            display: inline-flex; align-items: center; gap: 0.375rem;
            padding: 0.5rem 0.875rem;
            border-radius: var(--radius-md);
            font-family: var(--font-primary);
            font-size: 0.813rem; font-weight: 600;
            text-decoration: none;
            transition: all 150ms ease;
            border: none; cursor: pointer;
        }
        .nav-btn i { width: 16px; height: 16px; }
        .nav-btn.ghost {
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.8);
        }
        .nav-btn.ghost:hover { background: rgba(255,255,255,0.15); }

        /* Page Container */
        .page { max-width: 960px; margin: 0 auto; padding: 2rem; }

        /* Breadcrumb */
        .breadcrumb {
            display: flex; align-items: center; gap: 0.375rem;
            margin-bottom: 1.5rem;
            font-size: 0.813rem;
        }
        .breadcrumb a {
            color: var(--color-text-muted);
            text-decoration: none;
            transition: color 150ms;
        }
        .breadcrumb a:hover { color: var(--color-primary); }
        .breadcrumb i { width: 14px; height: 14px; color: var(--color-text-disabled); }
        .breadcrumb span { color: var(--color-text); font-weight: 600; }

        /* Detail Header */
        .detail-header {
            background: var(--color-surface-white);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-xl);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        .detail-header-top {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
            padding: 2rem;
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 1rem;
            position: relative; overflow: hidden;
        }
        .detail-header-top::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 80% 30%, rgba(102,153,51,0.15) 0%, transparent 50%);
        }
        .detail-header-info {
            position: relative; z-index: 1;
        }
        .detail-header-info h1 {
            font-family: var(--font-display);
            font-size: 1.5rem; font-weight: 800; color: white;
            margin-bottom: 0.25rem;
        }
        .detail-header-reg {
            font-family: 'Courier New', monospace;
            font-size: 0.938rem; font-weight: 700; color: var(--color-accent);
        }
        .detail-header-actions {
            display: flex; gap: 0.5rem;
            position: relative; z-index: 1;
            flex-wrap: wrap;
        }

        /* Status / Action Buttons */
        .btn-status {
            display: inline-flex; align-items: center; gap: 0.375rem;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-md);
            font-family: var(--font-primary);
            font-size: 0.813rem; font-weight: 600;
            cursor: pointer;
            transition: all 200ms ease;
            border: none;
        }
        .btn-status i { width: 16px; height: 16px; }
        .btn-status.accept {
            background: var(--color-secondary);
            color: white;
            box-shadow: 0 2px 8px rgba(102,153,51,0.3);
        }
        .btn-status.accept:hover { background: var(--color-secondary-light); transform: translateY(-1px); }
        .btn-status.verify {
            background: #3498db;
            color: white;
            box-shadow: 0 2px 8px rgba(52,152,219,0.3);
        }
        .btn-status.verify:hover { background: #2980b9; transform: translateY(-1px); }
        .btn-status.reject {
            background: rgba(231,76,60,0.1);
            color: #e74c3c;
        }
        .btn-status.reject:hover { background: rgba(231,76,60,0.2); }
        .btn-status.reset {
            background: rgba(255,255,255,0.15);
            color: white;
        }
        .btn-status.reset:hover { background: rgba(255,255,255,0.25); }
        .btn-status.delete {
            background: #e74c3c;
            color: white;
            box-shadow: 0 2px 8px rgba(231,76,60,0.3);
        }
        .btn-status.delete:hover { background: #c0392b; transform: translateY(-1px); }

        /* Status bar */
        .status-bar {
            padding: 1rem 2rem;
            display: flex; align-items: center; gap: 0.75rem;
            border-bottom: 1px solid var(--color-border);
        }
        .status-bar-label {
            font-size: 0.813rem; font-weight: 500; color: var(--color-text-muted);
        }
        .badge {
            display: inline-flex; align-items: center; gap: 0.25rem;
            padding: 0.375rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.03em;
        }
        .badge i { width: 14px; height: 14px; }
        .badge.pending { background: rgba(240,192,64,0.12); color: #b8860b; }
        .badge.verified { background: rgba(52,152,219,0.1); color: #2980b9; }
        .badge.accepted { background: rgba(102,153,51,0.1); color: var(--color-secondary-dark); }
        .badge.rejected { background: rgba(231,76,60,0.08); color: #c0392b; }

        .detail-date {
            margin-left: auto;
            font-size: 0.75rem; color: var(--color-text-disabled);
            display: flex; align-items: center; gap: 0.375rem;
        }
        .detail-date i { width: 14px; height: 14px; }

        /* Detail Cards */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        .detail-card {
            background: var(--color-surface-white);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }
        .detail-card.full { grid-column: 1 / -1; }
        .detail-card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--color-border);
            background: var(--color-surface);
            display: flex; align-items: center; gap: 0.5rem;
        }
        .detail-card-header i { width: 18px; height: 18px; color: var(--color-primary); }
        .detail-card-header h3 {
            font-size: 0.875rem; font-weight: 700; color: var(--color-text);
        }
        .detail-card-body {
            padding: 1.5rem;
        }
        .field-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }
        .field { display: flex; flex-direction: column; gap: 2px; }
        .field.full { grid-column: 1 / -1; }
        .field-label {
            font-size: 0.688rem; font-weight: 600;
            color: var(--color-text-muted);
            text-transform: uppercase; letter-spacing: 0.08em;
        }
        .field-value {
            font-size: 0.938rem; font-weight: 600; color: var(--color-text);
        }

        /* Document Links */
        .doc-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }
        .doc-item {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.875rem 1rem;
            background: var(--color-surface);
            border-radius: var(--radius-md);
            border: 1px solid var(--color-border);
            transition: all 150ms ease;
        }
        .doc-item:hover {
            border-color: var(--color-primary);
            background: rgba(33,33,97,0.02);
        }
        .doc-icon {
            width: 40px; height: 40px;
            border-radius: var(--radius-md);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .doc-icon i { width: 20px; height: 20px; }
        .doc-icon.photo { background: rgba(102,153,51,0.1); color: var(--color-secondary); }
        .doc-icon.doc { background: rgba(33,33,97,0.06); color: var(--color-primary); }
        .doc-info { flex: 1; min-width: 0; }
        .doc-name { font-size: 0.813rem; font-weight: 600; color: var(--color-text); }
        .doc-status { font-size: 0.688rem; color: var(--color-secondary); display: flex; align-items: center; gap: 0.25rem; }
        .doc-status i { width: 12px; height: 12px; }
        .doc-status.missing { color: #e74c3c; }
        .doc-link {
            display: flex; align-items: center; justify-content: center;
            width: 32px; height: 32px;
            border-radius: var(--radius-sm);
            background: rgba(33,33,97,0.06);
            color: var(--color-primary);
            text-decoration: none;
            transition: background 150ms;
        }
        .doc-link:hover { background: rgba(33,33,97,0.12); }
        .doc-link i { width: 16px; height: 16px; }

        /* Toast */
        .toast {
            position: fixed; top: 1.5rem; right: 1.5rem;
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
        @keyframes toastOut { from { opacity: 1; } to { opacity: 0; } }

        @media (max-width: 768px) {
            .page { padding: 1rem; }
            .detail-grid { grid-template-columns: 1fr; }
            .field-grid { grid-template-columns: 1fr; }
            .doc-grid { grid-template-columns: 1fr; }
            .detail-header-top { padding: 1.5rem; }
            .detail-header-info h1 { font-size: 1.25rem; }
            .detail-header-actions { width: 100%; }
            .detail-header-actions form,
            .detail-header-actions .btn-status { flex: 1; }
            .btn-status { justify-content: center; font-size: 0.75rem; padding: 0.5rem 0.75rem; }
        }
    </style>
</head>
<body>
    {{-- Top Nav --}}
    <nav class="top-nav">
        <a href="{{ route('admin.dashboard') }}" class="top-nav-brand">
            <div class="top-nav-logo">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            </div>
            <span class="top-nav-text">TK/PAUD Azzahra</span>
        </a>
        <div class="top-nav-actions">
            <a href="{{ route('admin.dashboard') }}" class="nav-btn ghost">
                <i data-lucide="arrow-left"></i> Dashboard
            </a>
        </div>
    </nav>

    <div class="page">
        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <i data-lucide="chevron-right"></i>
            <span>{{ $registration->registration_number }}</span>
        </div>

        {{-- Header Card --}}
        <div class="detail-header">
            <div class="detail-header-top">
                <div class="detail-header-info">
                    <h1>{{ $registration->nama_lengkap }}</h1>
                    <div class="detail-header-reg">{{ $registration->registration_number }}</div>
                </div>
                <div class="detail-header-actions">
                    @if($registration->status !== 'verified')
                        <form action="{{ route('admin.updateStatus', $registration) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="verified">
                            <button type="submit" class="btn-status verify"
                                    onclick="return confirm('Verifikasi pendaftaran ini?')">
                                <i data-lucide="shield-check"></i> Verifikasi
                            </button>
                        </form>
                    @endif
                    @if($registration->status !== 'accepted')
                        <form action="{{ route('admin.updateStatus', $registration) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="btn-status accept"
                                    onclick="return confirm('Terima pendaftaran ini?')">
                                <i data-lucide="check-circle"></i> Terima
                            </button>
                        </form>
                    @endif
                    @if($registration->status !== 'rejected')
                        <form action="{{ route('admin.updateStatus', $registration) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn-status reject"
                                    onclick="return confirm('Tolak pendaftaran ini?')">
                                <i data-lucide="x-circle"></i> Tolak
                            </button>
                        </form>
                    @endif
                    @if($registration->status !== 'pending')
                        <form action="{{ route('admin.updateStatus', $registration) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="pending">
                            <button type="submit" class="btn-status reset"
                                    onclick="return confirm('Reset status ke Menunggu?')">
                                <i data-lucide="rotate-ccw"></i> Reset
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="status-bar">
                <span class="status-bar-label">Status Saat Ini:</span>
                @php
                    $statusMap = [
                        'pending'  => ['label' => 'Menunggu Verifikasi', 'icon' => 'clock'],
                        'verified' => ['label' => 'Terverifikasi', 'icon' => 'shield-check'],
                        'accepted' => ['label' => 'Diterima', 'icon' => 'check-circle'],
                        'rejected' => ['label' => 'Ditolak', 'icon' => 'x-circle'],
                    ];
                    $sm = $statusMap[$registration->status];
                @endphp
                <span class="badge {{ $registration->status }}">
                    <i data-lucide="{{ $sm['icon'] }}"></i>
                    {{ $sm['label'] }}
                </span>
                <span class="detail-date">
                    <i data-lucide="calendar"></i>
                    Terdaftar: {{ $registration->created_at->translatedFormat('d F Y, H:i') }}
                </span>
            </div>
        </div>

        {{-- Detail Grid --}}
        <div class="detail-grid">
            {{-- Data Siswa --}}
            <div class="detail-card">
                <div class="detail-card-header">
                    <i data-lucide="user"></i>
                    <h3>Data Calon Siswa</h3>
                </div>
                <div class="detail-card-body">
                    <div class="field-grid">
                        <div class="field">
                            <span class="field-label">Nama Lengkap</span>
                            <span class="field-value">{{ $registration->nama_lengkap }}</span>
                        </div>
                        <div class="field">
                            <span class="field-label">Tanggal Lahir</span>
                            <span class="field-value">{{ $registration->tanggal_lahir->translatedFormat('d F Y') }}</span>
                        </div>
                        <div class="field">
                            <span class="field-label">Jenis Kelamin</span>
                            <span class="field-value">{{ $registration->jenis_kelamin }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Orang Tua --}}
            <div class="detail-card">
                <div class="detail-card-header">
                    <i data-lucide="users"></i>
                    <h3>Data Orang Tua</h3>
                </div>
                <div class="detail-card-body">
                    <div class="field-grid">
                        <div class="field">
                            <span class="field-label">Nama Ayah</span>
                            <span class="field-value">{{ $registration->nama_ayah }}</span>
                        </div>
                        <div class="field">
                            <span class="field-label">No. HP Ayah</span>
                            <span class="field-value">{{ $registration->hp_ayah }}</span>
                        </div>
                        <div class="field">
                            <span class="field-label">Nama Ibu</span>
                            <span class="field-value">{{ $registration->nama_ibu }}</span>
                        </div>
                        <div class="field">
                            <span class="field-label">No. HP Ibu</span>
                            <span class="field-value">{{ $registration->hp_ibu }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Alamat --}}
            <div class="detail-card full">
                <div class="detail-card-header">
                    <i data-lucide="map-pin"></i>
                    <h3>Alamat</h3>
                </div>
                <div class="detail-card-body">
                    <div class="field">
                        <span class="field-label">Alamat Lengkap</span>
                        <span class="field-value">{{ $registration->alamat }}</span>
                    </div>
                </div>
            </div>

            {{-- Dokumen --}}
            <div class="detail-card full">
                <div class="detail-card-header">
                    <i data-lucide="paperclip"></i>
                    <h3>Dokumen</h3>
                </div>
                <div class="detail-card-body">
                    <div class="doc-grid">
                        @php
                            $docs = [
                                ['field' => 'foto_anak', 'label' => 'Pas Foto Anak', 'type' => 'photo'],
                                ['field' => 'akta_kelahiran', 'label' => 'Akta Kelahiran', 'type' => 'doc'],
                                ['field' => 'kartu_keluarga', 'label' => 'Kartu Keluarga', 'type' => 'doc'],
                                ['field' => 'ktp_ortu', 'label' => 'KTP Orang Tua', 'type' => 'doc'],
                            ];
                        @endphp

                        @foreach($docs as $doc)
                            <div class="doc-item">
                                <div class="doc-icon {{ $doc['type'] }}">
                                    <i data-lucide="{{ $doc['type'] === 'photo' ? 'camera' : 'file-text' }}"></i>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-name">{{ $doc['label'] }}</div>
                                    @if($registration->{$doc['field']})
                                        <div class="doc-status">
                                            <i data-lucide="check-circle"></i> Diunggah
                                        </div>
                                    @else
                                        <div class="doc-status missing">
                                            <i data-lucide="alert-circle"></i> Belum diunggah
                                        </div>
                                    @endif
                                </div>
                                @if($registration->{$doc['field']})
                                    <a href="{{ asset('storage/' . $registration->{$doc['field']}) }}"
                                       target="_blank" class="doc-link" title="Lihat dokumen">
                                        <i data-lucide="external-link"></i>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Danger Zone --}}
        <div style="margin-top: 2rem; padding: 1.5rem; border: 1px solid rgba(231,76,60,0.2); border-radius: var(--radius-lg); background: rgba(231,76,60,0.02);">
            <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1rem;">
                <div>
                    <h4 style="font-size: 0.875rem; font-weight: 700; color: #c0392b; margin-bottom: 0.25rem;">Zona Berbahaya</h4>
                    <p style="font-size: 0.75rem; color: var(--color-text-muted);">Tindakan ini tidak dapat dibatalkan. Semua data dan dokumen akan dihapus permanen.</p>
                </div>
                <form action="{{ route('admin.destroy', $registration) }}" method="POST"
                      onsubmit="return confirm('PERINGATAN: Anda yakin ingin menghapus pendaftaran {{ $registration->nama_lengkap }} ({{ $registration->registration_number }})? Tindakan ini tidak dapat dibatalkan!')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-status delete">
                        <i data-lucide="trash-2"></i> Hapus Pendaftaran
                    </button>
                </form>
            </div>
        </div>
    </div>

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
            const toast = document.getElementById('toast');
            if (toast) setTimeout(() => toast.remove(), 4000);
        });
    </script>
</body>
</html>
