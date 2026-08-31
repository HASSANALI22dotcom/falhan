<?php
// ================================================================
// app/Views/dashboards/parent.php
// DASHIBODI YA MZAZI (Parent Dashboard)
// ================================================================
// Kazi: Kuonyesha maendeleo ya mtoto/watoto wa mzazi
// Watumiaji: Mzazi, Parent
// ================================================================
?>

<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashibodi ya Mzazi - Falhan EMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ============================================================
           PARENT DASHBOARD STYLES
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
        .welcome .left .parent-info {
            color: rgba(255,255,255,0.6);
            margin-top: 2px;
            font-size: 0.95rem;
        }
        .welcome .left .parent-info i { color: var(--gold); margin-right: 4px; }
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
           CHILDREN CARDS
           ============================================================ */
        .child-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 20px;
            border: 1px solid rgba(201,168,76,0.1);
            transition: all 0.3s ease;
        }
        .child-card:hover {
            box-shadow: var(--shadow-lg);
            border-color: var(--gold);
        }
        .child-card .child-header {
            background: linear-gradient(135deg, var(--black), var(--black-light));
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            border-bottom: 2px solid var(--gold);
        }
        .child-card .child-header .name {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--white);
        }
        .child-card .child-header .name i { color: var(--gold); margin-right: 8px; }
        .child-card .child-header .class {
            color: var(--gold);
            font-weight: 600;
            font-size: 0.9rem;
        }
        .child-card .child-header .class i { margin-right: 4px; }
        .child-card .child-body { padding: 20px 24px; }
        
        /* ============================================================
           CHILD STATS
           ============================================================ */
        .child-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 12px;
            margin-bottom: 16px;
        }
        .child-stat {
            background: var(--gray-light);
            padding: 12px 16px;
            border-radius: var(--radius);
            text-align: center;
        }
        .child-stat .number {
            font-size: 1.4rem;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
        }
        .child-stat .number.gold { color: var(--gold); }
        .child-stat .number.green { color: #27ae60; }
        .child-stat .number.red { color: var(--red); }
        .child-stat .number.blue { color: #3498db; }
        .child-stat .label { font-size: 0.75rem; color: var(--gray); margin-top: 2px; }
        
        /* ============================================================
           SUBJECT PERFORMANCE
           ============================================================ */
        .subject-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        .subject-item:last-child { border-bottom: none; }
        .subject-item .name { font-weight: 500; font-size: 0.9rem; }
        .subject-item .marks {
            font-weight: 700;
            font-size: 0.9rem;
        }
        .subject-item .marks.pass { color: #27ae60; }
        .subject-item .marks.fail { color: var(--red); }
        .subject-item .grade-badge {
            padding: 2px 12px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .subject-item .grade-badge.A { background: #27ae60; color: white; }
        .subject-item .grade-badge.B { background: #2ecc71; color: white; }
        .subject-item .grade-badge.C { background: #f39c12; color: white; }
        .subject-item .grade-badge.D { background: #e67e22; color: white; }
        .subject-item .grade-badge.F { background: var(--red); color: white; }
        
        /* ============================================================
           NOTIFICATIONS
           ============================================================ */
        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        .notification-item:last-child { border-bottom: none; }
        .notification-item .icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            flex-shrink: 0;
        }
        .notification-item .icon.attendance { background: #fff3cd; color: #856404; }
        .notification-item .icon.grade { background: #d4edda; color: #155724; }
        .notification-item .icon.event { background: #cce5ff; color: #004085; }
        .notification-item .icon.fee { background: #f8d7da; color: #721c24; }
        .notification-item .content { flex: 1; }
        .notification-item .content .title { font-size: 0.9rem; }
        .notification-item .content .date { font-size: 0.75rem; color: var(--gray); margin-top: 2px; }
        .notification-item .content .date i { margin-right: 4px; }
        
        /* ============================================================
           FEE STATUS
           ============================================================ */
        .fee-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        .fee-item:last-child { border-bottom: none; }
        .fee-item .term { font-weight: 600; font-size: 0.9rem; }
        .fee-item .amount { font-size: 0.9rem; }
        .fee-item .status {
            padding: 2px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .fee-item .status.paid { background: #d4edda; color: #155724; }
        .fee-item .status.pending { background: #fff3cd; color: #856404; }
        .fee-item .status.overdue { background: #f8d7da; color: #721c24; }
        
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
        @media (max-width: 992px) {
            .child-stats { grid-template-columns: 1fr 1fr; }
        }
        
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
            .child-card .child-header { flex-direction: column; align-items: flex-start; }
            .child-stats { grid-template-columns: 1fr 1fr; }
        }
        
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .quick-links { grid-template-columns: 1fr 1fr; }
            .stat-card .number { font-size: 1.6rem; }
            .welcome .left h1 { font-size: 1.2rem; }
            .child-stats { grid-template-columns: 1fr; }
            .child-card .child-body { padding: 16px; }
        }
    </style>
</head>
<body>

    <!-- ============================================================
    NAVBAR
    ============================================================ -->
    <nav class="navbar">
        <a href="<?= url('/dashboard/parent') ?>" class="brand">
            <i class="fas fa-crown"></i>
            Falhan <span>EMS</span>
        </a>
        
        <button class="mobile-toggle" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </button>
        
        <ul class="nav-links" id="navLinks">
            <li><a href="<?= url('/dashboard/parent') ?>" class="active"><i class="fas fa-th-large"></i> Dashibodi</a></li>
            <li><a href="<?= url('/parent/children') ?>"><i class="fas fa-users"></i> Wanafunzi Wangu</a></li>
            <li><a href="<?= url('/parent/fees') ?>"><i class="fas fa-money-bill-wave"></i> Malipo</a></li>
            <li><a href="<?= url('/parent/reports') ?>"><i class="fas fa-file-alt"></i> Ripoti</a></li>
            <li><a href="<?= url('/parent/notifications') ?>"><i class="fas fa-bell"></i> Arifa</a></li>
            <li>
                <span class="user">
                    <i class="fas fa-user-circle"></i>
                    <?= htmlspecialchars($data['user_name'] ?? 'Mzazi') ?>
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
                <h1>Karibu, <span class="gold"><?= htmlspecialchars($data['user_name'] ?? 'Mzazi') ?></span>!</h1>
                <div class="parent-info">
                    <i class="fas fa-user-friends"></i>
                    Una watoto <strong><?= count($data['children'] ?? []) ?></strong> shuleni
                    <span style="color:rgba(255,255,255,0.4); margin:0 8px;">|</span>
                    <i class="fas fa-school"></i>
                    <?= htmlspecialchars($data['school_name'] ?? 'Azam Secondary School') ?>
                </div>
                <span class="badge-role"><i class="fas fa-user-friends"></i> Mzazi</span>
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
                <div class="number"><?= count($data['children'] ?? []) ?></div>
                <div class="label">Wanafunzi</div>
            </div>
            <div class="stat-card gold">
                <div class="icon"><i class="fas fa-trophy"></i></div>
                <div class="number"><span class="gold"><?= number_format($data['stats']['average_grade'] ?? 0) ?></span></div>
                <div class="label">Wastani wa Daraja</div>
            </div>
            <div class="stat-card success">
                <div class="icon"><i class="fas fa-clipboard-check"></i></div>
                <div class="number"><?= number_format($data['stats']['attendance'] ?? 0) ?>%</div>
                <div class="label">Mahudhurio</div>
            </div>
            <div class="stat-card info">
                <div class="icon"><i class="fas fa-bell"></i></div>
                <div class="number"><?= count($data['notifications'] ?? []) ?></div>
                <div class="label">Arifa</div>
            </div>
            <div class="stat-card warning">
                <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
                <div class="number"><?= count(array_filter($data['fee_status'] ?? [], function($f) { return $f['status'] === 'Pending' || $f['status'] === 'Overdue'; })) ?></div>
                <div class="label">Malipo Yanasubiri</div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="quick-links">
            <a href="<?= url('/parent/children') ?>" class="quick-link">
                <i class="fas fa-users color-primary"></i><span class="title">Wanafunzi Wangu</span>
            </a>
            <a href="<?= url('/parent/fees') ?>" class="quick-link">
                <i class="fas fa-money-bill-wave color-gold"></i><span class="title">Malipo</span>
            </a>
            <a href="<?= url('/parent/reports') ?>" class="quick-link">
                <i class="fas fa-file-alt color-info"></i><span class="title">Ripoti</span>
            </a>
            <a href="<?= url('/parent/notifications') ?>" class="quick-link">
                <i class="fas fa-bell color-warning"></i><span class="title">Arifa</span>
            </a>
            <a href="<?= url('/parent/messages') ?>" class="quick-link">
                <i class="fas fa-envelope color-red"></i><span class="title">Ujumbe</span>
            </a>
            <a href="<?= url('/profile') ?>" class="quick-link">
                <i class="fas fa-user-edit color-success"></i><span class="title">Profile</span>
            </a>
        </div>

        <!-- ============================================================
        CHILDREN CARDS
        ============================================================ -->
        <?php foreach ($data['children'] ?? [] as $child): ?>
        <div class="child-card">
            <div class="child-header">
                <div>
                    <div class="name">
                        <i class="fas fa-user-graduate"></i>
                        <?= htmlspecialchars($child['name']) ?>
                    </div>
                    <div style="color:rgba(255,255,255,0.5); font-size:0.8rem; margin-top:2px;">
                        <i class="fas fa-id-card"></i> <?= htmlspecialchars($child['registration']) ?>
                    </div>
                </div>
                <div class="class">
                    <i class="fas fa-chalkboard"></i>
                    <?= htmlspecialchars($child['class']) ?>
                </div>
            </div>
            <div class="child-body">
                
                <!-- Child Stats -->
                <div class="child-stats">
                    <div class="child-stat">
                        <div class="number gold"><?= number_format($child['average'] ?? 0) ?></div>
                        <div class="label">Wastani</div>
                    </div>
                    <div class="child-stat">
                        <div class="number <?= ($child['grade'] ?? 'F') === 'F' ? 'red' : 'green' ?>">
                            <?= htmlspecialchars($child['grade'] ?? '-') ?>
                        </div>
                        <div class="label">Daraja</div>
                    </div>
                    <div class="child-stat">
                        <div class="number blue"><?= number_format($child['attendance'] ?? 0) ?>%</div>
                        <div class="label">Mahudhurio</div>
                    </div>
                    <div class="child-stat">
                        <div class="number <?= ($child['position'] ?? 0) <= 3 ? 'gold' : '' ?>">
                            #<?= number_format($child['position'] ?? 0) ?>
                        </div>
                        <div class="label">Nafasi</div>
                    </div>
                </div>
                
                <!-- Subjects Performance -->
                <div style="margin-top:12px;">
                    <div style="font-weight:600; font-size:0.9rem; margin-bottom:8px; color:var(--gray-dark);">
                        <i class="fas fa-book" style="color:var(--gold);"></i> Masomo
                    </div>
                    <?php if (empty($child['subjects'])): ?>
                        <div style="text-align:center; color:var(--gray); padding:10px 0; font-size:0.9rem;">
                            <i class="fas fa-info-circle"></i> Hakuna data ya masomo
                        </div>
                    <?php else: ?>
                        <?php foreach ($child['subjects'] as $subject): ?>
                            <div class="subject-item">
                                <span class="name"><?= htmlspecialchars($subject['name']) ?></span>
                                <div>
                                    <span class="marks <?= ($subject['marks'] ?? 0) >= 40 ? 'pass' : 'fail' ?>">
                                        <?= number_format($subject['marks'] ?? 0) ?>
                                    </span>
                                    <span class="grade-badge <?= htmlspecialchars($subject['grade'] ?? 'F') ?>">
                                        <?= htmlspecialchars($subject['grade'] ?? '-') ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                
                <!-- View Report Button -->
                <div style="margin-top:14px; text-align:right;">
                    <a href="<?= url('/parent/reports?child=' . $child['id'] ?? '') ?>" 
                       style="color:var(--gold); text-decoration:none; font-weight:600; font-size:0.85rem;">
                        <i class="fas fa-file-alt"></i> Ona Ripoti Kamili →
                    </a>
                </div>
                
            </div>
        </div>
        <?php endforeach; ?>

        <!-- ============================================================
        NOTIFICATIONS & FEE STATUS (Two columns)
        ============================================================ -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

            <!-- Notifications -->
            <div class="card" style="background:var(--white); border-radius:var(--radius); box-shadow:var(--shadow); overflow:hidden;">
                <div class="card-header" style="padding:14px 20px; border-bottom:1px solid #e8e8e8; font-weight:600; font-size:0.95rem; display:flex; justify-content:space-between; align-items:center;">
                    <span><i class="fas fa-bell" style="color:var(--gold);"></i> Arifa</span>
                    <a href="#" class="view-all" style="color:var(--gold); font-size:0.8rem; text-decoration:none; font-weight:500;">Ona Zote →</a>
                </div>
                <div class="card-body" style="padding:16px 20px;">
                    <?php if (empty($data['notifications'])): ?>
                        <div style="text-align:center; color:var(--gray); padding:20px 0; font-size:0.95rem;">
                            <i class="fas fa-inbox" style="color:var(--gray-light); font-size:2rem; display:block; margin-bottom:8px;"></i>
                            Hakuna arifa mpya
                        </div>
                    <?php else: ?>
                        <?php foreach ($data['notifications'] as $notif): ?>
                            <div class="notification-item">
                                <div class="icon <?= htmlspecialchars($notif['type'] ?? 'event') ?>">
                                    <i class="fas <?= $notif['type'] === 'attendance' ? 'fa-user-clock' : ($notif['type'] === 'grade' ? 'fa-check-circle' : ($notif['type'] === 'fee' ? 'fa-money-bill-wave' : 'fa-calendar-alt')) ?>"></i>
                                </div>
                                <div class="content">
                                    <div class="title"><?= htmlspecialchars($notif['title']) ?></div>
                                    <div class="date"><i class="far fa-clock"></i> <?= htmlspecialchars($notif['date']) ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Fee Status -->
            <div class="card" style="background:var(--white); border-radius:var(--radius); box-shadow:var(--shadow); overflow:hidden;">
                <div class="card-header" style="padding:14px 20px; border-bottom:1px solid #e8e8e8; font-weight:600; font-size:0.95rem; display:flex; justify-content:space-between; align-items:center;">
                    <span><i class="fas fa-money-bill-wave" style="color:var(--gold);"></i> Hali ya Malipo</span>
                    <a href="#" class="view-all" style="color:var(--gold); font-size:0.8rem; text-decoration:none; font-weight:500;">Ona Zote →</a>
                </div>
                <div class="card-body" style="padding:16px 20px;">
                    <?php if (empty($data['fee_status'])): ?>
                        <div style="text-align:center; color:var(--gray); padding:20px 0; font-size:0.95rem;">
                            <i class="fas fa-money-bill-wave" style="color:var(--gray-light); font-size:2rem; display:block; margin-bottom:8px;"></i>
                            Hakuna taarifa za malipo
                        </div>
                    <?php else: ?>
                        <?php foreach ($data['fee_status'] as $fee): ?>
                            <div class="fee-item">
                                <span class="term"><?= htmlspecialchars($fee['term']) ?></span>
                                <span class="amount">
                                    TSh <?= number_format($fee['amount'] ?? 0) ?>
                                    <span style="color:var(--gray); font-size:0.75rem;">
                                        (Imelipwa: TSh <?= number_format($fee['paid'] ?? 0) ?>)
                                    </span>
                                </span>
                                <span class="status <?= strtolower($fee['status'] ?? 'pending') ?>">
                                    <?= htmlspecialchars($fee['status'] ?? 'Pending') ?>
                                </span>
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
                <i class="fas fa-user-friends"></i> Mzazi
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