<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>FENGMARKET - Marketplace Digital Terpercaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FENGMARKET - Platform terpercaya untuk top up game, voucher, produk digital, dan jasa dengan harga termurah.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-navy: #0a192f;
            --color-navy-light: #112240;
            --color-navy-lighter: #1a2c50;
            --color-teal: #00ffcc;
            --color-teal-light: #64ffda;
            --color-cyan: #08d9ff;
            --color-purple: #8b5cf6;
            --color-pink: #ff3e80;
            --color-orange: #ff7a45;
            --color-yellow: #ffd166;
            --color-text-primary: #e6f1ff;
            --color-text-secondary: #a8b2d1;
            --color-text-muted: #8892b0;
            --color-border: rgba(100, 255, 218, 0.15);
            --color-success: #10b981;
            --color-warning: #f59e0b;
            --color-danger: #ef4444;
            --color-card-bg: rgba(17, 34, 64, 0.7);
            --color-header-bg: rgba(10, 25, 47, 0.95);
            --color-dropdown-bg: #0f1b2e;
            --gradient-primary: linear-gradient(135deg, #00ffcc 0%, #08d9ff 100%);
            --gradient-danger: linear-gradient(135deg, #ff3e80 0%, #ff7a45 100%);
            --gradient-warning: linear-gradient(135deg, #ffd166 0%, #ff9a3e 100%);
            --gradient-purple: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0a192f 0%, #0f1b2e 100%);
            color: var(--color-text-primary);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: fixed;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle at 30% 20%, 
                rgba(0, 255, 204, 0.08) 0%, 
                transparent 70%);
            filter: blur(100px);
            top: -400px;
            right: -300px;
            pointer-events: none;
            z-index: 0;
        }
        
        body::after {
            content: '';
            position: fixed;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle at 70% 80%, 
                rgba(139, 92, 246, 0.06) 0%, 
                transparent 70%);
            filter: blur(80px);
            bottom: -300px;
            left: -200px;
            pointer-events: none;
            z-index: 0;
        }
        
        .container {
            position: relative;
            z-index: 1;
        }

        /* ===== HEADER ===== */
        .main-header {
            background: var(--color-header-bg);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--color-border);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }

        .header-top {
            background: linear-gradient(90deg, var(--color-purple), var(--color-cyan));
            padding: 8px 0;
            font-size: 14px;
            text-align: center;
        }

        .header-top-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .announcement {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 600;
        }

        .announcement i {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .close-announcement {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 5px;
            font-size: 12px;
        }

        .header-main {
            max-width: 1400px;
            margin: 0 auto;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--color-navy);
        }

        .logo-text {
            font-size: 28px;
            font-weight: 900;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .logo-tagline {
            font-size: 12px;
            color: var(--color-text-secondary);
            margin-top: 2px;
        }

        .search-container {
            flex: 1;
            max-width: 500px;
            margin: 0 30px;
            position: relative;
        }

        .search-box {
            width: 100%;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--color-border);
            border-radius: 50px;
            color: var(--color-text-primary);
            font-size: 14px;
            padding-left: 45px;
            transition: all 0.3s ease;
        }

        .search-box:focus {
            outline: none;
            border-color: var(--color-teal);
            box-shadow: 0 0 0 3px rgba(0, 255, 204, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-text-muted);
        }

        .user-nav {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            color: var(--color-text-secondary);
            text-decoration: none;
            font-size: 12px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-btn:hover {
            color: var(--color-teal);
        }

        .nav-icon {
            font-size: 20px;
            background: rgba(255, 255, 255, 0.05);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .nav-btn:hover .nav-icon {
            background: rgba(0, 255, 204, 0.1);
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--color-danger);
            color: white;
            font-size: 10px;
            font-weight: 700;
            min-width: 18px;
            height: 18px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 5px;
        }

        /* ===== NAVIGATION ===== */
        .main-nav {
            background: rgba(10, 25, 47, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--color-border);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav-menu {
            display: flex;
            gap: 5px;
            padding: 15px 0;
            overflow-x: auto;
        }

        .nav-menu::-webkit-scrollbar {
            display: none;
        }

        .nav-item {
            padding: 10px 20px;
            color: var(--color-text-secondary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border-radius: 8px;
            white-space: nowrap;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-item:hover {
            background: rgba(0, 255, 204, 0.1);
            color: var(--color-teal);
        }

        .nav-item.active {
            background: var(--gradient-primary);
            color: var(--color-navy);
            font-weight: 700;
        }

        /* ===== MAIN CONTENT ===== */
        main {
            min-height: calc(100vh - 300px);
            padding: 30px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ===== FOOTER ===== */
        .main-footer {
            background: linear-gradient(135deg, 
                rgba(10, 25, 47, 0.95), 
                rgba(17, 34, 64, 0.98));
            backdrop-filter: blur(20px);
            border-top: 1px solid var(--color-border);
            margin-top: 80px;
        }

        .footer-top {
            padding: 60px 20px 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-col h3 {
            color: var(--color-teal);
            font-size: 18px;
            margin-bottom: 25px;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: 900;
            margin-bottom: 15px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-description {
            color: var(--color-text-secondary);
            line-height: 1.6;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-link {
            color: var(--color-text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .footer-link:hover {
            color: var(--color-teal);
            transform: translateX(5px);
        }

        .footer-link i {
            width: 16px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: var(--color-text-secondary);
            font-size: 14px;
        }

        .contact-item i {
            color: var(--color-teal);
            margin-top: 3px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            color: var(--color-text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--gradient-primary);
            color: var(--color-navy);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 255, 204, 0.2);
        }

        .payment-methods {
            margin-top: 25px;
        }

        .payment-title {
            color: var(--color-text-secondary);
            font-size: 14px;
            margin-bottom: 15px;
        }

        .payment-icons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .payment-icon {
            width: 50px;
            height: 30px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--color-text-secondary);
        }

        .footer-bottom {
            border-top: 1px solid var(--color-border);
            padding: 25px 20px;
            text-align: center;
            color: var(--color-text-muted);
            font-size: 14px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-bottom a {
            color: var(--color-teal);
            text-decoration: none;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .header-main {
                flex-wrap: wrap;
                gap: 20px;
            }
            
            .search-container {
                order: 3;
                max-width: 100%;
                margin: 0;
            }
            
            .logo-text {
                font-size: 24px;
            }
        }

        @media (max-width: 768px) {
            .header-top {
                font-size: 12px;
            }
            
            .user-nav {
                gap: 15px;
            }
            
            .nav-btn span {
                display: none;
            }
            
            .nav-menu {
                padding: 10px 0;
            }
            
            .nav-item {
                padding: 8px 15px;
                font-size: 13px;
            }
            
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .header-top-content {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
            
            .logo-text {
                font-size: 20px;
            }
            
            .user-nav {
                gap: 10px;
            }
            
            .nav-icon {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-col h3 {
                font-size: 16px;
            }
        }

        /* ===== ANNOUNCEMENT BANNER ===== */
        .announcement-banner {
            background: linear-gradient(90deg, #ff3e80, #ff7a45);
            color: white;
            padding: 15px 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .announcement-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .announcement-text {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 1;
        }

        .announcement-icon {
            font-size: 24px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .announcement-title {
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .announcement-desc {
            font-size: 14px;
            opacity: 0.9;
        }

        .announcement-date {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .announcement-close {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 5px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .announcement-close:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- ANNOUNCEMENT TOP BAR -->
    <div class="header-top" id="announcementTop" style="display: <?= session('announcement_closed') ? 'none' : 'block' ?>">
        <div class="header-top-content">
            <div class="announcement">
                <i class="fas fa-fire"></i>
                <span>🔥 PROMO SPESIAL! Diskon hingga 50% untuk semua produk game!</span>
            </div>
            <button class="close-announcement" onclick="closeAnnouncement('top')">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- MAIN HEADER -->
    <header class="main-header">
        <div class="header-main">
            <!-- LOGO -->
            <a href="/" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div>
                    <div class="logo-text">FENGMARKET</div>
                    <div class="logo-tagline">Marketplace Digital Terpercaya</div>
                </div>
            </a>

            <!-- SEARCH -->
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-box" placeholder="Cari game, voucher, atau produk...">
            </div>

            <!-- USER NAVIGATION -->
            <div class="user-nav">
                <a href="/" class="nav-btn">
                    <div class="nav-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <span>Home</span>
                </a>
                
                <a href="/orders" class="nav-btn">
                    <div class="nav-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <span>Pesanan</span>
                    <span class="badge">3</span>
                </a>
                
                <a href="/cart" class="nav-btn">
                    <div class="nav-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <span>Keranjang</span>
                    <span class="badge">2</span>
                </a>
                
                <a href="/profile" class="nav-btn">
                    <div class="nav-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <span>Profil</span>
                </a>
            </div>
        </div>

        <!-- MAIN NAVIGATION -->
        <nav class="main-nav">
            <div class="nav-container">
                <div class="nav-menu">
                    <a href="/" class="nav-item active">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <a href="/products" class="nav-item">
                        <i class="fas fa-gamepad"></i>
                        Top Up Game
                    </a>
                    <a href="/products/voucher" class="nav-item">
                        <i class="fas fa-ticket-alt"></i>
                        Voucher
                    </a>
                    <a href="/products/subscription" class="nav-item">
                        <i class="fas fa-crown"></i>
                        Subscription
                    </a>
                    <a href="/products/digital" class="nav-item">
                        <i class="fas fa-laptop-code"></i>
                        Produk Digital
                    </a>
                    <a href="/products/services" class="nav-item">
                        <i class="fas fa-tools"></i>
                        Jasa
                    </a>
                    <a href="/promo" class="nav-item">
                        <i class="fas fa-gift"></i>
                        Promo
                    </a>
                    <a href="/guide" class="nav-item">
                        <i class="fas fa-book"></i>
                        Panduan
                    </a>
                    <a href="/contact" class="nav-item">
                        <i class="fas fa-headset"></i>
                        Kontak
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="footer-top">
            <div class="footer-grid">
                <!-- Tentang Kami -->
                <div class="footer-col">
                    <div class="footer-logo">FENGMARKET</div>
                    <p class="footer-description">
                        Platform terpercaya untuk pembelian voucher game, produk digital, 
                        dan berbagai jasa dengan harga termurah di Indonesia.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" title="TikTok">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="#" class="social-link" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="social-link" title="Telegram">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </div>
                </div>

                <!-- Link Cepat -->
                <div class="footer-col">
                    <h3>Link Cepat</h3>
                    <div class="footer-links">
                        <a href="/products" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            Semua Produk
                        </a>
                        <a href="/how-to-order" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            Cara Order
                        </a>
                        <a href="/how-to-redeem" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            Cara Reedem
                        </a>
                        <a href="/services" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            Jasa Kami
                        </a>
                        <a href="/faq" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            FAQ
                        </a>
                    </div>
                </div>

                <!-- Kontak CS -->
                <div class="footer-col">
                    <h3>Kontak CS Admin</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 812-3456-7890<br>
                            <small>(24/7 WhatsApp)</small></span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>cs@fengmarket.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <span>Support 24 Jam<br>
                            <small>Setiap Hari</small></span>
                        </div>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div class="footer-col">
                    <h3>Metode Pembayaran</h3>
                    <div class="payment-methods">
                        <div class="payment-title">Diterima:</div>
                        <div class="payment-icons">
                            <div class="payment-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="payment-icon">
                                <i class="fab fa-cc-visa"></i>
                            </div>
                            <div class="payment-icon">
                                <i class="fab fa-cc-mastercard"></i>
                            </div>
                            <div class="payment-icon">
                                <i class="fas fa-qrcode"></i>
                            </div>
                            <div class="payment-icon">
                                <i class="fab fa-paypal"></i>
                            </div>
                            <div class="payment-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 FENGMARKET. All rights reserved. | 
                <a href="/terms">Syarat & Ketentuan</a> | 
                <a href="/privacy">Kebijakan Privasi</a> | 
                <a href="/refund">Kebijakan Refund</a>
            </p>
            <p style="margin-top: 10px; font-size: 12px;">
                <i class="fas fa-shield-alt"></i> Transaksi 100% Aman dan Terpercaya
            </p>
        </div>
    </footer>
</div>

<script>
    // Close announcement
    function closeAnnouncement(type) {
        const announcement = document.getElementById('announcement' + type.charAt(0).toUpperCase() + type.slice(1));
        if (announcement) {
            announcement.style.display = 'none';
            // Save to session storage
            sessionStorage.setItem('announcement_closed', 'true');
        }
    }

    // Check session storage on load
    document.addEventListener('DOMContentLoaded', function() {
        if (sessionStorage.getItem('announcement_closed') === 'true') {
            const announcementTop = document.getElementById('announcementTop');
            if (announcementTop) {
                announcementTop.style.display = 'none';
            }
        }

        // Update cart count from localStorage
        updateCartCount();
        updateOrderCount();
    });

    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const cartBadge = document.querySelector('.nav-btn:nth-child(3) .badge');
        if (cartBadge) {
            const totalItems = cart.reduce((sum, item) => sum + (item.quantity || 1), 0);
            cartBadge.textContent = totalItems > 99 ? '99+' : totalItems;
            cartBadge.style.display = totalItems > 0 ? 'flex' : 'none';
        }
    }

    function updateOrderCount() {
        // Fetch orders count from API or use localStorage
        const orders = JSON.parse(localStorage.getItem('user_orders') || '[]');
        const pendingOrders = orders.filter(order => order.status === 'pending' || order.status === 'processing');
        const orderBadge = document.querySelector('.nav-btn:nth-child(2) .badge');
        if (orderBadge) {
            orderBadge.textContent = pendingOrders.length > 99 ? '99+' : pendingOrders.length;
            orderBadge.style.display = pendingOrders.length > 0 ? 'flex' : 'none';
        }
    }
</script>

<?= $this->renderSection('scripts') ?>
</body>
</html>