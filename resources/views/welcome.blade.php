<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Penerimaan Siswa Baru TK/PAUD Azzahra Tahun Ajaran 2026/2027. Daftarkan putra-putri Anda sekarang!">
    <title>PSB TK/PAUD Azzahra — Penerimaan Siswa Baru 2026/2027</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">

    {{-- Flatpickr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/flatpickr.min.css">

    {{-- Lucide Icons CDN --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        /* ============================================
           DESIGN TOKENS (from DESIGN.MD)
           ============================================ */
        :root {
            /* Colors */
            --color-primary: #212161;
            --color-primary-light: #2d2d8a;
            --color-primary-dark: #1a1a4e;
            --color-secondary: #669933;
            --color-secondary-light: #7ab842;
            --color-secondary-dark: #527a29;
            --color-accent: #f0c040;
            --color-accent-light: #f5d76e;

            --color-text: #212529;
            --color-text-light: #ffffff;
            --color-text-muted: #585858;
            --color-text-disabled: #828282;

            --color-surface: #f8f9fa;
            --color-surface-white: #ffffff;
            --color-surface-dark: #0a0a2e;
            --color-border: #e9ecef;

            /* Typography */
            --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-display: 'Playfair Display', Georgia, serif;

            --text-xs: 0.75rem;
            --text-sm: 0.8125rem;
            --text-base: 1rem;
            --text-md: 0.929rem;
            --text-lg: 1.125rem;
            --text-xl: 1.25rem;
            --text-2xl: 1.5rem;
            --text-3xl: 1.875rem;
            --text-4xl: 2.25rem;
            --text-5xl: 3rem;
            --text-6xl: 3.75rem;

            /* Spacing */
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-5: 1.25rem;
            --space-6: 1.5rem;
            --space-7: 2rem;
            --space-8: 2.5rem;
            --space-9: 3rem;
            --space-10: 4rem;
            --space-11: 5rem;
            --space-12: 6rem;

            /* Radius */
            --radius-xs: 0.2rem;
            --radius-sm: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --radius-full: 50%;

            /* Shadows */
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
            --shadow-lg: rgba(0,0,0,0.06) 0px 1px 6px 0px, rgba(0,0,0,0.16) 0px 2px 32px 0px;
            --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
            --shadow-glow: 0 0 40px rgba(33,33,97,0.15);

            /* Transitions */
            --transition-fast: 150ms ease;
            --transition-base: 250ms ease;
            --transition-slow: 400ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ============================================
           RESET & BASE
           ============================================ */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: var(--font-primary);
            color: var(--color-text);
            background: var(--color-surface);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* Focus styles for accessibility */
        :focus-visible {
            outline: 3px solid var(--color-secondary);
            outline-offset: 2px;
            border-radius: var(--radius-xs);
        }

        /* ============================================
           NAVBAR
           ============================================ */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: var(--space-4) var(--space-7);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all var(--transition-base);
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(10, 10, 46, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: var(--shadow-lg);
            padding: var(--space-3) var(--space-7);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: var(--space-3);
        }

        .navbar-logo {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-full);
            background: linear-gradient(135deg, var(--color-secondary), var(--color-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: var(--text-xl);
            font-weight: 900;
            color: var(--color-text-light);
            transition: transform var(--transition-base);
            box-shadow: 0 4px 15px rgba(102, 153, 51, 0.3);
        }

        .navbar-logo:hover {
            transform: scale(1.05);
        }

        .navbar-title {
            color: var(--color-text-light);
        }

        .navbar-title h1 {
            font-size: var(--text-lg);
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .navbar-title span {
            font-size: var(--text-xs);
            font-weight: 400;
            opacity: 0.8;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: var(--space-6);
            list-style: none;
        }

        .navbar-links a {
            color: var(--color-text-light);
            font-size: var(--text-sm);
            font-weight: 500;
            opacity: 0.85;
            transition: opacity var(--transition-fast);
            position: relative;
        }

        .navbar-links a:hover {
            opacity: 1;
        }

        .navbar-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-secondary);
            transition: width var(--transition-base);
            border-radius: 1px;
        }

        .navbar-links a:hover::after {
            width: 100%;
        }

        .btn-nav-cta {
            background: var(--color-secondary);
            color: var(--color-text-light) !important;
            padding: var(--space-2) var(--space-5);
            border-radius: var(--radius-md);
            font-weight: 600;
            opacity: 1 !important;
            transition: all var(--transition-base);
            box-shadow: 0 2px 10px rgba(102, 153, 51, 0.3);
        }

        .btn-nav-cta:hover {
            background: var(--color-secondary-light);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(102, 153, 51, 0.4);
        }

        .btn-nav-cta::after {
            display: none !important;
        }

        .mobile-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: var(--space-2);
            background: none;
            border: none;
        }

        .mobile-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--color-text-light);
            border-radius: 2px;
            transition: all var(--transition-base);
        }

        /* ============================================
           HERO SECTION
           ============================================ */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-surface-dark) 0%, var(--color-primary) 40%, var(--color-primary-light) 70%, var(--color-secondary-dark) 100%);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(ellipse at 20% 50%, rgba(102, 153, 51, 0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(240, 192, 64, 0.1) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 100%, rgba(33, 33, 97, 0.3) 0%, transparent 50%);
        }

        /* Floating decorative elements */
        .hero-decoration {
            position: absolute;
            border-radius: var(--radius-full);
            opacity: 0.08;
            animation: float 6s ease-in-out infinite;
        }

        .hero-decoration:nth-child(1) {
            width: 400px;
            height: 400px;
            background: var(--color-secondary);
            top: -100px;
            right: -100px;
            animation-delay: 0s;
        }

        .hero-decoration:nth-child(2) {
            width: 300px;
            height: 300px;
            background: var(--color-accent);
            bottom: -50px;
            left: -80px;
            animation-delay: 2s;
        }

        .hero-decoration:nth-child(3) {
            width: 200px;
            height: 200px;
            background: var(--color-text-light);
            top: 30%;
            right: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: var(--space-10) var(--space-7);
            max-width: 800px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.15);
            padding: var(--space-2) var(--space-5);
            border-radius: var(--radius-xl);
            color: var(--color-accent-light);
            font-size: var(--text-sm);
            font-weight: 600;
            margin-bottom: var(--space-7);
            animation: slideDown 0.8s ease-out;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .hero-badge i {
            width: 16px;
            height: 16px;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-title {
            font-family: var(--font-display);
            font-size: var(--text-6xl);
            font-weight: 900;
            color: var(--color-text-light);
            line-height: 1.1;
            margin-bottom: var(--space-6);
            animation: slideUp 0.8s ease-out 0.2s both;
            letter-spacing: -0.02em;
        }

        .hero-title .highlight {
            background: linear-gradient(135deg, var(--color-secondary-light), var(--color-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-subtitle {
            font-size: var(--text-xl);
            color: rgba(255,255,255,0.8);
            margin-bottom: var(--space-9);
            animation: slideUp 0.8s ease-out 0.4s both;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-5);
            animation: slideUp 0.8s ease-out 0.6s both;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-4) var(--space-8);
            border-radius: var(--radius-md);
            font-family: var(--font-primary);
            font-size: var(--text-base);
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-base);
            border: none;
            letter-spacing: -0.01em;
        }

        .btn i {
            width: 20px;
            height: 20px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-secondary), var(--color-secondary-light));
            color: var(--color-text-light);
            box-shadow: 0 4px 20px rgba(102, 153, 51, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(102, 153, 51, 0.5);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-outline {
            background: transparent;
            color: var(--color-text-light);
            border: 2px solid rgba(255,255,255,0.3);
        }

        .btn-outline:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.5);
            transform: translateY(-2px);
        }

        .btn-lg {
            padding: var(--space-5) var(--space-9);
            font-size: var(--text-lg);
        }

        .hero-scroll-indicator {
            position: absolute;
            bottom: var(--space-9);
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            animation: bounce 2s infinite;
        }

        .hero-scroll-indicator i {
            color: rgba(255,255,255,0.5);
            width: 28px;
            height: 28px;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
            40% { transform: translateX(-50%) translateY(-10px); }
            60% { transform: translateX(-50%) translateY(-5px); }
        }

        /* ============================================
           SECTION COMMON
           ============================================ */
        .section {
            padding: var(--space-12) var(--space-7);
        }

        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto var(--space-10);
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            color: var(--color-secondary);
            font-size: var(--text-sm);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: var(--space-4);
        }

        .section-title {
            font-family: var(--font-display);
            font-size: var(--text-4xl);
            font-weight: 800;
            color: var(--color-primary);
            line-height: 1.2;
            margin-bottom: var(--space-4);
            letter-spacing: -0.02em;
        }

        .section-desc {
            font-size: var(--text-lg);
            color: var(--color-text-muted);
            line-height: 1.7;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ============================================
           INFO SECTION
           ============================================ */
        .info-section {
            background: var(--color-surface-white);
            position: relative;
        }

        .info-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--color-primary), var(--color-secondary), var(--color-accent));
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-7);
        }

        .info-card {
            background: var(--color-surface-white);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: var(--space-8);
            transition: all var(--transition-slow);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
            transform: scaleX(0);
            transition: transform var(--transition-slow);
            transform-origin: left;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: transparent;
        }

        .info-card:hover::before {
            transform: scaleX(1);
        }

        .info-card-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--space-5);
            transition: transform var(--transition-base);
        }

        .info-card:hover .info-card-icon {
            transform: scale(1.1);
        }

        .info-card-icon.green {
            background: linear-gradient(135deg, rgba(102,153,51,0.1), rgba(102,153,51,0.05));
            color: var(--color-secondary);
        }

        .info-card-icon.blue {
            background: linear-gradient(135deg, rgba(33,33,97,0.1), rgba(33,33,97,0.05));
            color: var(--color-primary);
        }

        .info-card-icon.gold {
            background: linear-gradient(135deg, rgba(240,192,64,0.15), rgba(240,192,64,0.05));
            color: #b8860b;
        }

        .info-card-icon i {
            width: 28px;
            height: 28px;
        }

        .info-card h3 {
            font-size: var(--text-xl);
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: var(--space-3);
        }

        .info-card p {
            color: var(--color-text-muted);
            line-height: 1.7;
            font-size: var(--text-md);
        }

        /* ============================================
           REQUIREMENTS SECTION
           ============================================ */
        .requirements-section {
            background: linear-gradient(180deg, var(--color-surface) 0%, rgba(33,33,97,0.03) 100%);
        }

        .requirements-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-10);
            align-items: start;
        }

        .requirements-list {
            list-style: none;
        }

        .requirements-list li {
            display: flex;
            align-items: flex-start;
            gap: var(--space-4);
            padding: var(--space-5) 0;
            border-bottom: 1px solid var(--color-border);
        }

        .requirements-list li:last-child {
            border-bottom: none;
        }

        .req-icon {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border-radius: var(--radius-full);
            background: linear-gradient(135deg, var(--color-secondary), var(--color-secondary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-top: 2px;
        }

        .req-icon i {
            width: 18px;
            height: 18px;
        }

        .req-text h4 {
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: var(--space-1);
        }

        .req-text p {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            line-height: 1.6;
        }

        .timeline {
            position: relative;
            padding-left: var(--space-9);
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 18px;
            bottom: 0;
            width: 2px;
            background: linear-gradient(180deg, var(--color-primary), var(--color-secondary));
        }

        .timeline-item {
            position: relative;
            padding-bottom: var(--space-8);
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: calc(-1 * var(--space-9) + 8px);
            top: 4px;
            width: 22px;
            height: 22px;
            border-radius: var(--radius-full);
            background: var(--color-surface-white);
            border: 3px solid var(--color-primary);
            z-index: 1;
        }

        .timeline-item:first-child .timeline-dot {
            border-color: var(--color-secondary);
            background: var(--color-secondary);
            box-shadow: 0 0 0 4px rgba(102, 153, 51, 0.2);
        }

        .timeline-content h4 {
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: var(--space-2);
            font-size: var(--text-base);
        }

        .timeline-content p {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            line-height: 1.6;
        }

        /* ============================================
           FORM SECTION
           ============================================ */
        .form-section {
            background: linear-gradient(180deg, rgba(33,33,97,0.03) 0%, var(--color-surface) 50%, var(--color-surface-white) 100%);
        }

        .form-wrapper {
            max-width: 800px;
            margin: 0 auto;
            background: var(--color-surface-white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            border: 1px solid var(--color-border);
        }

        /* Step Indicator */
        .step-indicator {
            display: flex;
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
            padding: var(--space-7) var(--space-8);
            position: relative;
            overflow: hidden;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 10% 50%, rgba(102,153,51,0.15) 0%, transparent 50%),
                radial-gradient(circle at 90% 50%, rgba(240,192,64,0.1) 0%, transparent 50%);
        }

        .step {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-full);
            background: rgba(255,255,255,0.15);
            border: 2px solid rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: var(--text-sm);
            color: rgba(255,255,255,0.5);
            margin-bottom: var(--space-2);
            transition: all var(--transition-slow);
        }

        .step.active .step-number {
            background: var(--color-secondary);
            border-color: var(--color-secondary);
            color: white;
            box-shadow: 0 0 0 4px rgba(102, 153, 51, 0.3);
        }

        .step.completed .step-number {
            background: var(--color-secondary);
            border-color: var(--color-secondary);
            color: white;
        }

        .step-label {
            font-size: var(--text-xs);
            color: rgba(255,255,255,0.4);
            font-weight: 500;
            text-align: center;
            transition: all var(--transition-base);
        }

        .step.active .step-label,
        .step.completed .step-label {
            color: rgba(255,255,255,0.9);
        }

        .step-connector {
            position: absolute;
            top: 20px;
            left: calc(50% + 28px);
            right: calc(-50% + 28px);
            height: 2px;
            background: rgba(255,255,255,0.15);
        }

        .step:last-child .step-connector {
            display: none;
        }

        .step.completed .step-connector {
            background: var(--color-secondary);
        }

        /* Form Body */
        .form-body {
            padding: var(--space-8);
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: fadeInStep 0.4s ease-out;
        }

        @keyframes fadeInStep {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .form-step-title {
            font-family: var(--font-display);
            font-size: var(--text-2xl);
            font-weight: 800;
            color: var(--color-primary);
            margin-bottom: var(--space-2);
        }

        .form-step-desc {
            color: var(--color-text-muted);
            font-size: var(--text-md);
            margin-bottom: var(--space-7);
        }

        .form-group {
            margin-bottom: var(--space-6);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-5);
        }

        .form-label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--color-text);
            margin-bottom: var(--space-2);
        }

        .form-label .required {
            color: #e74c3c;
            margin-left: 2px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: var(--space-3) var(--space-4);
            border: 2px solid var(--color-border);
            border-radius: var(--radius-md);
            font-family: var(--font-primary);
            font-size: var(--text-base);
            color: var(--color-text);
            background: var(--color-surface-white);
            transition: all var(--transition-fast);
            outline: none;
        }

        .form-input:hover,
        .form-select:hover,
        .form-textarea:hover {
            border-color: #c5cad0;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(33, 33, 97, 0.1);
        }

        .form-input.error,
        .form-select.error,
        .form-textarea.error {
            border-color: #e74c3c;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23585858' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: var(--space-9);
        }

        .form-error {
            font-size: var(--text-xs);
            color: #e74c3c;
            margin-top: var(--space-1);
            display: none;
            align-items: center;
            gap: var(--space-1);
        }

        .form-error.visible {
            display: flex;
        }

        .form-error i {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        /* Radio buttons */
        .radio-group {
            display: flex;
            gap: var(--space-4);
        }

        .radio-option {
            flex: 1;
            position: relative;
        }

        .radio-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .radio-option label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-2);
            padding: var(--space-3) var(--space-4);
            border: 2px solid var(--color-border);
            border-radius: var(--radius-md);
            cursor: pointer;
            font-weight: 500;
            transition: all var(--transition-fast);
            text-align: center;
        }

        .radio-option input[type="radio"]:checked + label {
            border-color: var(--color-primary);
            background: rgba(33, 33, 97, 0.04);
            color: var(--color-primary);
            font-weight: 600;
        }

        .radio-option label:hover {
            border-color: var(--color-primary-light);
            background: rgba(33, 33, 97, 0.02);
        }

        /* File Upload */
        .file-upload-area {
            border: 2px dashed var(--color-border);
            border-radius: var(--radius-md);
            padding: var(--space-7);
            text-align: center;
            cursor: pointer;
            transition: all var(--transition-base);
            background: var(--color-surface);
            position: relative;
        }

        .file-upload-area:hover {
            border-color: var(--color-primary);
            background: rgba(33, 33, 97, 0.02);
        }

        .file-upload-area.has-file {
            border-color: var(--color-secondary);
            background: rgba(102, 153, 51, 0.03);
        }

        .file-upload-area.error {
            border-color: #e74c3c;
        }

        .file-upload-area input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload-icon {
            margin-bottom: var(--space-3);
            color: var(--color-text-disabled);
        }

        .file-upload-icon i {
            width: 40px;
            height: 40px;
        }

        .file-upload-text {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
        }

        .file-upload-text strong {
            color: var(--color-primary);
        }

        .file-upload-hint {
            font-size: var(--text-xs);
            color: var(--color-text-disabled);
            margin-top: var(--space-2);
        }

        .file-preview {
            display: none;
            align-items: center;
            gap: var(--space-3);
            margin-top: var(--space-3);
            padding: var(--space-3);
            background: rgba(102, 153, 51, 0.05);
            border-radius: var(--radius-sm);
        }

        .file-preview.visible {
            display: flex;
        }

        .file-preview-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            background: var(--color-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .file-preview-icon i {
            width: 18px;
            height: 18px;
        }

        .file-preview-info {
            flex: 1;
            min-width: 0;
        }

        .file-preview-name {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--color-text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .file-preview-size {
            font-size: var(--text-xs);
            color: var(--color-text-muted);
        }

        .file-remove {
            background: none;
            border: none;
            color: #e74c3c;
            cursor: pointer;
            padding: var(--space-1);
            border-radius: var(--radius-sm);
            transition: background var(--transition-fast);
        }

        .file-remove:hover {
            background: rgba(231, 76, 60, 0.1);
        }

        .file-remove i {
            width: 18px;
            height: 18px;
        }

        /* Upload Grid */
        .upload-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-5);
        }

        .upload-item label.form-label {
            margin-bottom: var(--space-3);
        }

        /* Review / Summary */
        .review-section {
            background: var(--color-surface);
            border-radius: var(--radius-md);
            padding: var(--space-6);
            margin-bottom: var(--space-6);
        }

        .review-section h4 {
            font-size: var(--text-base);
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: var(--space-4);
            display: flex;
            align-items: center;
            gap: var(--space-2);
        }

        .review-section h4 i {
            width: 18px;
            height: 18px;
        }

        .review-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-3) var(--space-7);
        }

        .review-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .review-item .label {
            font-size: var(--text-xs);
            color: var(--color-text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 500;
        }

        .review-item .value {
            font-size: var(--text-md);
            font-weight: 600;
            color: var(--color-text);
        }

        .review-files {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-3);
        }

        .review-file-badge {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-3);
            background: rgba(102, 153, 51, 0.08);
            border-radius: var(--radius-sm);
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--color-secondary-dark);
        }

        .review-file-badge i {
            width: 14px;
            height: 14px;
        }

        /* Agreement Checkbox */
        .agreement {
            display: flex;
            align-items: flex-start;
            gap: var(--space-3);
            padding: var(--space-5);
            background: rgba(33, 33, 97, 0.03);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-6);
        }

        .agreement input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-top: 2px;
            flex-shrink: 0;
            accent-color: var(--color-primary);
        }

        .agreement label {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            line-height: 1.6;
            cursor: pointer;
        }

        /* Form Navigation Buttons */
        .form-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: var(--space-6);
            border-top: 1px solid var(--color-border);
        }

        .btn-back {
            background: transparent;
            color: var(--color-text-muted);
            border: 2px solid var(--color-border);
        }

        .btn-back:hover {
            border-color: var(--color-text-muted);
            color: var(--color-text);
        }

        .btn-next {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
            color: var(--color-text-light);
            box-shadow: 0 4px 15px rgba(33, 33, 97, 0.3);
        }

        .btn-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(33, 33, 97, 0.4);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--color-secondary), var(--color-secondary-light));
            color: var(--color-text-light);
            box-shadow: 0 4px 15px rgba(102, 153, 51, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 153, 51, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        .btn-submit .spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        .btn-submit.loading .spinner {
            display: block;
        }

        .btn-submit.loading .btn-text {
            display: none;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* ============================================
           FOOTER
           ============================================ */
        .footer {
            background: var(--color-surface-dark);
            color: rgba(255,255,255,0.7);
            padding: var(--space-10) var(--space-7) var(--space-6);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: var(--space-10);
            max-width: 1200px;
            margin: 0 auto;
            padding-bottom: var(--space-8);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            margin-bottom: var(--space-5);
        }

        .footer-logo {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-full);
            background: linear-gradient(135deg, var(--color-secondary), var(--color-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: var(--text-xl);
            font-weight: 900;
            color: white;
        }

        .footer-brand-text h3 {
            color: white;
            font-size: var(--text-lg);
            font-weight: 700;
        }

        .footer-brand-text span {
            font-size: var(--text-xs);
            opacity: 0.6;
        }

        .footer-desc {
            font-size: var(--text-sm);
            line-height: 1.7;
            margin-bottom: var(--space-5);
        }

        .footer-section h4 {
            color: white;
            font-size: var(--text-sm);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: var(--space-5);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: var(--space-3);
        }

        .footer-links a {
            font-size: var(--text-sm);
            opacity: 0.7;
            transition: opacity var(--transition-fast);
            display: flex;
            align-items: center;
            gap: var(--space-2);
        }

        .footer-links a:hover {
            opacity: 1;
            color: var(--color-secondary-light);
        }

        .footer-links a i {
            width: 16px;
            height: 16px;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: var(--space-6);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: var(--text-xs);
            opacity: 0.5;
        }

        /* ============================================
           SCROLL REVEAL
           ============================================ */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }

        /* ============================================
           TOAST NOTIFICATION
           ============================================ */
        .toast {
            position: fixed;
            top: 100px;
            right: var(--space-7);
            background: var(--color-surface-white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-xl);
            padding: var(--space-5) var(--space-6);
            display: flex;
            align-items: center;
            gap: var(--space-3);
            transform: translateX(120%);
            transition: transform var(--transition-slow);
            z-index: 2000;
            border-left: 4px solid var(--color-secondary);
            max-width: 400px;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.error {
            border-left-color: #e74c3c;
        }

        .toast-icon {
            flex-shrink: 0;
        }

        .toast-icon i {
            width: 22px;
            height: 22px;
        }

        .toast-message {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--color-text);
        }

        /* ============================================
           SERVER ERROR DISPLAY
           ============================================ */
        .server-errors {
            background: rgba(231, 76, 60, 0.05);
            border: 1px solid rgba(231, 76, 60, 0.2);
            border-radius: var(--radius-md);
            padding: var(--space-5);
            margin-bottom: var(--space-6);
        }

        .server-errors ul {
            list-style: none;
        }

        .server-errors li {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            font-size: var(--text-sm);
            color: #c0392b;
            padding: var(--space-1) 0;
        }

        .server-errors li i {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 1024px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            .requirements-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: var(--text-4xl);
            }

            .hero-subtitle {
                font-size: var(--text-base);
            }

            .navbar-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                flex-direction: column;
                background: rgba(10, 10, 46, 0.98);
                backdrop-filter: blur(20px);
                padding: var(--space-6);
                gap: var(--space-4);
            }

            .navbar-links.open {
                display: flex;
            }

            .mobile-toggle {
                display: flex;
            }

            .section {
                padding: var(--space-10) var(--space-5);
            }

            .section-title {
                font-size: var(--text-3xl);
            }

            .form-body {
                padding: var(--space-5);
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .upload-grid {
                grid-template-columns: 1fr;
            }

            .review-grid {
                grid-template-columns: 1fr;
            }

            .step-indicator {
                padding: var(--space-5) var(--space-4);
            }

            .step-label {
                font-size: 0.65rem;
            }

            .step-number {
                width: 34px;
                height: 34px;
                font-size: var(--text-xs);
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: var(--space-7);
            }

            .footer-bottom {
                flex-direction: column;
                gap: var(--space-3);
                text-align: center;
            }

            .hero-actions {
                flex-direction: column;
            }

            .btn-lg {
                width: 100%;
                justify-content: center;
            }

            .form-nav {
                flex-direction: column-reverse;
                gap: var(--space-3);
            }

            .form-nav .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: var(--text-3xl);
            }

            .navbar-logo {
                width: 40px;
                height: 40px;
                font-size: var(--text-base);
            }

            .navbar-title h1 {
                font-size: var(--text-base);
            }
        }

        /* ============================================
           FLATPICKR CUSTOM STYLING (for mobile optimization)
           ============================================ */
        .flatpickr-calendar {
            background: var(--color-surface-white) !important;
            border: 1px solid var(--color-border) !important;
            box-shadow: var(--shadow-lg) !important;
            font-family: var(--font-primary) !important;
            border-radius: var(--radius-md) !important;
            width: 315px !important;
        }
        .flatpickr-calendar.arrowTop:after,
        .flatpickr-calendar.arrowTop:before {
            border-bottom-color: var(--color-surface-white) !important;
        }
        .flatpickr-calendar.arrowBottom:after,
        .flatpickr-calendar.arrowBottom:before {
            border-top-color: var(--color-surface-white) !important;
        }
        .flatpickr-months {
            padding: var(--space-2) !important;
            background: var(--color-primary-dark) !important;
            border-top-left-radius: var(--radius-md) !important;
            border-top-right-radius: var(--radius-md) !important;
        }
        .flatpickr-months .flatpickr-month {
            color: var(--color-text-light) !important;
            fill: var(--color-text-light) !important;
            height: 40px !important;
        }
        .flatpickr-current-month {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 5px !important;
            padding: 0 !important;
            height: 40px !important;
            color: var(--color-text-light) !important;
        }
        /* Style dropdowns for month & year */
        .flatpickr-current-month select.flatpickr-monthDropdown-months,
        .flatpickr-current-month input.cur-year {
            font-family: var(--font-primary) !important;
            font-weight: 700 !important;
            color: var(--color-text-light) !important;
            background: var(--color-primary) !important;
            border: 1px solid rgba(255,255,255,0.2) !important;
            border-radius: var(--radius-xs) !important;
            padding: 2px 6px !important;
            outline: none !important;
            cursor: pointer !important;
        }
        .flatpickr-current-month select.flatpickr-monthDropdown-months:hover,
        .flatpickr-current-month input.cur-year:hover {
            background: var(--color-primary-light) !important;
        }
        .flatpickr-current-month select.flatpickr-monthDropdown-months option {
            background: var(--color-primary-dark) !important;
            color: var(--color-text-light) !important;
        }
        .flatpickr-current-month .numInputWrapper span.arrowUp,
        .flatpickr-current-month .numInputWrapper span.arrowDown {
            display: none !important; /* Hide year arrow spinner, use dropdown/typing */
        }
        .flatpickr-months .flatpickr-prev-month, 
        .flatpickr-months .flatpickr-next-month {
            color: var(--color-text-light) !important;
            fill: var(--color-text-light) !important;
            padding: 10px !important;
        }
        .flatpickr-months .flatpickr-prev-month:hover, 
        .flatpickr-months .flatpickr-next-month:hover {
            color: var(--color-accent) !important;
        }
        .flatpickr-months .flatpickr-prev-month svg, 
        .flatpickr-months .flatpickr-next-month svg {
            width: 14px !important;
            height: 14px !important;
        }
        .flatpickr-weekdays {
            background: var(--color-surface) !important;
            border-bottom: 1px solid var(--color-border) !important;
            padding: var(--space-2) 0 !important;
        }
        span.flatpickr-weekday {
            color: var(--color-text-muted) !important;
            font-weight: 600 !important;
            font-size: var(--text-xs) !important;
        }
        .flatpickr-days {
            padding: var(--space-2) !important;
            width: 315px !important;
        }
        .dayContainer {
            width: 300px !important;
            min-width: 300px !important;
            max-width: 300px !important;
        }
        .flatpickr-day {
            font-weight: 500 !important;
            color: var(--color-text) !important;
            border-radius: var(--radius-sm) !important;
            max-width: 38px !important;
            height: 38px !important;
            line-height: 38px !important;
        }
        .flatpickr-day:hover,
        .flatpickr-day.prevMonthDay:hover,
        .flatpickr-day.nextMonthDay:hover {
            background: var(--color-surface) !important;
            border-color: var(--color-border) !important;
            color: var(--color-primary) !important;
        }
        .flatpickr-day.selected, 
        .flatpickr-day.selected:hover {
            background: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
            color: var(--color-text-light) !important;
            font-weight: 700 !important;
        }
        .flatpickr-day.today {
            border-color: var(--color-secondary) !important;
            color: var(--color-secondary-dark) !important;
            font-weight: 700 !important;
        }
        .flatpickr-day.today:hover {
            background: rgba(102, 153, 51, 0.1) !important;
            color: var(--color-secondary-dark) !important;
        }
        /* Mobile adjustments */
        @media (max-width: 480px) {
            .flatpickr-calendar {
                width: 290px !important;
            }
            .flatpickr-days {
                width: 290px !important;
            }
            .dayContainer {
                width: 270px !important;
                min-width: 270px !important;
                max-width: 270px !important;
            }
            .flatpickr-day {
                max-width: 34px !important;
                height: 34px !important;
                line-height: 34px !important;
            }
        }
    </style>
