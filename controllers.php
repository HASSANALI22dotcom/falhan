<?php
// ================================================================
// app/Controllers/AuthController.php
// Falhan EMS - Authentication Controller
// ================================================================
// Kazi: Kudhibiti Login, Registration, Logout, Password Reset
// ================================================================

namespace App\Controllers;

class AuthController
{
    /**
     * LOGIN PAGE - Onyesha ukurasa wa kuingia
     * URL: /login
     */
    public function login()
    {
        // If user already logged in, go to dashboard
        if (isLoggedIn()) {
            header('Location: ' . url('/dashboard'));
            exit;
        }
        
        // Include login view
        include VIEWS_PATH . '/auth/login.php';
    }
    
    /**
     * REGISTER PAGE - Onyesha ukurasa wa kujiandikisha
     * URL: /register
     */
    public function register()
    {
        // If user already logged in, go to dashboard
        if (isLoggedIn()) {
            header('Location: ' . url('/dashboard'));
            exit;
        }
        
        // Include register view
        include VIEWS_PATH . '/auth/register.php';
    }
    
    /**
     * FORGOT PASSWORD PAGE - Onyesha ukurasa wa kusahau nenosiri
     * URL: /forgot-password
     */
    public function forgotPassword()
    {
        include VIEWS_PATH . '/auth/forgot_password.php';
    }
    
    /**
     * RESET PASSWORD PAGE - Onyesha ukurasa wa kubadilisha nenosiri
     * URL: /reset-password?token=xxxxx
     */
    public function resetPassword()
    {
        $token = $_GET['token'] ?? '';
        
        if (empty($token)) {
            flash('error', 'Tokeni haipatikani.');
            header('Location: ' . url('/forgot-password'));
            exit;
        }
        
        // Include reset password view
        include VIEWS_PATH . '/auth/reset_password.php';
    }
    
