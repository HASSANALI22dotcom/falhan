<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Falhan EMS - Tanzania | Kuwawezesha Elimu</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ================================================================
           LANDING PAGE STYLES
           ================================================================ */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --primary: #0a4a2f;
            --primary-light: #1a7a4a;
            --gold: #c9a84c;
            --gold-light: #e8c96a;
            --black: #0a0a0a;
            --white: #ffffff;
            --gray-light: #f0f0f0;
            --gray-dark: #4a4a4a;
            --shadow: 0 4px 30px rgba(0,0,0,0.15);
            --shadow-gold: 0 4px 30px rgba(201,168,76,0.3);
        }
        body { font-family: 'Inter', sans-serif; background: var(--white); color: var(--black); line-height: 1.6; }
        h1, h2, h3 { font-family: 'Playfair Display', serif; font-weight: 700; }
        
        /* ================================================================
           NAVBAR
           ================================================================ */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0;
            background: rgba(10,10,10,0.95); backdrop-filter: blur(10px);
            border-bottom: 2px solid var(--gold);
            padding: 12px 40px;
            display: flex; justify-content: space-between; align-items: center;
            z-index: 1000;
            flex-wrap: wrap;
            gap: 10px;
        }
        .navbar .brand {
            display: flex; align-items: center; gap: 12px;
            color: var(--white); font-size: 1.4rem; font-weight: 800;
            font-family: 'Playfair Display', serif;
            text-decoration: none;
        }
        .navbar .brand i { color: var(--gold); font-size: 1.6rem; }
        .navbar .brand span { color: var(--gold); }
        .navbar .nav-links {
            display: flex; align-items: center; gap: 20px;
            list-style: none; flex-wrap: wrap;
        }
        .navbar .nav-links a {
            color: var(--white); opacity: 0.7;
            text-decoration: none; font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        .navbar .nav-links a:hover { opacity: 1; color: var(--gold); }
        .navbar .nav-links .btn-gold {
            background: var(--gold); color: var(--black);
            padding: 8px 20px; border-radius: 8px;
            font-weight: 600; opacity: 1;
            transition: all 0.3s ease;
        }
        .navbar .nav-links .btn-gold:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
        }
        .navbar .nav-links .btn-outline {
            background: transparent; color: var(--white);
            border: 2px solid rgba(255,255,255,0.2);
            padding: 6px 18px; border-radius: 8px;
            font-weight: 500; opacity: 1;
        }
        .navbar .nav-links .btn-outline:hover { border-color: var(--gold); color: var(--gold); }
        .flag-badge {
            display: inline-flex; align-items: center; gap: 6px;
            color: var(--gold); font-size: 0.8rem; font-weight: 600;
            background: rgba(201,168,76,0.1);
            padding: 4px 12px; border-radius: 30px;
            border: 1px solid rgba(201,168,76,0.2);
        }
        
        /* ================================================================
           HERO SECTION
           ================================================================ */
        .hero {
            min-height: 100vh; background: var(--black);
            display: flex; align-items: center;
            padding: 100px 40px 60px;
            position: relative; overflow: hidden;
        }
        .hero::before {
            content: ''; position: absolute;
            top: -30%; right: -20%;
            width: 60%; height: 120%;
            background: radial-gradient(ellipse, rgba(10,74,47,0.3), transparent 70%);
            animation: heroGlow 20s ease-in-out infinite alternate;
        }
        @keyframes heroGlow {
            0% { transform: translate(0,0) scale(1); }
            100% { transform: translate(-10%,10%) scale(1.2); }
        }
        .hero-content {
            max-width: 1200px; margin: 0 auto;
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 60px; align-items: center;
            position: relative; z-index: 1;
        }
        .hero-left h1 {
            font-size: 4rem; line-height: 1.1;
            color: var(--white); margin-bottom: 20px;
        }
        .hero-left h1 .gold { color: var(--gold); }
        .hero-left h1 .green { color: var(--primary-light); }
        .hero-left .subtitle {
            font-size: 1.1rem; color: rgba(255,255,255,0.7);
            margin-bottom: 30px; max-width: 500px;
        }
        .hero-left .subtitle i { color: var(--gold); }
        .hero-left .stats {
            display: flex; gap: 40px; margin-bottom: 40px;
            flex-wrap: wrap;
        }
        .hero-left .stats .stat { color: var(--white); }
        .hero-left .stats .stat .number {
            font-size: 2.2rem; font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: var(--gold);
        }
        .hero-left .stats .stat .label {
            color: rgba(255,255,255,0.5);
            font-size: 0.8rem; text-transform: uppercase;
            letter-spacing: 1px;
        }
        .hero-left .buttons {
            display: flex; gap: 16px; flex-wrap: wrap;
        }
        .hero-left .buttons .btn-hero-primary {
            background: var(--gold); color: var(--black);
            padding: 14px 36px; border-radius: 12px;
            font-weight: 700; font-size: 1rem;
            border: none; cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 10px;
        }
        .hero-left .buttons .btn-hero-primary:hover {
            background: var(--gold-light);
            transform: translateY(-3px);
            box-shadow: var(--shadow-gold);
        }
        .hero-left .buttons .btn-hero-secondary {
            background: transparent; color: var(--white);
            padding: 14px 36px; border-radius: 12px;
            font-weight: 600;
            border: 2px solid rgba(255,255,255,0.2);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 10px;
        }
        .hero-left .buttons .btn-hero-secondary:hover {
            border-color: var(--gold);
            color: var(--gold);
            transform: translateY(-3px);
        }
        .hero-right {
            display: flex; justify-content: center; align-items: center;
        }
        .hero-right .map-icon { font-size: 10rem; color: rgba(201,168,76,0.15); text-align: center; }
        .hero-right .map-text {
            text-align: center; margin-top: 20px;
            color: var(--gold); font-weight: 700; font-size: 1.2rem;
        }
        
        /* ================================================================
           FEATURES SECTION
           ================================================================ */
        .features {
            padding: 80px 40px;
            background: var(--gray-light);
        }
        .features .container { max-width: 1200px; margin: 0 auto; }
        .features .section-header {
            text-align: center; margin-bottom: 60px;
        }
        .features .section-header h2 {
            font-size: 3rem; color: var(--black);
        }
        .features .section-header h2 .gold { color: var(--gold); }
        .features .section-header p {
            color: var(--gray-dark);
            max-width: 600px; margin: 0 auto;
            font-size: 1.1rem;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }
        .feature-card {
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(201,168,76,0.1);
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 50px rgba(0,0,0,0.25), var(--shadow-gold);
            border-color: var(--gold);
        }
        .feature-card .icon { font-size: 2.5rem; color: var(--gold); margin-bottom: 16px; }
        .feature-card h3 { font-size: 1.2rem; margin-bottom: 10px; color: var(--black); }
        .feature-card p { color: var(--gray-dark); font-size: 0.95rem; }
        
        /* ================================================================
           CTA SECTION
           ================================================================ */
        .cta {
            padding: 80px 40px;
            background: linear-gradient(135deg, #0a4a2f, #062d1c, #0a0a0a);
            color: var(--white);
            text-align: center;
        }
        .cta .container { max-width: 800px; margin: 0 auto; }
        .cta h2 { font-size: 2.5rem; margin-bottom: 16px; }
        .cta h2 .gold { color: var(--gold); }
        .cta p {
            color: rgba(255,255,255,0.7);
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        .cta .btn-cta {
            background: var(--gold);
            color: var(--black);
            padding: 16px 48px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 10px;
        }
        .cta .btn-cta:hover {
            background: var(--gold-light);
            transform: translateY(-3px);
            box-shadow: var(--shadow-gold);
        }
        
        /* ================================================================
           FOOTER
           ================================================================ */
        .footer {
            background: var(--black);
            color: var(--white);
            padding: 40px 40px 20px;
            border-top: 2px solid var(--gold);
        }
        .footer .container {
            max-width: 1200px; margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
        }
        .footer .brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem; font-weight: 800;
            margin-bottom: 8px;
        }
        .footer .brand span { color: var(--gold); }
        .footer .brand-desc {
            color: rgba(255,255,255,0.5);
            font-size: 0.9rem;
        }
        .footer .col h4 {
            color: var(--white);
            margin-bottom: 12px;
            font-size: 1rem;
        }
        .footer .col a {
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            display: block;
            margin-bottom: 6px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .footer .col a:hover { color: var(--gold); }
        .footer .bottom {
            grid-column: 1 / -1;
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.05);
            color: rgba(255,255,255,0.3);
            font-size: 0.8rem;
        }
        
        /* ================================================================
           RESPONSIVE
           ================================================================ */
        @media (max-width: 992px) {
            .hero-content { grid-template-columns: 1fr; text-align: center; }
            .hero-left .subtitle { margin: 0 auto 30px; }
            .hero-left .stats { justify-content: center; }
            .hero-left .buttons { justify-content: center; }
        }
        @media (max-width: 768px) {
            .navbar { padding: 10px 20px; }
            .hero { padding: 100px 20px 40px; }
            .hero-left h1 { font-size: 2.5rem; }
            .features { padding: 60px 20px; }
            .features .section-header h2 { font-size: 2rem; }
            .cta { padding: 60px 20px; }
            .cta h2 { font-size: 2rem; }
            .footer .container { grid-template-columns: 1fr; }
        }
        @media (max-width: 480px) {
            .hero-left h1 { font-size: 2rem; }
            .hero-left .stats { gap: 20px; }
            .hero-left .stats .stat .number { font-size: 1.6rem; }
        }
    </style>
</head>
<body>

    <!-- ================================================================
    NAVBAR
    ================================================================ -->
    <nav class="navbar">
        <a href="<?= url('/') ?>" class="brand">
            <i class="fas fa-crown"></i>
            Falhan <span>EMS</span>
            <span class="flag-badge"><i class="fas fa-flag"></i> Tanzania</span>
        </a>
        <ul class="nav-links">
            <li><a href="#features">Vipengele</a></li>
            <li><a href="<?= url('/about') ?>">Kuhusu</a></li>
            <li><a href="<?= url('/login') ?>" class="btn-outline">Ingia</a></li>
            <li><a href="<?= url('/register') ?>" class="btn-gold">Anza Sasa</a></li>
        </ul>
    </nav>

    <!-- ================================================================
    HERO SECTION
    ================================================================ -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-left">
                <h1>Kuwawezesha <br><span class="gold">Elimu</span> <br><span class="green">Tanzania</span></h1>
                <p class="subtitle"><i class="fas fa-flag me-2"></i>Mfumo kamili wa usimamizi wa elimu kwa shule, wilaya, na serikali ya Tanzania.</p>
                <div class="stats">
                    <div class="stat"><div class="number">31</div><div class="label">Mikoa</div></div>
                    <div class="stat"><div class="number">185+</div><div class="label">Wilaya</div></div>
                    <div class="stat"><div class="number">10K+</div><div class="label">Shule</div></div>
                </div>
                <div class="buttons">
                    <a href="<?= url('/register') ?>" class="btn-hero-primary"><i class="fas fa-rocket"></i> Anza Sasa</a>
                    <a href="#features" class="btn-hero-secondary"><i class="fas fa-play-circle"></i> Jifunze Zaidi</a>
                </div>
            </div>
            <div class="hero-right">
                <div>
                    <div class="map-icon"><i class="fas fa-map-africa"></i></div>
                    <div class="map-text"><i class="fas fa-flag me-2"></i>United Republic of Tanzania</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================
    FEATURES SECTION
    ================================================================ -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>Vipengele <span class="gold">Vyetu</span></h2>
                <p>Kila kitu unachohitaji kusimamia elimu Tanzania</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-school"></i></div>
                    <h3>Usimamizi wa Shule</h3>
                    <p>Simamia wanafunzi, walimu, madarasa, mahudhurio na alama zote kwa urahisi.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-chart-line"></i></div>
                    <h3>Ripoti na Takwimu</h3>
                    <p>Pata ripoti za kina za matokeo, mahudhurio, na utendaji wa shule zako.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-bolt"></i></div>
                    <h3>Falhan Entry System</h3>
                    <p>Ingiza alama kwa haraka kwa kutumia mfumo wetu wa kipekee wa kuingiza kwa koma.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>Usalama wa Data</h3>
                    <p>Data zako zinalindwa kwa viwango vya juu vya usalama na backup za mara kwa mara.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-mobile-alt"></i></div>
                    <h3>Inafanya Kazi Simu</h3>
                    <p>Fikia mfumo kutoka simu, kompyuta, au kompyuta kibao popote ulipo.</p>
                </div>
                <div class="feature-card">
                    <div class="icon"><i class="fas fa-handshake"></i></div>
                    <h3>Imetengenezwa Tanzania</h3>
                    <p>Mfumo umeundwa mahsusi kukidhi mahitaji ya mfumo wa elimu wa Tanzania.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================
    CTA SECTION
    ================================================================ -->
    <section class="cta">
        <div class="container">
            <h2>Tayari Kuongeza <span class="gold">Ubora</span> Elimu?</h2>
            <p>Jiandikisha sasa na uanze kusimamia shule yako kwa njia ya kisasa.</p>
            <a href="<?= url('/register') ?>" class="btn-cta"><i class="fas fa-rocket"></i> Anza Sasa - Bure!</a>
        </div>
    </section>

    <!-- ================================================================
    FOOTER
    ================================================================ -->
    <footer class="footer">
        <div class="container">
            <div>
                <div class="brand">Falhan <span>EMS</span></div>
                <div class="brand-desc">Kuwawezesha Elimu Tanzania</div>
                <div style="margin-top:10px; color:rgba(255,255,255,0.2); font-size:0.8rem;">
                    <i class="fas fa-flag me-1"></i> Made in Tanzania
                </div>
            </div>
            <div class="col">
                <h4>Viungo</h4>
                <a href="#features">Vipengele</a>
                <a href="<?= url('/about') ?>">Kuhusu</a>
                <a href="<?= url('/contact') ?>">Wasiliana</a>
            </div>
            <div class="col">
                <h4>Msaada</h4>
                <a href="<?= url('/help') ?>">Msaada</a>
                <a href="<?= url('/docs') ?>">Maelekezo</a>
                <a href="<?= url('/privacy') ?>">Sera</a>
            </div>
            <div class="bottom">
                &copy; <?= date('Y') ?> Falhan Education Management System - Tanzania. Haki zote zimehifadhiwa.
            </div>
        </div>
    </footer>

    <!-- ================================================================
    JAVASCRIPT
    ================================================================ -->
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>

</body>
</html>