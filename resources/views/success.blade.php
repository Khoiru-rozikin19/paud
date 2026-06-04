<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pendaftaran berhasil — TK/PAUD Azzahra">
    <title>Pendaftaran Berhasil — TK/PAUD Azzahra</title>

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
            --color-accent: #f0c040;
            --color-text: #212529;
            --color-text-light: #ffffff;
            --color-text-muted: #585858;
            --color-surface: #f8f9fa;
            --color-surface-white: #ffffff;
            --color-surface-dark: #0a0a2e;
            --color-border: #e9ecef;
            --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: 'Playfair Display', Georgia, serif;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --radius-full: 50%;
            --shadow-lg: rgba(0,0,0,0.06) 0px 1px 6px 0px, rgba(0,0,0,0.16) 0px 2px 32px 0px;
        }

        *, *::before, *::after {
            margin: 0; padding: 0; box-sizing: border-box;
        }

        html { font-size: 16px; }

        body {
            font-family: var(--font-primary);
            color: var(--color-text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-surface-dark) 0%, var(--color-primary) 40%, var(--color-primary-light) 70%, #3a5a20 100%);
            padding: 2rem 1rem;
            position: relative;
            -webkit-font-smoothing: antialiased;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background:
                radial-gradient(ellipse at 20% 50%, rgba(102,153,51,0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(240,192,64,0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Floating decorations */
        .decoration {
            position: absolute;
            border-radius: var(--radius-full);
            opacity: 0.06;
            animation: floatDeco 8s ease-in-out infinite;
        }
        .decoration:nth-child(1) { width: 350px; height: 350px; background: var(--color-secondary); top: -80px; right: -80px; }
        .decoration:nth-child(2) { width: 250px; height: 250px; background: var(--color-accent); bottom: -60px; left: -60px; animation-delay: 3s; }
        .decoration:nth-child(3) { width: 180px; height: 180px; background: white; top: 40%; left: 15%; animation-delay: 5s; }

        @keyframes floatDeco {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(3deg); }
        }

        .success-card {
            position: relative;
            z-index: 1;
            background: var(--color-surface-white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            max-width: 580px;
            width: 100%;
            overflow: hidden;
            animation: cardAppear 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 2rem 0; /* Auto vertical centering with padding limit */
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: translateY(40px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .success-header {
            background: linear-gradient(135deg, var(--color-secondary), var(--color-secondary-light));
            padding: 3rem 2.5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .success-header::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 50% 120%, rgba(255,255,255,0.15) 0%, transparent 60%);
        }

        .success-icon {
            width: 80px;
            height: 80px;
            border-radius: var(--radius-full);
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: iconPop 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.3s both;
            border: 3px solid rgba(255,255,255,0.3);
        }

        @keyframes iconPop {
            from { opacity: 0; transform: scale(0); }
            to { opacity: 1; transform: scale(1); }
        }

        .success-icon i {
            width: 40px;
            height: 40px;
            color: white;
        }

        .success-header h1 {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 800;
            color: white;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .success-header p {
            color: rgba(255,255,255,0.85);
            font-size: 0.938rem;
            position: relative;
        }

        .success-body {
            padding: 2rem 2.5rem 2.5rem;
        }

        .reg-number-card {
            background: linear-gradient(135deg, rgba(33,33,97,0.04), rgba(102,153,51,0.04));
            border: 2px dashed var(--color-border);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .reg-number-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--color-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }

        .reg-number-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--color-primary);
            letter-spacing: 0.05em;
            font-family: 'Courier New', monospace;
        }

        .reg-number-hint {
            font-size: 0.75rem;
            color: var(--color-text-muted);
            margin-top: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
        }

        .reg-number-hint i {
            width: 14px;
            height: 14px;
            color: var(--color-accent);
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem 2rem;
            margin-bottom: 2rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .detail-item.full {
            grid-column: 1 / -1;
        }

        .detail-label {
            font-size: 0.688rem;
            font-weight: 600;
            color: var(--color-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .detail-value {
            font-size: 0.938rem;
            font-weight: 600;
            color: var(--color-text);
        }

        .divider {
            height: 1px;
            background: var(--color-border);
            margin: 1.5rem 0;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.375rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-badge.pending {
            background: rgba(240, 192, 64, 0.12);
            color: #b8860b;
        }

        .status-badge i {
            width: 14px;
            height: 14px;
        }

        .actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .btn {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.875rem 1.5rem;
            border-radius: var(--radius-md);
            font-family: var(--font-primary);
            font-size: 0.938rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            border: none;
            text-decoration: none;
        }

        .btn i { width: 18px; height: 18px; }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
            color: white;
            box-shadow: 0 4px 15px rgba(33, 33, 97, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(33, 33, 97, 0.35);
        }

        .btn-outline {
            background: transparent;
            color: var(--color-text-muted);
            border: 2px solid var(--color-border);
        }

        .btn-outline:hover {
            border-color: var(--color-text-muted);
            color: var(--color-text);
        }

        .note {
            margin-top: 1.5rem;
            padding: 1rem;
            background: rgba(33,33,97,0.03);
            border-radius: var(--radius-md);
            border-left: 3px solid var(--color-primary);
        }

        .note p {
            font-size: 0.813rem;
            color: var(--color-text-muted);
            line-height: 1.6;
        }

        .note p strong {
            color: var(--color-text);
        }

        /* Confetti effect (optimized with GPU-accelerated transform transitions) */
        .confetti-piece {
            position: fixed;
            width: 10px;
            height: 10px;
            top: -20px;
            opacity: 0;
            animation: confettiFall 3s linear forwards;
            z-index: 10;
            will-change: transform, opacity;
        }

        @keyframes confettiFall {
            0% { 
                opacity: 1; 
                transform: translateY(0) rotate(0deg) translateX(0); 
            }
            100% { 
                opacity: 0; 
                transform: translateY(110vh) rotate(720deg) translateX(100px); 
            }
        }

        @media (max-width: 640px) {
            .success-body { padding: 1.5rem; }
            .success-header { padding: 2rem 1.5rem 1.5rem; }
            .detail-grid { grid-template-columns: 1fr; }
            .actions { flex-direction: column; }
            .reg-number-value { font-size: 1.375rem; }
        }
    </style>
</head>
<body>
    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>

    <div class="success-card">
        <div class="success-header">
            <div class="success-icon">
                <i data-lucide="check"></i>
            </div>
            <h1>Pendaftaran Berhasil!</h1>
            <p>Data pendaftaran Anda telah kami terima dengan baik.</p>
        </div>

        <div class="success-body">
            <div class="reg-number-card">
                <div class="reg-number-label">Nomor Pendaftaran</div>
                <div class="reg-number-value">{{ $registration->registration_number }}</div>
                <div class="reg-number-hint">
                    <i data-lucide="alert-triangle"></i>
                    Simpan nomor ini sebagai bukti pendaftaran
                </div>
            </div>

            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Nama Lengkap</span>
                    <span class="detail-value">{{ $registration->nama_lengkap }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Tanggal Lahir</span>
                    <span class="detail-value">{{ $registration->tanggal_lahir->translatedFormat('d F Y') }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Jenis Kelamin</span>
                    <span class="detail-value">{{ $registration->jenis_kelamin }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Status</span>
                    <span class="status-badge pending">
                        <i data-lucide="clock"></i>
                        Menunggu Verifikasi
                    </span>
                </div>
            </div>

            <div class="divider"></div>

            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Nama Ayah</span>
                    <span class="detail-value">{{ $registration->nama_ayah }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">HP Ayah</span>
                    <span class="detail-value">{{ $registration->hp_ayah }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Nama Ibu</span>
                    <span class="detail-value">{{ $registration->nama_ibu }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">HP Ibu</span>
                    <span class="detail-value">{{ $registration->hp_ibu }}</span>
                </div>
                <div class="detail-item full">
                    <span class="detail-label">Alamat</span>
                    <span class="detail-value">{{ $registration->alamat }}</span>
                </div>
            </div>

            <div class="note">
                <p>
                    <strong>Langkah selanjutnya:</strong> Tim kami akan memverifikasi data dan dokumen yang Anda kirimkan.
                    Anda akan dihubungi melalui WhatsApp/telepon untuk konfirmasi penerimaan.
                    Pastikan nomor HP yang Anda daftarkan aktif.
                </p>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-outline" onclick="window.print()">
                    <i data-lucide="printer"></i>
                    Cetak
                </button>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i data-lucide="home"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
            createConfetti();
        });

        function createConfetti() {
            const colors = ['#669933', '#212161', '#f0c040', '#7ab842', '#e74c3c', '#3498db'];
            const shapes = ['circle', 'square'];

            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti-piece';
                const color = colors[Math.floor(Math.random() * colors.length)];
                const shape = shapes[Math.floor(Math.random() * shapes.length)];

                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.background = color;
                confetti.style.animationDelay = Math.random() * 2 + 's';
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';

                if (shape === 'circle') {
                    confetti.style.borderRadius = '50%';
                } else {
                    confetti.style.borderRadius = '2px';
                    confetti.style.width = (Math.random() * 8 + 6) + 'px';
                    confetti.style.height = (Math.random() * 8 + 6) + 'px';
                }

                document.body.appendChild(confetti);

                setTimeout(() => confetti.remove(), 5000);
            }
        }
    </script>
</body>
</html>