    /**
     * LOGIN POST - Process login form submission
     * URL: /login-post (POST)
     */
    public function loginPost()
    {
        // Get form data
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $remember = isset($_POST['remember']);
        
        // ============================================================
        // VALIDATION
        // ============================================================
        
        // Check if fields are empty
        if (empty($email) || empty($password)) {
            flash('error', 'Tafadhali jaza barua pepe na nenosiri.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash('error', 'Barua pepe si sahihi.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // ============================================================
        // DEMO LOGIN - Inakubali barua pepe na nenosiri lolote
        // ============================================================
        // Hapa ndipo utaunganisha database yako
        // ============================================================
        
        // Demo users database
        $demoUsers = [
            'admin@falhan.com' => [
                'password' => 'admin123',
                'name' => 'Admin Falhan',
                'role' => 'admin',
                'school_id' => 1
            ],
            'teacher@falhan.com' => [
                'password' => 'teacher123',
                'name' => 'Mwalimu Falhan',
                'role' => 'teacher',
                'school_id' => 1
            ],
            'student@falhan.com' => [
                'password' => 'student123',
                'name' => 'Mwanafunzi Falhan',
                'role' => 'student',
                'school_id' => 1
            ],
            'parent@falhan.com' => [
                'password' => 'parent123',
                'name' => 'Mzazi Falhan',
                'role' => 'parent',
                'school_id' => 1
            ]
        ];
        
        // Check if email exists in demo users
        if (isset($demoUsers[$email])) {
            $user = $demoUsers[$email];
            
            // Verify password (in production use password_verify())
            if ($password === $user['password']) {
                // Login successful - Create session
                $_SESSION['user_id'] = 1; // Will come from database
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $email;
                $_SESSION['role'] = $user['role'];
                $_SESSION['school_id'] = $user['school_id'];
                $_SESSION['login_time'] = time();
                
                // Set remember me cookie (30 days)
                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    setcookie('remember_token', $token, time() + (86400 * 30), '/');
                    // In production, save token to database
                }
                
                flash('success', 'Karibu, ' . $user['name'] . '!');
                header('Location: ' . url('/dashboard'));
                exit;
            }
        }
        
        // ============================================================
        // REAL DATABASE LOGIN (Uncomment when you have database)
        // ============================================================
        /*
        // Get user from database
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? AND is_active = 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Login successful
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['school_id'] = $user['school_id'];
            $_SESSION['login_time'] = time();
            
            // Update last login
            $stmt = $this->db->prepare("UPDATE users SET last_login = NOW() WHERE user_id = ?");
            $stmt->bind_param("i", $user['user_id']);
            $stmt->execute();
            
            flash('success', 'Karibu, ' . $user['full_name'] . '!');
            header('Location: ' . url('/dashboard'));
            exit;
        }
        */
        
        // ============================================================
        // LOGIN FAILED
        // ============================================================
        flash('error', 'Barua pepe au nenosiri si sahihi.');
        header('Location: ' . url('/login'));
        exit;
    }
    
    /**
     * REGISTER POST - Process registration form submission
     * URL: /register-post (POST)
     */
    public function registerPost()
    {
        // Get form data
        $fullName = trim($_POST['full_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';
        $role = $_POST['role'] ?? 'teacher';
        $terms = isset($_POST['terms']);
        
        // ============================================================
        // VALIDATION
        // ============================================================
        $errors = [];
        
        // Full name validation
        if (empty($fullName)) {
            $errors[] = 'Jina kamili linahitajika.';
        } elseif (strlen($fullName) < 3) {
            $errors[] = 'Jina kamili lazima liwe angalau herufi 3.';
        }
        
        // Email validation
        if (empty($email)) {
            $errors[] = 'Barua pepe inahitajika.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Barua pepe si sahihi.';
        }
        
        // Password validation
        if (empty($password)) {
            $errors[] = 'Nenosiri linahitajika.';
        } elseif (strlen($password) < 6) {
            $errors[] = 'Nenosiri lazima liwe angalau herufi 6.';
        } elseif (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'Nenosiri lazima liwe na angalau herufi kubwa moja.';
        } elseif (!preg_match('/[a-z]/', $password)) {
            $errors[] = 'Nenosiri lazima liwe na angalau herufi ndogo moja.';
        } elseif (!preg_match('/[0-9]/', $password)) {
            $errors[] = 'Nenosiri lazima liwe na angalau namba moja.';
        }
        
        // Confirm password
        if ($password !== $confirm) {
            $errors[] = 'Manenosiri hayafanani.';
        }
        
        // Phone validation (optional)
        if (!empty($phone) && !preg_match('/^[0-9]{10,15}$/', $phone)) {
            $errors[] = 'Namba ya simu si sahihi.';
        }
        
        // Terms agreement
        if (!$terms) {
            $errors[] = 'Tafadhali kubali Masharti na Sheria.';
        }
        
        // ============================================================
        // CHECK IF EMAIL EXISTS (Uncomment when you have database)
        // ============================================================
        /*
        $stmt = $this->db->prepare("SELECT user_id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) {
            $errors[] = 'Barua pepe tayari imesajiliwa.';
        }
        */
        
        // If errors, redirect back
        if (!empty($errors)) {
            flash('error', implode(' ', $errors));
            $_SESSION['old_input'] = $_POST;
            header('Location: ' . url('/register'));
            exit;
        }
        
        // ============================================================
        // DEMO REGISTRATION - Inaandika kwenye session tu
        // ============================================================
        
        // Hash password (in production)
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        // ============================================================
        // SAVE TO DATABASE (Uncomment when you have database)
        // ============================================================
        /*
        $stmt = $this->db->prepare("
            INSERT INTO users (email, password_hash, full_name, phone, role, school_id, is_active) 
            VALUES (?, ?, ?, ?, ?, ?, 1)
        ");
        $stmt->bind_param("sssssi", $email, $passwordHash, $fullName, $phone, $role, $schoolId);
        $stmt->execute();
        $userId = $this->db->insert_id;
        
        // Send verification email
        $this->sendVerificationEmail($email, $fullName);
        */
        
        // For demo, we'll just set a session
        $_SESSION['registered_email'] = $email;
        $_SESSION['registered_name'] = $fullName;
        
        flash('success', 'Usajili umefanikiwa! Tafadhali ingia.');
        header('Location: ' . url('/login'));
        exit;
    }
    
    /**
     * LOGOUT - End session and logout
     * URL: /logout
     */
    public function logout()
    {
        // Clear session variables
        $_SESSION = [];
        
        // Destroy session
        session_destroy();
        
        // Clear session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        
        // Clear remember me cookie
        setcookie('remember_token', '', time() - 42000, '/');
        
        flash('success', 'Umefanikiwa kutoka. Tutaonana tena!');
        header('Location: ' . url('/login'));
        exit;
    }
    
    /**
     * FORGOT PASSWORD POST - Process forgot password form
     * URL: /forgot-password-post (POST)
     */
    public function forgotPasswordPost()
    {
        $email = trim($_POST['email'] ?? '');
        
        // Validate email
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash('error', 'Tafadhali weka barua pepe sahihi.');
            header('Location: ' . url('/forgot-password'));
            exit;
        }
        
        // ============================================================
        // CHECK IF EMAIL EXISTS (Uncomment when you have database)
        // ============================================================
        /*
        $stmt = $this->db->prepare("SELECT user_id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        if ($stmt->get_result()->num_rows === 0) {
            flash('error', 'Barua pepe haijapatikana.');
            header('Location: ' . url('/forgot-password'));
            exit;
        }
        */
        
        // ============================================================
        // DEMO - Generate and send reset token
        // ============================================================
        
        // Generate reset token
        $token = bin2hex(random_bytes(32));
        
        // ============================================================
        // SAVE TOKEN TO DATABASE (Uncomment when you have database)
        // ============================================================
        /*
        $stmt = $this->db->prepare("
            UPDATE users 
            SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) 
            WHERE email = ?
        ");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        */
        
        // Send email with reset link
        $resetLink = url('/reset-password') . '?token=' . $token;
        $this->sendPasswordResetEmail($email, $resetLink);
        
        flash('success', 'Mwongozo wa kubadilisha nenosiri umetumwa kwa barua pepe yako.');
        header('Location: ' . url('/login'));
        exit;
    }
    
    /**
     * RESET PASSWORD POST - Process new password
     * URL: /reset-password-post (POST)
     */
    public function resetPasswordPost()
    {
        $token = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';
        
        // Validate token
        if (empty($token)) {
            flash('error', 'Tokeni haipatikani.');
            header('Location: ' . url('/forgot-password'));
            exit;
        }
        
        // Validate password
        if (empty($password) || strlen($password) < 6) {
            flash('error', 'Nenosiri lazima liwe angalau herufi 6.');
            header('Location: ' . url('/reset-password') . '?token=' . $token);
            exit;
        }
        
        if ($password !== $confirm) {
            flash('error', 'Manenosiri hayafanani.');
            header('Location: ' . url('/reset-password') . '?token=' . $token);
            exit;
        }
        
        // ============================================================
        // DEMO - Update password (Uncomment when you have database)
        // ============================================================
        /*
        // Verify token
        $stmt = $this->db->prepare("
            SELECT user_id FROM users 
            WHERE reset_token = ? AND reset_token_expiry > NOW()
        ");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        
        if (!$user) {
            flash('error', 'Tokeni si sahihi au imeisha muda wake.');
            header('Location: ' . url('/forgot-password'));
            exit;
        }
        
        // Update password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("
            UPDATE users 
            SET password_hash = ?, reset_token = NULL, reset_token_expiry = NULL 
            WHERE user_id = ?
        ");
        $stmt->bind_param("si", $passwordHash, $user['user_id']);
        $stmt->execute();
        */
        
        flash('success', 'Nenosiri limebadilishwa kwa mafanikio! Tafadhali ingia.');
        header('Location: ' . url('/login'));
        exit;
    }
    
    /**
     * VERIFY EMAIL - Verify user email with token
     * URL: /verify-email?token=xxxxx
     */
    public function verifyEmail()
    {
        $token = $_GET['token'] ?? '';
        
        if (empty($token)) {
            flash('error', 'Tokeni haipatikani.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // ============================================================
        // DEMO - Verify email (Uncomment when you have database)
        // ============================================================
        /*
        $stmt = $this->db->prepare("
            SELECT user_id FROM users 
            WHERE verification_token = ? AND is_verified = 0
        ");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        
        if (!$user) {
            flash('error', 'Tokeni si sahihi au tayari imethibitishwa.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        $stmt = $this->db->prepare("
            UPDATE users 
            SET is_verified = 1, verification_token = NULL 
            WHERE user_id = ?
        ");
        $stmt->bind_param("i", $user['user_id']);
        $stmt->execute();
        */
        
        flash('success', 'Barua pepe imethibitishwa kwa mafanikio! Sasa unaweza kuingia.');
        header('Location: ' . url('/login'));
        exit;
    }
    
    /**
     * SEND VERIFICATION EMAIL - Send email verification link
     */
    private function sendVerificationEmail($email, $name)
    {
        // In production, use PHPMailer or your preferred email service
        $token = bin2hex(random_bytes(32));
        $verifyLink = url('/verify-email') . '?token=' . $token;
        
        // Save token to database (uncomment when you have database)
        /*
        $stmt = $this->db->prepare("
            UPDATE users SET verification_token = ? WHERE email = ?
        ");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        */
        
        // Send email
        $subject = "Falhan EMS - Thibitisha Barua Pepe Yako";
        $message = "Habari $name,\n\n";
        $message .= "Tafadhali bonyeza kiungo hiki kuthibitisha barua pepe yako:\n\n";
        $message .= $verifyLink . "\n\n";
        $message .= "Kiungo hiki kitakua halali kwa saa 24.\n\n";
        $message .= "Falhan Education Management System - Tanzania";
        
        // mail($email, $subject, $message);
        // Or use PHPMailer
        // Or use a mail service like SendGrid, Mailgun, etc.
        
        // For demo, just log it
        error_log("Verification email sent to $email: $verifyLink");
    }
    
    /**
     * SEND PASSWORD RESET EMAIL - Send password reset link
     */
    private function sendPasswordResetEmail($email, $resetLink)
    {
        // In production, use PHPMailer or your preferred email service
        $subject = "Falhan EMS - Badilisha Nenosiri";
        $message = "Habari,\n\n";
        $message .= "Tafadhali bonyeza kiungo hiki kubadilisha nenosiri lako:\n\n";
        $message .= $resetLink . "\n\n";
        $message .= "Kiungo hiki kitakua halali kwa saa 1.\n\n";
        $message .= "Falhan Education Management System - Tanzania";
        
        // mail($email, $subject, $message);
        // Or use PHPMailer
        // Or use a mail service like SendGrid, Mailgun, etc.
        
        // For demo, just log it
        error_log("Password reset link sent to $email: $resetLink");
    }
    
    /**
     * CHECK AUTHENTICATION - Helper to check if user is logged in
     * Inatumika kwenye dashboard na kurasa zinazohitaji login
     */
    public function checkAuth()
    {
        if (!isLoggedIn()) {
            flash('error', 'Tafadhali ingia kwanza.');
            header('Location: ' . url('/login'));
            exit;
        }
    }
    
    /**
     * CHECK ROLE - Helper to check user role
     * Inatumika kuhakikisha mtumiaji ana ruhusa ya kuona ukurasa
     */
    public function checkRole($allowedRoles = [])
    {
        $this->checkAuth();
        
        $role = $_SESSION['role'] ?? 'guest';
        
        if (!empty($allowedRoles) && !in_array($role, $allowedRoles)) {
            http_response_code(403);
            include VIEWS_PATH . '/errors/403.php';
            exit;
        }
    }
}

// ================================================================
// MWISHO WA FAILI
// ================================================================
?>