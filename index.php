<?php
// ================================================================
// public/index.php
// FALHAN EMS - MAIN ENTRY POINT (COMPLETE ROUTER)
// ================================================================
// Kazi: Kuongoza maombi yote kwenye controllers sahihi
// ================================================================

// ================================================================
// 1. START SESSION
// ================================================================
session_start();

// ================================================================
// 2. ERROR REPORTING (Zima kwenye production)
// ================================================================
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ================================================================
// 3. DEFINE CONSTANTS
// ================================================================
define('BASE_URL', ''); // Leave empty if in root, or '/falhan-ems/public'
define('APP_PATH', dirname(__DIR__) . '/app');
define('VIEWS_PATH', APP_PATH . '/Views');
define('VERSION', '1.0.0');

// ================================================================
// 4. LOAD HELPERS
// ================================================================
require_once APP_PATH . '/Helpers/functions.php';

// ================================================================
// 5. GET REQUEST URI
// ================================================================
$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);

// Remove base path if set
if (BASE_URL && strpos($request, BASE_URL) === 0) {
    $request = substr($request, strlen(BASE_URL));
}
if (empty($request) || $request === '/') {
    $request = '/';
}

// ================================================================
// 6. ROUTE DEFINITIONS (COMPLETE)
// ================================================================
$routes = [
    // ============================================================
    // A. PUBLIC PAGES (Hazihitaji login)
    // ============================================================
    '/' => ['controller' => 'PageController', 'action' => 'splash'],
    '/splash' => ['controller' => 'PageController', 'action' => 'splash'],
    '/landing' => ['controller' => 'PageController', 'action' => 'landing'],
    '/about' => ['controller' => 'PageController', 'action' => 'about'],
    '/contact' => ['controller' => 'PageController', 'action' => 'contact'],
    '/features' => ['controller' => 'PageController', 'action' => 'features'],
    '/pricing' => ['controller' => 'PageController', 'action' => 'pricing'],
    '/terms' => ['controller' => 'PageController', 'action' => 'terms'],
    '/privacy' => ['controller' => 'PageController', 'action' => 'privacy'],
    '/help' => ['controller' => 'PageController', 'action' => 'help'],
    '/docs' => ['controller' => 'PageController', 'action' => 'docs'],
    '/faq' => ['controller' => 'PageController', 'action' => 'faq'],
    
    // ============================================================
    // B. AUTHENTICATION PAGES
    // ============================================================
    '/login' => ['controller' => 'AuthController', 'action' => 'login'],
    '/register' => ['controller' => 'AuthController', 'action' => 'register'],
    '/logout' => ['controller' => 'AuthController', 'action' => 'logout'],
    '/forgot-password' => ['controller' => 'AuthController', 'action' => 'forgotPassword'],
    '/reset-password' => ['controller' => 'AuthController', 'action' => 'resetPassword'],
    '/verify-email' => ['controller' => 'AuthController', 'action' => 'verifyEmail'],
    
    // ============================================================
    // C. AUTH FORM SUBMISSIONS (POST)
    // ============================================================
    '/login-post' => ['controller' => 'AuthController', 'action' => 'loginPost'],
    '/register-post' => ['controller' => 'AuthController', 'action' => 'registerPost'],
    '/forgot-password-post' => ['controller' => 'AuthController', 'action' => 'forgotPasswordPost'],
    '/reset-password-post' => ['controller' => 'AuthController', 'action' => 'resetPasswordPost'],
    
    // ============================================================
    // D. DASHBOARD ROUTES (Zinahitaji login)
    // ============================================================
    '/dashboard' => ['controller' => 'DashboardController', 'action' => 'index', 'auth' => true],
    '/dashboard/admin' => ['controller' => 'DashboardController', 'action' => 'admin', 'auth' => true],
    '/dashboard/school' => ['controller' => 'DashboardController', 'action' => 'school', 'auth' => true],
    '/dashboard/teacher' => ['controller' => 'DashboardController', 'action' => 'teacher', 'auth' => true],
    '/dashboard/student' => ['controller' => 'DashboardController', 'action' => 'student', 'auth' => true],
    '/dashboard/parent' => ['controller' => 'DashboardController', 'action' => 'parent', 'auth' => true],
    
    // ============================================================
    // E. STUDENT MANAGEMENT ROUTES
    // ============================================================
    '/students' => ['controller' => 'StudentController', 'action' => 'index', 'auth' => true],
    '/students/create' => ['controller' => 'StudentController', 'action' => 'create', 'auth' => true],
    '/students/store' => ['controller' => 'StudentController', 'action' => 'store', 'auth' => true],
    '/students/edit/{id}' => ['controller' => 'StudentController', 'action' => 'edit', 'auth' => true],
    '/students/update/{id}' => ['controller' => 'StudentController', 'action' => 'update', 'auth' => true],
    '/students/delete/{id}' => ['controller' => 'StudentController', 'action' => 'delete', 'auth' => true],
    '/students/view/{id}' => ['controller' => 'StudentController', 'action' => 'view', 'auth' => true],
    '/students/export' => ['controller' => 'StudentController', 'action' => 'export', 'auth' => true],
    '/students/import' => ['controller' => 'StudentController', 'action' => 'import', 'auth' => true],
    '/students/bulk' => ['controller' => 'StudentController', 'action' => 'bulk', 'auth' => true],
    
    // ============================================================
    // F. TEACHER MANAGEMENT ROUTES
    // ============================================================
    '/teachers' => ['controller' => 'TeacherController', 'action' => 'index', 'auth' => true],
    '/teachers/create' => ['controller' => 'TeacherController', 'action' => 'create', 'auth' => true],
    '/teachers/store' => ['controller' => 'TeacherController', 'action' => 'store', 'auth' => true],
    '/teachers/edit/{id}' => ['controller' => 'TeacherController', 'action' => 'edit', 'auth' => true],
    '/teachers/update/{id}' => ['controller' => 'TeacherController', 'action' => 'update', 'auth' => true],
    '/teachers/delete/{id}' => ['controller' => 'TeacherController', 'action' => 'delete', 'auth' => true],
    '/teachers/view/{id}' => ['controller' => 'TeacherController', 'action' => 'view', 'auth' => true],
    
    // ============================================================
    // G. CLASS MANAGEMENT ROUTES
    // ============================================================
    '/classes' => ['controller' => 'ClassController', 'action' => 'index', 'auth' => true],
    '/classes/create' => ['controller' => 'ClassController', 'action' => 'create', 'auth' => true],
    '/classes/store' => ['controller' => 'ClassController', 'action' => 'store', 'auth' => true],
    '/classes/edit/{id}' => ['controller' => 'ClassController', 'action' => 'edit', 'auth' => true],
    '/classes/update/{id}' => ['controller' => 'ClassController', 'action' => 'update', 'auth' => true],
    '/classes/delete/{id}' => ['controller' => 'ClassController', 'action' => 'delete', 'auth' => true],
    '/classes/view/{id}' => ['controller' => 'ClassController', 'action' => 'view', 'auth' => true],
    '/classes/assign-teacher' => ['controller' => 'ClassController', 'action' => 'assignTeacher', 'auth' => true],
    
    // ============================================================
    // H. SUBJECT MANAGEMENT ROUTES
    // ============================================================
    '/subjects' => ['controller' => 'SubjectController', 'action' => 'index', 'auth' => true],
    '/subjects/create' => ['controller' => 'SubjectController', 'action' => 'create', 'auth' => true],
    '/subjects/store' => ['controller' => 'SubjectController', 'action' => 'store', 'auth' => true],
    '/subjects/edit/{id}' => ['controller' => 'SubjectController', 'action' => 'edit', 'auth' => true],
    '/subjects/update/{id}' => ['controller' => 'SubjectController', 'action' => 'update', 'auth' => true],
    '/subjects/delete/{id}' => ['controller' => 'SubjectController', 'action' => 'delete', 'auth' => true],
    
    // ============================================================
    // I. EXAM MANAGEMENT ROUTES
    // ============================================================
    '/exams' => ['controller' => 'ExamController', 'action' => 'index', 'auth' => true],
    '/exams/create' => ['controller' => 'ExamController', 'action' => 'create', 'auth' => true],
    '/exams/store' => ['controller' => 'ExamController', 'action' => 'store', 'auth' => true],
    '/exams/edit/{id}' => ['controller' => 'ExamController', 'action' => 'edit', 'auth' => true],
    '/exams/update/{id}' => ['controller' => 'ExamController', 'action' => 'update', 'auth' => true],
    '/exams/delete/{id}' => ['controller' => 'ExamController', 'action' => 'delete', 'auth' => true],
    '/exams/view/{id}' => ['controller' => 'ExamController', 'action' => 'view', 'auth' => true],
    
    // ============================================================
    // J. FALHAN ENTRY SYSTEM - EXAM RESULTS
    // ============================================================
    '/exams/entry' => ['controller' => 'ExamController', 'action' => 'entry', 'auth' => true],
    '/exams/entry/{id}' => ['controller' => 'ExamController', 'action' => 'entry', 'auth' => true],
    '/exams/process' => ['controller' => 'ExamController', 'action' => 'process', 'auth' => true],
    '/exams/results/{id}' => ['controller' => 'ExamController', 'action' => 'results', 'auth' => true],
    '/exams/publish/{id}' => ['controller' => 'ExamController', 'action' => 'publish', 'auth' => true],
    '/exams/report/{id}' => ['controller' => 'ExamController', 'action' => 'report', 'auth' => true],
    '/exams/download/{id}' => ['controller' => 'ExamController', 'action' => 'download', 'auth' => true],
    '/exams/analyze/{id}' => ['controller' => 'ExamController', 'action' => 'analyze', 'auth' => true],
    
    // ============================================================
    // K. ATTENDANCE ROUTES
    // ============================================================
    '/attendance' => ['controller' => 'AttendanceController', 'action' => 'index', 'auth' => true],
    '/attendance/take' => ['controller' => 'AttendanceController', 'action' => 'take', 'auth' => true],
    '/attendance/store' => ['controller' => 'AttendanceController', 'action' => 'store', 'auth' => true],
    '/attendance/view/{date}' => ['controller' => 'AttendanceController', 'action' => 'view', 'auth' => true],
    '/attendance/student/{id}' => ['controller' => 'AttendanceController', 'action' => 'student', 'auth' => true],
    '/attendance/report' => ['controller' => 'AttendanceController', 'action' => 'report', 'auth' => true],
    '/attendance/summary' => ['controller' => 'AttendanceController', 'action' => 'summary', 'auth' => true],
    
    // ============================================================
    // L. REPORT ROUTES
    // ============================================================
    '/reports' => ['controller' => 'ReportController', 'action' => 'index', 'auth' => true],
    '/reports/class' => ['controller' => 'ReportController', 'action' => 'classReport', 'auth' => true],
    '/reports/student' => ['controller' => 'ReportController', 'action' => 'studentReport', 'auth' => true],
    '/reports/teacher' => ['controller' => 'ReportController', 'action' => 'teacherReport', 'auth' => true],
    '/reports/exam/{id}' => ['controller' => 'ReportController', 'action' => 'examReport', 'auth' => true],
    '/reports/download/{id}' => ['controller' => 'ReportController', 'action' => 'download', 'auth' => true],
    '/reports/term' => ['controller' => 'ReportController', 'action' => 'termReport', 'auth' => true],
    '/reports/annual' => ['controller' => 'ReportController', 'action' => 'annualReport', 'auth' => true],
    
    // ============================================================
    // M. SCHOOL MANAGEMENT ROUTES
    // ============================================================
    '/schools' => ['controller' => 'SchoolController', 'action' => 'index', 'auth' => true],
    '/schools/create' => ['controller' => 'SchoolController', 'action' => 'create', 'auth' => true],
    '/schools/store' => ['controller' => 'SchoolController', 'action' => 'store', 'auth' => true],
    '/schools/edit/{id}' => ['controller' => 'SchoolController', 'action' => 'edit', 'auth' => true],
    '/schools/update/{id}' => ['controller' => 'SchoolController', 'action' => 'update', 'auth' => true],
    '/schools/delete/{id}' => ['controller' => 'SchoolController', 'action' => 'delete', 'auth' => true],
    '/schools/view/{id}' => ['controller' => 'SchoolController', 'action' => 'view', 'auth' => true],
    
    // ============================================================
    // N. PARENT ROUTES
    // ============================================================
    '/parent/children' => ['controller' => 'ParentController', 'action' => 'children', 'auth' => true],
    '/parent/fees' => ['controller' => 'ParentController', 'action' => 'fees', 'auth' => true],
    '/parent/reports' => ['controller' => 'ParentController', 'action' => 'reports', 'auth' => true],
    '/parent/notifications' => ['controller' => 'ParentController', 'action' => 'notifications', 'auth' => true],
    '/parent/messages' => ['controller' => 'ParentController', 'action' => 'messages', 'auth' => true],
    '/parent/pay-fee' => ['controller' => 'ParentController', 'action' => 'payFee', 'auth' => true],
    
    // ============================================================
    // O. STUDENT ROUTES (For students)
    // ============================================================
    '/student/grades' => ['controller' => 'StudentController', 'action' => 'myGrades', 'auth' => true],
    '/student/attendance' => ['controller' => 'StudentController', 'action' => 'myAttendance', 'auth' => true],
    '/student/schedule' => ['controller' => 'StudentController', 'action' => 'mySchedule', 'auth' => true],
    '/student/tasks' => ['controller' => 'StudentController', 'action' => 'myTasks', 'auth' => true],
    '/student/report' => ['controller' => 'StudentController', 'action' => 'myReport', 'auth' => true],
    '/student/profile' => ['controller' => 'StudentController', 'action' => 'myProfile', 'auth' => true],
    
    // ============================================================
    // P. PROFILE ROUTES
    // ============================================================
    '/profile' => ['controller' => 'ProfileController', 'action' => 'index', 'auth' => true],
    '/profile/edit' => ['controller' => 'ProfileController', 'action' => 'edit', 'auth' => true],
    '/profile/update' => ['controller' => 'ProfileController', 'action' => 'update', 'auth' => true],
    '/profile/change-password' => ['controller' => 'ProfileController', 'action' => 'changePassword', 'auth' => true],
    '/profile/avatar' => ['controller' => 'ProfileController', 'action' => 'avatar', 'auth' => true],
    
    // ============================================================
    // Q. SETTINGS ROUTES (Admin only)
    // ============================================================
    '/settings' => ['controller' => 'SettingsController', 'action' => 'index', 'auth' => true],
    '/settings/general' => ['controller' => 'SettingsController', 'action' => 'general', 'auth' => true],
    '/settings/school' => ['controller' => 'SettingsController', 'action' => 'school', 'auth' => true],
    '/settings/users' => ['controller' => 'SettingsController', 'action' => 'users', 'auth' => true],
    '/settings/backup' => ['controller' => 'SettingsController', 'action' => 'backup', 'auth' => true],
    '/settings/security' => ['controller' => 'SettingsController', 'action' => 'security', 'auth' => true],
    
    // ============================================================
    // R. API ROUTES (AJAX requests)
    // ============================================================
    '/api/students' => ['controller' => 'ApiController', 'action' => 'students', 'auth' => true],
    '/api/teachers' => ['controller' => 'ApiController', 'action' => 'teachers', 'auth' => true],
    '/api/classes' => ['controller' => 'ApiController', 'action' => 'classes', 'auth' => true],
    '/api/subjects' => ['controller' => 'ApiController', 'action' => 'subjects', 'auth' => true],
    '/api/exams' => ['controller' => 'ApiController', 'action' => 'exams', 'auth' => true],
    '/api/save-grades' => ['controller' => 'ApiController', 'action' => 'saveGrades', 'auth' => true],
    '/api/get-students' => ['controller' => 'ApiController', 'action' => 'getStudents', 'auth' => true],
    '/api/get-classes' => ['controller' => 'ApiController', 'action' => 'getClasses', 'auth' => true],
    '/api/get-subjects' => ['controller' => 'ApiController', 'action' => 'getSubjects', 'auth' => true],
    '/api/dashboard-stats' => ['controller' => 'ApiController', 'action' => 'dashboardStats', 'auth' => true],
    '/api/attendance' => ['controller' => 'ApiController', 'action' => 'attendance', 'auth' => true],
    '/api/search' => ['controller' => 'ApiController', 'action' => 'search', 'auth' => true],
    '/api/notifications' => ['controller' => 'ApiController', 'action' => 'notifications', 'auth' => true],
    
    // ============================================================
    // S. TEACHER ROUTES (For teachers)
    // ============================================================
    '/teacher/classes' => ['controller' => 'TeacherController', 'action' => 'myClasses', 'auth' => true],
    '/teacher/students' => ['controller' => 'TeacherController', 'action' => 'myStudents', 'auth' => true],
    '/teacher/exams' => ['controller' => 'TeacherController', 'action' => 'myExams', 'auth' => true],
    '/teacher/attendance' => ['controller' => 'TeacherController', 'action' => 'myAttendance', 'auth' => true],
    
    // ============================================================
    // T. SCHOOL ADMIN ROUTES
    // ============================================================
    '/school-admin/dashboard' => ['controller' => 'SchoolAdminController', 'action' => 'index', 'auth' => true],
    '/school-admin/teachers' => ['controller' => 'SchoolAdminController', 'action' => 'teachers', 'auth' => true],
    '/school-admin/students' => ['controller' => 'SchoolAdminController', 'action' => 'students', 'auth' => true],
    '/school-admin/classes' => ['controller' => 'SchoolAdminController', 'action' => 'classes', 'auth' => true],
    '/school-admin/exams' => ['controller' => 'SchoolAdminController', 'action' => 'exams', 'auth' => true],
    '/school-admin/reports' => ['controller' => 'SchoolAdminController', 'action' => 'reports', 'auth' => true],
];

