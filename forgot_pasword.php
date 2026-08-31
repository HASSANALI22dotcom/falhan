<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimesahau Nenosiri - Falhan EMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        :root { --gold: #c9a84c; --white: #ffffff; --shadow: 0 4px 30px rgba(0,0,0,0.3); }
        .forgot-box {
            background: var(--white);
            border-radius: 24px;
            padding: 48px 40px;
            max-width: 420px;
            width: 100%;
            box-shadow: var(--shadow);
            border: 1px solid rgba(201,168,76,0.12);
            animation: slideUp 0.6s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .forgot-box .logo { text-align: center; margin-bottom: 25px; }
        .forgot-box .logo i { font-size: 3rem; color: var(--gold); margin-bottom: 6px; animation: pulseGold 2s ease-in-out infinite; }
        @keyframes pulseGold { 0%,100% { text-shadow: 0 0 20px rgba(201,168,76,0.2); } 50% { text-shadow: 0 0 40px rgba(201,168,76,0.5); } }
        .forgot-box .logo h1 { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 800; color: #0a0a0a; }
        .forgot-box .logo h1 span { color: var(--gold); }
        .gold-divider { width: 60px; height: 3px; background: linear-gradient(135deg, #c9a84c, #e8c96a); margin: 12px auto 20px; border-radius: 10px; }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-weight: 600; color: #0a0a0a; margin-bottom: 5px; font-size: 0.9rem; }
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-control:focus { border-color: var(--gold); box-shadow: 0 0 0 4px rgba(201,168,76,0.12); outline: none; }
        .btn {
            background: linear-gradient(135deg, #0a4a2f, #062d1c);
            color: var(--white);
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(10,74,47,0.4); }
        .btn:disabled { opacity: 0.7; cursor: not-allowed; }
        .links { text-align: center; margin-top: 18px; font-size: 0.9rem; color: #9a9a9a; }
        .links a { color: var(--gold); font-weight: 600; text-decoration: none; }
        .links a:hover { text-decoration: underline; }
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert i { font-size: 1.2rem; }
        @media (max-width: 480px) {
            .forgot-box { padding: 30px 20px; }
        }
    </style>
</head>
<body>
    <div class="forgot-box">
        <div class="logo">
            <i class="fas fa-crown"></i>
            <h1>Falhan <span>EMS</span></h1>
        </div>
        <div class="gold-divider"></div>
        
        <h3 style="text-align:center; font-family:'Playfair Display',serif; margin-bottom:6px;">Nimesahau Nenosiri</h3>
        <p style="text-align:center; color:#9a9a9a; font-size:0.9rem; margin-bottom:20px;">
            Weka barua pepe yako, tutakutumia mwongozo wa kubadilisha nenosiri.
        </p>
        
        <?php $error = flash('error'); $success = flash('success'); ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i><?= $error ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><i class="fas fa-check-circle"></i><?= $success ?></div>
        <?php endif; ?>
        
        <form method="POST" action="<?= url('/forgot-password-post') ?>" id="forgotForm">
            <div class="form-group">
                <label><i class="fas fa-envelope me-2" style="color:var(--gold);"></i>Barua pepe</label>
                <input type="email" name="email" class="form-control" placeholder="Mfano: john@shule.com" required autofocus>
            </div>
            <button type="submit" class="btn" id="forgotBtn"><i class="fas fa-paper-plane me-2"></i>Tuma</button>
        </form>
        
        <div class="links">
            <a href="<?= url('/login') ?>">Rudi kwenye Ingia</a>
        </div>
    </div>
    
    <script>
        document.getElementById('forgotForm').addEventListener('submit', function(e) {
            const email = document.querySelector('input[name="email"]').value.trim();
            if (!email) {
                e.preventDefault();
                alert('Tafadhali weka barua pepe.');
                return;
            }
            const btn = document.getElementById('forgotBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Inatuma...';
        });
    </script>
</body>
</html>