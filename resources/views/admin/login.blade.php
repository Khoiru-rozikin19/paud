<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — TK/PAUD Azzahra</title>
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
            --font-primary: 'Inter', -apple-system, sans-serif;
            --font-display: 'Playfair Display', Georgia, serif;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --radius-full: 50%;
            --shadow-lg: rgba(0,0,0,0.06) 0px 1px 6px 0px, rgba(0,0,0,0.16) 0px 2px 32px 0px;
        }
        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: var(--font-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-surface-dark) 0%, var(--color-primary) 50%, #2a3a60 100%);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            -webkit-font-smoothing: antialiased;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background:
                radial-gradient(ellipse at 30% 20%, rgba(102,153,51,0.12) 0%, transparent 50%),
                radial-gradient(ellipse at 70% 80%, rgba(240,192,64,0.08) 0%, transparent 50%);
            pointer-events: none;
        }
        .login-card {
            position: relative;
            z-index: 1;
            background: var(--color-surface-white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            animation: cardIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes cardIn {
            from { opacity: 0; transform: translateY(30px) scale(0.97); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .login-header {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
            padding: 2.5rem 2rem 2rem;
            text-align: center;
            position: relative;
        }
        .login-header::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, var(--color-secondary), var(--color-accent));
        }
        .login-logo {
            width: 60px; height: 60px;
            border-radius: var(--radius-full);
            background: linear-gradient(135deg, var(--color-secondary), var(--color-accent));
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            font-family: var(--font-display);
            font-size: 1.5rem; font-weight: 900; color: white;
            box-shadow: 0 4px 15px rgba(102,153,51,0.3);
        }
        .login-header h1 {
            font-family: var(--font-display);
            font-size: 1.25rem; font-weight: 800; color: white;
            margin-bottom: 0.25rem;
        }
        .login-header p {
            font-size: 0.813rem; color: rgba(255,255,255,0.7);
        }
        .login-body {
            padding: 2rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            font-size: 0.813rem; font-weight: 600; color: var(--color-text);
            margin-bottom: 0.5rem;
        }
        .input-wrapper {
            position: relative;
        }
        .input-wrapper i {
            position: absolute;
            left: 14px; top: 50%; transform: translateY(-50%);
            width: 18px; height: 18px; color: var(--color-text-muted);
            pointer-events: none;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem 0.875rem 0.75rem 2.75rem;
            border: 2px solid var(--color-border);
            border-radius: var(--radius-md);
            font-family: var(--font-primary);
            font-size: 0.938rem;
            color: var(--color-text);
            transition: all 150ms ease;
            outline: none;
        }
        .form-input:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(33,33,97,0.1);
        }
        .error-alert {
            background: rgba(231,76,60,0.06);
            border: 1px solid rgba(231,76,60,0.2);
            border-radius: var(--radius-md);
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
            display: flex; align-items: center; gap: 0.5rem;
            font-size: 0.813rem; color: #c0392b;
        }
        .error-alert i { width: 16px; height: 16px; flex-shrink: 0; }
        .btn-login {
            width: 100%;
            padding: 0.875rem;
            border: none;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
            color: white;
            font-family: var(--font-primary);
            font-size: 0.938rem; font-weight: 600;
            cursor: pointer;
            transition: all 250ms ease;
            display: flex; align-items: center; justify-content: center; gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(33,33,97,0.25);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(33,33,97,0.35);
        }
        .btn-login:active {
            transform: translateY(0);
        }
        .btn-login i { width: 18px; height: 18px; }
        .back-link {
            display: flex; align-items: center; justify-content: center; gap: 0.375rem;
            margin-top: 1.5rem;
            font-size: 0.813rem; color: var(--color-text-muted);
            text-decoration: none;
            transition: color 150ms ease;
        }
        .back-link:hover { color: var(--color-primary); }
        .back-link i { width: 14px; height: 14px; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">A</div>
            <h1>Panel Admin</h1>
            <p>TK/PAUD Azzahra — Penerimaan Siswa Baru</p>
        </div>
        <div class="login-body">
            @if ($errors->has('login'))
                <div class="error-alert">
                    <i data-lucide="alert-circle"></i>
                    {{ $errors->first('login') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <div class="input-wrapper">
                        <i data-lucide="user"></i>
                        <input type="text" class="form-input" id="username" name="username"
                               placeholder="Masukkan username" value="{{ old('username') }}" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrapper">
                        <i data-lucide="lock"></i>
                        <input type="password" class="form-input" id="password" name="password"
                               placeholder="Masukkan password" required>
                    </div>
                </div>
                <button type="submit" class="btn-login">
                    <i data-lucide="log-in"></i>
                    Masuk
                </button>
            </form>
            <a href="{{ route('home') }}" class="back-link">
                <i data-lucide="arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => lucide.createIcons());
    </script>
</body>
</html>
