<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<style>
:root {
    --sidebar-width: 260px;
    --sidebar-collapsed-width: 70px;
    --color-primary: #6366f1;
    --color-primary-dark: #4f46e5;
    --color-secondary: #8b5cf6;
    --color-success: #10b981;
    --color-warning: #f59e0b;
    --color-danger: #ef4444;
    --color-bg-dark: #0f172a;
    --color-bg-darker: #020617;
    --color-bg-light: #1e293b;
    --color-text-light: #f1f5f9;
    --color-text-muted: #94a3b8;
    --color-border: #334155;
    --shadow-lg: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
    --shadow-xl: 0 20px 50px -12px rgba(0, 0, 0, 0.7);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    overflow-x: hidden;
}

/* Background particles effect */
body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(16, 185, 129, 0.08) 0%, transparent 50%);
    z-index: -1;
}

/* NAVBAR - REVISI: Hapus brand, hapus greeting, tambah spacing kanan */
.navbar {
    background: rgba(15, 23, 42, 0.95);
    backdrop-filter: blur(20px);
    color: var(--color-text-light);
    padding: 18px 40px; /* 🔥 PERBAIKAN: Tambah padding kanan */
    display: flex;
    justify-content: flex-end; /* 🔥 PERBAIKAN: Pindah ke kanan */
    align-items: center;
    position: fixed;
    top: 0;
    left: var(--sidebar-width);
    right: 0;
    z-index: 100;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: var(--shadow-lg);
    transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    gap: 20px; /* 🔥 PERBAIKAN: Tambah gap antar item navbar */
}

.sidebar-collapsed ~ .navbar {
    left: var(--sidebar-collapsed-width);
}

/* 🔥 PERBAIKAN: Hapus navbar-brand dan user-greeting */
.navbar-brand, .user-greeting {
    display: none;
}

.btn-logout {
    background: linear-gradient(135deg, var(--color-danger), #dc2626);
    color: white;
    padding: 12px 24px; /* 🔥 PERBAIKAN: Tambah padding */
    text-decoration: none;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    min-width: 120px; /* 🔥 PERBAIKAN: Pastikan button cukup lebar */
}

.btn-logout:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
    background: linear-gradient(135deg, #dc2626, var(--color-danger));
}

/* Tambah button kanan di navbar */
.navbar-actions {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-left: auto; /* 🔥 PERBAIKAN: Dorong ke kanan */
}

.btn-action {
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    border: none;
    cursor: pointer;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
}

/* SIDEBAR - REVISI: Menu utama + menu bawah */
.sidebar {
    width: var(--sidebar-width);
    background: rgba(15, 23, 42, 0.98);
    backdrop-filter: blur(20px);
    color: var(--color-text-light);
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    padding: 90px 0 30px 0;
    border-right: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: var(--shadow-xl);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow-y: auto;
    overflow-x: hidden;
    display: flex;
    flex-direction: column;
}

.sidebar::-webkit-scrollbar {
    width: 4px;
}

.sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
}

.sidebar::-webkit-scrollbar-thumb {
    background: var(--color-primary);
    border-radius: 4px;
}

.sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        to bottom,
        transparent 0%,
        rgba(99, 102, 241, 0.05) 100%
    );
    pointer-events: none;
}

/* Sidebar Header - REVISI: Ganti jadi ADMIN FENGMARKET */
.sidebar-header {
    padding: 0 25px 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    margin-bottom: 20px;
}

