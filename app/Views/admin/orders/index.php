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
        --color-success: #10b981;
        --color-warning: #f59e0b;
        --color-danger: #ef4444;
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
        animation: fadeIn 0.6s ease;
    }
    
    /* ===== HEADER ===== */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        padding: 22px 30px;
        background: rgba(17, 34, 64, 0.85);
        backdrop-filter: blur(25px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        position: relative;
        overflow: hidden;
    }
    
    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            var(--color-teal) 25%, 
            var(--color-cyan) 50%,
            var(--color-teal) 75%,
            transparent 100%);
        animation: slideLine 3s infinite linear;
    }
    
    @keyframes slideLine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    .header-title h1 {
        color: var(--color-text-primary);
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    
    .header-title p {
        color: var(--color-text-secondary);
        font-size: 15px;
        margin: 0;
        opacity: 0.9;
    }
    
    .header-stats {
        background: rgba(0, 255, 204, 0.1);
        border: 1px solid var(--color-border);
        border-radius: 14px;
        padding: 20px 25px;
        text-align: center;
        min-width: 160px;
        backdrop-filter: blur(10px);
    }
    
    .stats-number {
        color: var(--color-teal);
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .stats-label {
        color: var(--color-text-secondary);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
    }
    
    /* ===== TABLE CONTAINER ===== */
    .table-container {
        background: var(--color-card-bg);
        backdrop-filter: blur(20px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        margin-bottom: 40px;
        animation: fadeIn 0.7s ease;
    }
    
    .table-header {
        padding: 22px 30px;
        background: linear-gradient(135deg, 
            rgba(10, 25, 47, 0.7), 
            rgba(17, 34, 64, 0.8));
        border-bottom: 1px solid var(--color-border);
    }
    
    .table-header h2 {
        color: var(--color-text-primary);
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .table-header h2 i {
        color: var(--color-teal);
        font-size: 18px;
    }
    
    /* ===== ORDERS TABLE ===== */
    .orders-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .orders-table thead {
        background: rgba(10, 25, 47, 0.5);
        border-bottom: 1px solid var(--color-border);
    }
    
    .orders-table th {
        padding: 18px 20px;
        text-align: left;
        color: var(--color-text-secondary);
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 1px solid var(--color-border);
    }
    
    .orders-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .orders-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.03);
    }
    
    .orders-table tbody tr:last-child {
        border-bottom: none;
    }
    
    .orders-table td {
        padding: 20px;
        color: var(--color-text-primary);
        font-size: 14px;
        vertical-align: middle;
    }
    
    /* ===== BADGE STATUS ===== */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .badge.pending {
        background: rgba(245, 158, 11, 0.15);
        color: var(--color-warning);
        border: 1px solid rgba(245, 158, 11, 0.3);
    }
    
    .badge.processing {
        background: rgba(14, 165, 233, 0.15);
        color: var(--color-info);
        border: 1px solid rgba(14, 165, 233, 0.3);
    }
    
    .badge.completed {
        background: rgba(16, 185, 129, 0.15);
        color: var(--color-success);
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    
    .badge.cancelled {
        background: rgba(239, 68, 68, 0.15);
        color: var(--color-danger);
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    .badge i {
        font-size: 10px;
    }
    
    /* ===== ORDER ACTIONS ===== */
    .order-actions {
        display: flex;
        gap: 8px;
    }
    
    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-text-primary);
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid var(--color-border);
        background: rgba(255, 255, 255, 0.05);
    }
    
    .btn-action:hover {
        transform: translateY(-2px);
        border-color: var(--color-teal);
    }
    
    .btn-view {
        background: rgba(0, 255, 204, 0.1);
        color: var(--color-teal);
        border-color: rgba(0, 255, 204, 0.2);
    }
    
    .btn-view:hover {
        background: rgba(0, 255, 204, 0.15);
    }
    
    .btn-edit {
        background: rgba(99, 102, 241, 0.1);
        color: #6366f1;
        border-color: rgba(99, 102, 241, 0.2);
    }
    
    .btn-edit:hover {
        background: rgba(99, 102, 241, 0.15);
    }
    
    .btn-print {
        background: rgba(139, 92, 246, 0.1);
        color: var(--color-purple);
        border-color: rgba(139, 92, 246, 0.2);
    }
    
    .btn-print:hover {
        background: rgba(139, 92, 246, 0.15);
    }
    
    /* ===== FILTER SECTION - DIPERBAIKI ===== */
    .filter-section {
        background: rgba(17, 34, 64, 0.5);
        padding: 20px 30px;
        border-bottom: 1px solid var(--color-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .filter-group {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .filter-label {
        color: var(--color-text-secondary);
        font-size: 14px;
        font-weight: 600;
    }
    
    .filter-select {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid var(--color-border);
        border-radius: 10px;
        padding: 10px 16px;
        color: var(--color-text-primary);
        font-size: 14px;
        min-width: 150px;
        transition: all 0.3s ease;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2300ffcc' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 14px;
        padding-right: 35px;
        cursor: pointer;
    }
    
    .filter-select:hover {
        background-color: rgba(255, 255, 255, 0.12);
        border-color: rgba(0, 255, 204, 0.3);
    }
    
    .filter-select:focus {
        outline: none;
        border-color: var(--color-teal);
        box-shadow: 0 0 0 3px rgba(0, 255, 204, 0.1);
    }
    
    /* Style untuk semua opsi di dalam select */
    .filter-select option {
        background-color: var(--color-navy-light);
        color: var(--color-text-primary);
        padding: 10px;
        font-size: 14px;
    }
    
    /* Style khusus untuk optgroup */
    .filter-select optgroup {
        background-color: var(--color-navy);
        color: var(--color-teal);
        font-weight: 600;
    }
    
    /* Style untuk disabled option */
    .filter-select option:disabled {
        color: var(--color-text-muted);
        background-color: var(--color-navy);
    }
    
    .search-box {
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid var(--color-border);
        border-radius: 10px;
        padding: 10px 16px;
        min-width: 250px;
        transition: all 0.3s ease;
    }
    
    .search-box:focus-within {
        border-color: var(--color-teal);
        box-shadow: 0 0 0 3px rgba(0, 255, 204, 0.1);
    }
    
    .search-box i {
        color: var(--color-text-muted);
        font-size: 14px;
    }
    
    .search-input {
        background: transparent;
        border: none;
        color: var(--color-text-primary);
        font-size: 14px;
        width: 100%;
        outline: none;
    }
    
    .search-input::placeholder {
        color: var(--color-text-muted);
    }
    
    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 80px 30px;
        color: var(--color-text-secondary);
    }
    
    .empty-icon {
        font-size: 72px;
        color: var(--color-teal);
        margin-bottom: 25px;
        opacity: 0.5;
    }
    
    .empty-title {
        color: var(--color-text-primary);
        font-size: 24px;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .empty-description {
        font-size: 15px;
        max-width: 400px;
        margin: 0 auto 35px;
        line-height: 1.5;
    }
    
    .btn-export {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 24px;
        background: linear-gradient(135deg, var(--color-purple), #6366f1);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(139, 92, 246, 0.3);
    }
    
    .btn-export:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
        color: white;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 1200px) {
        .dashboard-wrapper {
            padding: 25px 20px;
        }
        
        .orders-table {
            display: block;
            overflow-x: auto;
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            gap: 18px;
            padding: 20px;
            text-align: center;
        }
        
        .header-stats {
            width: 100%;
        }
        
        .table-header,
        .filter-section {
            padding: 20px;
        }
        
        .filter-section {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }
        
        .search-box {
            min-width: auto;
            width: 100%;
        }
        
        .orders-table th,
        .orders-table td {
            padding: 15px 12px;
            font-size: 13px;
        }
        
        .order-actions {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
    
    @media (max-width: 480px) {
        .dashboard-wrapper {
            padding: 20px 15px;
        }
        
        .header-title h1 {
            font-size: 22px;
        }
        
        .empty-title {
            font-size: 20px;
        }
        
        .badge {
            font-size: 10px;
            padding: 5px 10px;
        }
        
        .btn-action {
            width: 32px;
            height: 32px;
        }
    }
</style>

<!-- Load Icon & Font -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<div class="dashboard-wrapper">
    
    <!-- HEADER -->
    <div class="dashboard-header">
        <div class="header-title">
            <h1><i class="fas fa-clipboard-list"></i> Daftar Pesanan</h1>
            <p>Manajemen pesanan pelanggan</p>
        </div>
        
        <div class="header-stats">
            <div class="stats-number"><?= count($orders) ?></div>
            <div class="stats-label">Total Pesanan</div>
        </div>
    </div>
    
    <!-- TABLE CONTAINER -->
    <div class="table-container">
        
        <!-- TABLE HEADER -->
        <div class="table-header">
            <h2><i class="fas fa-receipt"></i> Semua Pesanan</h2>
        </div>
        
        <!-- FILTER SECTION - DIPERBAIKI -->
        <div class="filter-section">
            <div class="filter-group">
                <span class="filter-label">Filter:</span>
                <select class="filter-select">
                    <option value="">Semua Status</option>
                    <option value="pending" style="background-color: rgba(245, 158, 11, 0.1);">Pending</option>
                    <option value="processing" style="background-color: rgba(14, 165, 233, 0.1);">Processing</option>
                    <option value="completed" style="background-color: rgba(16, 185, 129, 0.1);">Completed</option>
                    <option value="cancelled" style="background-color: rgba(239, 68, 68, 0.1);">Cancelled</option>
                </select>
                
                <select class="filter-select">
                    <option value="">Semua Periode</option>
                    <option value="today">Hari Ini</option>
                    <option value="week">Minggu Ini</option>
                    <option value="month">Bulan Ini</option>
                    <option value="year">Tahun Ini</option>
                </select>
            </div>
            
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" class="search-input" placeholder="Cari ID Order atau nama pelanggan...">
            </div>
        </div>
        
        <!-- ORDERS TABLE -->
        <?php if (empty($orders)) : ?>
            <!-- EMPTY STATE -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-clipboard"></i>
                </div>
                <h3 class="empty-title">Belum Ada Pesanan</h3>
                <p class="empty-description">
                    Belum ada pesanan yang diterima. Pesanan dari pelanggan akan muncul di sini.
                </p>
            </div>
        <?php else : ?>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>ID Order</th>
                        <th>Pelanggan</th>
                        <th>Produk</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>
                                <strong style="color: var(--color-teal);">#<?= $order['id'] ?></strong>
                            </td>
                            <td>
                                <div style="font-weight: 600; color: var(--color-text-primary);">
                                    <?= esc($order['customer']) ?>
                                </div>
                                <?php if (isset($order['email'])) : ?>
                                <div style="font-size: 12px; color: var(--color-text-muted);">
                                    <?= esc($order['email']) ?>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?= esc($order['product']) ?>
                                </div>
                                <?php if (isset($order['quantity'])) : ?>
                                <div style="font-size: 12px; color: var(--color-text-muted);">
                                    Qty: <?= $order['quantity'] ?>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong style="color: var(--color-teal); font-size: 15px;">
                                    Rp <?= number_format($order['total'], 0, ',', '.') ?>
                                </strong>
                            </td>
                            <td>
                                <span class="badge <?= $order['status'] ?>">
                                    <?php 
                                    $statusIcons = [
                                        'pending' => 'fas fa-clock',
                                        'processing' => 'fas fa-cog',
                                        'completed' => 'fas fa-check-circle',
                                        'cancelled' => 'fas fa-times-circle'
                                    ];
                                    ?>
                                    <i class="<?= $statusIcons[$order['status']] ?? 'fas fa-info-circle' ?>"></i>
                                    <?= strtoupper($order['status']) ?>
                                </span>
                            </td>
                            <td>
                                <div style="color: var(--color-text-primary); font-weight: 500;">
                                    <?= date('d M Y', strtotime($order['date'])) ?>
                                </div>
                                <div style="font-size: 12px; color: var(--color-text-muted);">
                                    <?= date('H:i', strtotime($order['date'])) ?>
                                </div>
                            </td>
                            <td>
                                <div class="order-actions">
                                    <a href="/admin/orders/view/<?= $order['id'] ?>" 
                                       class="btn-action btn-view"
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/admin/orders/edit/<?= str_replace('ORD-', '', $order['id']) ?>" 
                                       class="btn-action btn-edit"
                                       title="Edit Status">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/admin/orders/print/<?= str_replace('ORD-', '', $order['id']) ?>" 
                                       class="btn-action btn-print"
                                       title="Cetak Invoice">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif; ?>
        
        <!-- TABLE FOOTER -->
        <div style="padding: 20px 30px; border-top: 1px solid var(--color-border); text-align: center;">
            <a href="/admin/orders/export" class="btn-export">
                <i class="fas fa-file-export"></i>
                Export Data Excel
            </a>
        </div>
        
    </div>
    
</div>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    // Filter by status
    const statusFilter = document.querySelectorAll('.filter-select')[0];
    const tableRows = document.querySelectorAll('.orders-table tbody tr');
    
    if (statusFilter && tableRows.length > 0) {
        statusFilter.addEventListener('change', function() {
            const selectedStatus = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const statusBadge = row.querySelector('.badge');
                if (statusBadge) {
                    const rowStatus = statusBadge.classList[1];
                    if (selectedStatus === '' || rowStatus === selectedStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    }
    
    // Search functionality
    const searchInput = document.querySelector('.search-input');
    
    if (searchInput && tableRows.length > 0) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const orderId = row.cells[0].textContent.toLowerCase();
                const customer = row.cells[1].textContent.toLowerCase();
                const product = row.cells[2].textContent.toLowerCase();
                
                if (orderId.includes(searchTerm) || 
                    customer.includes(searchTerm) || 
                    product.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
    
    // Add hover effect to rows
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Animate table rows on load
    setTimeout(() => {
        tableRows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                row.style.transition = 'all 0.4s ease';
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, index * 50);
        });
    }, 300);
    
    // Custom styling untuk select dropdown di beberapa browser
    const filterSelects = document.querySelectorAll('.filter-select');
    filterSelects.forEach(select => {
        // Update warna saat opsi dipilih
        select.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const statusColor = selectedOption.style.backgroundColor || '';
            
            // Reset semua warna
            this.style.backgroundColor = 'rgba(255, 255, 255, 0.08)';
            
            // Jika opsi dengan warna khusus dipilih, update background
            if (selectedOption.style.backgroundColor && selectedOption.value !== '') {
                this.style.backgroundColor = selectedOption.style.backgroundColor;
                this.style.color = 'var(--color-text-primary)';
            }
        });
        
        // Set initial color jika ada opsi yang sudah terpilih
        const selectedOption = select.options[select.selectedIndex];
        if (selectedOption.style.backgroundColor && selectedOption.value !== '') {
            select.style.backgroundColor = selectedOption.style.backgroundColor;
        }
    });
});
</script>

<?= $this->endSection() ?>