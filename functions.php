<?php
// app/Helpers/functions.php
// ================================================================
// Falhan EMS - Helper Functions
// ================================================================

/**
 * Get flash message from session
 */
function flash($key, $msg = null)
{
    if ($msg !== null) {
        $_SESSION['flash_' . $key] = $msg;
    } else {
        $m = $_SESSION['flash_' . $key] ?? null;
        unset($_SESSION['flash_' . $key]);
        return $m;
    }
}

/**
 * Check if user is logged in
 */
function isLoggedIn()
{
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Generate URL
 */
function url($path = '')
{
    return BASE_URL . $path;
}

/**
 * Dump and die (debugging)
 */
function dd($data)
{
    echo '<pre style="background:#0a0a0a;color:#c9a84c;padding:20px;border-radius:10px;font-family:monospace;font-size:14px;max-height:80vh;overflow:auto;">';
    var_dump($data);
    echo '</pre>';
    die();
}

/**
 * Sanitize input
 */
function sanitize($input)
{
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

/**
 * Get current user info
 */
function currentUser()
{
    if (!isLoggedIn()) {
        return null;
    }
    
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'name' => $_SESSION['user_name'] ?? null,
        'email' => $_SESSION['user_email'] ?? null,
        'role' => $_SESSION['role'] ?? null,
        'school_id' => $_SESSION['school_id'] ?? null
    ];
}

/**
 * Check if user has specific role
 */
function hasRole($role)
{
    if (!isLoggedIn()) {
        return false;
    }
    
    return ($_SESSION['role'] ?? '') === $role;
}

/**
 * Generate random string
 */
function randomString($length = 32)
{
    return bin2hex(random_bytes($length / 2));
}

/**
 * Format date
 */
function formatDate($date, $format = 'd M Y')
{
    return date($format, strtotime($date));
}

/**
 * Truncate text
 */
function truncate($text, $length = 100)
{
    if (strlen($text) <= $length) {
        return $text;
    }
    
    return substr($text, 0, $length) . '...';
}