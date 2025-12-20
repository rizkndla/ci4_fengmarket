<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* ===== VARIABEL WARNA ===== */
    :root {
        --color-navy: #0a192f;
        --color-navy-light: #112240;
        --color-teal: #00ffcc;
        --color-teal-light: #64ffda;
        --color-cyan: #08d9ff;
        --color-glow: rgba(0, 255, 204, 0.4);
        --color-text-primary: #e6f1ff;
        --color-text-secondary: #a8b2d1;
        --color-text-muted: #8892b0;
        --color-border: rgba(100, 255, 218, 0.15);
        --color-card-bg: rgba(17, 34, 64, 0.7);
        --color-danger: #ef4444;
        --color-warning: #f59e0b;
        --color-success: #10b981;
        --color-info: #0ea5e9;
        --color-purple: #8b5cf6;
    }
    
    /* ===== BACKGROUND ===== */
    body {
        background: var(--color-navy);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
    }
    
    body::before {
        content: '';
        position: fixed;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, 
            rgba(10, 25, 47, 0) 0%, 
            rgba(0, 255, 204, 0.08) 50%, 
            rgba(8, 217, 255, 0.05) 100%);
        filter: blur(80px);
        animation: floatBlob 25s infinite alternate ease-in-out;
        z-index: 0;
        top: -300px;
        left: -300px;
        pointer-events: none;
    }
    
    @keyframes floatBlob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(30px, -40px) scale(1.05); }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* ===== DASHBOARD WRAPPER ===== */
    .dashboard-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 25px;
        position: relative;
        z-index: 10;
    }
    
    /* ===== HEADER ===== */
    .dashboard-header {
        margin-bottom: 35px;
        animation: fadeIn 0.5s ease;
    }
    
    .dashboard-title {
        color: var(--color-text-primary);
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    
    .dashboard-subtitle {
        color: var(--color-text-secondary);
        font-size: 16px;
        opacity: 0.9;
    }
    
    /* ===== WELCOME SECTION - DIBUAT LEBIH SIMPLE ===== */
    .welcome-section {
        background: linear-gradient(135deg, 
            rgba(17, 34, 64, 0.8), 
            rgba(10, 25, 47, 0.9));
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 35px;
        border: 1px solid var(--color-border);
        backdrop-filter: blur(20px);
        position: relative;
        overflow: hidden;
        animation: fadeIn 0.6s ease;
    }
    
    .welcome-content {
        position: relative;
        z-index: 1;
    }
    
    .welcome-content h2 {
        color: var(--color-text-primary);
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .welcome-content h2 i {
        color: var(--color-teal);
    }
    
    .welcome-content p {
        color: var(--color-text-secondary);
        font-size: 16px;
        line-height: 1.6;
        max-width: 800px;
    }
    
    /* ===== STATS GRID - 4 KARTU SAJA ===== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }
    
    .stat-card {
        background: var(--color-card-bg);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        border: 1px solid var(--color-border);
        padding: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        animation: fadeIn 0.6s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        border-color: var(--color-teal);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, 
            var(--color-teal), 
            var(--color-cyan));
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: white;
        margin-bottom: 20px;
    }
    
    /* Warna ikon yang berbeda */
    .stat-card:nth-child(1) .stat-icon {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
    }
    
    .stat-card:nth-child(2) .stat-icon {
        background: linear-gradient(135deg, var(--color-success), #059669);
    }
    
    .stat-card:nth-child(3) .stat-icon {
        background: linear-gradient(135deg, var(--color-info), #0284c7);
    }
    
    .stat-card:nth-child(4) .stat-icon {
        background: linear-gradient(135deg, var(--color-warning), #d97706);
    }
    
    .stat-content h3 {
        color: var(--color-text-secondary);
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }
    
    .stat-value {
        color: var(--color-text-primary);
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 5px;
        line-height: 1;
    }
    
    .stat-subtext {
        color: var(--color-text-muted);
        font-size: 14px;
    }
    
    /* ===== QUICK ACTIONS - HANYA 2 TOMBOL ===== */
    .quick-actions-section {
        margin-bottom: 40px;
    }
    
    .section-title {
        color: var(--color-text-primary);
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .section-title i {
        color: var(--color-teal);
        font-size: 18px;
    }
    
    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }
    
    .action-card {
        background: var(--color-card-bg);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        border: 1px solid var(--color-border);
        padding: 25px;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        animation: fadeIn 0.7s ease;
    }
    
    .action-card:hover {
        transform: translateY(-5px);
        border-color: var(--color-teal);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
    }
    
    .action-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, 
            rgba(0, 255, 204, 0.1), 
            rgba(8, 217, 255, 0.1));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        font-size: 22px;
        color: var(--color-teal);
        border: 1px solid rgba(100, 255, 218, 0.3);
    }
    
    .action-card:nth-child(2) .action-icon {
        background: linear-gradient(135deg, 
            rgba(16, 185, 129, 0.1), 
            rgba(5, 150, 105, 0.1));
        color: var(--color-success);
        border-color: rgba(16, 185, 129, 0.3);
    }
    
    .action-content h3 {
        color: var(--color-text-primary);
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .action-content p {
        color: var(--color-text-secondary);
        font-size: 15px;
        line-height: 1.5;
        margin-bottom: 15px;
    }
    
    .action-arrow {
        color: var(--color-teal);
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: gap 0.3s ease;
    }
    
    .action-card:hover .action-arrow {
        gap: 12px;
    }
    
    /* ===== RECENT ACTIVITY ===== */
    .recent-activity {
        background: var(--color-card-bg);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        border: 1px solid var(--color-border);
        padding: 25px;
        margin-bottom: 40px;
        animation: fadeIn 0.8s ease;
    }
    
    .activity-list {
        list-style: none;
        padding: 0;
    }
    
    .activity-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
    }
    
    .activity-icon.product {
        background: rgba(99, 102, 241, 0.15);
        color: #6366f1;
    }
    
    .activity-icon.order {
        background: rgba(16, 185, 129, 0.15);
        color: var(--color-success);
    }
    
    .activity-icon.user {
        background: rgba(14, 165, 233, 0.15);
        color: var(--color-info);
    }
    
    .activity-details h4 {
        color: var(--color-text-primary);
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 4px;
    }
    
    .activity-details p {
        color: var(--color-text-muted);
        font-size: 13px;
    }
    
    /* ===== CHART SECTION ===== */
    .chart-section {
        background: var(--color-card-bg);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        border: 1px solid var(--color-border);
        padding: 25px;
        margin-bottom: 40px;
        animation: fadeIn 0.9s ease;
    }
    
    .chart-container {
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .chart-placeholder {
        text-align: center;
        color: var(--color-text-muted);
        padding: 40px 20px;
    }
    
    .chart-placeholder i {
        font-size: 60px;
        margin-bottom: 20px;
        opacity: 0.3;
        display: block;
    }
    
    .chart-placeholder h4 {
        color: var(--color-text-secondary);
        font-size: 18px;
        margin-bottom: 10px;
    }
    
    .chart-placeholder p {
        font-size: 14px;
        max-width: 400px;
        margin: 0 auto;
        line-height: 1.5;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 1200px) {
        .dashboard-wrapper {
            padding: 25px 20px;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .actions-grid {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 24px;
        }
        
        .welcome-section {
            padding: 25px 20px;
        }
        
        .welcome-content h2 {
            font-size: 22px;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .stat-card {
            padding: 22px;
        }
        
        .stat-value {
            font-size: 28px;
        }
        
        .section-title {
            font-size: 18px;
        }
        
        .action-card,
        .recent-activity,
        .chart-section {
            padding: 22px;
        }
    }
    
    @media (max-width: 480px) {
        .dashboard-wrapper {
            padding: 20px 15px;
        }
        
        .dashboard-title {
            font-size: 22px;
        }
        
        .stat-value {
            font-size: 26px;
        }
        
        .action-content h3 {
            font-size: 18px;
        }
    }
</style>

<!-- Load Icon & Font -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<div class="dashboard-wrapper">
    
    <!-- HEADER -->
    <div class="dashboard-header">
        <h1 class="dashboard-title">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </h1>
        <p class="dashboard-subtitle">
            Ringkasan sistem dan manajemen FENG MARKET
        </p>
    </div>
    
    <!-- WELCOME SECTION -->
    <div class="welcome-section">
        <div class="welcome-content">
            <h2><i class="fas fa-crown"></i> Selamat Datang Admin! 🎉</h2>
            <p>
                Login berhasil. Dashboard ini menampilkan ringkasan data produk dan navigasi cepat 
                untuk manajemen konten FENG MARKET.
            </p>
        </div>
    </div>
    
    <!-- STATISTICS - 4 KARTU SAJA -->
    <div class="stats-grid">
        
        <!-- TOTAL PRODUK -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
                <h3>Total Produk</h3>
                <div class="stat-value"><?= $total_products ?? '0' ?></div>
                <div class="stat-subtext">Produk aktif dalam katalog</div>
            </div>
        </div>
        
        <!-- TOTAL PESANAN -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="stat-content">
                <h3>Pesanan Aktif</h3>
                <div class="stat-value"><?= $active_orders ?? '0' ?></div>
                <div class="stat-subtext">Pesanan dalam proses</div>
            </div>
        </div>
        
        <!-- PELANGGAN -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3>Total Pelanggan</h3>
                <div class="stat-value"><?= $total_customers ?? '0' ?></div>
                <div class="stat-subtext">Pengguna terdaftar</div>
            </div>
        </div>
        
        <!-- PENDAPATAN BULAN INI -->
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-content">
                <h3>Pendapatan Bulan Ini</h3>
                <div class="stat-value">Rp <?= number_format($monthly_revenue ?? 0, 0, ',', '.') ?></div>
                <div class="stat-subtext">Total pendapatan bulan ini</div>
            </div>
        </div>
        
    </div>
    
    <!-- QUICK ACTIONS - HANYA 2 TOMBOL -->
    <div class="quick-actions-section">
        <h2 class="section-title">
            <i class="fas fa-bolt"></i> Navigasi Cepat
        </h2>
        
        <div class="actions-grid">
            
            <!-- KELOLA PRODUK -->
            <a href="<?= base_url('admin/products') ?>" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="action-content">
                    <h3>Kelola Produk</h3>
                    <p>Tambah, edit, atau hapus produk dari katalog toko. Kelola stok dan harga dengan mudah.</p>
                    <div class="action-arrow">
                        Buka halaman produk
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
            
            <!-- LIHAT PESANAN -->
            <a href="<?= base_url('admin/orders') ?>" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="action-content">
                    <h3>Lihat Pesanan</h3>
                    <p>Kelola pesanan pelanggan, status pengiriman, dan proses transaksi.</p>
                    <div class="action-arrow">
                        Buka halaman pesanan
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
    
    <!-- TWO COLUMN LAYOUT -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-bottom: 40px;">
        
        <!-- RECENT ACTIVITY -->
        <div class="recent-activity">
            <h2 class="section-title" style="margin-bottom: 25px;">
                <i class="fas fa-history"></i> Aktivitas Terbaru
            </h2>
            
            <ul class="activity-list">
                <?php if (!empty($recent_activities)): ?>
                    <?php foreach ($recent_activities as $activity): ?>
                    <li class="activity-item">
                        <div class="activity-icon <?= $activity['type'] ?>">
                            <i class="fas fa-<?= $activity['icon'] ?>"></i>
                        </div>
                        <div class="activity-details">
                            <h4><?= $activity['title'] ?></h4>
                            <p><?= $activity['description'] ?> • <?= $activity['time'] ?></p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Default dummy data jika belum ada koneksi DB -->
                    <li class="activity-item">
                        <div class="activity-icon product">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-details">
                            <h4>Produk baru ditambahkan</h4>
                            <p>RF 7 DAY UNIVERSAL CODE VIP • 5 menit yang lalu</p>
                        </div>
                    </li>
                    
                    <li class="activity-item">
                        <div class="activity-icon order">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="activity-details">
                            <h4>Pesanan baru diterima</h4>
                            <p>Order #ORD-2024-0012 • 15 menit yang lalu</p>
                        </div>
                    </li>
                    
                    <li class="activity-item">
                        <div class="activity-icon user">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-details">
                            <h4>Pelanggan baru mendaftar</h4>
                            <p>John Doe • 1 jam yang lalu</p>
                        </div>
                    </li>
                    
                    <li class="activity-item">
                        <div class="activity-icon product">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="activity-details">
                            <h4>Produk diperbarui</h4>
                            <p>RF BASIC EDITION • 2 jam yang lalu</p>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        
        <!-- CHART SECTION -->
        <div class="chart-section">
            <h2 class="section-title" style="margin-bottom: 25px;">
                <i class="fas fa-chart-bar"></i> Pendapatan Bulanan
            </h2>
            
            <div class="chart-container">
                <div class="chart-placeholder">
                    <i class="fas fa-chart-line"></i>
                    <h4>Grafik Pendapatan Bulanan</h4>
                    <p>
                        Grafik ini menampilkan tren pendapatan bulanan FENG MARKET.
                        <br>
                        <span style="font-size: 12px; color: var(--color-text-muted);">
                            (Data akan terisi otomatis setelah terhubung ke database)
                        </span>
                    </p>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<script>
// Animate stats counting jika ada data real
document.addEventListener('DOMContentLoaded', function() {
    // Animate stat values
    const statValues = document.querySelectorAll('.stat-value');
    
    statValues.forEach(stat => {
        const originalText = stat.textContent;
        let value;
        
        // Parse different formats
        if (originalText.includes('Rp')) {
            value = parseInt(originalText.replace(/[^0-9]/g, ''));
        } else {
            value = parseInt(originalText.replace(/[^0-9]/g, ''));
        }
        
        // Animate counting hanya jika angka valid
        if (!isNaN(value) && value > 0) {
            let count = 0;
            const increment = value / 40;
            const timer = setInterval(() => {
                count += increment;
                if (count >= value) {
                    count = value;
                    clearInterval(timer);
                    // Keep original format
                    stat.textContent = originalText;
                } else {
                    // Format based on type
                    if (originalText.includes('Rp')) {
                        stat.textContent = 'Rp ' + Math.floor(count).toLocaleString('id-ID');
                    } else {
                        stat.textContent = Math.floor(count).toLocaleString('id-ID');
                    }
                }
            }, 30);
        }
    });
    
    // Add ripple effect to action cards
    const actionCards = document.querySelectorAll('.action-card');
    actionCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Create ripple element
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(100, 255, 218, 0.3);
                transform: scale(0);
                animation: ripple 0.6s linear;
                width: ${size}px;
                height: ${size}px;
                top: ${y}px;
                left: ${x}px;
                pointer-events: none;
            `;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Add ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
    
    // Stagger animation for cards
    const cards = document.querySelectorAll('.stat-card, .action-card, .recent-activity, .chart-section');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 100 + (index * 100));
    });
});

// Update activity time every minute
setInterval(() => {
    const now = new Date();
    const timeElement = document.querySelector('.dashboard-subtitle');
    if (timeElement) {
        const timeString = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });
        const dateString = now.toLocaleDateString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
        
        timeElement.innerHTML = `
            <i class="far fa-clock"></i> ${timeString} WIB • ${dateString}
        `;
    }
}, 60000);
</script>

<?= $this->endSection() ?>