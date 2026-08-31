<?php
// ================================================================
// app/Controllers/DashboardController.php
// FALHAN EMS - DASHBOARD CONTROLLER (COMPLETE)
// ================================================================
// Kazi: Kudhibiti dashibodi zote kulingana na role za watumiaji
// ================================================================

namespace App\Controllers;

class DashboardController
{
    /**
     * ============================================================
     * MAIN DASHBOARD - Inaelekeza kwenye dashibodi sahihi
     * URL: /dashboard
     * ============================================================
     */
    public function index()
    {
        // Check if user is logged in
        if (!isLoggedIn()) {
            flash('error', 'Tafadhali ingia kwanza.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // Get user role
        $role = $_SESSION['role'] ?? 'teacher';
        
        // Redirect based on role
        switch ($role) {
            case 'admin':
            case 'super_admin':
                header('Location: ' . url('/dashboard/admin'));
                break;
            case 'school_admin':
                header('Location: ' . url('/dashboard/school'));
                break;
            case 'teacher':
                header('Location: ' . url('/dashboard/teacher'));
                break;
            case 'student':
                header('Location: ' . url('/dashboard/student'));
                break;
            case 'parent':
                header('Location: ' . url('/dashboard/parent'));
                break;
            default:
                header('Location: ' . url('/dashboard/teacher'));
                break;
        }
        exit;
    }

    // ================================================================
    // 1. ADMIN DASHBOARD - Kwa Super Admin
    // URL: /dashboard/admin
    // ================================================================
    public function admin()
    {
        // Check login
        if (!isLoggedIn()) {
            flash('error', 'Tafadhali ingia kwanza.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // Check role
        $role = $_SESSION['role'] ?? 'guest';
        if (!in_array($role, ['admin', 'super_admin'])) {
            http_response_code(403);
            include VIEWS_PATH . '/errors/403.php';
            exit;
        }
        
        // ============================================================
        // DATA (In production, these would come from database)
        // ============================================================
        $data = [
            'user_name' => $_SESSION['user_name'] ?? 'Admin',
            'stats' => [
                'total_schools' => 5,
                'total_students' => 1234,
                'total_teachers' => 56,
                'total_exams' => 89,
                'total_users' => 145,
                'pending_approvals' => 3,
            ],
            'recent_activities' => [
                ['action' => 'Shule mpya imeongezwa: Azam Secondary', 'time' => 'Saa 1 iliyopita', 'icon' => 'fa-plus-circle', 'color' => 'success'],
                ['action' => 'Walimu 3 wameajiriwa', 'time' => 'Saa 3 zilizopita', 'icon' => 'fa-user-plus', 'color' => 'info'],
                ['action' => 'Matokeo ya Form 4 yamechapishwa', 'time' => 'Jana', 'icon' => 'fa-file-alt', 'color' => 'warning'],
                ['action' => 'Mtihani mpya umeundwa: Mid-Term 2', 'time' => 'Jana', 'icon' => 'fa-pencil-alt', 'color' => 'primary'],
                ['action' => 'Wanafunzi 25 wamejiandikisha', 'time' => 'Siku 2 zilizopita', 'icon' => 'fa-user-graduate', 'color' => 'success'],
            ],
            'recent_users' => [
                ['name' => 'John Peter', 'email' => 'john@shule.com', 'role' => 'Mwalimu'],
                ['name' => 'Mary Joseph', 'email' => 'mary@shule.com', 'role' => 'Mwanafunzi'],
                ['name' => 'James John', 'email' => 'james@shule.com', 'role' => 'Mzazi'],
                ['name' => 'Sarah Thomas', 'email' => 'sarah@shule.com', 'role' => 'Mwalimu'],
            ],
        ];
        
        include VIEWS_PATH . '/dashboards/admin.php';
    }

    // ================================================================
    // 2. SCHOOL DASHBOARD - Kwa Mkuu wa Shule
    // URL: /dashboard/school
    // ================================================================
    public function school()
    {
        // Check login
        if (!isLoggedIn()) {
            flash('error', 'Tafadhali ingia kwanza.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // Check role
        $role = $_SESSION['role'] ?? 'guest';
        if (!in_array($role, ['school_admin', 'admin'])) {
            http_response_code(403);
            include VIEWS_PATH . '/errors/403.php';
            exit;
        }
        
        // ============================================================
        // DATA (In production, these would come from database)
        // ============================================================
        $data = [
            'user_name' => $_SESSION['user_name'] ?? 'Mkuu wa Shule',
            'school_name' => 'Azam Secondary School',
            'school_code' => 'AZM001',
            'stats' => [
                'total_students' => 450,
                'total_teachers' => 25,
                'total_classes' => 12,
                'total_exams' => 34,
                'present_today' => 420,
                'pending_grades' => 15,
            ],
            'class_performance' => [
                ['class' => 'Form 1A', 'students' => 45, 'pass_rate' => 78],
                ['class' => 'Form 1B', 'students' => 42, 'pass_rate' => 72],
                ['class' => 'Form 2A', 'students' => 38, 'pass_rate' => 85],
                ['class' => 'Form 2B', 'students' => 40, 'pass_rate' => 68],
                ['class' => 'Form 3A', 'students' => 35, 'pass_rate' => 92],
                ['class' => 'Form 4A', 'students' => 30, 'pass_rate' => 88],
            ],
            'attendance_today' => [
                ['class' => 'Form 1A', 'present' => 42, 'total' => 45, 'rate' => 93],
                ['class' => 'Form 1B', 'present' => 38, 'total' => 42, 'rate' => 90],
                ['class' => 'Form 2A', 'present' => 35, 'total' => 38, 'rate' => 92],
                ['class' => 'Form 2B', 'present' => 34, 'total' => 40, 'rate' => 85],
                ['class' => 'Form 3A', 'present' => 33, 'total' => 35, 'rate' => 94],
                ['class' => 'Form 4A', 'present' => 28, 'total' => 30, 'rate' => 93],
            ],
            'recent_activities' => [
                ['action' => 'Darasa jipya limefunguliwa: Form 1C', 'time' => 'Saa 2 zilizopita', 'icon' => 'fa-plus-circle', 'color' => 'success'],
                ['action' => 'Wanafunzi 15 wamejiandikisha', 'time' => 'Saa 5 zilizopita', 'icon' => 'fa-user-plus', 'color' => 'info'],
                ['action' => 'Mtihani wa Mid-Term 1 umeanza', 'time' => 'Jana', 'icon' => 'fa-pencil-alt', 'color' => 'warning'],
                ['action' => 'Mwalimu mpya ameajiriwa: Jane Mary', 'time' => 'Jana', 'icon' => 'fa-user-tie', 'color' => 'primary'],
            ],
        ];
        
        include VIEWS_PATH . '/dashboards/school.php';
    }

    // ================================================================
    // 3. TEACHER DASHBOARD - Kwa Mwalimu
    // URL: /dashboard/teacher
    // ================================================================
    public function teacher()
    {
        // Check login
        if (!isLoggedIn()) {
            flash('error', 'Tafadhali ingia kwanza.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // Check role
        $role = $_SESSION['role'] ?? 'guest';
        if (!in_array($role, ['teacher', 'school_admin', 'admin'])) {
            http_response_code(403);
            include VIEWS_PATH . '/errors/403.php';
            exit;
        }
        
        // ============================================================
        // DATA (In production, these would come from database)
        // ============================================================
        $data = [
            'user_name' => $_SESSION['user_name'] ?? 'Mwalimu',
            'teacher_subject' => 'Mathematics',
            'stats' => [
                'total_students' => 113,
                'total_classes' => 3,
                'total_exams' => 6,
                'pending_grades' => 12,
                'attendance_today' => 95,
            ],
            'my_classes' => [
                ['name' => 'Form 2B', 'students' => 45, 'subject' => 'Mathematics'],
                ['name' => 'Form 3A', 'students' => 38, 'subject' => 'Physics'],
                ['name' => 'Form 4A', 'students' => 30, 'subject' => 'Chemistry'],
            ],
            'today_schedule' => [
                ['time' => '8:00 - 8:45', 'class' => 'Form 2B', 'subject' => 'Mathematics', 'room' => 'Room 1'],
                ['time' => '9:00 - 9:45', 'class' => 'Form 3A', 'subject' => 'Physics', 'room' => 'Lab 2'],
                ['time' => '10:00 - 10:45', 'class' => 'Form 4A', 'subject' => 'Chemistry', 'room' => 'Lab 1'],
                ['time' => '11:00 - 11:45', 'class' => 'Form 2B', 'subject' => 'Mathematics', 'room' => 'Room 1'],
            ],
            'recent_activities' => [
                ['action' => 'Alama za Form 2B zimeingizwa', 'time' => 'Saa 2 zilizopita', 'icon' => 'fa-check-circle', 'color' => 'success'],
                ['action' => 'Mwanafunzi mpya ameongezwa darasani', 'time' => 'Saa 4 zilizopita', 'icon' => 'fa-user-plus', 'color' => 'info'],
                ['action' => 'Mtihani wa Mid-Term umetengenezwa', 'time' => 'Jana', 'icon' => 'fa-pencil-alt', 'color' => 'warning'],
                ['action' => 'Mahudhurio ya leo yamewekwa', 'time' => 'Leo asubuhi', 'icon' => 'fa-clipboard-check', 'color' => 'primary'],
            ],
            'upcoming_exams' => [
                ['name' => 'Mid-Term 1 - Mathematics', 'date' => '2024-03-15', 'class' => 'Form 2B'],
                ['name' => 'End of Term - Physics', 'date' => '2024-03-20', 'class' => 'Form 3A'],
                ['name' => 'Mid-Term 1 - Chemistry', 'date' => '2024-03-25', 'class' => 'Form 4A'],
            ],
        ];
        
        include VIEWS_PATH . '/dashboards/teacher.php';
    }

    // ================================================================
    // 4. STUDENT DASHBOARD - Kwa Mwanafunzi
    // URL: /dashboard/student
    // ================================================================
    public function student()
    {
        // Check login
        if (!isLoggedIn()) {
            flash('error', 'Tafadhali ingia kwanza.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // Check role
        $role = $_SESSION['role'] ?? 'guest';
        if (!in_array($role, ['student', 'teacher', 'school_admin', 'admin', 'parent'])) {
            http_response_code(403);
            include VIEWS_PATH . '/errors/403.php';
            exit;
        }
        
        // ============================================================
        // DATA (In production, these would come from database)
        // ============================================================
        $data = [
            'user_name' => $_SESSION['user_name'] ?? 'Mwanafunzi',
            'student_info' => [
                'registration' => 'S1832/0036/2024',
                'class' => 'Form 2B',
                'admission_date' => '2024-01-15',
            ],
            'stats' => [
                'subjects' => 8,
                'average_grade' => 76,
                'attendance' => 92,
                'position' => 5,
            ],
            'subjects_performance' => [
                ['subject' => 'Mathematics', 'marks' => 78, 'grade' => 'B', 'position' => 3],
                ['subject' => 'English', 'marks' => 85, 'grade' => 'A', 'position' => 2],
                ['subject' => 'Kiswahili', 'marks' => 72, 'grade' => 'B', 'position' => 5],
                ['subject' => 'Biology', 'marks' => 68, 'grade' => 'C', 'position' => 8],
                ['subject' => 'Chemistry', 'marks' => 80, 'grade' => 'A', 'position' => 4],
                ['subject' => 'Physics', 'marks' => 75, 'grade' => 'B', 'position' => 6],
                ['subject' => 'History', 'marks' => 70, 'grade' => 'B', 'position' => 7],
                ['subject' => 'Geography', 'marks' => 65, 'grade' => 'C', 'position' => 9],
            ],
            'today_schedule' => [
                ['time' => '8:00 - 8:45', 'subject' => 'Mathematics', 'teacher' => 'Mr. John', 'room' => 'Room 1'],
                ['time' => '9:00 - 9:45', 'subject' => 'English', 'teacher' => 'Ms. Mary', 'room' => 'Room 2'],
                ['time' => '10:00 - 10:45', 'subject' => 'Biology', 'teacher' => 'Dr. James', 'room' => 'Lab 1'],
                ['time' => '11:00 - 11:45', 'subject' => 'Chemistry', 'teacher' => 'Ms. Sarah', 'room' => 'Lab 2'],
            ],
            'attendance_record' => [
                ['date' => '2024-03-08', 'status' => 'Present'],
                ['date' => '2024-03-07', 'status' => 'Present'],
                ['date' => '2024-03-06', 'status' => 'Present'],
                ['date' => '2024-03-05', 'status' => 'Absent'],
                ['date' => '2024-03-04', 'status' => 'Present'],
                ['date' => '2024-03-03', 'status' => 'Present'],
            ],
            'upcoming_tasks' => [
                ['title' => 'Submit Mathematics Assignment', 'date' => '2024-03-15'],
                ['title' => 'Prepare for Physics Test', 'date' => '2024-03-18'],
                ['title' => 'Read Chemistry Chapter 5', 'date' => '2024-03-20'],
                ['title' => 'Biology Project Submission', 'date' => '2024-03-25'],
            ],
        ];
        
        include VIEWS_PATH . '/dashboards/student.php';
    }

    // ================================================================
    // 5. PARENT DASHBOARD - Kwa Mzazi
    // URL: /dashboard/parent
    // ================================================================
    public function parent()
    {
        // Check login
        if (!isLoggedIn()) {
            flash('error', 'Tafadhali ingia kwanza.');
            header('Location: ' . url('/login'));
            exit;
        }
        
        // Check role
        $role = $_SESSION['role'] ?? 'guest';
        if (!in_array($role, ['parent', 'student', 'teacher', 'school_admin', 'admin'])) {
            http_response_code(403);
            include VIEWS_PATH . '/errors/403.php';
            exit;
        }
        
        // ============================================================
        // DATA (In production, these would come from database)
        // ============================================================
        $data = [
            'user_name' => $_SESSION['user_name'] ?? 'Mzazi',
            'school_name' => 'Azam Secondary School',
            'stats' => [
                'average_grade' => 82,
                'attendance' => 94,
            ],
            'children' => [
                [
                    'id' => 1,
                    'name' => 'John Peter',
                    'class' => 'Form 2B',
                    'registration' => 'S1832/0036/2024',
                    'average' => 76,
                    'grade' => 'B',
                    'attendance' => 92,
                    'position' => 5,
                    'subjects' => [
                        ['name' => 'Mathematics', 'marks' => 78, 'grade' => 'B'],
                        ['name' => 'English', 'marks' => 85, 'grade' => 'A'],
                        ['name' => 'Kiswahili', 'marks' => 72, 'grade' => 'B'],
                        ['name' => 'Biology', 'marks' => 68, 'grade' => 'C'],
                        ['name' => 'Chemistry', 'marks' => 80, 'grade' => 'A'],
                        ['name' => 'Physics', 'marks' => 75, 'grade' => 'B'],
                    ]
                ],
                [
                    'id' => 2,
                    'name' => 'Mary Peter',
                    'class' => 'Form 4A',
                    'registration' => 'S1832/0037/2024',
                    'average' => 88,
                    'grade' => 'A',
                    'attendance' => 95,
                    'position' => 2,
                    'subjects' => [
                        ['name' => 'Mathematics', 'marks' => 92, 'grade' => 'A'],
                        ['name' => 'English', 'marks' => 88, 'grade' => 'A'],
                        ['name' => 'Kiswahili', 'marks' => 85, 'grade' => 'A'],
                        ['name' => 'Biology', 'marks' => 90, 'grade' => 'A'],
                        ['name' => 'Chemistry', 'marks' => 86, 'grade' => 'A'],
                        ['name' => 'Physics', 'marks' => 89, 'grade' => 'A'],
                    ]
                ],
            ],
            'notifications' => [
                ['title' => 'John alikosea shule Jumatano', 'date' => 'Jana', 'type' => 'attendance'],
                ['title' => 'Mary alipata A katika Mathematics', 'date' => 'Siku 2 zilizopita', 'type' => 'grade'],
                ['title' => 'Mkutano wa Wazazi - 15 March 2024', 'date' => 'Siku 3 zilizopita', 'type' => 'event'],
                ['title' => 'Ada ya Term 2 inasubiri kulipwa', 'date' => 'Siku 5 zilizopita', 'type' => 'fee'],
            ],
            'fee_status' => [
                ['term' => 'Term 1', 'amount' => 150000, 'paid' => 150000, 'status' => 'Paid'],
                ['term' => 'Term 2', 'amount' => 150000, 'paid' => 0, 'status' => 'Pending'],
                ['term' => 'Term 3', 'amount' => 150000, 'paid' => 0, 'status' => 'Pending'],
            ],
        ];
        
        include VIEWS_PATH . '/dashboards/parent.php';
    }

    // ================================================================
    // 6. HELPER FUNCTIONS
    // ================================================================

    /**
     * Check authentication - Inahakikisha mtumiaji ameingia
     */
    private function checkAuth()
    {
        if (!isLoggedIn()) {
            flash('error', 'Tafadhali ingia kwanza.');
            header('Location: ' . url('/login'));
            exit;
        }
    }

    /**
     * Check role - Inahakikisha mtumiaji ana ruhusa
     */
    private function checkRole($allowedRoles = [])
    {
        $this->checkAuth();
        
        $role = $_SESSION['role'] ?? 'guest';
        
        if (!empty($allowedRoles) && !in_array($role, $allowedRoles)) {
            http_response_code(403);
            include VIEWS_PATH . '/errors/403.php';
            exit;
        }
    }

    /**
     * Get user data - Inapata data ya mtumiaji aliyeingia
     */
    private function getUserData()
    {
        if (!isLoggedIn()) {
            return null;
        }
        
        return [
            'id' => $_SESSION['user_id'] ?? null,
            'name' => $_SESSION['user_name'] ?? null,
            'email' => $_SESSION['user_email'] ?? null,
            'role' => $_SESSION['role'] ?? null,
            'school_id' => $_SESSION['school_id'] ?? null,
        ];
    }
}

// ================================================================
// MWISHO WA FAILI
// ================================================================
?>