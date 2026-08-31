<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Falhan EMS - Tanzania</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            overflow: hidden;
            height: 100vh;
            background: #0a0a0a;
        }
        :root { --gold: #c9a84c; --white: #ffffff; }
        .splash-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(ellipse at center, rgba(10,74,47,0.4), rgba(10,10,10,0.9));
            z-index: 1;
        }
        .splash-content {
            position: relative; z-index: 2;
            height: 100vh;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            text-align: center;
            padding: 20px;
        }
        .splash-content .logo i {
            font-size: 5rem;
            color: var(--gold);
            display: block;
            margin-bottom: 10px;
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { text-shadow: 0 0 20px rgba(201,168,76,0.2); }
            50% { text-shadow: 0 0 40px rgba(201,168,76,0.5); }
        }
        .splash-content .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--white);
        }
        .splash-content .logo h1 span { color: var(--gold); }
        .splash-content .logo .subtitle {
            color: rgba(255,255,255,0.6);
            font-size: 1rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-top: 5px;
        }
        .splash-content .tagline {
            color: rgba(255,255,255,0.5);
            font-size: 1rem;
            margin-top: 10px;
            letter-spacing: 2px;
        }
        .splash-content .tagline i { color: var(--gold); }
        .loader-container { margin-top: 40px; }
        .loader-bar {
            width: 200px; height: 3px;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            overflow: hidden;
            margin: 0 auto;
        }
        .loader-bar .fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, var(--gold), #e8c96a);
            border-radius: 10px;
            animation: loadProgress 3s ease-in-out forwards;
        }
        @keyframes loadProgress {
            0% { width: 0%; }
            30% { width: 35%; }
            60% { width: 65%; }
            85% { width: 85%; }
            100% { width: 100%; }
        }
        .loader-text {
            color: rgba(255,255,255,0.4);
            font-size: 0.8rem;
            margin-top: 10px;
            letter-spacing: 2px;
        }
        .skip-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 10;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            color: var(--white);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 10px 24px;
            border-radius: 30px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
        }
        .skip-btn:hover {
            background: rgba(255,255,255,0.2);
            border-color: var(--gold);
            color: var(--gold);
            transform: translateY(-2px);
        }
        .version-badge {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 10;
            color: rgba(255,255,255,0.2);
            font-size: 0.7rem;
            letter-spacing: 1px;
        }
        .version-badge .flag { color: var(--gold); }
        @media (max-width: 768px) {
            .splash-content .logo h1 { font-size: 2.5rem; }
            .splash-content .logo i { font-size: 3.5rem; }
            .skip-btn { bottom: 20px; right: 20px; padding: 8px 18px; font-size: 0.75rem; }
        }
    </style>
</head>
<body>
    <div class="splash-overlay"></div>
    <a href="<?= url('/landing') ?>" class="skip-btn"><i class="fas fa-forward me-2"></i>Ruka</a>
    <div class="version-badge"><span class="flag"><i class="fas fa-flag"></i></span> TZ v1.0</div>
    <div class="splash-content">
        <div class="logo">
            <i class="fas fa-crown"></i>
            <h1>Falhan <span>EMS</span></h1>
            <div class="subtitle"><i class="fas fa-flag" style="color:var(--gold);"></i> Tanzania <i class="fas fa-flag" style="color:var(--gold);"></i></div>
        </div>
        <div class="tagline"><i class="fas fa-graduation-cap"></i> Kuwawezesha Elimu Tanzania <i class="fas fa-graduation-cap"></i></div>
        <div class="loader-container">
            <div class="loader-bar"><div class="fill"></div></div>
            <div class="loader-text" id="loaderText">Inapakia...</div>
        </div>
    </div>
    <script>
        const messages = ['Kuandaa mfumo...', 'Kupakia data...', 'Kuunganisha shule...', 'Karibu Falhan EMS!'];
        let idx = 0;
        setInterval(() => {
            idx = (idx + 1) % messages.length;
            document.getElementById('loaderText').textContent = messages[idx];
        }, 800);
        setTimeout(() => {
            window.location.href = '<?= url('/landing') ?>';
        }, 4000);
        document.querySelector('.skip-btn').addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '<?= url('/landing') ?>';
        });
    </script>
</body>
</html>