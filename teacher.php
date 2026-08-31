<?php
// ================================================================
// app/Views/dashboards/teacher.php
// DASHIBODI YA MWALIMU (Teacher Dashboard)
// ================================================================
// Kazi: Kuonyesha takwimu za mwalimu, madarasa, na wanafunzi
// Watumiaji: Mwalimu, Teacher
// ================================================================
?>

<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashibodi ya Mwalimu - Falhan EMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ============================================================
           TEACHER DASHBOARD STYLES
           ============================================================ */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        :root {
            --gold: #c9a84c;
            --gold-light: #e8c96a;
            --gold-dark: #a8883a;
            --primary: #0a4a2f;
            --primary-light: #1a7a4a;
            --black: #0a0a0a;
            --black-light: #1a1a1a;
            --white: #ffffff;
            --gray-light: #f0f2f5;
            --gray: #9a9a9a;
            --gray-dark: #4a4a4a;
            --red: #8b1a1a;
            --shadow: 0 4px 20px rgba(0,0,0,0.08);
            --shadow-gold: 0 4px 30px rgba(201,168,76,0.2);
            --shadow-lg: 0 8px 40px rgba(0,0,0,0.12);
            --radius: 12px;
            --radius-lg: 16px;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-light);
            color: var(--black);
            min-height: 100vh;
        }
        
        /* ============================================================
           NAVBAR
           ============================================================ */
        .navbar {
            background: var(--black);
            border-bottom: 3px solid var(--gold);
            padding: 12px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .navbar .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--white);
            font-size: 1.4rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            text-decoration: none;
        }
        .navbar .brand i { color: var(--gold); font-size: 1.6rem; }
        .navbar .brand span { color: var(--gold); }
        
        .navbar .nav-links {
            display: flex;
            align-items: center;
            gap: 16px;
            list-style: none;
            flex-wrap: wrap;
        }
        .navbar .nav-links a {
            color: var(--white);
            opacity: 0.7;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            padding: 6px 12px;
            border-radius: 8px;
        }
        .navbar .nav-links a:hover { opacity: 1; color: var(--gold); background: rgba(255,255,255,0.05); }
        .navbar .nav-links a.active { opacity: 1; color: var(--gold); background: rgba(201,168,76,0.1); }
        .navbar .nav-links .user {
            color: var(--white);
            opacity: 0.8;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
            font-size: 0.9rem;
        }
        .navbar .nav-links .user i { color: var(--gold); font-size: 1.2rem; }
        .navbar .nav-links .btn-logout {
            background: var(--red);
            color: var(--white);
            padding: 6px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.85rem;
        }
        .navbar .nav-links .btn-logout:hover { background: #6b1212; transform: translateY(-2px); }
        
        /* Mobile Toggle */
        .mobile-toggle { display: none; background: none; border: none; color: var(--white); font-size: 1.5rem; cursor: pointer; }
        
        /* ============================================================
           MAIN
           ============================================================ */
        .main { padding: 24px 30px; max-width: 1400px; margin: 0 auto; }
        
        /* ============================================================
           WELCOME
           ============================================================ */
        .welcome {
            background: linear-gradient(135deg, var(--black), var(--black-light));
            border-radius: var(--radius-lg);
            padding: 28px 32px;
            margin-bottom: 24px;
            border-left: 5px solid var(--gold);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }
        .welcome .left h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--white);
        }
        .welcome .left h1 .gold { color: var(--gold); }
        .welcome .left .teacher-info {
            color: rgba(255,255,255,0.6);
            margin-top: 2px;
            font-size: 0.95rem;
        }
        .welcome .left .teacher-info i { color: var(--gold); margin-right: 4px; }
        .welcome .badge-role {
            display: inline-block;
            background: var(--gold);
            color: var(--black);
            padding: 4px 18px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .welcome .badge-role i { margin-right: 4px; }
        .welcome .date-time {
            color: rgba(255,255,255,0.4);
            font-size: 0.85rem;
            text-align: right;
        }
        .welcome .date-time i { color: var(--gold); margin-right: 6px; }
        
        /* ============================================================
           STATS
           ============================================================ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: var(--white);
            padding: 18px 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border-left: 4px solid var(--gold);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .stat-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(201,168,76,0.05), transparent);
            border-radius: 50%;
        }
        .stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
        .stat-card .number {
            font-size: 1.8rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: var(--primary);
            line-height: 1.2;
        }
        .stat-card .number .gold { color: var(--gold); }
        .stat-card .number .red { color: var(--red); }
        .stat-card .label { color: var(--gray); font-size: 0.8rem; font-weight: 500; margin-top: 2px; }
        .stat-card .icon {
            position: absolute;
            right: 14px;
            bottom: 14px;
            font-size: 1.8rem;
            opacity: 0.08;
            color: var(--primary);
        }
        
        /* Stat variants */
        .stat-card.gold { border-left-color: var(--gold); }
        .stat-card.gold .number { color: var(--gold); }
        .stat-card.primary { border-left-color: var(--primary); }
        .stat-card.primary .number { color: var(--primary); }
        .stat-card.red { border-left-color: var(--red); }
        .stat-card.red .number { color: var(--red); }
        .stat-card.info { border-left-color: #3498db; }
        .stat-card.info .number { color: #3498db; }
        .stat-card.warning { border-left-color: #f39c12; }
        .stat-card.warning .number { color: #f39c12; }
        .stat-card.success { border-left-color: #27ae60; }
        .stat-card.success .number { color: #27ae60; }
        
        /* ============================================================
           QUICK LINKS
           ============================================================ */
        .quick-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 12px;
            margin-bottom: 24px;
        }
        .quick-link {
            background: var(--white);
            padding: 14px 12px;
            border-radius: var(--radius);
            text-align: center;
            text-decoration: none;
            color: var(--black);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }
        .quick-link:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-gold);
            border-color: var(--gold);
        }
        .quick-link i { font-size: 1.5rem; display: block; margin-bottom: 4px; }
        .quick-link .title { font-size: 0.75rem; font-weight: 600; }
        .quick-link .color-primary i { color: var(--primary); }
        .quick-link .color-gold i { color: var(--gold); }
        .quick-link .color-red i { color: var(--red); }
        .quick-link .color-info i { color: #3498db; }
        .quick-link .color-success i { color: #27ae60; }
        .quick-link .color-warning i { color: #f39c12; }
        
        /* ============================================================
           CARDS
           ============================================================ */
        .cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 24px;
        }
        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }
        .card-header {
            padding: 14px 20px;
            border-bottom: 1px solid #e8e8e8;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-header i { color: var(--gold); margin-right: 8px; }
        .card-header .view-all {
            color: var(--gold);
            font-size: 0.8rem;
            text-decoration: none;
            font-weight: 500;
        }
        .card-header .view-all:hover { text-decoration: underline; }
        .card-body { padding: 16px 20px; }
        .card-body .empty { text-align: center; color: var(--gray); padding: 20px 0; font-size: 0.95rem; }
        .card-body .empty i { color: var(--gray-light); font-size: 2rem; display: block; margin-bottom: 8px; }
        
        /* ============================================================
           ACTIVITY LIST
           ============================================================ */
        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        .activity-item:last-child { border-bottom: none; }
        .activity-item .icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            flex-shrink: 0;
        }
        .activity-item .icon.success { background: #d4edda; color: #155724; }
        .activity-item .icon.info { background: #d1ecf1; color: #0c5460; }
        .activity-item .icon.warning { background: #fff3cd; color: #856404; }
        .activity-item .icon.primary { background: #cce5ff; color: #004085; }
        .activity-item .icon.danger { background: #f8d7da; color: #721c24; }
        .activity-item .icon.gold { background: #fff8e1; color: var(--gold-dark); }
        .activity-item .content { flex: 1; }
        .activity-item .content .action { font-size: 0.9rem; }
        .activity-item .content .time { font-size: 0.75rem; color: var(--gray); margin-top: 2px; }
        .activity-item .content .time i { margin-right: 4px; }
        
        /* ============================================================
           SCHEDULE
           ============================================================ */
        .schedule-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
            font-size: 0.9rem;
        }
        .schedule-item:last-child { border-bottom: none; }
        .schedule-item .time {
            font-weight: 700;
            color: var(--primary);
            min-width: 75px;
            font-size: 0.85rem;
        }
        .schedule-item .class {
            font-weight: 600;
            flex: 1;
            padding: 0 8px;
        }
        .schedule-item .subject {
            color: var(--gray-dark);
            font-size: 0.85rem;
        }
        .schedule-item .room {
            color: var(--gray);
            font-size: 0.75rem;
            background: var(--gray-light);
            padding: 2px 12px;
            border-radius: 30px;
        }
        
        /* ============================================================
           EXAM LIST
           ============================================================ */
        .exam-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        .exam-item:last-child { border-bottom: none; }
        .exam-item .info .name { font-weight: 600; font-size: 0.9rem; }
        .exam-item .info .class { font-size: 0.8rem; color: var(--gray); }
        .exam-item .date {
            font-size: 0.8rem;
            color: var(--red);
            font-weight: 500;
        }
        .exam-item .date i { margin-right: 4px; }
        
        /* ============================================================
           CLASS LIST (My Classes)
           ============================================================ */
        .my-class-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        .my-class-item:last-child { border-bottom: none; }
        .my-class-item .name {
            font-weight: 600;
            font-size: 0.95rem;
        }
        .my-class-item .details {
            font-size: 0.8rem;
            color: var(--gray);
        }
        .my-class-item .details i { margin-right: 4px; }
        .my-class-item .badge-students {
            background: var(--gray-light);
            padding: 2px 12px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        /* ============================================================
           ALERTS
           ============================================================ */
        .alert {
            padding: 14px 18px;
            border-radius: var(--radius);
            margin-bottom: 16px;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-warning { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
        .alert-info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
        .alert i { font-size: 1.2rem; }
        
        /* ============================================================
           FOOTER
           ============================================================ */
        .footer {
            text-align: center;
            padding: 20px 0 10px;
            color: var(--gray);
            font-size: 0.8rem;
            border-top: 1px solid #e8e8e8;
            margin-top: 10px;
        }
        .footer .gold { color: var(--gold); }
        
        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 992px) { .cards-grid { grid-template-columns: 1fr; } }
        
        @media (max-width: 768px) {
            .navbar { padding: 10px 16px; }
            .navbar .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
                padding: 12px 0;
                gap: 8px;
            }
            .navbar .nav-links.open { display: flex; }
            .navbar .nav-links a { width: 100%; padding: 8px 12px; }
            .navbar .nav-links .user { width: 100%; }
            .navbar .nav-links .btn-logout { width: 100%; text-align: center; }
            .mobile-toggle { display: block; }
            .main { padding: 16px; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .welcome { padding: 20px; flex-direction: column; align-items: flex-start; }
            .welcome .left h1 { font-size: 1.4rem; }
            .welcome .date-time { text-align: left; width: 100%; }
            .quick-links { grid-template-columns: 1fr 1fr 1fr; }
            .schedule-item { flex-wrap: wrap; gap: 4px; }
        }
        
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .quick-links { grid-template-columns: 1fr 1fr; }
            .stat-card .number { font-size: 1.6rem; }
            .welcome .left h1 { font-size: 1.2rem; }
            .schedule-item .time { min-width: 60px; }
        }
    </style>
</head>
<body>

    <!-- ============================================================
    NAVBAR
    ============================================================ -->
    <nav class="navbar">
        <a href="<?= url('/dashboard/teacher') ?>" class="brand">
            <i class="fas fa-crown"></i>
            Falhan <span>EMS</span>
        </a>
        
        <button class="mobile-toggle" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </button>
        
        <ul class="nav-links" id="navLinks">
            <li><a href="<?= url('/dashboard/teacher') ?>" class="active"><i class="fas fa-th-large"></i> Dashibodi</a></li>
            <li><a href="<?= url('/students') ?>"><i class="fas fa-user-graduate"></i> Wanafunzi</a></li>
            <li><a href="<?= url('/exams/entry') ?>"><i class="fas fa-pen-fancy"></i> Ingiza Alama</a></li>
            <li><a href="<?= url('/attendance') ?>"><i class="fas fa-clipboard-check"></i> Mahudhurio</a></li>
            <li><a href="<?= url('/exams') ?>"><i class="fas fa-file-alt"></i> Mitihani</a></li>
            <li><a href="<?= url('/reports') ?>"><i class="fas fa-chart-bar"></i> Ripoti</a></li>
            <li>
                <span class="user">
                    <i class="fas fa-user-circle"></i>
                    <?= htmlspecialchars($data['user_name'] ?? 'Mwalimu') ?>
                </span>
            </li>
            <li><a href="<?= url('/logout') ?>" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Toka</a></li>
        </ul>
    </nav>

    <!-- ============================================================
    MAIN
    ============================================================ -->
    <div class="main">

        <!-- Flash Messages -->
        <?php $success = flash('success'); $error = flash('error'); ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><i class="fas fa-check-circle"></i> <?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- Welcome -->
        <div class="welcome">
            <div class="left">
                <h1>Karibu, <span class="gold"><?= htmlspecialchars($data['user_name'] ?? 'Mwalimu') ?></span>!</h1>
                <div class="teacher-info">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Mwalimu - <?= htmlspecialchars($data['teacher_subject'] ?? 'Mathematics') ?>
                    <span style="color:rgba(255,255,255,0.4); margin:0 8px;">|</span>
                    <i class="fas fa-clock"></i>
                    <?= count($data['today_schedule'] ?? []) ?> darasa leo
                </div>
                <span class="badge-role"><i class="fas fa-chalkboard-teacher"></i> Mwalimu</span>
            </div>
            <div class="date-time">
                <i class="fas fa-calendar-alt"></i> <?= date('l, d F Y') ?><br>
                <i class="fas fa-clock"></i> <?= date('H:i') ?>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card primary">
                <div class="icon"><i class="fas fa-user-graduate"></i></div>
                <div class="number"><?= number_format($data['stats']['total_students'] ?? 113) ?></div>
                <div class="label">Wanafunzi</div>
            </div>
            <div class="stat-card gold">
                <div class="icon"><i class="fas fa-chalkboard"></i></div>
                <div class="number"><?= number_format($data['stats']['total_classes'] ?? 3) ?></div>
                <div class="label">Madarasa</div>
            </div>
            <div class="stat-card info">
                <div class="icon"><i class="fas fa-file-alt"></i></div>
                <div class="number"><?= number_format($data['stats']['total_exams'] ?? 6) ?></div>
                <div class="label">Mitihani</div>
            </div>
            <div class="stat-card warning">
                <div class="icon"><i class="fas fa-clock"></i></div>
                <div class="number"><span class="gold"><?= $data['stats']['pending_grades'] ?? 12 ?></span></div>
                <div class="label">Alama Zinazosubiri</div>
            </div>
            <div class="stat-card success">
                <div class="icon"><i class="fas fa-clipboard-check"></i></div>
                <div class="number"><?= number_format($data['stats']['attendance_today'] ?? 95) ?>%</div>
                <div class="label">Mahudhurio Leo</div>
            </div>
            <div class="stat-card red">
                <div class="icon"><i class="fas fa-tasks"></i></div>
                <div class="number"><?= count($data['upcoming_exams'] ?? []) ?></div>
                <div class="label">Mitihani Inayokuja</div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="quick-links">
            <a href="<?= url('/exams/entry') ?>" class="quick-link">
                <i class="fas fa-pen-fancy color-warning"></i><span class="title">Ingiza Alama</span>
            </a>
            <a href="<?= url('/attendance') ?>" class="quick-link">
                <i class="fas fa-clipboard-check color-info"></i><span class="title">Mahudhurio</span>
            </a>
            <a href="<?= url('/students') ?>" class="quick-link">
                <i class="fas fa-user-graduate color-success"></i><span class="title">Wanafunzi</span>
            </a>
            <a href="<?= url('/exams') ?>" class="quick-link">
                <i class="fas fa-file-alt color-gold"></i><span class="title">Mitihani</span>
            </a>
            <a href="<?= url('/reports') ?>" class="quick-link">
                <i class="fas fa-chart-bar color-red"></i><span class="title">Ripoti</span>
            </a>
            <a href="<?= url('/profile') ?>" class="quick-link">
                <i class="fas fa-user-edit color-primary"></i><span class="title">Profile</span>
            </a>
        </div>

        <!-- Cards Grid -->
        <div class="cards-grid">

            <!-- Today's Schedule -->
            <div class="card">
                <div class="card-header">
                    <span><i class="fas fa-clock"></i> Ratiba ya Leo</span>
                    <span style="font-size:0.8rem; color:var(--gray);"><?= date('d F Y') ?></span>
                </div>
                <div class="card-body">
                    <?php if (empty($data['today_schedule'])): ?>
                        <div class="empty"><i class="fas fa-calendar-times"></i> Hakuna ratiba ya leo</div>
                    <?php else: ?>
                        <?php foreach ($data['today_schedule'] as $item): ?>
                            <div class="schedule-item">
                                <span class="time"><?= htmlspecialchars($item['time']) ?></span>
                                <span class="class"><?= htmlspecialchars($item['class']) ?></span>
                                <span class="subject"><?= htmlspecialchars($item['subject']) ?></span>
                                <span class="room"><?= htmlspecialchars($item['room']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- My Classes -->
            <div class="card">
                <div class="card-header">
                    <span><i class="fas fa-chalkboard"></i> Madarasa Yangu</span>
                    <a href="#" class="view-all">Ona Zote →</a>
                </div>
                <div class="card-body">
                    <?php if (empty($data['my_classes'])): ?>
                        <div class="empty"><i class="fas fa-chalkboard"></i> Huna darasa lolote</div>
                    <?php else: ?>
                        <?php foreach ($data['my_classes'] as $class): ?>
                            <div class="my-class-item">
                                <div>
                                    <div class="name"><?= htmlspecialchars($class['name']) ?></div>
                                    <div class="details">
                                        <i class="fas fa-user-graduate"></i> <?= number_format($class['students'] ?? 0) ?> wanafunzi
                                        <span style="margin:0 6px;">|</span>
                                        <i class="fas fa-book"></i> <?= htmlspecialchars($class['subject']) ?>
                                    </div>
                                </div>
                                <span class="badge-students">
                                    <i class="fas fa-user"></i> <?= number_format($class['students'] ?? 0) ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Upcoming Exams (Full width) -->
            <div class="card" style="grid-column: 1 / -1;">
                <div class="card-header">
                    <span><i class="fas fa-calendar-alt"></i> Mitihani Inayokuja</span>
                    <a href="#" class="view-all">Ona Zote →</a>
                </div>
                <div class="card-body">
                    <?php if (empty($data['upcoming_exams'])): ?>
                        <div class="empty"><i class="fas fa-calendar-check"></i> Hakuna mtihani unaokuja</div>
                    <?php else: ?>
                        <?php foreach ($data['upcoming_exams'] as $exam): ?>
                            <div class="exam-item">
                                <div class="info">
                                    <div class="name"><?= htmlspecialchars($exam['name']) ?></div>
                                    <div class="class"><i class="fas fa-chalkboard"></i> <?= htmlspecialchars($exam['class']) ?></div>
                                </div>
                                <div class="date">
                                    <i class="far fa-calendar"></i>
                                    <?= date('d M Y', strtotime($exam['date'])) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; <?= date('Y') ?> <span class="gold">Falhan Education Management System</span> - Tanzania
            <br>
            <span style="font-size:0.75rem; color:var(--gray);">
                <i class="fas fa-chalkboard-teacher"></i> Mwalimu
                &nbsp;|&nbsp; <i class="fas fa-graduation-cap"></i> Falhan EMS
            </span>
        </div>

    </div>

    <!-- ============================================================
    JAVASCRIPT
    ============================================================ -->
    <script>
        function toggleMobileMenu() {
            document.getElementById('navLinks').classList.toggle('open');
        }
        
        document.querySelectorAll('#navLinks a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    document.getElementById('navLinks').classList.remove('open');
                }
            });
        });
        
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => { alert.style.display = 'none'; }, 500);
            }, 5000);
        });
        
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.getElementById('navLinks').classList.remove('open');
            }
        });
    </script>

</body>
</html>