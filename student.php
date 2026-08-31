<?php
// app/Controllers/DashboardController.php
// ================================================================
// Falhan EMS - Dashboard Controller
// ================================================================

namespace App\Controllers;

class DashboardController
{
    /**
     * STUDENT DASHBOARD - Kwa Mwanafunzi
     * URL: /dashboard/student
     */
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
        
        // Data
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
}