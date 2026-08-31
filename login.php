<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingia - Falhan EMS Tanzania</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ================================================================
           LOGIN PAGE STYLES
           ================================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        /* Background animation */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at center, rgba(10, 74, 47, 0.15), transparent 60%);
            animation: rotateBg 30s linear infinite;
            z-index: 0;
        }
        
        @keyframes rotateBg {
            to { transform: rotate(360deg); }
        }
        
        :root {
            --gold: #c9a84c;
            --gold-light: #e8c96a;
            --gold-dark: #a8883a;
            --white: #ffffff;
            --black: #0a0a0a;
            --shadow: 0 4px 30px rgba(0,0,0,0.3);
            --shadow-gold: 0 4px 30px rgba(201,168,76,0.3);
        }
        
        /* ================================================================
           LOGIN BOX
           ================================================================ */
        .login-box {
            background: var(--white);
            border-radius: 24px;
            padding: 48px 40px;
            max-width: 420px;
            width: 100%;
            box-shadow: var(--shadow);
            border: 1px solid rgba(201,168,76,0.12);
            position: relative;
            z-index: 1;
            animation: slideUp 0.6s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* ================================================================
           LOGO
           ================================================================ */
        .login-box .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-box .logo .icon {
            display: inline-block;
            font-size: 3rem;
            color: var(--gold);
            margin-bottom: 8px;
            animation: pulseGold 2s ease-in-out infinite;
        }
        
        @keyframes pulseGold {
            0%, 100% { text-shadow: 0 0 20px rgba(201,168,76,0.2); }
            50% { text-shadow: 0 0 40px rgba(201,168,76,0.5); }
        }
        
        .login-box .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--black);
        }
        
        .login-box .logo h1 span {
            color: var(--gold);
        }
        
        .login-box .logo .subtitle {
            color: #9a9a9a;
            font-size: 0.9rem;
            margin-top: 4px;
        }
        
        .login-box .logo .subtitle i {
            color: var(--gold);
        }
        
        /* ================================================================
           DIVIDER
           ================================================================ */
        .gold-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            margin: 16px auto 24px;
            border-radius: 10px;
        }
        
        /* ================================================================
           ALERTS
           ================================================================ */
        .alert {
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 18px;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert i {
            font-size: 1.2rem;
        }
        
        /* ================================================================
           FORM
           ================================================================ */
        .form-group {
            margin-bottom: 18px;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            color: var(--black);
            margin-bottom: 6px;
            font-size: 0.9rem;
        }
        
        .form-group label i {
            color: var(--gold);
            width: 20px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--white);
            color: var(--black);
        }
        
        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(201,168,76,0.15);
            outline: none;
        }
        
        .form-control::placeholder {
            color: #b0b0b0;
        }
        
        .form-control.error {
            border-color: #e74c3c;
        }
        
        .form-control.success {
            border-color: #27ae60;
        }
        
        /* ================================================================
           PASSWORD TOGGLE
           ================================================================ */
        .position-relative {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9a9a9a;
            z-index: 10;
            transition: all 0.3s ease;
            padding: 5px;
        }
        
        .password-toggle:hover {
            color: var(--black);
        }
        
        /* ================================================================
           CHECKBOX & LINKS
           ================================================================ */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        
        .form-check input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--gold);
            cursor: pointer;
        }
        
        .form-check label {
            font-weight: 400;
            font-size: 0.9rem;
            color: #4a4a4a;
            cursor: pointer;
        }
        
        .forgot-link {
            color: var(--gold);
            font-size: 0.85rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .forgot-link:hover {
            color: var(--gold-dark);
            text-decoration: underline;
        }
        
        /* ================================================================
           BUTTON
           ================================================================ */
        .btn-login {
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
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(10, 74, 47, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        /* ================================================================
           LINKS (Footer)
           ================================================================ */
        .links {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #9a9a9a;
        }
        
        .links a {
            color: var(--gold);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .links a:hover {
            color: var(--gold-dark);
            text-decoration: underline;
        }
        
        .links .divider {
            color: #e8e8e8;
            margin: 0 8px;
        }
        
        /* ================================================================
           DEMO CREDENTIALS
           ================================================================ */
        .demo-credentials {
            margin-top: 20px;
            padding: 16px 20px;
            background: #f8f9fa;
            border-radius: 12px;
            border: 1px dashed #e8e8e8;
            font-size: 0.8rem;
            color: #6c757d;
            text-align: center;
        }
        
        .demo-credentials strong {
            color: var(--black);
        }
        
        .demo-credentials .cred {
            display: inline-block;
            background: var(--white);
            padding: 2px 12px;
            border-radius: 4px;
            border: 1px solid #e8e8e8;
            font-family: 'Courier New', monospace;
            font-size: 0.8rem;
            color: var(--black);
            margin: 2px 4px;
        }
        
        .demo-credentials .cred .email {
            color: #0a4a2f;
        }
        
        .demo-credentials .cred .pass {
            color: var(--gold);
        }
        
        /* ================================================================
           RESPONSIVE
           ================================================================ */
        @media (max-width: 480px) {
            .login-box {
                padding: 30px 20px;
                border-radius: 16px;
            }
            
            .login-box .logo h1 {
                font-size: 1.8rem;
            }
            
            .login-box .logo .icon {
                font-size: 2.5rem;
            }
            
            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            
            .demo-credentials .cred {
                display: block;
                margin: 4px 0;
            }
        }
        
        @media (max-width: 360px) {
            .login-box {
                padding: 20px 16px;
            }
            
            .login-box .logo h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- ================================================================
    LOGIN BOX
    ================================================================ -->
    <div class="login-box">
        
        <!-- Logo -->
        <div class="logo">
            <div class="icon">
                <i class="fas fa-crown"></i>
            </div>
            <h1>Falhan <span>EMS</span></h1>
            <div class="subtitle">
                <i class="fas fa-flag"></i> Tanzania
            </div>
        </div>
        
        <div class="gold-divider"></div>
        
        <!-- Flash Messages -->
        <?php $error = flash('error'); ?>
        <?php $success = flash('success'); ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>
        
        <!-- Login Form -->
        <form method="POST" action="<?= url('/login-post') ?>" id="loginForm" novalidate>
            
            <!-- Email -->
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i> Barua pepe
                </label>
                <input type="email" 
                       name="email" 
                       id="email"
                       class="form-control" 
                       placeholder="Mfano: mwalimu@shule.com" 
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" 
                       required 
                       autofocus>
            </div>
            
            <!-- Password -->
            <div class="form-group position-relative">
                <label for="password">
                    <i class="fas fa-lock"></i> Nenosiri
                </label>
                <input type="password" 
                       name="password" 
                       id="password" 
                       class="form-control" 
                       placeholder="Nenosiri lako" 
                       required>
                <span class="password-toggle" onclick="togglePassword()" title="Onyesha/Ficha nenosiri">
                    <i class="fas fa-eye" id="toggleIcon"></i>
                </span>
            </div>
            
            <!-- Options -->
            <div class="form-options">
                <label class="form-check">
                    <input type="checkbox" name="remember" id="remember" <?= isset($_POST['remember']) ? 'checked' : '' ?>>
                    <span>Nikumbuke</span>
                </label>
                <a href="<?= url('/forgot-password') ?>" class="forgot-link">
                    Nimesahau nenosiri?
                </a>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn-login" id="loginBtn">
                <i class="fas fa-sign-in-alt"></i> Ingia
            </button>
            
        </form>
        
        <!-- Register Link -->
        <div class="links">
            Huna akaunti? <a href="<?= url('/register') ?>">Jiandikisha</a>
        </div>
        
        <!-- Demo Credentials -->
        <div class="demo-credentials">
            <strong><i class="fas fa-info-circle"></i> Demo Akaunti</strong><br>
            <span class="cred">
                <span class="email">admin@falhan.com</span>
                <span style="color:#9a9a9a;">/</span>
                <span class="pass">admin123</span>
            </span>
            <span style="color:#e8e8e8;">|</span>
            <span class="cred">
                <span class="email">teacher@falhan.com</span>
                <span style="color:#9a9a9a;">/</span>
                <span class="pass">teacher123</span>
            </span>
        </div>
        
    </div>

    <!-- ================================================================
    JAVASCRIPT
    ================================================================ -->
    <script>
        /**
         * Toggle password visibility
         */
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.className = 'fas fa-eye-slash';
                icon.title = 'Ficha nenosiri';
            } else {
                password.type = 'password';
                icon.className = 'fas fa-eye';
                icon.title = 'Onyesha nenosiri';
            }
        }
        
        /**
         * Form validation and loading state
         */
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            
            // Validate
            let hasError = false;
            
            if (!email) {
                document.getElementById('email').classList.add('error');
                hasError = true;
            } else {
                document.getElementById('email').classList.remove('error');
            }
            
            if (!password) {
                document.getElementById('password').classList.add('error');
                hasError = true;
            } else {
                document.getElementById('password').classList.remove('error');
            }
            
            if (hasError) {
                e.preventDefault();
                alert('Tafadhali jaza barua pepe na nenosiri.');
                return;
            }
            
            // Show loading
            const btn = document.getElementById('loginBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Inaingia...';
        });
        
        /**
         * Remove error class on input
         */
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
            });
        });
        
        /**
         * Auto-focus on email on load
         */
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });
        
        /**
         * Keyboard shortcut: Enter to submit
         */
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const active = document.activeElement;
                if (active && (active.id === 'email' || active.id === 'password')) {
                    document.getElementById('loginForm').submit();
                }
            }
        });
    </script>

</body>
</html>