</head>
<body>
    {{-- ============================================
         NAVBAR
         ============================================ --}}
    <nav class="navbar" id="navbar">
        <a href="#" class="navbar-brand">
            <div class="navbar-logo">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo TK/PAUD Azzahra" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            </div>
            <div class="navbar-title">
                <h1>TK/PAUD Azzahra</h1>
                <span>Penerimaan Siswa Baru</span>
            </div>
        </a>

        <ul class="navbar-links" id="navLinks">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#informasi">Informasi</a></li>
            <li><a href="#persyaratan">Persyaratan</a></li>
            <li><a href="#formulir" class="btn-nav-cta">Daftar Sekarang</a></li>
        </ul>

        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    {{-- ============================================
         HERO SECTION
         ============================================ --}}
    <section class="hero" id="beranda">
        <div class="hero-decoration"></div>
        <div class="hero-decoration"></div>
        <div class="hero-decoration"></div>

        <div class="hero-content">
            <div class="hero-badge">
                <i data-lucide="sparkles"></i>
                Pendaftaran Dibuka — Tahun Ajaran 2026/2027
            </div>

            <h2 class="hero-title">
                Masa Depan <span class="highlight">Cerah</span><br>
                Dimulai dari Sini
            </h2>

            <p class="hero-subtitle">
                Daftarkan putra-putri Anda di TK/PAUD Azzahra. Membangun fondasi pendidikan yang kuat dengan pendekatan belajar yang menyenangkan dan penuh kasih sayang.
            </p>

            <div class="hero-actions">
                <a href="#formulir" class="btn btn-primary btn-lg" id="ctaDaftar">
                    <i data-lucide="edit-3"></i>
                    Daftar Sekarang
                </a>
                <a href="#informasi" class="btn btn-outline btn-lg">
                    <i data-lucide="info"></i>
                    Lihat Informasi
                </a>
            </div>
        </div>

        <a href="#informasi" class="hero-scroll-indicator" aria-label="Scroll ke bawah">
            <i data-lucide="chevrons-down"></i>
        </a>
    </section>

    {{-- ============================================
         INFO SECTION
         ============================================ --}}
    <section class="section info-section" id="informasi">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-label">
                    <i data-lucide="star" style="width:16px;height:16px;"></i>
                    Kenapa Memilih Kami
                </div>
                <h2 class="section-title">Keunggulan TK/PAUD Azzahra</h2>
                <p class="section-desc">
                    Kami berkomitmen memberikan pendidikan terbaik untuk anak usia dini dengan lingkungan yang aman, nyaman, dan mendukung tumbuh kembang optimal.
                </p>
            </div>

            <div class="info-grid">
                <div class="info-card reveal reveal-delay-1">
                    <div class="info-card-icon green">
                        <i data-lucide="heart-handshake"></i>
                    </div>
                    <h3>Pembelajaran Berbasis Kasih Sayang</h3>
                    <p>Metode pembelajaran yang menekankan kelembutan dan perhatian individual untuk setiap anak, menciptakan suasana belajar yang hangat dan penuh cinta.</p>
                </div>

                <div class="info-card reveal reveal-delay-2">
                    <div class="info-card-icon blue">
                        <i data-lucide="palette"></i>
                    </div>
                    <h3>Kurikulum Kreatif & Menyenangkan</h3>
                    <p>Program belajar yang dirancang khusus untuk mengembangkan kreativitas, motorik halus, kognitif, dan sosial-emosional anak melalui bermain dan berkarya.</p>
                </div>

                <div class="info-card reveal reveal-delay-3">
                    <div class="info-card-icon gold">
                        <i data-lucide="shield-check"></i>
                    </div>
                    <h3>Lingkungan Aman & Nyaman</h3>
                    <p>Fasilitas lengkap dengan standar keamanan tinggi, ruang bermain yang luas, dan lingkungan bersih yang mendukung proses belajar optimal anak.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================
         REQUIREMENTS SECTION
         ============================================ --}}
    <section class="section requirements-section" id="persyaratan">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-label">
                    <i data-lucide="clipboard-list" style="width:16px;height:16px;"></i>
                    Persyaratan & Alur
                </div>
                <h2 class="section-title">Informasi Pendaftaran</h2>
                <p class="section-desc">
                    Siapkan dokumen yang diperlukan dan ikuti alur pendaftaran di bawah ini untuk mendaftarkan putra-putri Anda.
                </p>
            </div>

            <div class="requirements-grid">
                {{-- Requirements List --}}
                <div class="reveal">
                    <h3 style="font-size: var(--text-xl); font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-5);">
                        Dokumen yang Diperlukan
                    </h3>
                    <ul class="requirements-list">
                        <li>
                            <div class="req-icon"><i data-lucide="camera"></i></div>
                            <div class="req-text">
                                <h4>Pas Foto Anak (3×4)</h4>
                                <p>Format JPG/PNG, ukuran maksimal 2MB, latar belakang merah atau biru.</p>
                            </div>
                        </li>
                        <li>
                            <div class="req-icon"><i data-lucide="file-text"></i></div>
                            <div class="req-text">
                                <h4>Akta Kelahiran</h4>
                                <p>Scan/foto akta kelahiran anak yang masih berlaku dan terbaca jelas.</p>
                            </div>
                        </li>
                        <li>
                            <div class="req-icon"><i data-lucide="users"></i></div>
                            <div class="req-text">
                                <h4>Kartu Keluarga (KK)</h4>
                                <p>Scan/foto Kartu Keluarga yang masih berlaku dan tercantum nama anak.</p>
                            </div>
                        </li>
                        <li>
                            <div class="req-icon"><i data-lucide="credit-card"></i></div>
                            <div class="req-text">
                                <h4>KTP Orang Tua</h4>
                                <p>Scan/foto KTP salah satu orang tua (ayah atau ibu) yang masih berlaku.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- Timeline --}}
                <div class="reveal reveal-delay-2">
                    <h3 style="font-size: var(--text-xl); font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-5);">
                        Alur Pendaftaran
                    </h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h4>1. Isi Formulir Online</h4>
                                <p>Lengkapi formulir pendaftaran di bawah ini dengan data yang benar dan lengkap.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h4>2. Unggah Dokumen</h4>
                                <p>Upload dokumen yang diperlukan sesuai persyaratan di atas.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h4>3. Verifikasi Data</h4>
                                <p>Tim kami akan memverifikasi data dan dokumen yang Anda kirimkan.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h4>4. Konfirmasi Penerimaan</h4>
                                <p>Anda akan menerima konfirmasi penerimaan melalui WhatsApp / telepon.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================
         FORM SECTION
         ============================================ --}}
    <section class="section form-section" id="formulir">
        <div class="container">
            <div class="section-header reveal">
                <div class="section-label">
                    <i data-lucide="edit-3" style="width:16px;height:16px;"></i>
                    Formulir Pendaftaran
                </div>
                <h2 class="section-title">Daftar Sekarang</h2>
                <p class="section-desc">
                    Isi formulir di bawah ini dengan lengkap dan benar. Data Anda akan kami jaga kerahasiaannya.
                </p>
            </div>

            <div class="form-wrapper reveal">
                {{-- Step Indicator --}}
                <div class="step-indicator">
                    <div class="step active" data-step="1">
                        <div class="step-number">1</div>
                        <div class="step-label">Data Siswa</div>
                        <div class="step-connector"></div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-number">2</div>
                        <div class="step-label">Data Orang Tua</div>
                        <div class="step-connector"></div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-number">3</div>
                        <div class="step-label">Dokumen</div>
                        <div class="step-connector"></div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-number">4</div>
                        <div class="step-label">Konfirmasi</div>
                    </div>
                </div>

                {{-- Server Validation Errors --}}
                @if ($errors->any())
                    <div class="server-errors" style="margin: var(--space-5) var(--space-8) 0;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    <i data-lucide="alert-circle"></i>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data" id="registrationForm" novalidate>
                    @csrf
                    <div class="form-body">
                        {{-- ===== STEP 1: Data Siswa ===== --}}
                        <div class="form-step active" data-step="1">
                            <h3 class="form-step-title">Data Calon Siswa</h3>
                            <p class="form-step-desc">Masukkan data lengkap calon siswa baru.</p>

                            <div class="form-group">
                                <label class="form-label" for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
                                <input type="text" class="form-input" id="nama_lengkap" name="nama_lengkap"
                                       placeholder="Masukkan nama lengkap anak"
                                       value="{{ old('nama_lengkap') }}" required>
                                <div class="form-error" id="error-nama_lengkap">
                                    <i data-lucide="alert-circle"></i>
                                    <span>Nama lengkap wajib diisi.</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir <span class="required">*</span></label>
                                    <input type="date" class="form-input" id="tanggal_lahir" name="tanggal_lahir"
                                           value="{{ old('tanggal_lahir') }}" required>
                                    <div class="form-error" id="error-tanggal_lahir">
                                        <i data-lucide="alert-circle"></i>
                                        <span>Tanggal lahir wajib diisi.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Jenis Kelamin <span class="required">*</span></label>
                                    <div class="radio-group">
                                        <div class="radio-option">
                                            <input type="radio" id="jk_laki" name="jenis_kelamin" value="Laki-laki"
                                                   {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                                            <label for="jk_laki">👦 Laki-laki</label>
                                        </div>
                                        <div class="radio-option">
                                            <input type="radio" id="jk_perempuan" name="jenis_kelamin" value="Perempuan"
                                                   {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                            <label for="jk_perempuan">👧 Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="form-error" id="error-jenis_kelamin">
                                        <i data-lucide="alert-circle"></i>
                                        <span>Jenis kelamin wajib dipilih.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-nav">
                                <div></div>
                                <button type="button" class="btn btn-next" onclick="nextStep()">
                                    Selanjutnya
                                    <i data-lucide="arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        {{-- ===== STEP 2: Data Orang Tua ===== --}}
                        <div class="form-step" data-step="2">
                            <h3 class="form-step-title">Data Orang Tua</h3>
                            <p class="form-step-desc">Masukkan data orang tua / wali calon siswa.</p>

                            {{-- Ayah --}}
                            <div style="margin-bottom: var(--space-7);">
                                <h4 style="font-size: var(--text-base); font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-5); display: flex; align-items: center; gap: var(--space-2);">
                                    <i data-lucide="user" style="width:18px;height:18px;"></i> Data Ayah
                                </h4>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label" for="nama_ayah">Nama Lengkap Ayah <span class="required">*</span></label>
                                        <input type="text" class="form-input" id="nama_ayah" name="nama_ayah"
                                               placeholder="Masukkan nama lengkap ayah"
                                               value="{{ old('nama_ayah') }}" required>
                                        <div class="form-error" id="error-nama_ayah">
                                            <i data-lucide="alert-circle"></i>
                                            <span>Nama ayah wajib diisi.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="hp_ayah">No. HP Ayah <span class="required">*</span></label>
                                        <input type="tel" class="form-input" id="hp_ayah" name="hp_ayah"
                                               placeholder="Contoh: 081234567890"
                                               value="{{ old('hp_ayah') }}" required>
                                        <div class="form-error" id="error-hp_ayah">
                                            <i data-lucide="alert-circle"></i>
                                            <span>No. HP ayah wajib diisi.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Ibu --}}
                            <div style="margin-bottom: var(--space-5);">
                                <h4 style="font-size: var(--text-base); font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-5); display: flex; align-items: center; gap: var(--space-2);">
                                    <i data-lucide="user" style="width:18px;height:18px;"></i> Data Ibu
                                </h4>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label" for="nama_ibu">Nama Lengkap Ibu <span class="required">*</span></label>
                                        <input type="text" class="form-input" id="nama_ibu" name="nama_ibu"
                                               placeholder="Masukkan nama lengkap ibu"
                                               value="{{ old('nama_ibu') }}" required>
                                        <div class="form-error" id="error-nama_ibu">
                                            <i data-lucide="alert-circle"></i>
                                            <span>Nama ibu wajib diisi.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="hp_ibu">No. HP Ibu <span class="required">*</span></label>
                                        <input type="tel" class="form-input" id="hp_ibu" name="hp_ibu"
                                               placeholder="Contoh: 081234567890"
                                               value="{{ old('hp_ibu') }}" required>
                                        <div class="form-error" id="error-hp_ibu">
                                            <i data-lucide="alert-circle"></i>
                                            <span>No. HP ibu wajib diisi.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Alamat --}}
                            <div class="form-group">
                                <label class="form-label" for="alamat">Alamat Lengkap <span class="required">*</span></label>
                                <textarea class="form-textarea" id="alamat" name="alamat" rows="3"
                                          placeholder="Masukkan alamat lengkap (jalan, RT/RW, kelurahan, kecamatan, kota, provinsi)" required>{{ old('alamat') }}</textarea>
                                <div class="form-error" id="error-alamat">
                                    <i data-lucide="alert-circle"></i>
                                    <span>Alamat wajib diisi.</span>
                                </div>
                            </div>

                            <div class="form-nav">
                                <button type="button" class="btn btn-back" onclick="prevStep()">
                                    <i data-lucide="arrow-left"></i>
                                    Kembali
                                </button>
                                <button type="button" class="btn btn-next" onclick="nextStep()">
                                    Selanjutnya
                                    <i data-lucide="arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        {{-- ===== STEP 3: Dokumen ===== --}}
                        <div class="form-step" data-step="3">
                            <h3 class="form-step-title">Upload Dokumen</h3>
                            <p class="form-step-desc">Unggah dokumen yang diperlukan. Format: JPG, PNG, atau PDF (maks. 2MB per file).</p>

                            <div class="upload-grid">
                                {{-- Pas Foto --}}
                                <div class="upload-item">
                                    <label class="form-label">Pas Foto Anak (3×4) <span class="required">*</span></label>
                                    <div class="file-upload-area" id="upload-foto_anak">
                                        <input type="file" name="foto_anak" id="foto_anak" accept=".jpg,.jpeg,.png"
                                               onchange="handleFileUpload(this, 'foto_anak')">
                                        <div class="file-upload-icon"><i data-lucide="camera"></i></div>
                                        <div class="file-upload-text"><strong>Klik untuk upload</strong> atau drag & drop</div>
                                        <div class="file-upload-hint">JPG, PNG — Maks. 2MB</div>
                                    </div>
                                    <div class="file-preview" id="preview-foto_anak">
                                        <div class="file-preview-icon"><i data-lucide="image"></i></div>
                                        <div class="file-preview-info">
                                            <div class="file-preview-name" id="filename-foto_anak"></div>
                                            <div class="file-preview-size" id="filesize-foto_anak"></div>
                                        </div>
                                        <button type="button" class="file-remove" onclick="removeFile('foto_anak')">
                                            <i data-lucide="x"></i>
                                        </button>
                                    </div>
                                    <div class="form-error" id="error-foto_anak">
                                        <i data-lucide="alert-circle"></i>
                                        <span>Pas foto wajib diunggah.</span>
                                    </div>
                                </div>

                                {{-- Akta Kelahiran --}}
                                <div class="upload-item">
                                    <label class="form-label">Akta Kelahiran <span class="required">*</span></label>
                                    <div class="file-upload-area" id="upload-akta_kelahiran">
                                        <input type="file" name="akta_kelahiran" id="akta_kelahiran" accept=".jpg,.jpeg,.png,.pdf"
                                               onchange="handleFileUpload(this, 'akta_kelahiran')">
                                        <div class="file-upload-icon"><i data-lucide="file-text"></i></div>
                                        <div class="file-upload-text"><strong>Klik untuk upload</strong> atau drag & drop</div>
                                        <div class="file-upload-hint">JPG, PNG, PDF — Maks. 2MB</div>
                                    </div>
                                    <div class="file-preview" id="preview-akta_kelahiran">
                                        <div class="file-preview-icon"><i data-lucide="file-check"></i></div>
                                        <div class="file-preview-info">
                                            <div class="file-preview-name" id="filename-akta_kelahiran"></div>
                                            <div class="file-preview-size" id="filesize-akta_kelahiran"></div>
                                        </div>
                                        <button type="button" class="file-remove" onclick="removeFile('akta_kelahiran')">
                                            <i data-lucide="x"></i>
                                        </button>
                                    </div>
                                    <div class="form-error" id="error-akta_kelahiran">
                                        <i data-lucide="alert-circle"></i>
                                        <span>Akta kelahiran wajib diunggah.</span>
                                    </div>
                                </div>

                                {{-- Kartu Keluarga --}}
                                <div class="upload-item">
                                    <label class="form-label">Kartu Keluarga <span class="required">*</span></label>
                                    <div class="file-upload-area" id="upload-kartu_keluarga">
                                        <input type="file" name="kartu_keluarga" id="kartu_keluarga" accept=".jpg,.jpeg,.png,.pdf"
                                               onchange="handleFileUpload(this, 'kartu_keluarga')">
                                        <div class="file-upload-icon"><i data-lucide="users"></i></div>
                                        <div class="file-upload-text"><strong>Klik untuk upload</strong> atau drag & drop</div>
                                        <div class="file-upload-hint">JPG, PNG, PDF — Maks. 2MB</div>
                                    </div>
                                    <div class="file-preview" id="preview-kartu_keluarga">
                                        <div class="file-preview-icon"><i data-lucide="file-check"></i></div>
                                        <div class="file-preview-info">
                                            <div class="file-preview-name" id="filename-kartu_keluarga"></div>
                                            <div class="file-preview-size" id="filesize-kartu_keluarga"></div>
                                        </div>
                                        <button type="button" class="file-remove" onclick="removeFile('kartu_keluarga')">
                                            <i data-lucide="x"></i>
                                        </button>
                                    </div>
                                    <div class="form-error" id="error-kartu_keluarga">
                                        <i data-lucide="alert-circle"></i>
                                        <span>Kartu keluarga wajib diunggah.</span>
                                    </div>
                                </div>

                                {{-- KTP Orang Tua --}}
                                <div class="upload-item">
                                    <label class="form-label">KTP Orang Tua <span class="required">*</span></label>
                                    <div class="file-upload-area" id="upload-ktp_ortu">
                                        <input type="file" name="ktp_ortu" id="ktp_ortu" accept=".jpg,.jpeg,.png,.pdf"
                                               onchange="handleFileUpload(this, 'ktp_ortu')">
                                        <div class="file-upload-icon"><i data-lucide="credit-card"></i></div>
                                        <div class="file-upload-text"><strong>Klik untuk upload</strong> atau drag & drop</div>
                                        <div class="file-upload-hint">JPG, PNG, PDF — Maks. 2MB</div>
                                    </div>
                                    <div class="file-preview" id="preview-ktp_ortu">
                                        <div class="file-preview-icon"><i data-lucide="file-check"></i></div>
                                        <div class="file-preview-info">
                                            <div class="file-preview-name" id="filename-ktp_ortu"></div>
                                            <div class="file-preview-size" id="filesize-ktp_ortu"></div>
                                        </div>
                                        <button type="button" class="file-remove" onclick="removeFile('ktp_ortu')">
                                            <i data-lucide="x"></i>
                                        </button>
                                    </div>
                                    <div class="form-error" id="error-ktp_ortu">
                                        <i data-lucide="alert-circle"></i>
                                        <span>KTP orang tua wajib diunggah.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-nav">
                                <button type="button" class="btn btn-back" onclick="prevStep()">
                                    <i data-lucide="arrow-left"></i>
                                    Kembali
                                </button>
                                <button type="button" class="btn btn-next" onclick="nextStep()">
                                    Selanjutnya
                                    <i data-lucide="arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        {{-- ===== STEP 4: Review & Submit ===== --}}
                        <div class="form-step" data-step="4">
                            <h3 class="form-step-title">Konfirmasi Data</h3>
                            <p class="form-step-desc">Periksa kembali data Anda sebelum mengirim formulir pendaftaran.</p>

                            {{-- Review: Data Siswa --}}
                            <div class="review-section">
                                <h4><i data-lucide="user"></i> Data Calon Siswa</h4>
                                <div class="review-grid">
                                    <div class="review-item">
                                        <span class="label">Nama Lengkap</span>
                                        <span class="value" id="review-nama_lengkap">-</span>
                                    </div>
                                    <div class="review-item">
                                        <span class="label">Tanggal Lahir</span>
                                        <span class="value" id="review-tanggal_lahir">-</span>
                                    </div>
                                    <div class="review-item">
                                        <span class="label">Jenis Kelamin</span>
                                        <span class="value" id="review-jenis_kelamin">-</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Review: Data Orang Tua --}}
                            <div class="review-section">
                                <h4><i data-lucide="users"></i> Data Orang Tua</h4>
                                <div class="review-grid">
                                    <div class="review-item">
                                        <span class="label">Nama Ayah</span>
                                        <span class="value" id="review-nama_ayah">-</span>
                                    </div>
                                    <div class="review-item">
                                        <span class="label">No. HP Ayah</span>
                                        <span class="value" id="review-hp_ayah">-</span>
                                    </div>
                                    <div class="review-item">
                                        <span class="label">Nama Ibu</span>
                                        <span class="value" id="review-nama_ibu">-</span>
                                    </div>
                                    <div class="review-item">
                                        <span class="label">No. HP Ibu</span>
                                        <span class="value" id="review-hp_ibu">-</span>
                                    </div>
                                    <div class="review-item" style="grid-column: 1 / -1;">
                                        <span class="label">Alamat</span>
                                        <span class="value" id="review-alamat">-</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Review: Dokumen --}}
                            <div class="review-section">
                                <h4><i data-lucide="paperclip"></i> Dokumen yang Diunggah</h4>
                                <div class="review-files" id="review-files">
                                    {{-- Filled by JS --}}
                                </div>
                            </div>

                            {{-- Agreement --}}
                            <div class="agreement">
                                <input type="checkbox" id="agreement" name="agreement">
                                <label for="agreement">
                                    Saya menyatakan bahwa data yang saya isi di atas adalah <strong>benar dan sesuai</strong>.
                                    Saya bersedia menerima konsekuensi apabila data yang saya berikan tidak sesuai dengan fakta.
                                </label>
                            </div>

                            <div class="form-nav">
                                <button type="button" class="btn btn-back" onclick="prevStep()">
                                    <i data-lucide="arrow-left"></i>
                                    Kembali
                                </button>
                                <button type="submit" class="btn btn-submit" id="btnSubmit" disabled>
                                    <span class="btn-text">
                                        <i data-lucide="send"></i>
                                        Kirim Pendaftaran
                                    </span>
                                    <span class="spinner"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- ============================================
         FOOTER
         ============================================ --}}
    <footer class="footer" id="kontak">
        <div class="footer-grid">
            <div>
                <div class="footer-brand">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo TK/PAUD Azzahra" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                    </div>
                    <div class="footer-brand-text">
                        <h3>TK/PAUD Azzahra</h3>
                        <span>Pendidikan Anak Usia Dini</span>
                    </div>
                </div>
                <p class="footer-desc">
                    Membangun generasi cerdas, kreatif, dan berakhlak mulia melalui pendidikan anak usia dini yang berkualitas dan penuh kasih sayang.
                </p>
            </div>

            <div class="footer-section">
                <h4>Navigasi</h4>
                <ul class="footer-links">
                    <li><a href="#beranda"><i data-lucide="home"></i> Beranda</a></li>
                    <li><a href="#informasi"><i data-lucide="info"></i> Informasi</a></li>
                    <li><a href="#persyaratan"><i data-lucide="clipboard-list"></i> Persyaratan</a></li>
                    <li><a href="#formulir"><i data-lucide="edit-3"></i> Pendaftaran</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Hubungi Kami</h4>
                <ul class="footer-links">
                    <li><a href="#"><i data-lucide="map-pin"></i> Jl. Contoh Alamat No. 123</a></li>
                    <li><a href="#"><i data-lucide="phone"></i> (021) 1234-5678</a></li>
                    <li><a href="#"><i data-lucide="mail"></i> info@azzahra.sch.id</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} TK/PAUD Azzahra. Hak Cipta Dilindungi.</span>
            <span>Penerimaan Siswa Baru {{ date('Y') }}/{{ date('Y') + 1 }}</span>
        </div>
    </footer>

    {{-- Toast Notification --}}
    <div class="toast" id="toast">
        <div class="toast-icon"><i data-lucide="check-circle" style="color: var(--color-secondary);"></i></div>
        <div class="toast-message" id="toastMessage"></div>
    </div>

    {{-- ============================================
         JAVASCRIPT
         ============================================ --}}
    {{-- Flatpickr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>

    <script>
        // Initialize Lucide icons
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();

            // Initialize Flatpickr for Date of Birth
            flatpickr("#tanggal_lahir", {
                locale: "id",
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d F Y",
                altInputClass: "form-input",
                changeMonth: true,
                changeYear: true,
                maxDate: "today",
                minDate: new Date().getFullYear() - 10 + "-01-01",
                onChange: function(selectedDates, dateStr, instance) {
                    if (dateStr) {
                        hideFieldError('tanggal_lahir');
                    }
                }
            });
        });

        // ============================================
        // NAVBAR SCROLL EFFECT
        // ============================================
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Mobile Menu Toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const navLinks = document.getElementById('navLinks');
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('open');
        });

        // Close mobile menu on link click
        document.querySelectorAll('.navbar-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('open');
            });
        });

        // ============================================
        // SCROLL REVEAL ANIMATION
        // ============================================
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // ============================================
        // MULTI-STEP FORM LOGIC
        // ============================================
        let currentStep = 1;
        const totalSteps = 4;

        function updateStepIndicator() {
            document.querySelectorAll('.step-indicator .step').forEach(step => {
                const stepNum = parseInt(step.dataset.step);
                step.classList.remove('active', 'completed');
                if (stepNum === currentStep) step.classList.add('active');
                if (stepNum < currentStep) step.classList.add('completed');
            });

            document.querySelectorAll('.form-step').forEach(step => {
                step.classList.remove('active');
                if (parseInt(step.dataset.step) === currentStep) {
                    step.classList.add('active');
                }
            });

            // Re-initialize icons for newly visible step
            lucide.createIcons();
        }

        function validateStep(step) {
            let isValid = true;

            if (step === 1) {
                const nama = document.getElementById('nama_lengkap');
                const tanggal = document.getElementById('tanggal_lahir');
                const jk = document.querySelector('input[name="jenis_kelamin"]:checked');

                if (!nama.value.trim()) {
                    showFieldError('nama_lengkap', 'Nama lengkap wajib diisi.');
                    isValid = false;
                } else {
                    hideFieldError('nama_lengkap');
                }

                if (!tanggal.value) {
                    showFieldError('tanggal_lahir', 'Tanggal lahir wajib diisi.');
                    isValid = false;
                } else {
                    hideFieldError('tanggal_lahir');
                }

                if (!jk) {
                    showFieldError('jenis_kelamin', 'Jenis kelamin wajib dipilih.');
                    isValid = false;
                } else {
                    hideFieldError('jenis_kelamin');
                }
            }

            if (step === 2) {
                const fields = [
                    { id: 'nama_ayah', msg: 'Nama ayah wajib diisi.' },
                    { id: 'hp_ayah', msg: 'No. HP ayah wajib diisi.' },
                    { id: 'nama_ibu', msg: 'Nama ibu wajib diisi.' },
                    { id: 'hp_ibu', msg: 'No. HP ibu wajib diisi.' },
                    { id: 'alamat', msg: 'Alamat wajib diisi.' },
                ];

                fields.forEach(field => {
                    const el = document.getElementById(field.id);
                    if (!el.value.trim()) {
                        showFieldError(field.id, field.msg);
                        isValid = false;
                    } else {
                        hideFieldError(field.id);
                    }
                });
            }

            if (step === 3) {
                const files = ['foto_anak', 'akta_kelahiran', 'kartu_keluarga', 'ktp_ortu'];
                const messages = {
                    'foto_anak': 'Pas foto wajib diunggah.',
                    'akta_kelahiran': 'Akta kelahiran wajib diunggah.',
                    'kartu_keluarga': 'Kartu keluarga wajib diunggah.',
                    'ktp_ortu': 'KTP orang tua wajib diunggah.',
                };

                files.forEach(fileId => {
                    const input = document.getElementById(fileId);
                    if (!input.files || input.files.length === 0) {
                        showFieldError(fileId, messages[fileId]);
                        document.getElementById('upload-' + fileId).classList.add('error');
                        isValid = false;
                    } else {
                        hideFieldError(fileId);
                        document.getElementById('upload-' + fileId).classList.remove('error');
                    }
                });
            }

            return isValid;
        }

        function showFieldError(fieldId, message) {
            const errorEl = document.getElementById('error-' + fieldId);
            const inputEl = document.getElementById(fieldId);
            if (errorEl) {
                errorEl.querySelector('span').textContent = message;
                errorEl.classList.add('visible');
            }
            if (inputEl) {
                inputEl.classList.add('error');
                if (inputEl._flatpickr && inputEl._flatpickr.altInput) {
                    inputEl._flatpickr.altInput.classList.add('error');
                }
            }
        }

        function hideFieldError(fieldId) {
            const errorEl = document.getElementById('error-' + fieldId);
            const inputEl = document.getElementById(fieldId);
            if (errorEl) errorEl.classList.remove('visible');
            if (inputEl) {
                inputEl.classList.remove('error');
                if (inputEl._flatpickr && inputEl._flatpickr.altInput) {
                    inputEl._flatpickr.altInput.classList.remove('error');
                }
            }
        }

        function nextStep() {
            if (!validateStep(currentStep)) return;
            if (currentStep < totalSteps) {
                currentStep++;
                updateStepIndicator();
                if (currentStep === totalSteps) {
                    populateReview();
                }
                // Scroll to form top
                document.querySelector('.form-wrapper').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStepIndicator();
                document.querySelector('.form-wrapper').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // ============================================
        // REVIEW POPULATION
        // ============================================
        function populateReview() {
            // Data Siswa
            document.getElementById('review-nama_lengkap').textContent =
                document.getElementById('nama_lengkap').value || '-';

            const tglLahir = document.getElementById('tanggal_lahir').value;
            if (tglLahir) {
                const date = new Date(tglLahir);
                const options = { day: 'numeric', month: 'long', year: 'numeric' };
                document.getElementById('review-tanggal_lahir').textContent =
                    date.toLocaleDateString('id-ID', options);
            }

            const jk = document.querySelector('input[name="jenis_kelamin"]:checked');
            document.getElementById('review-jenis_kelamin').textContent = jk ? jk.value : '-';

            // Data Orang Tua
            document.getElementById('review-nama_ayah').textContent =
                document.getElementById('nama_ayah').value || '-';
            document.getElementById('review-hp_ayah').textContent =
                document.getElementById('hp_ayah').value || '-';
            document.getElementById('review-nama_ibu').textContent =
                document.getElementById('nama_ibu').value || '-';
            document.getElementById('review-hp_ibu').textContent =
                document.getElementById('hp_ibu').value || '-';
            document.getElementById('review-alamat').textContent =
                document.getElementById('alamat').value || '-';

            // Dokumen
            const filesContainer = document.getElementById('review-files');
            filesContainer.innerHTML = '';
            const fileFields = {
                'foto_anak': 'Pas Foto',
                'akta_kelahiran': 'Akta Kelahiran',
                'kartu_keluarga': 'Kartu Keluarga',
                'ktp_ortu': 'KTP Orang Tua'
            };

            Object.entries(fileFields).forEach(([id, label]) => {
                const input = document.getElementById(id);
                if (input.files && input.files.length > 0) {
                    const badge = document.createElement('div');
                    badge.className = 'review-file-badge';
                    badge.innerHTML = `<i data-lucide="check-circle"></i> ${label}`;
                    filesContainer.appendChild(badge);
                }
            });

            lucide.createIcons();
        }

        // ============================================
        // FILE UPLOAD HANDLING
        // ============================================
        function handleFileUpload(input, fieldId) {
            const file = input.files[0];
            const uploadArea = document.getElementById('upload-' + fieldId);
            const preview = document.getElementById('preview-' + fieldId);
            const nameEl = document.getElementById('filename-' + fieldId);
            const sizeEl = document.getElementById('filesize-' + fieldId);

            if (file) {
                // Check file size
                if (file.size > 2 * 1024 * 1024) {
                    showToast('Ukuran file ' + file.name + ' melebihi 2MB. Silakan pilih file yang lebih kecil.', 'error');
                    input.value = '';
                    return;
                }

                uploadArea.classList.add('has-file');
                uploadArea.classList.remove('error');
                preview.classList.add('visible');
                nameEl.textContent = file.name;
                sizeEl.textContent = formatFileSize(file.size);
                hideFieldError(fieldId);
            }
        }

        function removeFile(fieldId) {
            const input = document.getElementById(fieldId);
            const uploadArea = document.getElementById('upload-' + fieldId);
            const preview = document.getElementById('preview-' + fieldId);

            input.value = '';
            uploadArea.classList.remove('has-file');
            preview.classList.remove('visible');
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
        }

        // ============================================
        // AGREEMENT CHECKBOX
        // ============================================
        const agreementCheckbox = document.getElementById('agreement');
        const submitBtn = document.getElementById('btnSubmit');

        agreementCheckbox.addEventListener('change', function() {
            submitBtn.disabled = !this.checked;
        });

        // ============================================
        // FORM SUBMISSION
        // ============================================
        const form = document.getElementById('registrationForm');
        form.addEventListener('submit', function(e) {
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        });

        // ============================================
        // TOAST NOTIFICATION
        // ============================================
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            const icon = toast.querySelector('.toast-icon i');

            toastMessage.textContent = message;
            toast.classList.remove('error');

            if (type === 'error') {
                toast.classList.add('error');
            }

            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }

        // ============================================
        // INLINE VALIDATION (clear error on input)
        // ============================================
        document.querySelectorAll('.form-input, .form-textarea, .form-select').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('error');
                    const errorEl = document.getElementById('error-' + this.id);
                    if (errorEl) errorEl.classList.remove('visible');
                }
            });
        });

        document.querySelectorAll('input[name="jenis_kelamin"]').forEach(radio => {
            radio.addEventListener('change', function() {
                hideFieldError('jenis_kelamin');
            });
        });
    </script>
</body>
</html>
