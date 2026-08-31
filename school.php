<?php
// ================================================================
// app/Views/dashboards/school.php
// DASHIBODI YA MKUU WA SHULE (School Admin)
// ================================================================
// Kazi: Kuonyesha takwimu za shule moja
// Watumiaji: School Admin, Mkuu wa Shule
// ================================================================
?>

<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashibodi ya Shule - Falhan EMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ============================================================
           SCHOOL DASHBOARD STYLES
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
        .navbar .nav-links .school-name {
            color: var(--gold);
            font-weight: 600;
            font-size: 0.85rem;
            padding: 6px 14px;
            background: rgba(201,168,76,0.1);
            border-radius: 8px;
            border: 1px solid rgba(201,168,76,0.2);
        }
        .navbar .nav-links .school-name i { margin-right: 6px; }
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
        .welcome .left .school-info {
            color: rgba(255,255,255,0.6);
            margin-top: 2px;
            font-size: 0.95rem;
        }
        .welcome .left .school-info i { color: var(--gold); margin-right: 4px; }
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
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
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
            font-size: 2rem;
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
            font-size: 2rem;
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
            grid-template-columns: 2fr 1fr;
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
           CLASS PERFORMANCE
           ============================================================ */
        .class-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        .class-item:last-child { border-bottom: none; }
        .class-item .name { font-weight: 600; font-size: 0.95rem; }
        .class-item .details { font-size: 0.8rem; color: var(--gray); }
        .class-item .details i { margin-right: 4px; }
        .class-item .progress-bar {
            width: 120px;
            height: 6px;
            background: #e8e8e8;
            border-radius: 10px;
            overflow: hidden;
            margin: 4px 0;
        }
        .class-item .progress-bar .fill {
            height: 100%;
            border-radius: 10px;
            transition: width 0.5s ease;
        }
        .class-item .progress-bar .fill.pass { background: #27ae60; }
        .class-item .progress-bar .fill.fail { background: var(--red); }
        .class-item .progress-bar .fill.warning { background: #f39c12; }
        
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
            .navbar .nav-links .school-name { width: 100%; }
            .navbar .nav-links .user { width: 100%; }
            .navbar .nav-links .btn-logout { width: 100%; text-align: center; }
            .mobile-toggle { display: block; }
            .main { padding: 16px; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .welcome { padding: 20px; flex-direction: column; align-items: flex-start; }
            .welcome .left h1 { font-size: 1.4rem; }
            .welcome .date-time { text-align: left; width: 100%; }
            .quick-links { grid-template-columns: 1fr 1fr 1fr; }
        }
        
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .quick-links { grid-template-columns: 1fr 1fr; }
            .stat-card .number { font-size: 1.6rem; }
            .welcome .left h1 { font-size: 1.2rem; }
            .class-item { flex-wrap: wrap; }
            .class-item .progress-bar { width: 100%; }
        }
    </style>
</head>
<body>

    <!-- ============================================================
    NAVBAR
    ============================================================ -->
    <nav class="navbar">
        <a href="<?= url('/dashboard/school') ?>" class="brand">
            <i class="fas fa-crown"></i>
            Falhan <span>EMS</span>
        </a>
        
        <button class="mobile-toggle" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </button>
        
        <ul class="nav-links" id="navLinks">
            <li><a href="<?= url('/dashboard/school') ?>" class="active"><i class="fas fa-th-large"></i> Dashibodi</a></li>
            <li><a href="<?= url('/students') ?>"><i class="fas fa-user-graduate"></i> Wanafunzi</a></li>
            <li><a href="<?= url('/teachers') ?>"><i class="fas fa-chalkboard-teacher"></i> Walimu</a></li>
            <li><a href="<?= url('/classes') ?>"><i class="fas fa-chalkboard"></i> Madarasa</a></li>
            <li><a href="<?= url('/exams') ?>"><i class="fas fa-file-alt"></i> Mitihani</a></li>
            <li><a href="<?= url('/reports') ?>"><i class="fas fa-chart-bar"></i> Ripoti</a></li>
            <li>
                <span class="school-name">
                    <i class="fas fa-school"></i>
                    <?= htmlspecialchars($data['school_name'] ?? 'Shule Yangu') ?>
                </span>
            </li>
            <li>
                <span class="user">
                    <i class="fas fa-user-circle"></i>
                    <?= htmlspecialchars($data['user_name'] ?? 'Mkuu wa Shule') ?>
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
                <h1>Karibu, <span class="gold"><?= htmlspecialchars($data['user_name'] ?? 'Mkuu wa Shule') ?></span>!</h1>
                <div class="school-info">
                    <i class="fas fa-school"></i>
                    <?= htmlspecialchars($data['school_name'] ?? 'Azam Secondary School') ?>
                    <span style="color:rgba(255,255,255,0.4); margin:0 8px;">|</span>
                    <i class="fas fa-code"></i>
                    <?= htmlspecialchars($data['school_code'] ?? 'AZM001') ?>
                </div>
                <span class="badge-role"><i class="fas fa-user-tie"></i> Mkuu wa Shule</span>
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
                <div class="number"><?= number_format($data['stats']['total_students'] ?? 450) ?></div>
                <div class="label">Wanafunzi</div>
            </div>
            <div class="stat-card info">
                <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <div class="number"><?= number_format($data['stats']['total_teachers'] ?? 25) ?></div>
                <div class="label">Walimu</div>
            </div>
            <div class="stat-card gold">
                <div class="icon"><i class="fas fa-chalkboard"></i></div>
                <div class="number"><?= number_format($data['stats']['total_classes'] ?? 12) ?></div>
                <div class="label">Madarasa</div>
            </div>
            <div class="stat-card success">
                <div class="icon"><i class="fas fa-file-alt"></i></div>
                <div class="number"><?= number_format($data['stats']['total_exams'] ?? 34) ?></div>
                <div class="label">Mitihani</div>
            </div>
            <div class="stat-card warning">
                <div class="icon"><i class="fas fa-clipboard-check"></i></div>
                <div class="number"><?= number_format($data['stats']['present_today'] ?? 420) ?></div>
                <div class="label"><i class="fas fa-check-circle"></i> Waliohudhuria Leo</div>
            </div>
            <div class="stat-card red">
                <div class="icon"><i class="fas fa-clock"></i></div>
                <div class="number"><span class="gold"><?= $data['stats']['pending_grades'] ?? 15 ?></span></div>
                <div class="label"><i class="fas fa-hourglass-half"></i> Alama Zinazosubiri</div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="quick-links">
            <a href="<?= url('/students') ?>" class="quick-link">
                <i class="fas fa-user-graduate color-success"></i><span class="title">Wanafunzi</span>
            </a>
            <a href="<?= url('/teachers') ?>" class="quick-link">
                <i class="fas fa-chalkboard-teacher color-info"></i><span class="title">Walimu</span>
            </a>
            <a href="<?= url('/classes') ?>" class="quick-link">
                <i class="fas fa-chalkboard color-primary"></i><span class="title">Madarasa</span>
            </a>
            <a href="<?= url('/exams') ?>" class="quick-link">
                <i class="fas fa-file-alt color-gold"></i><span class="title">Mitihani</span>
            </a>
            <a href="<?= url('/attendance') ?>" class="quick-link">
                <i class="fas fa-clipboard-check color-warning"></i><span class="title">Mahudhurio</span>
            </a>
            <a href="<?= url('/reports') ?>" class="quick-link">
                <i class="fas fa-chart-bar color-red"></i><span class="title">Ripoti</span>
            </a>
        </div>

        <!-- Cards -->
        <div class="cards-grid">

            <!-- Class Performance -->
            <div class="card">
                <div class="card-header">
                    <span><i class="fas fa-chart-simple"></i> Utendaji wa Madarasa</span>
                    <a href="#" class="view-all">Ona Zote →</a>
                </div>
                <div class="card-body">
                    <?php if (empty($data['class_performance'])): ?>
                        <div class="empty"><i class="fas fa-chart-bar"></i> Hakuna data ya utendaji</div>
                    <?php else: ?>
                        <?php foreach ($data['class_performance'] as $class): ?>
                            <div class="class-item">
                                <div>
                                    <div class="name"><?= htmlspecialchars($class['class']) ?></div>
                                    <div class="details">
                                        <i class="fas fa-user-graduate"></i> <?= number_format($class['students'] ?? 0) ?> wanafunzi
                                    </div>
                                </div>
                                <div style="text-align:right;">
                                    <div style="font-weight:700; color:<?= ($class['pass_rate'] ?? 0) >= 70 ? '#27ae60' : ($class['pass_rate'] >= 50 ? '#f39c12' : '#e74c3c') ?>;">
                                        <?= number_format($class['pass_rate'] ?? 0) ?>%
                                    </div>
                                    <div class="progress-bar">
                                        <div class="fill <?= ($class['pass_rate'] ?? 0) >= 70 ? 'pass' : ($class['pass_rate'] >= 50 ? 'warning' : 'fail') ?>" 
                                             style="width: <?= number_format($class['pass_rate'] ?? 0) ?>%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="card">
                <div class="card-header">
                    <span><i class="fas fa-clock"></i> Shughuli za Hivi Karibuni</span>
                    <a href="#" class="view-all">Ona Zote →</a>
                </div>
                <div class="card-body">
                    <?php if (empty($data['recent_activities'])): ?>
                        <div class="empty"><i class="fas fa-inbox"></i> Hakuna shughuli mpya</div>
                    <?php else: ?>
                        <?php foreach ($data['recent_activities'] as $activity): ?>
                            <div class="activity-item">
                                <div class="icon <?= $activity['color'] ?? 'primary' ?>">
                                    <i class="fas <?= $activity['icon'] ?? 'fa-circle' ?>"></i>
                                </div>
                                <div class="content">
                                    <div class="action"><?= htmlspecialchars($activity['action']) ?></div>
                                    <div class="time"><i class="far fa-clock"></i> <?= htmlspecialchars($activity['time']) ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Today's Attendance (Full width) -->
            <div class="card" style="grid-column: 1 / -1;">
                <div class="card-header">
                    <span><i class="fas fa-calendar-check"></i> Mahudhurio ya Leo</span>
                    <span style="font-size:0.8rem; color:var(--gray);">
                        <?= date('d F Y') ?>
                    </span>
                </div>
                <div class="card-body">
                    <?php if (empty($data['attendance_today'])): ?>
                        <div class="empty"><i class="fas fa-clipboard-check"></i> Hakuna data ya mahudhurio</div>
                    <?php else: ?>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px;">
                            <?php foreach ($data['attendance_today'] as $attendance): ?>
                                <div style="background:var(--gray-light); padding:12px 16px; border-radius:8px; display:flex; justify-content:space-between; align-items:center;">
                                    <div>
                                        <div style="font-weight:600; font-size:0.9rem;"><?= htmlspecialchars($attendance['class']) ?></div>
                                        <div style="font-size:0.8rem; color:var(--gray);">
                                            <?= number_format($attendance['present'] ?? 0) ?> / <?= number_format($attendance['total'] ?? 0) ?>
                                        </div>
                                    </div>
                                    <div style="font-weight:700; color:<?= ($attendance['rate'] ?? 0) >= 90 ? '#27ae60' : ($attendance['rate'] >= 70 ? '#f39c12' : '#e74c3c') ?>;">
                                        <?= number_format($attendance['rate'] ?? 0) ?>%
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; <?= date('Y') ?> <span class="gold">Falhan Education Management System</span> - Tanzania
            <br>
            <span style="font-size:0.75rem; color:var(--gray);">
                <i class="fas fa-school"></i> <?= htmlspecialchars($data['school_name'] ?? 'Azam Secondary School') ?>
                &nbsp;|&nbsp; <i class="fas fa-code"></i> <?= htmlspecialchars($data['school_code'] ?? 'AZM001') ?>
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