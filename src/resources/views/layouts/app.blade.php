<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FFF6E9">
    <title>@yield('title', 'Teras Hilda') - Rasanya Beda, Harganya Bersahabat</title>
    <meta name="description" content="@yield('description', 'Teras Hilda - Mie Jebew Mentai, Kwetiaw, Burger, Pangsit dan berbagai makanan lezat lainnya. Pesan online, tanpa ribet!')">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bricolage-grotesque:500,600,700,800|plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        :root {
            --paper: #FFF6E9;
            --paper-2: #FFEED8;
            --ink: #231A12;
            --ink-soft: #5C4B3A;
            --cabai: #E4572E;
            --cabai-dark: #C7461F;
            --kunyit: #F5B301;
            --kunyit-soft: #FFE9B8;
            --pandan: #2E8B57;
            --pandan-soft: #DDF0E4;
            --krem: #FFFBF3;
            --shadow: 6px 6px 0 var(--ink);
            --shadow-sm: 4px 4px 0 var(--ink);
        }
        * { -webkit-tap-highlight-color: transparent; box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 92px; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: 'Plus Jakarta Sans', system-ui, sans-serif; -webkit-font-smoothing: antialiased; }
        ::selection { background: var(--kunyit); color: var(--ink); }
        ::-webkit-scrollbar { width: 10px; height: 10px; }
        ::-webkit-scrollbar-track { background: var(--paper-2); }
        ::-webkit-scrollbar-thumb { background: var(--ink); border-radius: 99px; border: 2px solid var(--paper-2); }
        img { max-width: 100%; display: block; }
        a { text-decoration: none; color: inherit; }
        p, h1, h2, h3, h4, ul { margin: 0; padding: 0; }
        ul { list-style: none; }
        button { font-family: inherit; }
        .display { font-family: 'Bricolage Grotesque', 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.02em; font-weight: 800; }

        .wrap { width: min(1180px, 100% - 40px); margin-inline: auto; }
        .section { padding: clamp(64px, 9vw, 112px) 0; }
        .center { text-align: center; }

        #progress-bar { position: fixed; top: 0; left: 0; height: 4px; width: 0; background: var(--cabai); z-index: 100; border-radius: 0 4px 4px 0; }

        .site-header { position: sticky; top: 0; z-index: 60; background: rgba(255, 246, 233, 0.93); backdrop-filter: blur(14px); border-bottom: 2px solid var(--ink); transition: box-shadow 0.3s ease; }
        .site-header.scrolled { box-shadow: 0 6px 0 rgba(35, 26, 18, 0.1); }
        .header-row { display: flex; align-items: center; justify-content: space-between; gap: 18px; min-height: 78px; }
        .logo { display: flex; align-items: center; gap: 12px; }
        .logo-badge { width: 46px; height: 46px; border-radius: 15px; background: var(--kunyit); border: 2px solid var(--ink); box-shadow: 3px 3px 0 var(--ink); display: grid; place-items: center; overflow: hidden; flex: none; }
        .logo-badge img { width: 100%; height: 100%; object-fit: cover; }
        .brand-name { font-size: 1.05rem; line-height: 1.15; }
        .brand-tag { font-size: 0.62rem; letter-spacing: 0.18em; text-transform: uppercase; font-weight: 800; color: var(--cabai); }
        .header-nav { display: flex; align-items: center; gap: 4px; }
        .nav-link { position: relative; padding: 10px 14px; border-radius: 12px; font-weight: 700; font-size: 0.92rem; transition: background 0.2s; }
        .nav-link:hover { background: var(--kunyit-soft); }
        .nav-link::after { content: ""; position: absolute; left: 16px; right: 16px; bottom: 6px; height: 2.5px; background: var(--cabai); border-radius: 2px; transform: scaleX(0); transform-origin: left; transition: transform 0.25s ease; }
        .nav-link:hover::after { transform: scaleX(1); }
        .header-actions { display: flex; align-items: center; gap: 10px; }
        .icon-btn { width: 46px; height: 46px; border-radius: 15px; border: 2px solid var(--ink); background: #fff; box-shadow: 3px 3px 0 var(--ink); display: grid; place-items: center; cursor: pointer; transition: transform 0.15s, box-shadow 0.15s; color: var(--ink); }
        .icon-btn:hover { transform: translate(-2px, -2px); box-shadow: 5px 5px 0 var(--ink); }
        .icon-btn svg { width: 20px; height: 20px; }
        .cart-btn { position: relative; display: inline-flex; align-items: center; gap: 9px; height: 46px; padding: 0 20px; border-radius: 15px; border: 2px solid var(--ink); background: var(--cabai); color: #fff; font-weight: 800; font-size: 0.9rem; box-shadow: 3px 3px 0 var(--ink); cursor: pointer; transition: transform 0.15s, box-shadow 0.15s; }
        .cart-btn:hover { transform: translate(-2px, -2px); box-shadow: 5px 5px 0 var(--ink); }
        .cart-btn svg { width: 19px; height: 19px; }
        .cart-badge { position: absolute; top: -10px; right: -10px; min-width: 26px; height: 26px; padding: 0 6px; border-radius: 99px; background: var(--kunyit); color: var(--ink); border: 2px solid var(--ink); font-size: 0.72rem; font-weight: 800; display: grid; place-items: center; }
        .cart-badge.hide { display: none; }
        .cart-badge.bump { animation: bump 0.5s cubic-bezier(0.34, 1.56, 0.64, 1); }
        @keyframes bump { 0% { transform: scale(1); } 40% { transform: scale(1.5) rotate(-10deg); } 100% { transform: scale(1); } }
        .mobile-menu { display: none; border-top: 2px solid var(--ink); background: var(--paper); padding: 8px 0 16px; }
        .mobile-menu.open { display: block; }
        .mobile-menu a { display: flex; align-items: center; justify-content: space-between; padding: 13px 2px; font-weight: 700; border-bottom: 1.5px dashed rgba(35, 26, 18, 0.22); }
        .mobile-menu a svg { width: 16px; height: 16px; }
        @media (max-width: 920px) { .desktop-only { display: none !important; } }
        @media (min-width: 921px) { .mobile-only { display: none !important; } }

        .sticker { display: inline-flex; align-items: center; gap: 8px; border: 2px solid var(--ink); border-radius: 99px; padding: 7px 15px; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.14em; text-transform: uppercase; background: #fff; box-shadow: 3px 3px 0 var(--ink); }
        .sticker svg { width: 13px; height: 13px; }
        .rot-1 { transform: rotate(-2deg); }
        .rot-2 { transform: rotate(1.6deg); }
        .ping-dot { position: relative; width: 8px; height: 8px; border-radius: 50%; background: var(--pandan); flex: none; }
        .ping-dot::after { content: ""; position: absolute; inset: -4px; border-radius: 50%; border: 2px solid var(--pandan); animation: ping 1.6s ease-out infinite; }
        @keyframes ping { 0% { transform: scale(0.6); opacity: 1; } 100% { transform: scale(1.6); opacity: 0; } }

        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 10px; border: 2px solid var(--ink); border-radius: 99px; padding: 14px 26px; font-weight: 800; font-size: 0.94rem; line-height: 1; box-shadow: var(--shadow-sm); cursor: pointer; transition: transform 0.18s ease, box-shadow 0.18s ease, background 0.18s ease; }
        .btn svg { width: 18px; height: 18px; }
        .btn:hover { transform: translate(-2px, -2px); box-shadow: 7px 7px 0 var(--ink); }
        .btn:active { transform: translate(1px, 1px); box-shadow: 2px 2px 0 var(--ink); }
        .btn-cabai { background: var(--cabai); color: #fff; }
        .btn-cabai:hover { background: var(--cabai-dark); }
        .btn-kunyit { background: var(--kunyit); color: var(--ink); }
        .btn-ink { background: var(--ink); color: var(--paper); }
        .btn-paper { background: #fff; color: var(--ink); }
        .btn-lg { padding: 17px 32px; font-size: 1rem; }
        .btn-sm { padding: 10px 18px; font-size: 0.82rem; }
        .btn-block { width: 100%; }

        .card { background: #fff; border: 2px solid var(--ink); border-radius: 22px; box-shadow: var(--shadow); }
        .soft-card { background: var(--krem); border: 2px solid var(--ink); border-radius: 22px; }
        .tape { position: absolute; top: -13px; left: 50%; transform: translateX(-50%) rotate(-3deg); width: 108px; height: 26px; background: rgba(245, 179, 1, 0.85); border: 2px solid var(--ink); border-radius: 5px; box-shadow: 2px 2px 0 rgba(35, 26, 18, 0.25); z-index: 3; }

        .input { width: 100%; border: 2px solid var(--ink); border-radius: 14px; background: #fff; padding: 14px 16px; font-size: 0.92rem; font-family: inherit; color: var(--ink); transition: box-shadow 0.15s, transform 0.15s; }
        .input:focus { outline: none; box-shadow: 4px 4px 0 var(--kunyit); transform: translate(-1px, -1px); }
        .input::placeholder { color: rgba(92, 75, 58, 0.55); }
        .label { display: block; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 7px; color: var(--ink-soft); }
        .field-error { margin-top: 6px; font-size: 0.75rem; font-weight: 700; color: var(--cabai); }
        .choice { position: relative; display: block; cursor: pointer; }
        .choice input { position: absolute; opacity: 0; pointer-events: none; }
        .choice-box { display: flex; align-items: center; justify-content: center; gap: 10px; border: 2px solid var(--ink); border-radius: 16px; background: #fff; padding: 15px 12px; font-weight: 800; font-size: 0.85rem; text-align: center; transition: transform 0.15s, box-shadow 0.15s, background 0.15s; }
        .choice-box svg { width: 20px; height: 20px; flex: none; }
        .choice input:checked + .choice-box { background: var(--kunyit-soft); box-shadow: 4px 4px 0 var(--ink); transform: translate(-1px, -1px); }

        .marquee { overflow: hidden; border-block: 2px solid var(--ink); background: var(--kunyit); }
        .marquee-track { display: flex; width: max-content; animation: marquee 26s linear infinite; }
        .marquee:hover .marquee-track { animation-play-state: paused; }
        .marquee-item { display: flex; align-items: center; gap: 20px; padding: 15px 20px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-size: 0.84rem; white-space: nowrap; }
        .marquee-item svg { width: 16px; height: 16px; flex: none; }
        .marquee-dark { background: var(--ink); color: var(--paper); }
        .marquee-dark .marquee-item svg { color: var(--kunyit); }
        @keyframes marquee { to { transform: translateX(-50%); } }

        [data-reveal] { opacity: 0; transform: translateY(34px); transition: opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1), transform 0.7s cubic-bezier(0.22, 1, 0.36, 1); }
        [data-reveal="left"] { transform: translateX(-46px); }
        [data-reveal="right"] { transform: translateX(46px); }
        [data-reveal="scale"] { transform: scale(0.9); }
        [data-reveal].is-in { opacity: 1; transform: none; }

        .dot-bg { background-image: radial-gradient(rgba(35, 26, 18, 0.1) 1.5px, transparent 1.5px); background-size: 24px 24px; }
        .clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .hide { display: none !important; }
        .hero { position: relative; overflow: hidden; background: radial-gradient(circle at 12% 18%, rgba(245, 179, 1, 0.3), transparent 42%), radial-gradient(circle at 90% 10%, rgba(228, 87, 46, 0.16), transparent 40%), radial-gradient(circle at 80% 90%, rgba(46, 139, 87, 0.16), transparent 45%), var(--paper); }
        .hero::before { content: ""; position: absolute; inset: 0; background-image: radial-gradient(rgba(35, 26, 18, 0.09) 1.5px, transparent 1.5px); background-size: 24px 24px; }
        #hero-glow { position: absolute; width: 360px; height: 360px; border-radius: 50%; background: radial-gradient(circle, rgba(245, 179, 1, 0.4), transparent 65%); left: 55%; top: 14%; pointer-events: none; z-index: 0; filter: blur(6px); }
        .hero-grid { position: relative; z-index: 1; display: grid; grid-template-columns: 1fr; gap: 56px; align-items: center; padding: clamp(56px, 8vw, 96px) 0; }
        @media (min-width: 1000px) { .hero-grid { grid-template-columns: 1.05fr 0.95fr; } }
        .hero-title { font-size: clamp(2.35rem, 5.4vw, 4.2rem); line-height: 1.03; margin: 22px 0 20px; }
        .mark { background: linear-gradient(180deg, transparent 58%, var(--kunyit) 58%); padding: 0 0.1em; border-radius: 5px; }
        .mark-2 { background: linear-gradient(180deg, transparent 58%, rgba(46, 139, 87, 0.38) 58%); padding: 0 0.1em; border-radius: 5px; }
        .hero-sub { font-size: 1.04rem; line-height: 1.75; color: var(--ink-soft); max-width: 56ch; }
        .rotator { display: inline-flex; align-items: center; gap: 10px; background: #fff; border: 2px solid var(--ink); border-radius: 18px; padding: 12px 18px; box-shadow: var(--shadow-sm); font-weight: 800; font-size: 0.95rem; margin-top: 24px; }
        .rotator svg { width: 18px; height: 18px; color: var(--kunyit); flex: none; }
        .rotator-word { display: inline-block; color: var(--cabai); }
        .rotator-word.word-in { animation: wordIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1); }
        @keyframes wordIn { from { opacity: 0; transform: translateY(12px) rotateX(50deg); } to { opacity: 1; transform: none; } }
        .hero-cta { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 30px; }
        .stat-row { display: flex; flex-wrap: wrap; gap: 30px; margin-top: 40px; }
        .stat { display: flex; flex-direction: column; }
        .stat-num { font-size: 1.95rem; line-height: 1; }
        .stat-label { font-size: 0.68rem; font-weight: 800; letter-spacing: 0.16em; text-transform: uppercase; color: var(--ink-soft); margin-top: 7px; }
        .stat-sep { width: 2px; background: rgba(35, 26, 18, 0.18); border-radius: 2px; }

        .illust-wrap { position: relative; }
        .illust-card { position: relative; background: #fff; border: 3px solid var(--ink); border-radius: 34px; box-shadow: 10px 10px 0 var(--ink); padding: 22px; transform: rotate(-1.5deg); z-index: 1; }
        .illust-stage { position: relative; background: linear-gradient(180deg, #FFF3DC, #FFE9C9); border: 2px solid var(--ink); border-radius: 22px; overflow: hidden; }
        .illust-stage svg { width: 100%; height: auto; }
        .illust-img { width: 100%; aspect-ratio: 4 / 3; object-fit: cover; border-radius: 20px; border: 2px solid var(--ink); }
        .doodle { position: absolute; display: inline-flex; align-items: center; gap: 8px; background: #fff; border: 2px solid var(--ink); border-radius: 16px; padding: 10px 15px; font-weight: 800; font-size: 0.78rem; box-shadow: 4px 4px 0 var(--ink); z-index: 2; transform: rotate(var(--rot, 0deg)); will-change: transform; }
        .doodle svg { width: 16px; height: 16px; }
        .doodle-1 { top: -20px; left: -18px; }
        .doodle-2 { bottom: 30px; right: -24px; background: var(--kunyit); }
        .doodle-3 { bottom: -18px; left: 6%; background: var(--pandan-soft); }
        .bob { animation: bob 5s ease-in-out infinite; }
        .bob-slow { animation: bob 7s ease-in-out infinite; }
        @keyframes bob { 0%, 100% { transform: translateY(0) rotate(var(--rot, 0deg)); } 50% { transform: translateY(-12px) rotate(var(--rot, 0deg)); } }
        .steam path { animation: steam 2.6s ease-in-out infinite; }
        .steam path:nth-child(2) { animation-delay: 0.55s; }
        .steam path:nth-child(3) { animation-delay: 1.1s; }
        @keyframes steam { 0% { opacity: 0; transform: translateY(8px) scale(0.92); } 35% { opacity: 0.7; } 100% { opacity: 0; transform: translateY(-16px) scale(1.06); } }

        .section-head { margin-bottom: clamp(34px, 5vw, 54px); }
        .section-title { font-size: clamp(1.9rem, 3.8vw, 3rem); line-height: 1.08; margin-top: 16px; }
        .section-sub { margin-top: 14px; color: var(--ink-soft); font-size: 0.98rem; line-height: 1.7; }
        .head-center { max-width: 640px; margin-inline: auto; }

        .steps-row { display: grid; grid-template-columns: 1fr; gap: 20px; margin-bottom: 50px; }
        @media (min-width: 720px) { .steps-row { grid-template-columns: repeat(3, 1fr); } }
        .step-card { position: relative; padding: 30px 22px 22px; background: #fff; border: 2px solid var(--ink); border-radius: 20px; box-shadow: var(--shadow-sm); }
        .step-num { position: absolute; top: -18px; left: 20px; width: 42px; height: 42px; border-radius: 14px; border: 2px solid var(--ink); background: var(--kunyit); display: grid; place-items: center; font-weight: 800; box-shadow: 3px 3px 0 var(--ink); }
        .step-card h3 { font-size: 1rem; margin: 4px 0 8px; }
        .step-card p { font-size: 0.85rem; color: var(--ink-soft); line-height: 1.6; }

        .filter-row { display: flex; gap: 10px; overflow-x: auto; padding: 6px 4px 16px; margin-bottom: 34px; }
        .filter-pill { flex: none; border: 2px solid var(--ink); border-radius: 99px; background: #fff; padding: 10px 22px; font-weight: 800; font-size: 0.85rem; cursor: pointer; box-shadow: 3px 3px 0 var(--ink); transition: transform 0.15s, box-shadow 0.15s, background 0.15s; color: var(--ink); }
        .filter-pill:hover { transform: translate(-2px, -2px); box-shadow: 5px 5px 0 var(--ink); }
        .filter-pill.active { background: var(--ink); color: var(--paper); }

        .menu-grid { display: grid; grid-template-columns: repeat(1, 1fr); gap: 24px; }
        @media (min-width: 560px) { .menu-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 900px) { .menu-grid { grid-template-columns: repeat(3, 1fr); } }
        @media (min-width: 1200px) { .menu-grid { grid-template-columns: repeat(4, 1fr); } }
        .menu-card { position: relative; background: #fff; border: 2px solid var(--ink); border-radius: 24px; box-shadow: var(--shadow); overflow: hidden; transform-style: preserve-3d; will-change: transform; }
        .menu-card::after { content: ""; position: absolute; inset: 0; border-radius: inherit; background: radial-gradient(240px circle at var(--mx, 50%) var(--my, 50%), rgba(245, 179, 1, 0.22), transparent 62%); opacity: 0; transition: opacity 0.25s; pointer-events: none; z-index: 3; }
        .menu-card:hover::after { opacity: 1; }
        .menu-fig { position: relative; height: 172px; border-bottom: 2px solid var(--ink); display: grid; place-items: center; background: var(--ill-bg, #FFEFC2); overflow: hidden; }
        .menu-fig img { width: 100%; height: 100%; object-fit: cover; }
        .menu-ill { width: 96px; height: 96px; border-radius: 28px; background: #fff; border: 2px solid var(--ink); box-shadow: 4px 4px 0 var(--ink); display: grid; place-items: center; color: var(--ill-fg, var(--cabai)); transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1); }
        .menu-ill svg { width: 46px; height: 46px; }
        .menu-card:hover .menu-ill { transform: rotate(-6deg) scale(1.08); }
        .corner-badge { position: absolute; top: 12px; right: 12px; z-index: 2; border: 2px solid var(--ink); border-radius: 12px; padding: 5px 11px; font-size: 0.68rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; box-shadow: 3px 3px 0 var(--ink); transform: rotate(4deg); }
        .corner-badge.fav { left: 12px; right: auto; background: var(--kunyit); transform: rotate(-4deg); }
        .corner-badge.promo { background: var(--cabai); color: #fff; }
        .menu-body { padding: 18px; }
        .menu-name { font-size: 1.02rem; line-height: 1.3; margin-bottom: 7px; }
        .menu-desc { font-size: 0.82rem; color: var(--ink-soft); line-height: 1.6; min-height: 2.6em; }
        .price-row { display: flex; align-items: flex-end; justify-content: space-between; gap: 12px; margin-top: 16px; }
        .price { font-size: 1.12rem; font-weight: 800; }
        .price-old { font-size: 0.76rem; color: var(--ink-soft); text-decoration: line-through; margin-bottom: 2px; }
        .add-btn { flex: none; display: inline-flex; align-items: center; gap: 7px; border: 2px solid var(--ink); border-radius: 13px; background: var(--cabai); color: #fff; padding: 10px 15px; font-weight: 800; font-size: 0.82rem; cursor: pointer; box-shadow: 3px 3px 0 var(--ink); transition: transform 0.15s, box-shadow 0.15s, background 0.15s; }
        .add-btn:hover { transform: translate(-2px, -2px); box-shadow: 5px 5px 0 var(--ink); }
        .add-btn:active { transform: translate(1px, 1px); box-shadow: 1px 1px 0 var(--ink); }
        .add-btn svg { width: 15px; height: 15px; }

        .about-grid { display: grid; grid-template-columns: 1fr; gap: 54px; align-items: center; }
        @media (min-width: 1000px) { .about-grid { grid-template-columns: 1.05fr 0.95fr; } }
        .about-text { color: var(--ink-soft); line-height: 1.8; font-size: 0.97rem; }
        .about-text + .about-text { margin-top: 16px; }
        .check-list { margin-top: 26px; display: grid; gap: 14px; }
        .check-list li { display: flex; align-items: flex-start; gap: 12px; font-weight: 600; color: var(--ink); font-size: 0.93rem; }
        .check-icon { flex: none; width: 26px; height: 26px; border-radius: 9px; border: 2px solid var(--ink); background: var(--pandan); color: #fff; display: grid; place-items: center; box-shadow: 2px 2px 0 var(--ink); }
        .check-icon svg { width: 13px; height: 13px; }
        .info-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-top: 34px; }
        .info-card { padding: 18px; border: 2px solid var(--ink); border-radius: 18px; background: #fff; box-shadow: var(--shadow-sm); }
        .icon-chip { width: 40px; height: 40px; border-radius: 13px; border: 2px solid var(--ink); display: grid; place-items: center; margin-bottom: 12px; box-shadow: 2px 2px 0 var(--ink); }
        .icon-chip svg { width: 19px; height: 19px; }
        .info-card h4 { font-size: 0.72rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--ink-soft); margin-bottom: 6px; }
        .info-card p { font-size: 0.83rem; font-weight: 600; line-height: 1.55; word-break: break-word; }
        .collage { position: relative; }
        .polaroid { position: relative; background: #fff; border: 2px solid var(--ink); border-radius: 26px; box-shadow: 10px 10px 0 var(--ink); padding: 18px 18px 24px; transform: rotate(1.6deg); }
        .polaroid-stage { border: 2px solid var(--ink); border-radius: 16px; overflow: hidden; background: linear-gradient(180deg, #FFF3DC, #FFE9C9); }
        .polaroid-stage svg { width: 100%; height: auto; }
        .polaroid-caption { text-align: center; margin-top: 14px; font-size: 0.85rem; color: var(--ink-soft); font-weight: 600; }

        .testi-section { border-block: 2px solid var(--ink); background: linear-gradient(180deg, var(--kunyit-soft), var(--paper-2)); }
        .testi-grid { display: grid; grid-template-columns: 1fr; gap: 28px; }
        @media (min-width: 640px) { .testi-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 1020px) { .testi-grid { grid-template-columns: repeat(3, 1fr); } }
        .testi-card { position: relative; background: #fff; border: 2px solid var(--ink); border-radius: 22px; box-shadow: var(--shadow); padding: 28px 22px 22px; transform: rotate(var(--tilt, 0deg)); transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .testi-card:hover { transform: rotate(0deg) translateY(-6px); box-shadow: 9px 9px 0 var(--ink); }
        .stars { display: flex; gap: 3px; color: var(--kunyit); }
        .stars svg { width: 17px; height: 17px; }
        .stars svg.off { color: rgba(35, 26, 18, 0.16); }
        .testi-msg { margin: 14px 0 20px; font-size: 0.9rem; line-height: 1.75; color: var(--ink-soft); }
        .testi-who { display: flex; align-items: center; gap: 12px; }
        .testi-avatar { width: 44px; height: 44px; border-radius: 15px; border: 2px solid var(--ink); display: grid; place-items: center; font-weight: 800; box-shadow: 3px 3px 0 var(--ink); flex: none; }
        .testi-name { font-size: 0.9rem; font-weight: 800; }
        .testi-origin { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.12em; color: var(--ink-soft); font-weight: 700; }
        .rating-banner { display: inline-flex; align-items: center; gap: 14px; background: var(--ink); color: var(--paper); border: 2px solid var(--ink); border-radius: 18px; padding: 14px 22px; box-shadow: var(--shadow-sm); }
        .rating-banner .big { font-size: 1.6rem; }

        .contact-grid { display: grid; grid-template-columns: 1fr; gap: 46px; align-items: start; }
        @media (min-width: 1000px) { .contact-grid { grid-template-columns: 0.95fr 1.05fr; } }
        .contact-list { display: grid; gap: 16px; margin-top: 30px; }
        .contact-item { display: flex; align-items: center; gap: 15px; padding: 17px 19px; border: 2px solid var(--ink); border-radius: 19px; background: #fff; box-shadow: var(--shadow-sm); transition: transform 0.2s, box-shadow 0.2s; }
        .contact-item:hover { transform: translate(-2px, -2px); box-shadow: 6px 6px 0 var(--ink); }
        .contact-item .icon-chip { margin: 0; flex: none; }
        .contact-item h4 { font-size: 0.68rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--ink-soft); margin-bottom: 4px; }
        .contact-item p { font-size: 0.9rem; font-weight: 700; word-break: break-word; }
        .form-card { position: relative; background: #fff; border: 3px solid var(--ink); border-radius: 30px; box-shadow: 10px 10px 0 var(--ink); padding: 34px 28px 30px; }

        .footer { background: var(--ink); color: var(--paper); position: relative; overflow: hidden; }
        .footer::before { content: ""; position: absolute; inset: 0; background-image: radial-gradient(rgba(255, 246, 233, 0.06) 1.5px, transparent 1.5px); background-size: 26px 26px; }
        .footer-inner { position: relative; z-index: 1; }
        .footer-grid { display: grid; grid-template-columns: 1fr; gap: 40px; padding: clamp(48px, 7vw, 80px) 0 40px; }
        @media (min-width: 780px) { .footer-grid { grid-template-columns: 1.4fr 1fr 1fr; } }
        .footer-title { font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--kunyit); font-weight: 800; margin-bottom: 18px; }
        .footer-link { display: block; padding: 6px 0; color: rgba(255, 246, 233, 0.75); font-size: 0.9rem; font-weight: 600; transition: color 0.2s, transform 0.2s; }
        .footer-link:hover { color: var(--kunyit); transform: translateX(4px); }
        .footer-hours { display: flex; justify-content: space-between; gap: 16px; padding: 7px 0; font-size: 0.88rem; color: rgba(255, 246, 233, 0.75); border-bottom: 1px dashed rgba(255, 246, 233, 0.18); }
        .footer-hours b { color: var(--paper); }
        .social-btn { width: 44px; height: 44px; border: 2px solid var(--paper); border-radius: 14px; display: grid; place-items: center; color: var(--paper); transition: 0.2s; }
        .social-btn:hover { background: var(--kunyit); border-color: var(--kunyit); color: var(--ink); transform: translateY(-3px); }
        .social-btn svg { width: 19px; height: 19px; }
        .footer-bottom { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; justify-content: space-between; padding: 22px 0; border-top: 2px dashed rgba(255, 246, 233, 0.22); font-size: 0.8rem; color: rgba(255, 246, 233, 0.6); }
        .watermark { font-size: clamp(3rem, 11vw, 8rem); line-height: 0.9; text-align: center; color: transparent; -webkit-text-stroke: 2px rgba(255, 246, 233, 0.14); user-select: none; padding-bottom: 26px; font-family: 'Bricolage Grotesque', sans-serif; font-weight: 800; letter-spacing: -0.02em; }

        #to-top { position: fixed; right: 22px; bottom: 22px; z-index: 70; width: 54px; height: 54px; border-radius: 50%; background: #fff; border: 2px solid var(--ink); box-shadow: var(--shadow-sm); display: grid; place-items: center; cursor: pointer; opacity: 0; pointer-events: none; transform: translateY(16px); transition: opacity 0.3s, transform 0.3s; }
        #to-top.show { opacity: 1; pointer-events: auto; transform: none; }
        #to-top svg.ring { position: absolute; inset: 0; width: 100%; height: 100%; transform: rotate(-90deg); }
        #to-top .ring-bg { fill: none; stroke: rgba(35, 26, 18, 0.12); stroke-width: 3; }
        #to-top .ring-fg { fill: none; stroke: var(--cabai); stroke-width: 3; stroke-linecap: round; stroke-dasharray: 138.2; stroke-dashoffset: 138.2; }
        #to-top .arrow { width: 20px; height: 20px; position: relative; z-index: 1; }

        .toast { position: fixed; right: 22px; bottom: 22px; z-index: 120; display: flex; align-items: center; gap: 12px; background: #fff; border: 2px solid var(--ink); border-radius: 17px; box-shadow: var(--shadow); padding: 14px 18px; transform: translateY(180%) rotate(2deg); transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1); max-width: min(360px, calc(100vw - 44px)); }
        .toast.show { transform: translateY(0) rotate(0deg); }
        .toast-icon { flex: none; width: 30px; height: 30px; border-radius: 10px; background: var(--pandan); color: #fff; display: grid; place-items: center; border: 2px solid var(--ink); }
        .toast-icon svg { width: 14px; height: 14px; }
        .toast-text { font-size: 0.85rem; font-weight: 700; line-height: 1.4; }
        @media (max-width: 640px) { .toast { left: 22px; right: 22px; } }

        .burst-particle { position: fixed; z-index: 130; pointer-events: none; border-radius: 3px; transform: translate(-50%, -50%); }

        .order-success { position: fixed; inset: 0; z-index: 140; display: grid; place-items: center; padding: 20px; background: rgba(35, 26, 18, 0.55); backdrop-filter: blur(6px); animation: fadeIn 0.25s ease; }
        .order-success-card { position: relative; width: min(440px, 100%); background: var(--paper); border: 3px solid var(--ink); border-radius: 28px; box-shadow: 10px 10px 0 var(--ink); padding: 40px 28px 28px; text-align: center; animation: popIn 0.45s cubic-bezier(0.34, 1.56, 0.64, 1); }
        @keyframes popIn { from { transform: scale(0.85) rotate(-2deg); opacity: 0; } to { transform: none; opacity: 1; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .order-success-card h3 { font-size: 1.7rem; margin: 16px 0 6px; }
        .order-success-card > p { font-size: 0.88rem; color: var(--ink-soft); }
        .order-number { display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; margin: 16px 0; background: #fff; border: 2px dashed var(--ink); border-radius: 16px; padding: 15px 18px; font-family: 'Bricolage Grotesque', monospace; font-size: 1.35rem; font-weight: 800; cursor: pointer; color: var(--ink); }
        .order-number svg { width: 18px; height: 18px; color: var(--ink-soft); flex: none; }
        .order-success-actions { display: flex; gap: 12px; justify-content: center; margin-top: 18px; flex-wrap: wrap; }

        .drawer-overlay { position: fixed; inset: 0; background: rgba(35, 26, 18, 0.5); backdrop-filter: blur(4px); z-index: 90; }
        .drawer { position: fixed; top: 0; right: 0; bottom: 0; width: min(450px, 100%); background: var(--paper); border-left: 3px solid var(--ink); z-index: 91; display: flex; flex-direction: column; animation: drawerIn 0.38s cubic-bezier(0.22, 1, 0.36, 1); }
        @keyframes drawerIn { from { transform: translateX(100%); } to { transform: none; } }
        .drawer-head { display: flex; align-items: center; justify-content: space-between; padding: 20px 22px; border-bottom: 2px solid var(--ink); background: #fff; }
        .drawer-head h2 { font-size: 1.15rem; display: flex; align-items: center; gap: 10px; }
        .drawer-count { font-size: 0.72rem; background: var(--kunyit); border: 2px solid var(--ink); border-radius: 99px; padding: 3px 10px; font-weight: 800; }
        .drawer-body { flex: 1; overflow-y: auto; padding: 20px 22px; display: flex; flex-direction: column; gap: 14px; }
        .drawer-foot { border-top: 2px solid var(--ink); background: #fff; padding: 20px 22px; }
        .cart-item { display: grid; grid-template-columns: 62px 1fr auto; gap: 13px; border: 2px solid var(--ink); border-radius: 18px; background: #fff; padding: 12px; box-shadow: 3px 3px 0 var(--ink); }
        .cart-thumb { width: 62px; height: 62px; border-radius: 14px; border: 2px solid var(--ink); background: var(--kunyit-soft); display: grid; place-items: center; overflow: hidden; color: var(--ink); }
        .cart-thumb img { width: 100%; height: 100%; object-fit: cover; }
        .cart-thumb svg { width: 28px; height: 28px; }
        .cart-name { font-size: 0.86rem; font-weight: 800; line-height: 1.3; }
        .cart-price { font-size: 0.8rem; font-weight: 800; color: var(--cabai); margin-top: 3px; }
        .qty-row { display: flex; align-items: center; gap: 8px; margin-top: 8px; }
        .qty-btn { width: 30px; height: 30px; border: 2px solid var(--ink); border-radius: 10px; background: #fff; font-weight: 800; font-size: 1rem; cursor: pointer; display: grid; place-items: center; box-shadow: 2px 2px 0 var(--ink); color: var(--ink); transition: background 0.15s; }
        .qty-btn:hover { background: var(--kunyit-soft); }
        .qty-val { font-weight: 800; font-size: 0.9rem; min-width: 22px; text-align: center; }
        .cart-notes { width: 100%; margin-top: 8px; border: 2px dashed rgba(35, 26, 18, 0.3); border-radius: 10px; padding: 7px 10px; font-size: 0.75rem; background: var(--krem); font-family: inherit; }
        .cart-notes:focus { outline: none; border-color: var(--cabai); }
        .cart-item-side { display: flex; flex-direction: column; align-items: flex-end; justify-content: space-between; }
        .cart-remove { border: none; background: none; cursor: pointer; color: var(--ink-soft); padding: 4px; transition: color 0.15s, transform 0.15s; }
        .cart-remove:hover { color: var(--cabai); transform: scale(1.15); }
        .cart-remove svg { width: 16px; height: 16px; }
        .cart-subtotal { font-size: 0.85rem; font-weight: 800; }
        .empty-state { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; gap: 10px; padding: 40px 10px; }
        .empty-state svg { width: 74px; height: 74px; color: var(--ink-soft); opacity: 0.6; }
        .empty-state p { color: var(--ink-soft); font-weight: 600; font-size: 0.92rem; }
        .sum-row { display: flex; justify-content: space-between; font-size: 0.88rem; padding: 5px 0; color: var(--ink-soft); font-weight: 600; }
        .sum-row.total { font-size: 1.1rem; font-weight: 800; color: var(--ink); border-top: 2px dashed rgba(35, 26, 18, 0.3); margin-top: 8px; padding-top: 12px; }
        .sum-row.total b { color: var(--cabai); }

        .status-chip { display: inline-flex; align-items: center; gap: 7px; border: 2px solid var(--ink); border-radius: 99px; padding: 7px 15px; font-size: 0.75rem; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; box-shadow: 3px 3px 0 var(--ink); }
        .status-pending { background: var(--kunyit-soft); }
        .status-confirmed { background: #D6E9FF; }
        .status-processing { background: #E9DDFF; }
        .status-ready, .status-completed { background: var(--pandan-soft); }
        .status-cancelled { background: #FFDFD6; }
        .timeline { display: flex; flex-direction: column; }
        .tl-step { display: grid; grid-template-columns: 50px 1fr; gap: 16px; position: relative; padding-bottom: 28px; }
        .tl-step:last-child { padding-bottom: 0; }
        .tl-step::before { content: ""; position: absolute; left: 24px; top: 52px; bottom: 2px; border-left: 3px dashed rgba(35, 26, 18, 0.25); }
        .tl-step:last-child::before { display: none; }
        .tl-node { width: 50px; height: 50px; border-radius: 16px; border: 2px solid var(--ink); display: grid; place-items: center; background: #fff; box-shadow: 3px 3px 0 var(--ink); color: var(--ink-soft); }
        .tl-node svg { width: 22px; height: 22px; }
        .tl-step.done .tl-node { background: var(--pandan); color: #fff; }
        .tl-step.current .tl-node { background: var(--kunyit); animation: bob 2.4s ease-in-out infinite; }
        .tl-label { font-weight: 800; font-size: 0.95rem; display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
        .tl-desc { font-size: 0.8rem; color: var(--ink-soft); margin-top: 3px; }
        .tl-step:not(.done):not(.current) .tl-label { color: var(--ink-soft); }
        .now-chip { font-size: 0.62rem; background: var(--cabai); color: #fff; border: 2px solid var(--ink); border-radius: 99px; padding: 3px 9px; letter-spacing: 0.1em; animation: pingSoft 1.8s ease-in-out infinite; }
        @keyframes pingSoft { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.08); } }

        .step-head { display: flex; align-items: center; gap: 12px; margin: 26px 0 16px; }
        .step-head:first-child { margin-top: 0; }
        .step-head .step-num { position: static; width: 36px; height: 36px; border-radius: 12px; font-size: 0.85rem; }
        .step-head h3 { font-size: 1.02rem; }
        .form-grid-2 { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 640px) { .form-grid-2 { grid-template-columns: repeat(2, 1fr); } }
        .form-grid-4 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
        @media (min-width: 640px) { .form-grid-4 { grid-template-columns: repeat(4, 1fr); } }
        .summary-card { background: var(--kunyit-soft); border: 2px solid var(--ink); border-radius: 20px; padding: 20px; box-shadow: var(--shadow-sm); }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after { animation-duration: 0.01ms !important; animation-iteration-count: 1 !important; transition-duration: 0.01ms !important; }
            [data-reveal] { opacity: 1; transform: none; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <div id="progress-bar"></div>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @livewire('cart-component')

    <button id="to-top" aria-label="Kembali ke atas">
        <svg class="ring" viewBox="0 0 54 54"><circle class="ring-bg" cx="27" cy="27" r="22"></circle><circle class="ring-fg" id="to-top-ring" cx="27" cy="27" r="22"></circle></svg>
        <svg class="arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"></path></svg>
    </button>

    @stack('scripts')
    @livewireScripts
    <script>
        (function () {
            'use strict';
            var doc = document;
            var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

            var progress = doc.getElementById('progress-bar');
            var header = doc.getElementById('site-header');
            var toTop = doc.getElementById('to-top');
            var ringFg = doc.getElementById('to-top-ring');
            var RING_LEN = 138.2;

            function onScroll() {
                var y = window.scrollY || doc.documentElement.scrollTop;
                var max = doc.documentElement.scrollHeight - window.innerHeight;
                var p = max > 0 ? y / max : 0;
                if (progress) progress.style.width = (p * 100).toFixed(2) + '%';
                if (header) header.classList.toggle('scrolled', y > 16);
                if (toTop) toTop.classList.toggle('show', y > 560);
                if (ringFg) ringFg.style.strokeDashoffset = (RING_LEN * (1 - p)).toFixed(2);
            }
            var ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) { window.requestAnimationFrame(function () { onScroll(); ticking = false; }); ticking = true; }
            }, { passive: true });
            onScroll();

            if (toTop) {
                toTop.addEventListener('click', function () {
                    window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
                });
            }

            var revealEls = doc.querySelectorAll('[data-reveal]');
            if ('IntersectionObserver' in window && !reduceMotion) {
                var revealIO = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (!entry.isIntersecting) return;
                        var delay = parseInt(entry.target.dataset.delay || '0', 10);
                        window.setTimeout(function () { entry.target.classList.add('is-in'); }, delay);
                        revealIO.unobserve(entry.target);
                    });
                }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
                revealEls.forEach(function (el) { revealIO.observe(el); });
            } else {
                revealEls.forEach(function (el) { el.classList.add('is-in'); });
            }

            var counters = doc.querySelectorAll('[data-counter]');
            function formatCounter(el, value) {
                var decimals = parseInt(el.dataset.decimals || '0', 10);
                var suffix = el.dataset.suffix || '';
                el.textContent = value.toFixed(decimals).replace('.', ',') + suffix;
            }
            function runCounter(el) {
                var target = parseFloat(el.dataset.counter);
                if (isNaN(target)) return;
                if (reduceMotion) { formatCounter(el, target); return; }
                var duration = 1400;
                var start = null;
                function tick(now) {
                    if (start === null) start = now;
                    var k = Math.min((now - start) / duration, 1);
                    var eased = 1 - Math.pow(1 - k, 3);
                    formatCounter(el, target * eased);
                    if (k < 1) window.requestAnimationFrame(tick);
                }
                window.requestAnimationFrame(tick);
            }
            if ('IntersectionObserver' in window) {
                var counterIO = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) { runCounter(entry.target); counterIO.unobserve(entry.target); }
                    });
                }, { threshold: 0.6 });
                counters.forEach(function (el) { counterIO.observe(el); });
            } else {
                counters.forEach(runCounter);
            }

            doc.querySelectorAll('[data-rotate-words]').forEach(function (el) {
                var words = [];
                try { words = JSON.parse(el.dataset.rotateWords || '[]'); } catch (e) { words = []; }
                if (!Array.isArray(words) || words.length < 2 || reduceMotion) return;
                var index = 0;
                el.textContent = words[0];
                window.setInterval(function () {
                    index = (index + 1) % words.length;
                    el.classList.remove('word-in');
                    void el.offsetWidth;
                    el.textContent = words[index];
                    el.classList.add('word-in');
                }, 2600);
            });

            var parallaxEls = Array.prototype.slice.call(doc.querySelectorAll('[data-parallax]'));
            var glow = doc.getElementById('hero-glow');
            if (finePointer && parallaxEls.length && !reduceMotion) {
                var targetX = 0, targetY = 0, currentX = 0, currentY = 0, rafId = null;
                function parallaxLoop() {
                    currentX += (targetX - currentX) * 0.08;
                    currentY += (targetY - currentY) * 0.08;
                    parallaxEls.forEach(function (el) {
                        var s = parseFloat(el.dataset.parallax || '0.04');
                        el.style.transform = 'translate3d(' + (-currentX * s * 60).toFixed(2) + 'px,' + (-currentY * s * 60).toFixed(2) + 'px,0) rotate(var(--rot, 0deg))';
                    });
                    if (glow) glow.style.transform = 'translate3d(' + (currentX * 90).toFixed(2) + 'px,' + (currentY * 90).toFixed(2) + 'px,0)';
                    if (Math.abs(targetX - currentX) > 0.001 || Math.abs(targetY - currentY) > 0.001) {
                        rafId = window.requestAnimationFrame(parallaxLoop);
                    } else {
                        rafId = null;
                    }
                }
                window.addEventListener('mousemove', function (e) {
                    targetX = e.clientX / window.innerWidth - 0.5;
                    targetY = e.clientY / window.innerHeight - 0.5;
                    if (!rafId) rafId = window.requestAnimationFrame(parallaxLoop);
                }, { passive: true });
            }

            if (finePointer && !reduceMotion) {
                doc.querySelectorAll('[data-tilt]').forEach(function (card) {
                    var strength = parseFloat(card.dataset.tilt || '5');
                    card.addEventListener('mousemove', function (e) {
                        var rect = card.getBoundingClientRect();
                        var px = (e.clientX - rect.left) / rect.width - 0.5;
                        var py = (e.clientY - rect.top) / rect.height - 0.5;
                        card.style.transform = 'perspective(900px) rotateX(' + (-py * strength).toFixed(2) + 'deg) rotateY(' + (px * strength).toFixed(2) + 'deg) translateY(-4px)';
                        card.style.setProperty('--mx', ((px + 0.5) * 100).toFixed(1) + '%');
                        card.style.setProperty('--my', ((py + 0.5) * 100).toFixed(1) + '%');
                    });
                    card.addEventListener('mouseleave', function () { card.style.transform = ''; });
                });

                doc.querySelectorAll('[data-magnet]').forEach(function (btn) {
                    btn.addEventListener('mousemove', function (e) {
                        var rect = btn.getBoundingClientRect();
                        var x = (e.clientX - rect.left - rect.width / 2) * 0.16;
                        var y = (e.clientY - rect.top - rect.height / 2) * 0.2;
                        btn.style.transform = 'translate(' + x.toFixed(1) + 'px,' + y.toFixed(1) + 'px)';
                    });
                    btn.addEventListener('mouseleave', function () { btn.style.transform = ''; });
                });
            }

            var PARTICLE_COLORS = ['#E4572E', '#F5B301', '#2E8B57', '#231A12', '#FFE9B8'];
            function burst(x, y) {
                if (reduceMotion) return;
                for (var i = 0; i < 14; i++) {
                    var p = doc.createElement('span');
                    p.className = 'burst-particle';
                    var size = 6 + Math.random() * 9;
                    p.style.width = size + 'px';
                    p.style.height = size + 'px';
                    p.style.background = PARTICLE_COLORS[i % PARTICLE_COLORS.length];
                    p.style.left = x + 'px';
                    p.style.top = y + 'px';
                    if (i % 3 === 0) p.style.borderRadius = '50%';
                    if (i % 4 === 0) p.style.border = '2px solid #231A12';
                    doc.body.appendChild(p);
                    var angle = Math.random() * Math.PI * 2;
                    var distance = 44 + Math.random() * 66;
                    var dx = Math.cos(angle) * distance;
                    var dy = Math.sin(angle) * distance - 26;
                    var spin = Math.random() * 260 - 130;
                    var anim = p.animate([
                        { transform: 'translate(-50%,-50%) scale(1) rotate(0deg)', opacity: 1 },
                        { transform: 'translate(calc(-50% + ' + dx.toFixed(1) + 'px), calc(-50% + ' + dy.toFixed(1) + 'px)) scale(0.5) rotate(' + spin.toFixed(0) + 'deg)', opacity: 0 }
                    ], { duration: 640 + Math.random() * 340, easing: 'cubic-bezier(0.22,1,0.36,1)' });
                    anim.onfinish = (function (node) { return function () { node.remove(); }; })(p);
                }
            }
            doc.addEventListener('click', function (e) {
                var target = e.target.closest('[data-burst]');
                if (!target) return;
                var rect = target.getBoundingClientRect();
                burst(rect.left + rect.width / 2, rect.top + rect.height / 2);
            });

            var menuToggle = doc.getElementById('menu-toggle');
            var mobileMenu = doc.getElementById('mobile-menu');
            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', function () {
                    var open = mobileMenu.classList.toggle('open');
                    menuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
                });
                mobileMenu.querySelectorAll('a').forEach(function (link) {
                    link.addEventListener('click', function () { mobileMenu.classList.remove('open'); });
                });
            }

            doc.addEventListener('click', function (e) {
                var btn = e.target.closest('[data-filter]');
                if (!btn) return;
                var category = btn.dataset.filter;
                doc.querySelectorAll('[data-filter]').forEach(function (b) { b.classList.toggle('active', b === btn); });
                doc.querySelectorAll('[data-menu-card]').forEach(function (card) {
                    var show = category === 'all' || card.dataset.category === category;
                    card.classList.toggle('hide', !show);
                });
            });

            function toast(message) {
                var el = doc.createElement('div');
                el.className = 'toast';
                el.innerHTML = '<span class="toast-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg></span><span class="toast-text"></span>';
                el.querySelector('.toast-text').textContent = message;
                doc.body.appendChild(el);
                window.requestAnimationFrame(function () { el.classList.add('show'); });
                window.setTimeout(function () {
                    el.classList.remove('show');
                    window.setTimeout(function () { el.remove(); }, 500);
                }, 2700);
            }
            window.__thToast = toast;

            function bumpBadge() {
                var badge = doc.getElementById('cart-count');
                if (!badge) return;
                badge.classList.remove('bump');
                void badge.offsetWidth;
                badge.classList.add('bump');
            }

            function showOrderSuccess(orderNumber) {
                if (doc.getElementById('order-success')) return;
                var overlay = doc.createElement('div');
                overlay.id = 'order-success';
                overlay.className = 'order-success';
                overlay.innerHTML =
                    '<div class="order-success-card">' +
                        '<span class="tape"></span>' +
                        '<span class="sticker" style="background:var(--pandan-soft)">Pesanan Diterima</span>' +
                        '<h3 class="display">Terima kasih!</h3>' +
                        '<p>Simpan nomor pesanan kamu untuk melacak status:</p>' +
                        '<button type="button" class="order-number" id="order-number-copy">' +
                            '<span id="order-number-text"></span>' +
                            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>' +
                        '</button>' +
                        '<p style="font-size:0.78rem">Ketuk nomor untuk menyalin</p>' +
                        '<div class="order-success-actions">' +
                            '<a class="btn btn-cabai" href="' + (window.__thTrackingUrl || '/order/tracking') + '">Lacak Pesanan</a>' +
                            '<button type="button" class="btn btn-paper" id="order-success-close">Tutup</button>' +
                        '</div>' +
                    '</div>';
                doc.body.appendChild(overlay);
                overlay.querySelector('#order-number-text').textContent = orderNumber;
                overlay.querySelector('#order-success-close').addEventListener('click', function () { overlay.remove(); });
                overlay.querySelector('#order-number-copy').addEventListener('click', function () {
                    if (navigator.clipboard) {
                        navigator.clipboard.writeText(orderNumber).then(function () { toast('Nomor pesanan disalin'); });
                    }
                });
                burst(window.innerWidth / 2, window.innerHeight * 0.34);
                window.setTimeout(function () { burst(window.innerWidth / 2 - 80, window.innerHeight * 0.4); }, 220);
                window.setTimeout(function () { burst(window.innerWidth / 2 + 80, window.innerHeight * 0.4); }, 380);
            }

            window.__thShowOrderSuccess = showOrderSuccess;

            function initLivewireHooks() {
                Livewire.on('notify', function (data) {
                    if (data && data.message) toast(data.message);
                });
                Livewire.on('cartUpdated', function (data) {
                    var badge = doc.getElementById('cart-count');
                    if (!badge) return;
                    var count = (data && data.count) || 0;
                    badge.textContent = count;
                    badge.classList.toggle('hide', count === 0);
                    if (count > 0) bumpBadge();
                });
                Livewire.on('orderCreated', function (data) {
                    if (data && data.orderNumber) showOrderSuccess(data.orderNumber);
                });
            }
            if (window.Livewire) {
                initLivewireHooks();
            } else {
                doc.addEventListener('livewire:initialized', initLivewireHooks);
            }
        })();
    </script>
</body>
</html>
