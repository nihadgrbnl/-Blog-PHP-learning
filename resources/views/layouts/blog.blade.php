<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yazılar') — BloGurbanli</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Source+Serif+4:ital,wght@0,300;0,400;1,300&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --ink: #0f0e0d;
            --ink-light: #4a4745;
            --ink-faint: #9c9895;
            --paper: #faf9f7;
            --paper-warm: #f2efe9;
            --accent: #c8102e;
            --border: #dedad4;
        }

        body {
            background: var(--paper);
            color: var(--ink);
            font-family: 'Source Serif 4', Georgia, serif;
            font-weight: 300;
            line-height: 1.8;
            min-height: 100vh;
        }

        /* NAV */
        .nav {
            border-bottom: 3px solid var(--ink);
            padding: 0 2rem;
        }
        .nav-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0 0.75rem;
            border-bottom: 1px solid var(--border);
        }
        .nav-date {
            font-family: 'DM Mono', monospace;
            font-size: 0.7rem;
            color: var(--ink-faint);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }
        .nav-links a {
            font-family: 'DM Mono', monospace;
            font-size: 0.7rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--ink-light);
            text-decoration: none;
            transition: color 0.15s;
        }
        .nav-links a:hover { color: var(--accent); }
        .nav-links form button {
            font-family: 'DM Mono', monospace;
            font-size: 0.7rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--accent);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .nav-logo {
            padding: 1rem 0 0.75rem;
            text-align: center;
        }
        .nav-logo a {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 3rem;
            font-weight: 900;
            color: var(--ink);
            text-decoration: none;
            letter-spacing: -0.02em;
            line-height: 1;
        }
        .nav-logo span {
            color: var(--accent);
        }

        /* MAIN */
        main {
            max-width: 860px;
            margin: 0 auto;
            padding: 3rem 2rem 6rem;
        }

        /* CARDS */
        .post-card {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 1rem;
            padding: 2rem 0;
            border-bottom: 1px solid var(--border);
            text-decoration: none;
            color: inherit;
            transition: opacity 0.15s;
        }
        .post-card:hover { opacity: 0.75; }
        .post-card:first-child { padding-top: 0; }
        .post-number {
            font-family: 'DM Mono', monospace;
            font-size: 0.65rem;
            color: var(--ink-faint);
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }
        .post-card h2 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 1.6rem;
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
        }
        .post-card p {
            color: var(--ink-light);
            font-size: 0.95rem;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .post-meta {
            font-family: 'DM Mono', monospace;
            font-size: 0.65rem;
            color: var(--ink-faint);
            letter-spacing: 0.05em;
            margin-top: 0.75rem;
        }
        .post-arrow {
            font-size: 1.5rem;
            color: var(--border);
            align-self: center;
            transition: color 0.15s, transform 0.15s;
        }
        .post-card:hover .post-arrow {
            color: var(--accent);
            transform: translateX(4px);
        }

        /* ARTICLE */
        .article-header {
            border-bottom: 3px solid var(--ink);
            padding-bottom: 2rem;
            margin-bottom: 2.5rem;
        }
        .article-tag {
            font-family: 'DM Mono', monospace;
            font-size: 0.65rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1rem;
            display: block;
        }
        .article-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -0.03em;
            margin-bottom: 1.5rem;
        }
        .article-meta {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        .article-meta span {
            font-family: 'DM Mono', monospace;
            font-size: 0.65rem;
            color: var(--ink-faint);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .article-divider {
            width: 2rem;
            height: 2px;
            background: var(--border);
        }
        .article-body {
            font-size: 1.15rem;
            line-height: 1.9;
            color: var(--ink);
        }
        .article-body p { margin-bottom: 1.5rem; }

        /* FORM */
        .form-wrap {
            max-width: 640px;
        }
        .form-header {
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid var(--ink);
        }
        .form-header h1 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 2.5rem;
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 1.1;
        }
        .form-group { margin-bottom: 1.75rem; }
        .form-group label {
            display: block;
            font-family: 'DM Mono', monospace;
            font-size: 0.65rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--ink-faint);
            margin-bottom: 0.5rem;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            background: var(--paper-warm);
            border: 1px solid var(--border);
            border-radius: 0;
            padding: 0.85rem 1rem;
            font-family: 'Source Serif 4', Georgia, serif;
            font-size: 1rem;
            font-weight: 300;
            color: var(--ink);
            outline: none;
            transition: border-color 0.15s;
            resize: vertical;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--ink);
        }
        .btn-primary {
            font-family: 'DM Mono', monospace;
            font-size: 0.75rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            background: var(--ink);
            color: var(--paper);
            border: none;
            padding: 0.9rem 2.5rem;
            cursor: pointer;
            transition: background 0.15s;
        }
        .btn-primary:hover { background: var(--accent); }
        .btn-outline {
            font-family: 'DM Mono', monospace;
            font-size: 0.7rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--ink-light);
            text-decoration: none;
            border-bottom: 1px solid var(--border);
            padding-bottom: 1px;
            transition: color 0.15s, border-color 0.15s;
        }
        .btn-outline:hover { color: var(--accent); border-color: var(--accent); }
        .btn-danger {
            font-family: 'DM Mono', monospace;
            font-size: 0.7rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--accent);
            background: none;
            border: none;
            border-bottom: 1px solid transparent;
            cursor: pointer;
            padding: 0;
            transition: border-color 0.15s;
        }
        .btn-danger:hover { border-color: var(--accent); }

        /* ERRORS */
        .errors {
            border-left: 3px solid var(--accent);
            padding: 1rem 1.25rem;
            margin-bottom: 2rem;
            background: #fff5f5;
        }
        .errors li {
            font-family: 'DM Mono', monospace;
            font-size: 0.75rem;
            color: var(--accent);
            letter-spacing: 0.04em;
            list-style: none;
            margin-bottom: 0.25rem;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 6rem 0;
        }
        .empty-num {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 8rem;
            font-weight: 900;
            color: var(--border);
            line-height: 1;
            margin-bottom: 1rem;
        }
        .empty p {
            font-family: 'DM Mono', monospace;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--ink-faint);
        }

        /* PAGE HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }
        .page-header h1 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .page-header span {
            font-family: 'DM Mono', monospace;
            font-size: 0.65rem;
            color: var(--ink-faint);
            letter-spacing: 0.08em;
        }

        /* ACTION ROW */
        .action-row {
            display: flex;
            gap: 2rem;
            align-items: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
        }
    </style>
</head>
<body>

<nav class="nav">
    <div class="nav-top">
        <span class="nav-date" id="nav-date"></span>
        <div class="nav-links">
            @auth
                <a href="/posts/create">Yeni Yazı</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">Çıkış</button>
                </form>
            @else
                <a href="/login">Giriş Yap</a>
                <a href="/register">Kayıt Ol</a>
            @endauth
        </div>
    </div>
    <div class="nav-logo">
        <a href="/posts">BloGurbanli<span>.</span></a>
    </div>
</nav>

<main>
    @yield('content')
</main>

<script>
    const d = new Date();
    const opts = { weekday:'long', year:'numeric', month:'long', day:'numeric' };
    document.getElementById('nav-date').textContent = d.toLocaleDateString('tr-TR', opts);
</script>

</body>
</html>