// ================================================================
// 7. SERVE STATIC FILES (CSS, JS, Images)
// ================================================================
if (!isset($routes[$request])) {
    $filePath = __DIR__ . $request;
    if (file_exists($filePath) && !is_dir($filePath)) {
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'mjs' => 'application/javascript',
            'json' => 'application/json',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'webp' => 'image/webp',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject',
            'otf' => 'font/otf',
            'pdf' => 'application/pdf',
            'zip' => 'application/zip',
            'xml' => 'application/xml',
            'txt' => 'text/plain',
            'map' => 'application/json',
        ];
        if (isset($mimeTypes[$ext])) {
            header('Content-Type: ' . $mimeTypes[$ext]);
            header('Cache-Control: public, max-age=86400');
            header('Pragma: public');
            readfile($filePath);
            exit;
        }
    }
}

// ================================================================
// 8. FIND ROUTE OR 404
// ================================================================
$route = $routes[$request] ?? null;

if (!$route) {
    http_response_code(404);
    
    // Check if it's an API route that doesn't exist
    if (strpos($request, '/api/') === 0) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'API endpoint not found']);
        exit;
    }
    
    $route = ['controller' => 'PageController', 'action' => 'notFound'];
}

// ================================================================
// 9. CHECK AUTHENTICATION
// ================================================================
if (isset($route['auth']) && $route['auth'] === true) {
    if (!isLoggedIn()) {
        // Store the requested URL to redirect after login
        $_SESSION['redirect_after_login'] = $request;
        flash('error', 'Tafadhali ingia kwanza.');
        
        // If it's an API request, return JSON
        if (strpos($request, '/api/') === 0) {
            header('Content-Type: application/json');
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Unauthorized. Please login.']);
            exit;
        }
        
        header('Location: ' . url('/login'));
        exit;
    }
    
    // Check role-based access (optional)
    if (isset($route['roles']) && !empty($route['roles'])) {
        $userRole = $_SESSION['role'] ?? 'guest';
        if (!in_array($userRole, $route['roles'])) {
            http_response_code(403);
            
            if (strpos($request, '/api/') === 0) {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Forbidden. Insufficient permissions.']);
                exit;
            }
            
            include VIEWS_PATH . '/errors/403.php';
            exit;
        }
    }
}

