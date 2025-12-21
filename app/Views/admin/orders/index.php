<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* ===== VARIABEL WARNA ===== */
    :root {
        --color-navy: #0a192f;
        --color-navy-light: #112240;
        --color-navy-lighter: #1a2c50;
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
        --color-card-dark: rgba(10, 25, 47, 0.9);
        --color-filter-all: #00ffcc;
        --color-dropdown-bg: #0f1b2e;
        --color-dropdown-hover: #15263d;
    }
    
    /* ===== BACKGROUND ===== */
    body {
        background: linear-gradient(135deg, #0a192f 0%, #0f1b2e 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
    }
    
    body::before {
        content: '';
        position: fixed;
        width: 800px;
        height: 800px;
        background: radial-gradient(circle at 30% 20%, 
            rgba(0, 255, 204, 0.08) 0%, 
            rgba(8, 217, 255, 0.05) 30%, 
            transparent 70%);
        filter: blur(100px);
        animation: floatBlob 30s infinite alternate ease-in-out;
        z-index: 0;
        top: -400px;
        right: -300px;
        pointer-events: none;
    }
    
    body::after {
        content: '';
        position: fixed;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle at 70% 80%, 
            rgba(139, 92, 246, 0.06) 0%, 
            rgba(99, 102, 241, 0.04) 30%, 
            transparent 70%);
        filter: blur(80px);
        animation: floatBlob 25s infinite alternate-reverse ease-in-out;
        z-index: 0;
        bottom: -300px;
        left: -200px;
        pointer-events: none;
    }
    
    @keyframes floatBlob {
        0% { transform: translate(0, 0) scale(1) rotate(0deg); }
        33% { transform: translate(30px, -40px) scale(1.05) rotate(5deg); }
        66% { transform: translate(-20px, 30px) scale(0.95) rotate(-5deg); }
        100% { transform: translate(0, 0) scale(1) rotate(0deg); }
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
        background: linear-gradient(135deg, 
            rgba(17, 34, 64, 0.95), 
            rgba(10, 25, 47, 0.98));
        backdrop-filter: blur(25px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4),
                    inset 0 1px 0 rgba(255, 255, 255, 0.05);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .dashboard-header:hover {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5),
                    inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }
    
    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            var(--color-teal) 25%, 
            var(--color-cyan) 50%,
            var(--color-teal) 75%,
            transparent 100%);
        animation: slideLine 3s infinite linear;
    }
    
    .dashboard-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            transparent 0%, 
            rgba(0, 255, 204, 0.03) 100%);
        pointer-events: none;
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
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .header-title p {
        color: var(--color-text-secondary);
        font-size: 15px;
        margin: 0;
        opacity: 0.9;
    }
    
    .header-stats {
        background: linear-gradient(135deg, 
            rgba(0, 255, 204, 0.12), 
            rgba(8, 217, 255, 0.08));
        border: 1px solid var(--color-border);
        border-radius: 14px;
        padding: 20px 25px;
        text-align: center;
        min-width: 160px;
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .header-stats:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 255, 204, 0.15);
    }
    
    .header-stats::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            transparent 30%, 
            rgba(255, 255, 255, 0.03) 100%);
        pointer-events: none;
    }
    
    .stats-number {
        color: var(--color-teal);
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
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
        background: linear-gradient(135deg, 
            rgba(17, 34, 64, 0.9), 
            rgba(10, 25, 47, 0.95));
        backdrop-filter: blur(20px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3),
                    inset 0 1px 0 rgba(255, 255, 255, 0.05);
        margin-bottom: 40px;
        animation: fadeIn 0.7s ease;
        position: relative;
    }
    
    .table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            transparent 0%, 
            rgba(0, 255, 204, 0.02) 100%);
        pointer-events: none;
        z-index: 1;
    }
    
    .table-header {
        padding: 22px 30px;
        background: linear-gradient(135deg, 
            rgba(10, 25, 47, 0.8), 
            rgba(17, 34, 64, 0.9));
        border-bottom: 1px solid var(--color-border);
        position: relative;
        z-index: 2;
    }
    
    .table-header h2 {
        color: var(--color-text-primary);
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }
    
    .table-header h2 i {
        color: var(--color-teal);
        font-size: 18px;
    }
    
    /* ===== ORDERS TABLE ===== */
    .orders-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        position: relative;
        z-index: 2;
    }
    
    .orders-table thead {
        background: linear-gradient(135deg, 
            rgba(10, 25, 47, 0.7), 
            rgba(17, 34, 64, 0.8));
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
        position: relative;
        white-space: nowrap;
    }
    
    .orders-table th::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--color-teal);
        transition: width 0.3s ease;
    }
    
    .orders-table th:hover::after {
        width: 100%;
    }
    
    .orders-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        position: relative;
    }
    
    .orders-table tbody tr::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(0, 255, 204, 0.03) 50%, 
            transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }
    
    .orders-table tbody tr:hover::before {
        opacity: 1;
    }
    
    .orders-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.02);
        transform: translateX(5px);
    }
    
    .orders-table tbody tr:last-child {
        border-bottom: none;
    }
    
    .orders-table td {
        padding: 20px;
        color: var(--color-text-primary);
        font-size: 14px;
        vertical-align: middle;
        position: relative;
        z-index: 1;
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
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            transparent 30%, 
            rgba(255, 255, 255, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .badge:hover::before {
        opacity: 1;
    }
    
    .badge.pending {
        background: linear-gradient(135deg, 
            rgba(245, 158, 11, 0.15), 
            rgba(245, 158, 11, 0.1));
        color: var(--color-warning);
        border: 1px solid rgba(245, 158, 11, 0.3);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.1);
    }
    
    .badge.processing {
        background: linear-gradient(135deg, 
            rgba(14, 165, 233, 0.15), 
            rgba(14, 165, 233, 0.1));
        color: var(--color-info);
        border: 1px solid rgba(14, 165, 233, 0.3);
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.1);
    }
    
    .badge.completed {
        background: linear-gradient(135deg, 
            rgba(16, 185, 129, 0.15), 
            rgba(16, 185, 129, 0.1));
        color: var(--color-success);
        border: 1px solid rgba(16, 185, 129, 0.3);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);
    }
    
    .badge.cancelled {
        background: linear-gradient(135deg, 
            rgba(239, 68, 68, 0.15), 
            rgba(239, 68, 68, 0.1));
        color: var(--color-danger);
        border: 1px solid rgba(239, 68, 68, 0.3);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.1);
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
        position: relative;
        overflow: hidden;
    }
    
    .btn-action::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            transparent 30%, 
            rgba(255, 255, 255, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .btn-action:hover::before {
        opacity: 1;
    }
    
    .btn-action:hover {
        transform: translateY(-3px) scale(1.05);
        border-color: var(--color-teal);
        box-shadow: 0 8px 20px rgba(0, 255, 204, 0.2);
    }
    
    .btn-view {
        background: linear-gradient(135deg, 
            rgba(0, 255, 204, 0.12), 
            rgba(0, 255, 204, 0.08));
        color: var(--color-teal);
        border-color: rgba(0, 255, 204, 0.3);
    }
    
    .btn-edit {
        background: linear-gradient(135deg, 
            rgba(99, 102, 241, 0.12), 
            rgba(99, 102, 241, 0.08));
        color: #6366f1;
        border-color: rgba(99, 102, 241, 0.3);
    }
    
    .btn-print {
        background: linear-gradient(135deg, 
            rgba(139, 92, 246, 0.12), 
            rgba(139, 92, 246, 0.08));
        color: var(--color-purple);
        border-color: rgba(139, 92, 246, 0.3);
    }
    
    /* ===== FILTER SECTION ===== */
    .filter-section {
        background: linear-gradient(135deg, 
            rgba(17, 34, 64, 0.7), 
            rgba(10, 25, 47, 0.8));
        padding: 20px 30px;
        border-bottom: 1px solid var(--color-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
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
    
    /* ===== DROPDOWN STYLES - DIPERBAIKI ===== */
    .filter-select {
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.1), 
            rgba(255, 255, 255, 0.05));
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
        backdrop-filter: blur(10px);
    }
    
    .filter-select:hover {
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.15), 
            rgba(255, 255, 255, 0.1));
        border-color: rgba(0, 255, 204, 0.4);
        box-shadow: 0 5px 15px rgba(0, 255, 204, 0.1);
    }
    
    .filter-select:focus {
        outline: none;
        border-color: var(--color-teal);
        box-shadow: 0 0 0 3px rgba(0, 255, 204, 0.2);
    }
    
    /* DROPDOWN OPTIONS BACKGROUND - DIPERBAIKI */
    .filter-select option {
        background-color: var(--color-dropdown-bg);
        color: var(--color-text-primary);
        padding: 12px 15px;
        font-size: 14px;
        border: none;
        margin: 2px 0;
    }
    
    /* Hover state untuk options */
    .filter-select option:hover,
    .filter-select option:checked,
    .filter-select option:focus {
        background-color: var(--color-dropdown-hover) !important;
        color: var(--color-text-primary) !important;
    }
    
    /* WARNA KHUSUS untuk "Semua Status" dan "Semua Periode" */
    .filter-select option[value=""] {
        background-color: var(--color-dropdown-bg) !important;
        color: var(--color-filter-all) !important;
        font-weight: 600;
    }
    
    .filter-select option[value=""]:hover,
    .filter-select option[value=""]:checked {
        background-color: var(--color-dropdown-hover) !important;
        color: var(--color-filter-all) !important;
    }
    
    /* WARNA untuk opsi Status */
    .filter-select option[value="pending"] {
        color: #f59e0b !important;
        background-color: var(--color-dropdown-bg) !important;
    }
    
    .filter-select option[value="processing"] {
        color: #0ea5e9 !important;
        background-color: var(--color-dropdown-bg) !important;
    }
    
    .filter-select option[value="completed"] {
        color: #10b981 !important;
        background-color: var(--color-dropdown-bg) !important;
    }
    
    .filter-select option[value="cancelled"] {
        color: #ef4444 !important;
        background-color: var(--color-dropdown-bg) !important;
    }
    
    /* WARNA untuk opsi Periode */
    .filter-select option[value="today"] {
        color: #0ea5e9 !important;
        background-color: var(--color-dropdown-bg) !important;
    }
    
    .filter-select option[value="week"] {
        color: #10b981 !important;
        background-color: var(--color-dropdown-bg) !important;
    }
    
    .filter-select option[value="month"] {
        color: #8b5cf6 !important;
        background-color: var(--color-dropdown-bg) !important;
    }
    
    .filter-select option[value="year"] {
        color: #f59e0b !important;
        background-color: var(--color-dropdown-bg) !important;
    }
    
    /* Scrollbar untuk dropdown di browser tertentu */
    .filter-select::-webkit-scrollbar {
        width: 8px;
    }
    
    .filter-select::-webkit-scrollbar-track {
        background: var(--color-dropdown-bg);
        border-radius: 4px;
    }
    
    .filter-select::-webkit-scrollbar-thumb {
        background: var(--color-navy-light);
        border-radius: 4px;
        border: 1px solid var(--color-border);
    }
    
    /* Untuk Firefox */
    .filter-select option {
        scrollbar-width: thin;
        scrollbar-color: var(--color-navy-light) var(--color-dropdown-bg);
    }
    
    /* Style khusus untuk disabled option */
    .filter-select option:disabled {
        color: var(--color-text-muted);
        background-color: var(--color-dropdown-bg);
    }
    
    .search-box {
        display: flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.1), 
            rgba(255, 255, 255, 0.05));
        border: 1px solid var(--color-border);
        border-radius: 10px;
        padding: 10px 16px;
        min-width: 250px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    
    .search-box:focus-within {
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.15), 
            rgba(255, 255, 255, 0.1));
        border-color: var(--color-teal);
        box-shadow: 0 0 0 3px rgba(0, 255, 204, 0.2),
                    0 5px 20px rgba(0, 255, 204, 0.1);
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
        position: relative;
        z-index: 2;
    }
    
    .empty-icon {
        font-size: 72px;
        color: var(--color-teal);
        margin-bottom: 25px;
        opacity: 0.5;
        filter: drop-shadow(0 4px 8px rgba(0, 255, 204, 0.2));
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
        background: linear-gradient(135deg, 
            var(--color-purple), 
            #6366f1);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
        overflow: hidden;
    }
    
    .btn-export::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            transparent 30%, 
            rgba(255, 255, 255, 0.2) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .btn-export:hover::before {
        opacity: 1;
    }
    
    .btn-export:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(139, 92, 246, 0.4);
        color: white;
    }
    
    /* ===== TABLE FOOTER ===== */
    .table-footer {
        padding: 20px 30px;
        border-top: 1px solid var(--color-border);
        text-align: center;
        background: linear-gradient(135deg, 
            rgba(10, 25, 47, 0.8), 
            rgba(17, 34, 64, 0.9));
        position: relative;
        z-index: 2;
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
        
        .filter-select {
            min-width: 130px;
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
        
        <!-- FILTER SECTION -->
        <div class="filter-section">
            <div class="filter-group">
                <span class="filter-label">Filter:</span>
                
                <!-- FILTER STATUS -->
                <select class="filter-select" id="statusFilter">
                    <!-- "SEMUA STATUS" dengan warna TEAL -->
                    <option value="">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                
                <!-- FILTER PERIODE -->
                <select class="filter-select" id="periodFilter">
                    <!-- "SEMUA PERIODE" dengan warna TEAL -->
                    <option value="">Semua Periode</option>
                    <option value="today">Hari Ini</option>
                    <option value="week">Minggu Ini</option>
                    <option value="month">Bulan Ini</option>
                    <option value="year">Tahun Ini</option>
                </select>
            </div>
            
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" class="search-input" id="searchInput" placeholder="Cari ID Order atau nama pelanggan...">
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
            <table class="orders-table" id="ordersTable">
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
                <tbody id="tableBody">
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>
                                <strong style="color: var(--color-teal); text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                                    #<?= $order['id'] ?>
                                </strong>
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
                                <strong style="color: var(--color-teal); font-size: 15px; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
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
        <div class="table-footer">
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
    const statusFilter = document.getElementById('statusFilter');
    const periodFilter = document.getElementById('periodFilter');
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('#ordersTable tbody tr');
    
    // Function to filter table
    function filterTable() {
        const selectedStatus = statusFilter ? statusFilter.value.toLowerCase() : '';
        const selectedPeriod = periodFilter ? periodFilter.value.toLowerCase() : '';
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        
        if (!tableRows || tableRows.length === 0) return;
        
        tableRows.forEach(row => {
            let showRow = true;
            
            // Filter by status
            if (selectedStatus) {
                const statusBadge = row.querySelector('.badge');
                if (statusBadge) {
                    const rowStatus = statusBadge.classList[1];
                    if (rowStatus !== selectedStatus) {
                        showRow = false;
                    }
                }
            }
            
            // Filter by period (contoh sederhana)
            if (showRow && selectedPeriod) {
                const dateCell = row.querySelector('td:nth-child(6)');
                if (dateCell) {
                    const dateText = dateCell.textContent.toLowerCase();
                    // Logika filter periode bisa ditambahkan di sini
                    // Contoh sederhana:
                    if (selectedPeriod === 'today' && !dateText.includes('hari ini')) {
                        showRow = false;
                    }
                }
            }
            
            // Filter by search term
            if (showRow && searchTerm) {
                const rowText = row.textContent.toLowerCase();
                if (!rowText.includes(searchTerm)) {
                    showRow = false;
                }
            }
            
            // Show/hide row
            row.style.display = showRow ? '' : 'none';
        });
    }
    
    // Add event listeners
    if (statusFilter) {
        statusFilter.addEventListener('change', filterTable);
    }
    
    if (periodFilter) {
        periodFilter.addEventListener('change', filterTable);
    }
    
    if (searchInput) {
        searchInput.addEventListener('input', filterTable);
    }
});
</script>

<?= $this->endSection() ?>