<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYBER STORE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon-cyan: #00ffff;
            --neon-pink: #ff0080;
            --neon-purple: #8a2be2;
            --neon-green: #00ff41;
            --dark-bg: #0a0a0a;
            --text-primary: #fff;
            --text-accent: #00ffff;
        }
        body {
            font-family: 'Rajdhani', sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
        }
        .navbar-cyber {
            background: linear-gradient(90deg, #0a0a0a 80%, #00ffff22 100%);
            border-bottom: 2px solid var(--neon-cyan);
            box-shadow: 0 0 20px var(--neon-cyan);
        }
        .navbar-brand {
            font-family: 'Orbitron', monospace;
            font-size: 2rem;
            font-weight: 900;
            color: var(--neon-cyan) !important;
            text-shadow: 0 0 10px var(--neon-cyan), 0 0 20px var(--neon-cyan);
            letter-spacing: 2px;
        }
        .navbar-nav .nav-link {
            color: var(--text-primary) !important;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-right: 1rem;
            transition: color 0.2s;
        }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: var(--neon-pink) !important;
            text-shadow: 0 0 10px var(--neon-pink);
        }
        .dropdown-menu {
            background: #181828;
            border: 1px solid var(--neon-cyan);
        }
        .dropdown-item {
            color: var(--neon-cyan);
            font-weight: 600;
        }
        .dropdown-item:hover {
            background: var(--neon-cyan);
            color: #181828;
        }
        .cart-badge {
            min-width: 22px;
            min-height: 22px;
            display: inline-block;
            padding: 0 6px;
            font-weight: bold;
            box-shadow: 0 0 8px #ff0080;
            border: 2px solid #fff;
        }
        @keyframes neonUser {
            0% { text-shadow: 0 0 8px #00ffff, 0 0 16px #00ffff; }
            100% { text-shadow: 0 0 16px #00ffff, 0 0 32px #00ffff; }
        }
        @keyframes neonLogin {
            0% { text-shadow: 0 0 8px #ff0080, 0 0 16px #ff0080; }
            100% { text-shadow: 0 0 16px #ff0080, 0 0 32px #ff0080; }
        }
        @keyframes neonLogout {
            0% { text-shadow: 0 0 8px #00ff41, 0 0 16px #00ff41; }
            100% { text-shadow: 0 0 16px #00ff41, 0 0 32px #00ff41; }
        }
        .login-status-box {
            transition: box-shadow 0.3s, border 0.3s;
        }
        .login-status-box:hover {
            box-shadow: 0 0 32px #00ffffcc, 0 0 8px #ff0080;
            border-color: #ff0080;
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-cyber shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/PHAN_NHUT_QUY/">
            <i class="fas fa-microchip me-2"></i>CYBER STORE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/PHAN_NHUT_QUY/">Trang chủ</a>
                </li>
                <?php if (SessionHelper::isAdmin()): ?>
                <li class="nav-item">
                    
                    <a class="nav-link" href="/PHAN_NHUT_QUY/Product/list">Sản phẩm</a>
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Loại mặt hàng
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <?php foreach ($categories as $cat): ?>
                            <li>
                                <a class="dropdown-item" href="/PHAN_NHUT_QUY/?category_id=<?php echo $cat->id; ?>">
                                    <?php echo htmlspecialchars($cat->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Khuyến mãi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="/PHAN_NHUT_QUY/Product/cart">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.8rem;">
                            <?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>
                        </span>
                    </a>
                </li>
            </ul>
            <!-- Khung trạng thái đăng nhập riêng biệt bên phải -->
            <div class="login-status-box d-flex align-items-center ms-auto px-3 py-1" style="background:rgba(10,255,255,0.08); border-radius:16px; box-shadow:0 0 16px #00ffff55; border:1.5px solid #00ffff; min-width:180px; margin-left:1rem;">
                <?php if (\SessionHelper::isLoggedIn()): ?>
                    <span class="fw-bold me-3"
                          style="color:#00ffff; font-size:1.15rem; text-shadow:0 0 8px #00ffff,0 0 16px #00ffff; letter-spacing:1px; animation: neonUser 1.5s infinite alternate;">
                        <i class="fas fa-user-circle me-1"></i>
                        <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                    <a class="fw-bold"
                       href="/PHAN_NHUT_QUY/account/logout"
                       style="color:#00ff41; font-size:1.15rem; text-shadow:0 0 8px #00ff41,0 0 16px #00ff41; letter-spacing:1px; animation: neonLogout 1.5s infinite alternate; text-decoration:none;">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </a>
                <?php else: ?>
                    <a class="fw-bold"
                       href="/PHAN_NHUT_QUY/account/login"
                       style="color:#ff0080; font-size:1.15rem; text-shadow:0 0 8px #ff0080,0 0 16px #ff0080; letter-spacing:1px; animation: neonLogin 1.5s infinite alternate; text-decoration:none;">
                        <i class="fas fa-sign-in-alt me-1"></i>Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <header class="shop-header animate__animated animate__fadeIn">
        <div class="container text-center">
            <h1 class="shop-title animate__animated animate__fadeInDown">Công nghệ mới nhất 2025
            </h1>
            <p class="shop-subtitle animate__animated animate__fadeIn animate__delay-1s">Khám phá những sản phẩm công nghệ hàng đầu với giá cả hợp lý</p>
            <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeIn animate__delay-2s">
            </div>
        </div>
    </header>