// ================================================================
// 10. LOAD AND EXECUTE CONTROLLER
// ================================================================
$controllerName = $route['controller'];
$actionName = $route['action'];

$controllerFile = APP_PATH . '/Controllers/' . $controllerName . '.php';

if (!file_exists($controllerFile)) {
    http_response_code(500);
    die("Controller not found: " . $controllerName);
}

require_once $controllerFile;

$fullClassName = 'App\\Controllers\\' . $controllerName;

if (!class_exists($fullClassName)) {
    http_response_code(500);
    die("Class not found: " . $fullClassName);
}

$controller = new $fullClassName();

if (!method_exists($controller, $actionName)) {
    http_response_code(500);
    die("Action not found: " . $actionName . " in " . $controllerName);
}

// ================================================================
// 11. HANDLE ROUTE PARAMETERS (e.g., /students/edit/{id})
// ================================================================
if (preg_match_all('/\{([a-zA-Z_]+)\}/', $request, $matches)) {
    $paramNames = $matches[1];
    $paramValues = [];
    
    // Build regex pattern from route
    $pattern = preg_replace('/\{[a-zA-Z_]+\}/', '([0-9a-zA-Z-_]+)', $request);
    
    if (preg_match('#^' . $pattern . '$#', $request, $values)) {
        array_shift($values);
        $paramValues = $values;
    }
    
    // Call controller with parameters
    $controller->$actionName(...$paramValues);
} else {
    $controller->$actionName();
}

// ================================================================
// MWISHO WA FAILI
// ================================================================
?>