.sidebar-brand {
    font-size: 1.2rem;
    font-weight: 800;
    color: white;
    text-align: center;
    padding: 15px 0;
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: 1px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.sidebar-brand i {
    font-size: 1.5rem;
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Sidebar Menu Utama */
.sidebar-menu {
    list-style: none;
    padding: 0 15px;
    flex: 1;
}

.sidebar-menu li {
    margin-bottom: 8px;
}

.sidebar-menu a {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    color: var(--color-text-muted);
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.sidebar-menu a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent, 
        rgba(99, 102, 241, 0.1), 
        transparent);
    transition: left 0.6s ease;
}

.sidebar-menu a:hover::before {
    left: 100%;
}

.sidebar-menu a:hover {
    background: rgba(255, 255, 255, 0.05);
    color: var(--color-text-light);
    transform: translateX(5px);
}

.sidebar-menu a.active {
    background: linear-gradient(135deg, 
        rgba(99, 102, 241, 0.2), 
        rgba(139, 92, 246, 0.15));
    color: white;
    box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
    border-left: 4px solid var(--color-primary);
}

.sidebar-menu i {
    font-size: 1.2rem;
    min-width: 24px;
    text-align: center;
}

.sidebar-menu a.active i {
    color: var(--color-primary);
    filter: drop-shadow(0 0 8px rgba(99, 102, 241, 0.5));
}

.sidebar-menu span {
    font-size: 0.95rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

/* Sidebar Menu Bawah */
.sidebar-menu-bottom {
    list-style: none;
    padding: 0 15px;
    margin-top: auto;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    padding-top: 20px;
}

.sidebar-menu-bottom li {
    margin-bottom: 8px;
}

.sidebar-menu-bottom a {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px 20px;
    color: var(--color-text-muted);
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.sidebar-menu-bottom a:hover {
    background: rgba(255, 255, 255, 0.05);
    color: var(--color-text-light);
}

.sidebar-menu-bottom i {
    font-size: 1.1rem;
    min-width: 24px;
    text-align: center;
}

/* Sidebar Badge - REVISI: Data dinamis */
.menu-badge {
    margin-left: auto;
    color: white;
    font-size: 0.7rem;
    padding: 4px 10px;
    border-radius: 20px;
    font-weight: 600;
    animation: pulse 2s infinite;
}

/* Warna badge berdasarkan jenis */
.menu-badge.new {
    background: linear-gradient(135deg, var(--color-success), #059669);
}

.menu-badge.count {
    background: linear-gradient(135deg, var(--color-warning), #d97706);
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* Sidebar Toggle */
.sidebar-toggle {
    position: absolute;
    top: 25px;
    right: -12px;
    width: 24px;
    height: 24px;
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: white;
    font-size: 0.8rem;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
    z-index: 1001;
    transition: all 0.3s ease;
}

.sidebar-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 18px rgba(99, 102, 241, 0.6);
}

/* Collapsed Sidebar */
.sidebar-collapsed .sidebar {
    width: var(--sidebar-collapsed-width);
}

.sidebar-collapsed .sidebar-menu span,
.sidebar-collapsed .sidebar-menu-bottom span,
.sidebar-collapsed .sidebar-brand,
.sidebar-collapsed .menu-badge {
    opacity: 0;
    width: 0;
    overflow: hidden;
    position: absolute;
}

.sidebar-collapsed .sidebar-menu a,
.sidebar-collapsed .sidebar-menu-bottom a {
    padding: 15px;
    justify-content: center;
}

.sidebar-collapsed .sidebar-menu a:hover span,
.sidebar-collapsed .sidebar-menu-bottom a:hover span,
.sidebar-collapsed .sidebar-menu a:hover .menu-badge,
.sidebar-collapsed .sidebar-menu-bottom a:hover .menu-badge {
    position: absolute;
    left: calc(100% + 15px);
    background: var(--color-bg-dark);
    padding: 8px 15px;
    border-radius: 8px;
    white-space: nowrap;
    opacity: 1;
    width: auto;
    box-shadow: var(--shadow-lg);
    z-index: 1000;
}

/* CONTENT AREA - REVISI: Tambah spacing */
.content {
    margin-left: var(--sidebar-width);
    padding: 40px; /* 🔥 PERBAIKAN: Tambah padding */
    padding-top: 100px;
    min-height: 100vh;
    transition: margin-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.sidebar-collapsed .content {
    margin-left: var(--sidebar-collapsed-width);
}

/* Cards */
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin-bottom: 30px;
}

.card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    padding: 25px;
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
    border-color: rgba(99, 102, 241, 0.2);
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }
    
    .sidebar.sidebar-open {
        transform: translateX(0);
    }
    
    .navbar {
        left: 0;
        padding: 15px 20px;
        justify-content: space-between;
    }
    
    .navbar-actions {
        margin-left: 0;
    }
    
    .content {
        margin-left: 0;
        padding: 20px;
        padding-top: 80px;
    }
    
    .sidebar-toggle {
        display: none;
    }
    
    .btn-logout,
    .btn-action {
        padding: 8px 15px;
        font-size: 0.8rem;
        min-width: auto;
    }
}

@media (max-width: 480px) {
    .navbar {
        padding: 12px 15px;
    }
    
    .navbar-actions {
        gap: 10px;
    }
    
    .content {
        padding: 15px;
        padding-top: 70px;
    }
}

/* Load Fonts & Icons */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
</style>
</head>
<body>

<!-- SIDEBAR TOGGLE BUTTON -->
<div class="sidebar-toggle" onclick="toggleSidebar()">
    <i class="fas fa-chevron-left"></i>
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <i class="fas fa-store"></i>
            ADMIN FENGMARKET
        </div>
    </div>
    
    <!-- Menu Utama -->
    <ul class="sidebar-menu">
        <li>
            <a href="<?= base_url('admin/dashboard') ?>" class="<?= current_url() == base_url('admin/dashboard') ? 'active' : '' ?>">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
                <!-- 🔥 REVISI: Data dinamis dari PHP -->
                <?php if (isset($dashboard_new) && $dashboard_new > 0): ?>
                <span class="menu-badge new">NEW</span>
                <?php endif; ?>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/products') ?>" class="<?= strpos(current_url(), '/products') !== false ? 'active' : '' ?>">
                <i class="fas fa-box"></i>
                <span>Products</span>
                <!-- 🔥 REVISI: Data dinamis dari PHP -->
                <?php if (isset($product_count)): ?>
                <span class="menu-badge count"><?= $product_count ?></span>
                <?php endif; ?>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/orders') ?>" class="<?= strpos(current_url(), '/orders') !== false ? 'active' : '' ?>">
                <i class="fas fa-shopping-cart"></i>
                <span>Orders</span>
                <!-- 🔥 REVISI: Data dinamis dari PHP -->
                <?php if (isset($order_count)): ?>
                <span class="menu-badge count"><?= $order_count ?></span>
                <?php endif; ?>
            </a>
        </li>
    </ul>
    
    <!-- Menu Bawah -->
    <ul class="sidebar-menu-bottom">
        <li>
            <a href="<?= base_url('admin/settings') ?>" class="<?= strpos(current_url(), '/settings') !== false ? 'active' : '' ?>">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('admin/messages') ?>" class="<?= strpos(current_url(), '/messages') !== false ? 'active' : '' ?>">
                <i class="fas fa-envelope"></i>
                <span>Messages</span>
                <!-- 🔥 REVISI: Data dinamis dari PHP -->
                <?php if (isset($unread_messages) && $unread_messages > 0): ?>
                <span class="menu-badge count"><?= $unread_messages ?></span>
                <?php endif; ?>
            </a>
        </li>
    </ul>
</div>

<!-- NAVBAR -->
<div class="navbar">
    <!-- 🔥 REVISI: Hapus brand dan greeting, tambah actions -->
    <div class="navbar-actions">
        <?php if (isset($page_title) && $page_title == 'products'): ?>
        <a href="<?= base_url('admin/products/create') ?>" class="btn-action">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
        <?php endif; ?>
        
        <?php if (isset($page_title) && $page_title == 'orders'): ?>
        <a href="<?= base_url('admin/orders/export') ?>" class="btn-action">
            <i class="fas fa-download"></i> Export
        </a>
        <?php endif; ?>
        
        <a href="<?= base_url('admin/logout') ?>" class="btn-logout">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </div>
</div>

<!-- CONTENT -->
<div class="content">
    <?= $this->renderSection('content') ?>
</div>

<script>
// Toggle Sidebar
function toggleSidebar() {
    document.body.classList.toggle('sidebar-collapsed');
    const icon = document.querySelector('.sidebar-toggle i');
    if (document.body.classList.contains('sidebar-collapsed')) {
        icon.className = 'fas fa-chevron-right';
    } else {
        icon.className = 'fas fa-chevron-left';
    }
}

// Active menu highlighting
const currentUrl = window.location.pathname;
const menuLinks = document.querySelectorAll('.sidebar-menu a, .sidebar-menu-bottom a');

menuLinks.forEach(link => {
    if (link.getAttribute('href') === currentUrl) {
        link.classList.add('active');
    }
});

// Mobile sidebar toggle
if (window.innerWidth <= 768) {
    const sidebar = document.getElementById('sidebar');
    // Create mobile menu toggle
    const mobileToggle = document.createElement('div');
    mobileToggle.className = 'mobile-toggle';
    mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';
    mobileToggle.style.cssText = `
        position: fixed;
        top: 15px;
        left: 15px;
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        z-index: 1002;
        cursor: pointer;
        box-shadow: var(--shadow-lg);
    `;
    
    document.body.appendChild(mobileToggle);
    
    mobileToggle.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar-open');
    });
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', (e) => {
        if (!sidebar.contains(e.target) && !e.target.classList.contains('mobile-toggle') && !e.target.closest('.mobile-toggle')) {
            sidebar.classList.remove('sidebar-open');
        }
    });
}

