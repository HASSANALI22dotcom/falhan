<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jiandikisha - Falhan EMS Tanzania</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ================================================================
           REGISTER PAGE STYLES
           ================================================================ */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
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
        
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at center, rgba(10,74,47,0.12), transparent 60%);
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
           REGISTER BOX
           ================================================================ */
        .register-box {
            background: var(--white);
            border-radius: 24px;
            padding: 48px 40px;
            max-width: 460px;
            width: 100%;
            box-shadow: var(--shadow);
            border: 1px solid rgba(201,168,76,0.12);
            position: relative;
            z-index: 1;
            animation: slideUp 0.6s ease;
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* ================================================================
           LOGO
           ================================================================ */
        .register-box .logo {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .register-box .logo .icon {
            display: inline-block;
            font-size: 2.8rem;
            color: var(--gold);
            margin-bottom: 6px;
            animation: pulseGold 2s ease-in-out infinite;
        }
        
        @keyframes pulseGold {
            0%, 100% { text-shadow: 0 0 20px rgba(201,168,76,0.2); }
            50% { text-shadow: 0 0 40px rgba(201,168,76,0.5); }
        }
        
        .register-box .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--black);
        }
        
        .register-box .logo h1 span {
            color: var(--gold);
        }
        
        .register-box .logo .subtitle {
            color: #9a9a9a;
            font-size: 0.85rem;
            margin-top: 2px;
        }
        
        .register-box .logo .subtitle i {
            color: var(--gold);
        }
        
        /* ================================================================
           DIVIDER
           ================================================================ */
        .gold-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            margin: 12px auto 20px;
            border-radius: 10px;
        }
        
        /* ================================================================
           ALERTS
           ================================================================ */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 16px;
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
            margin-bottom: 14px;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            color: var(--black);
            margin-bottom: 4px;
            font-size: 0.85rem;
        }
        
        .form-group label i {
            color: var(--gold);
            width: 20px;
        }
        
        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: var(--white);
            color: var(--black);
        }
        
        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(201,168,76,0.12);
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
           PASSWORD STRENGTH
           ================================================================ */
        .password-strength {
            height: 4px;
            border-radius: 4px;
            margin-top: 6px;
            transition: all 0.3s ease;
            background: #e8e8e8;
        }
        
        .password-strength.weak {
            background: #e74c3c;
            width: 30%;
        }
        
        .password-strength.medium {
            background: #f39c12;
            width: 60%;
        }
        
        .password-strength.strong {
            background: #27ae60;
            width: 100%;
        }
        
        .password-hint {
            color: #9a9a9a;
            font-size: 0.75rem;
            margin-top: 4px;
        }
        
        /* ================================================================
           ROW (Two columns)
           ================================================================ */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }
        
        /* ================================================================
           CHECKBOX
           ================================================================ */
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
            font-size: 0.85rem;
            color: #4a4a4a;
            cursor: pointer;
        }
        
        .form-check label a {
            color: var(--gold);
            text-decoration: none;
        }
        
        .form-check label a:hover {
            text-decoration: underline;
        }
        
        /* ================================================================
           BUTTON
           ================================================================ */
        .btn-register {
            background: linear-gradient(135deg, #0a4a2f, #062d1c);
            color: var(--white);
            width: 100%;
            padding: 13px;
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
            margin-top: 4px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(10,74,47,0.4);
        }
        
        .btn-register:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        /* ================================================================
           LINKS
           ================================================================ */
        .links {
            text-align: center;
            margin-top: 18px;
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
        
        /* ================================================================
           RESPONSIVE
           ================================================================ */
        @media (max-width: 500px) {
            .register-box {
                padding: 30px 20px;
                border-radius: 16px;
            }
            
            .register-box .logo h1 {
                font-size: 1.6rem;
            }
            
            .register-box .logo .icon {
                font-size: 2.2rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
        
        @media (max-width: 360px) {
            .register-box {
                padding: 20px 14px;
            }
            
            .register-box .logo h1 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>

    <!-- ================================================================
    REGISTER BOX
    ================================================================ -->
    <div class="register-box">
        
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
        <?php $old = $_SESSION['old_input'] ?? []; unset($_SESSION['old_input']); ?>
        
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
        
        <!-- Register Form -->
        <form method="POST" action="<?= url('/register-post') ?>" id="registerForm" novalidate>
            
            <!-- Full Name -->
            <div class="form-group">
                <label for="full_name">
                    <i class="fas fa-user"></i> Jina Kamili
                </label>
                <input type="text" 
                       name="full_name" 
                       id="full_name"
                       class="form-control" 
                       placeholder="Mfano: John Peter" 
                       value="<?= htmlspecialchars($old['full_name'] ?? '') ?>" 
                       required>
            </div>
            
            <!-- Email & Phone -->
            <div class="form-row">
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Barua pepe
                    </label>
                    <input type="email" 
                           name="email" 
                           id="email"
                           class="form-control" 
                           placeholder="john@shule.com" 
                           value="<?= htmlspecialchars($old['email'] ?? '') ?>" 
                           required>
                </div>
                <div class="form-group">
                    <label for="phone">
                        <i class="fas fa-phone"></i> Simu
                    </label>
                    <input type="tel" 
                           name="phone" 
                           id="phone"
                           class="form-control" 
                           placeholder="0712345678" 
                           value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
                </div>
            </div>
            
            <!-- Password -->
            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i> Nenosiri
                </label>
                <input type="password" 
                       name="password" 
                       id="password"
                       class="form-control" 
                       placeholder="Angalau herufi 6" 
                       required 
                       minlength="6">
                <div class="password-strength" id="passwordStrength"></div>
                <div class="password-hint">
                    <i class="fas fa-info-circle"></i>
                    Nenosiri lazima liwe na herufi kubwa, ndogo na namba
                </div>
            </div>
            
            <!-- Confirm Password -->
            <div class="form-group">
                <label for="confirm_password">
                    <i class="fas fa-check-circle"></i> Thibitisha Nenosiri
                </label>
                <input type="password" 
                       name="confirm_password" 
                       id="confirm_password"
                       class="form-control" 
                       placeholder="Andika nenosiri tena" 
                       required>
            </div>
            
            <!-- Role -->
            <div class="form-group">
                <label for="role">
                    <i class="fas fa-user-tag"></i> Aina ya Mtumiaji
                </label>
                <select name="role" id="role" class="form-control">
                    <option value="teacher" <?= ($old['role'] ?? '') === 'teacher' ? 'selected' : '' ?>>Mwalimu</option>
                    <option value="student" <?= ($old['role'] ?? '') === 'student' ? 'selected' : '' ?>>Mwanafunzi</option>
                    <option value="parent" <?= ($old['role'] ?? '') === 'parent' ? 'selected' : '' ?>>Mzazi</option>
                    <option value="admin" <?= ($old['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            
            <!-- Terms -->
            <div class="form-group">
                <label class="form-check">
                    <input type="checkbox" name="terms" id="terms" required>
                    <span>
                        Nakubali <a href="<?= url('/terms') ?>" target="_blank">Masharti na Sheria</a>
                    </span>
                </label>
            </div>
            
            <!-- Submit -->
            <button type="submit" class="btn-register" id="registerBtn">
                <i class="fas fa-user-plus"></i> Jiandikisha
            </button>
            
        </form>
        
        <!-- Login Link -->
        <div class="links">
            Tayari una akaunti? <a href="<?= url('/login') ?>">Ingia</a>
        </div>
        
    </div>

    <!-- ================================================================
    JAVASCRIPT
    ================================================================ -->
    <script>
        /**
         * Password strength checker
         */
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strength = document.getElementById('passwordStrength');
            
            if (password.length === 0) {
                strength.className = 'password-strength';
                return;
            }
            
            let score = 0;
            
            // Length
            if (password.length >= 6) score++;
            if (password.length >= 10) score++;
            
            // Upper case
            if (/[A-Z]/.test(password)) score++;
            
            // Lower case
            if (/[a-z]/.test(password)) score++;
            
            // Numbers
            if (/[0-9]/.test(password)) score++;
            
            // Special characters
            if (/[^A-Za-z0-9]/.test(password)) score++;
            
            // Determine strength
            if (score <= 2) {
                strength.className = 'password-strength weak';
            } else if (score <= 4) {
                strength.className = 'password-strength medium';
            } else {
                strength.className = 'password-strength strong';
            }
        });
        
        /**
         * Confirm password validation
         */
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirm = this.value;
            
            if (confirm && password !== confirm) {
                this.classList.add('error');
                this.classList.remove('success');
            } else if (confirm && password === confirm) {
                this.classList.add('success');
                this.classList.remove('error');
            } else {
                this.classList.remove('error', 'success');
            }
        });
        
        /**
         * Form validation and loading state
         */
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const fullName = document.getElementById('full_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('confirm_password').value;
            const terms = document.getElementById('terms').checked;
            
            let errors = [];
            
            if (!fullName || fullName.length < 3) {
                errors.push('Jina kamili linahitajika (angalau herufi 3).');
                document.getElementById('full_name').classList.add('error');
            }
            
            if (!email || !email.includes('@')) {
                errors.push('Barua pepe si sahihi.');
                document.getElementById('email').classList.add('error');
            }
            
            if (!password || password.length < 6) {
                errors.push('Nenosiri lazima liwe angalau herufi 6.');
                document.getElementById('password').classList.add('error');
            }
            
            if (password !== confirm) {
                errors.push('Manenosiri hayafanani.');
                document.getElementById('confirm_password').classList.add('error');
            }
            
            if (!terms) {
                errors.push('Tafadhali kubali Masharti na Sheria.');
            }
            
            if (errors.length > 0) {
                e.preventDefault();
                alert(errors.join('\n'));
                return;
            }
            
            // Show loading
            const btn = document.getElementById('registerBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Inajiandikisha...';
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
         * Auto-focus on first field
         */
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('full_name').focus();
        });
    </script>

</body>
</html>