// Add ripple effect to sidebar items
const sidebarItems = document.querySelectorAll('.sidebar-menu a, .sidebar-menu-bottom a');
sidebarItems.forEach(item => {
    item.addEventListener('click', function(e) {
        // Remove existing active class from all items
        sidebarItems.forEach(i => i.classList.remove('active'));
        // Add active class to clicked item
        this.classList.add('active');
        
        // Ripple effect
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
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

// Add CSS for ripple animation
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

// Auto-collapse sidebar on small screens
function handleResize() {
    if (window.innerWidth <= 992 && !document.body.classList.contains('sidebar-collapsed')) {
        document.body.classList.add('sidebar-collapsed');
        document.querySelector('.sidebar-toggle i').className = 'fas fa-chevron-right';
    }
}

window.addEventListener('resize', handleResize);
handleResize(); // Run on load

// Update badge colors based on count
function updateBadgeColors() {
    document.querySelectorAll('.menu-badge.count').forEach(badge => {
        const count = parseInt(badge.textContent);
        if (count > 50) {
            badge.style.background = 'linear-gradient(135deg, var(--color-danger), #dc2626)';
        } else if (count > 20) {
            badge.style.background = 'linear-gradient(135deg, var(--color-warning), #d97706)';
        } else {
            badge.style.background = 'linear-gradient(135deg, var(--color-success), #059669)';
        }
    });
}

// Run after page load
document.addEventListener('DOMContentLoaded', updateBadgeColors);
</script>

</body>
</html>