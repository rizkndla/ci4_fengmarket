<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* ===== VARIABEL WARNA (SAMA PERSIS dengan Login Page) ===== */
    :root {
        --color-navy: #0a192f;
        --color-navy-light: #112240;
        --color-teal: #00ffcc;
        --color-teal-light: #64ffda;
        --color-cyan: #08d9ff;
        --color-glow: rgba(0, 255, 204, 0.4);
        
        /* Warna teks dari login page */
        --color-text-primary: #e6f1ff;
        --color-text-secondary: #a8b2d1;
        --color-text-muted: #8892b0;
        
        /* Border & effect */
        --color-border: rgba(100, 255, 218, 0.15);
        --color-card-bg: rgba(17, 34, 64, 0.7);
    }
    
    /* ===== BACKGROUND LAYERED SAMA KAYAK LOGIN ===== */
    body {
        background: var(--color-navy);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
    }
    
    /* Animated Blob Background */
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
    
    body::after {
        content: '';
        position: fixed;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, 
            rgba(10, 25, 47, 0) 0%, 
            rgba(8, 217, 255, 0.06) 40%, 
            rgba(0, 255, 204, 0.03) 100%);
        filter: blur(70px);
        animation: floatBlob 30s infinite alternate-reverse ease-in-out;
        z-index: 0;
        bottom: -250px;
        right: -250px;
        pointer-events: none;
    }
    
    @keyframes floatBlob {
        0% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(40px, -50px) scale(1.05); }
        66% { transform: translate(-30px, 40px) scale(0.95); }
        100% { transform: translate(0, 0) scale(1); }
    }
    
    /* ===== DASHBOARD WRAPPER ===== */
    .dashboard-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
        position: relative;
        z-index: 10;
        animation: fadeIn 0.6s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* ===== HEADER DASHBOARD (Glassmorphism) ===== */
    .dashboard-header {
        margin-bottom: 40px;
        padding: 25px 30px;
        background: rgba(17, 34, 64, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            var(--color-teal), 
            transparent);
    }
    
    .header-title h1 {
        color: var(--color-text-primary);
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .header-title h1 i {
        color: var(--color-teal);
        font-size: 26px;
    }
    
    .header-title p {
        color: var(--color-text-secondary);
        font-size: 15px;
    }
    
    /* ===== FORM LAYOUT 2 KOLOM YANG LEBIH RAPI ===== */
    .form-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 30px;
        /* Border container yang lebih proporsional */
        padding: 25px;
        background: rgba(17, 34, 64, 0.5);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        border: 1px solid var(--color-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        position: relative;
        overflow: hidden;
    }
    
    /* Border gradien untuk container */
    .form-container::before {
        content: '';
        position: absolute;
        top: -1px;
        left: -1px;
        right: -1px;
        bottom: -1px;
        border-radius: 21px;
        background: linear-gradient(135deg, 
            rgba(0, 255, 204, 0.2), 
            rgba(8, 217, 255, 0.2),
            rgba(0, 255, 204, 0.2));
        z-index: -1;
        pointer-events: none;
    }
    
    /* Garis pemisah antar kolom yang lebih halus */
    .form-container::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 1px;
        height: 80%;
        background: linear-gradient(
            to bottom,
            transparent,
            rgba(0, 255, 204, 0.2),
            rgba(0, 255, 204, 0.3),
            rgba(0, 255, 204, 0.2),
            transparent
        );
    }
    
    @media (max-width: 992px) {
        .form-container {
            grid-template-columns: 1fr;
            padding: 20px;
        }
        
        .form-container::after {
            display: none;
        }
    }
    
    /* ===== FORM CARD (Glassmorphism) YANG LEBIH KECIL ===== */
    .form-card {
        background: rgba(17, 34, 64, 0.4);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        border: 1px solid var(--color-border);
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }
    
    .form-card:hover {
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
        border-color: rgba(0, 255, 204, 0.25);
        transform: translateY(-2px);
    }
    
    .form-card.left {
        /* Kolom kiri untuk form input */
    }
    
    .form-card.right {
        /* Kolom kanan untuk upload gambar */
        display: flex;
        flex-direction: column;
        height: fit-content;
    }
    
    /* ===== FORM GROUP YANG LEBIH RAPI ===== */
    .form-group {
        margin-bottom: 22px;
        position: relative;
    }
    
    .form-group:last-child {
        margin-bottom: 0;
    }
    
    .form-group label {
        display: block;
        color: var(--color-text-secondary);
        font-weight: 500;
        font-size: 14px;
        margin-bottom: 10px;
        padding-left: 5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .form-group label i {
        color: var(--color-teal);
        font-size: 15px;
        width: 20px;
        text-align: center;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 16px;
        background: rgba(255, 255, 255, 0.04);
        border: 1.5px solid var(--color-border);
        border-radius: 10px;
        color: var(--color-text-primary);
        font-size: 14px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-family: 'Inter', sans-serif;
        box-sizing: border-box; /* Penting: agar padding tidak nambah width */
    }
    
    .form-control::placeholder {
        color: var(--color-text-muted);
        font-weight: 400;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--color-teal);
        background: rgba(0, 255, 204, 0.03);
        box-shadow: 0 0 0 3px var(--color-glow);
    }
    
    /* ===== UPLOAD GAMBAR AREA YANG LEBIH RAPI ===== */
    .upload-section {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .upload-label {
        color: var(--color-text-secondary);
        font-weight: 500;
        font-size: 14px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .upload-label i {
        color: var(--color-teal);
    }
    
    .file-upload-container {
        border: 2px dashed rgba(0, 255, 204, 0.3);
        border-radius: 12px;
        padding: 35px 20px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        background: rgba(255, 255, 255, 0.02);
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 280px;
        position: relative;
    }
    
    .file-upload-container:hover {
        border-color: var(--color-teal);
        background: rgba(0, 255, 204, 0.02);
        transform: translateY(-2px);
    }
    
    .file-upload-container.dragover {
        border-color: var(--color-teal);
        background: rgba(0, 255, 204, 0.06);
        transform: scale(1.01);
    }
    
    .file-upload-icon {
        font-size: 42px;
        color: var(--color-teal);
        margin-bottom: 18px;
        opacity: 0.8;
    }
    
    .file-upload-text h4 {
        color: var(--color-text-primary);
        margin-bottom: 8px;
        font-size: 17px;
        font-weight: 600;
    }
    
    .file-upload-text p {
        color: var(--color-text-secondary);
        font-size: 13.5px;
        margin-bottom: 22px;
        max-width: 240px;
        line-height: 1.5;
    }
    
    .file-upload-btn {
        padding: 10px 24px;
        background: rgba(0, 255, 204, 0.08);
        color: var(--color-teal);
        border: 1px solid var(--color-teal);
        border-radius: 8px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .file-upload-btn:hover {
        background: rgba(0, 255, 204, 0.15);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 255, 204, 0.1);
    }
    
    .file-input-hidden {
        display: none;
    }
    
    /* ===== PREVIEW GAMBAR ===== */
    .image-preview-container {
        margin-top: 18px;
        text-align: center;
        display: none;
    }
    
    .image-preview {
        width: 100%;
        max-height: 220px;
        object-fit: contain;
        border-radius: 10px;
        border: 2px solid rgba(0, 255, 204, 0.5);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        margin-bottom: 12px;
        background: rgba(0, 0, 0, 0.2);
    }
    
    .preview-info {
        color: var(--color-teal);
        font-weight: 500;
        font-size: 13.5px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .preview-info i {
        font-size: 15px;
    }
    
    /* ===== TEXTAREA (Untuk deskripsi) ===== */
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
        line-height: 1.5;
        font-size: 14px;
    }
    
    /* ===== FORM ACTIONS YANG LEBIH RAPI ===== */
    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        margin-top: 35px;
        padding: 25px;
        background: rgba(17, 34, 64, 0.4);
        backdrop-filter: blur(15px);
        border-radius: 16px;
        border: 1px solid var(--color-border);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        position: relative;
    }
    
    /* Border gradien untuk form actions */
    .form-actions::before {
        content: '';
        position: absolute;
        top: -1px;
        left: -1px;
        right: -1px;
        bottom: -1px;
        border-radius: 17px;
        background: linear-gradient(135deg, 
            rgba(0, 255, 204, 0.15), 
            rgba(8, 217, 255, 0.15),
            rgba(0, 255, 204, 0.15));
        z-index: -1;
        pointer-events: none;
    }
    
    .btn {
        padding: 12px 26px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: none;
        text-decoration: none;
        position: relative;
        z-index: 1;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, var(--color-teal), var(--color-cyan));
        color: var(--color-navy);
        box-shadow: 0 6px 20px rgba(0, 255, 204, 0.25);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(0, 255, 204, 0.3);
    }
    
    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255, 255, 255, 0.2), 
            transparent);
        transition: left 0.7s ease;
        z-index: 1;
    }
    
    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 255, 204, 0.4);
    }
    
    .btn-submit:hover::before {
        left: 100%;
    }
    
    .btn-cancel {
        background: rgba(255, 255, 255, 0.04);
        color: var(--color-text-secondary);
        border: 1px solid var(--color-border);
        text-decoration: none;
    }
    
    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.08);
        color: var(--color-text-primary);
        transform: translateY(-2px);
        border-color: rgba(0, 255, 204, 0.3);
    }
    
    .btn i {
        position: relative;
        z-index: 2;
    }
    
    /* ===== VALIDATION ERROR ===== */
    .error-message {
        background: rgba(239, 68, 68, 0.08);
        color: #fecaca;
        padding: 10px 14px;
        border-radius: 8px;
        border-left: 3px solid #ef4444;
        margin-top: 8px;
        font-size: 13px;
        border: 1px solid rgba(239, 68, 68, 0.15);
    }
    
    .form-hint {
        color: var(--color-text-muted);
        font-size: 12.5px;
        margin-top: 6px;
        padding-left: 5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .form-hint i {
        color: var(--color-teal);
        font-size: 11px;
    }
    
    .upload-hint {
        color: var(--color-text-muted);
        font-size: 12.5px;
        margin-top: 12px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    
    .upload-hint i {
        color: var(--color-teal);
        font-size: 11px;
    }
    
    /* ===== SIDEBAR NAVIGATION STYLE ===== */
    /* Ini untuk layout/main.php yang mungkin ada sidebar */
    .sidebar-nav {
        /* Gaya untuk sidebar navigation */
    }
    
    .nav-item {
        /* Gaya untuk item navigation */
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .dashboard-wrapper {
            padding: 20px;
            max-width: 100%;
        }
        
        .form-container {
            padding: 15px;
            gap: 20px;
        }
        
        .form-card {
            padding: 20px;
        }
        
        .form-actions {
            flex-direction: column;
            padding: 20px;
            gap: 12px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
            padding: 14px 20px;
        }
        
        .file-upload-container {
            min-height: 240px;
            padding: 25px 15px;
        }
        
        .header-title h1 {
            font-size: 24px;
        }
        
        .header-title p {
            font-size: 14px;
        }
    }
    
    @media (max-width: 480px) {
        .dashboard-header {
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .form-container {
            padding: 12px;
        }
        
        .form-card {
            padding: 18px;
        }
    }
</style>

<!-- Load Icon & Font -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<div class="dashboard-wrapper">
    <!-- HEADER -->
    <div class="dashboard-header">
        <div class="header-title">
            <h1><i class="fas fa-plus-circle"></i> Tambah Produk Baru</h1>
            <p>Lengkapi detail produk untuk menambah item baru ke katalog FengMarket</p>
        </div>
    </div>
    
    <!-- FORM 2 KOLOM -->
    <form action="/admin/products/store" method="post" enctype="multipart/form-data">
        <div class="form-container">
            <!-- KOLOM KIRI: FORM INPUT -->
            <div class="form-card left">
                <!-- NAMA PRODUK -->
                <div class="form-group">
                    <label for="name"><i class="fas fa-tag"></i> Nama Produk</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: RF 7 Hari atau 30 Hari" required autofocus>
                    <div class="form-hint">
                        <i class="fas fa-info-circle"></i> Beri nama yang jelas dan deskriptif
                    </div>
                    <?php if (isset($validation) && $validation->hasError('name')): ?>
                        <div class="error-message"><?= $validation->getError('name') ?></div>
                    <?php endif; ?>
                </div>
                
                <!-- HARGA -->
                <div class="form-group">
                    <label for="price"><i class="fas fa-money-bill-wave"></i> Harga (Rp)</label>
                    <input type="number" id="price" name="price" class="form-control" min="0" step="1000" placeholder="Contoh: 150000" required>
                    <div class="form-hint">
                        <i class="fas fa-info-circle"></i> Masukkan harga dalam Rupiah
                    </div>
                    <?php if (isset($validation) && $validation->hasError('price')): ?>
                        <div class="error-message"><?= $validation->getError('price') ?></div>
                    <?php endif; ?>
                </div>
                
                <!-- STOK -->
                <div class="form-group">
                    <label for="stock"><i class="fas fa-boxes"></i> Stok Tersedia</label>
                    <input type="number" id="stock" name="stock" class="form-control" min="0" placeholder="Jumlah unit yang tersedia" required>
                    <div class="form-hint">
                        <i class="fas fa-info-circle"></i> Stok akan berkurang otomatis saat ada pesanan
                    </div>
                    <?php if (isset($validation) && $validation->hasError('stock')): ?>
                        <div class="error-message"><?= $validation->getError('stock') ?></div>
                    <?php endif; ?>
                </div>
                
                <!-- DESKRIPSI -->
                <div class="form-group">
                    <label for="description"><i class="fas fa-align-left"></i> Deskripsi Produk</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Deskripsi detail tentang produk, spesifikasi, bahan, ukuran, dll..." rows="4"></textarea>
                    <div class="form-hint">
                        <i class="fas fa-info-circle"></i> Deskripsi membantu customer memahami produk Anda
                    </div>
                    <?php if (isset($validation) && $validation->hasError('description')): ?>
                        <div class="error-message"><?= $validation->getError('description') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- KOLOM KANAN: UPLOAD GAMBAR -->
            <div class="form-card right">
                <div class="upload-section">
                    <div class="upload-label">
                        <i class="fas fa-image"></i> Gambar Produk
                    </div>
                    
                    <div class="file-upload-container" id="uploadContainer">
                        <div class="file-upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="file-upload-text">
                            <h4>Unggah Gambar Produk</h4>
                            <p>Seret file ke sini atau klik untuk memilih gambar dari komputer Anda</p>
                        </div>
                        <div class="file-upload-btn" id="uploadButton">Pilih File</div>
                        <input type="file" id="image" name="image" accept="image/*" class="file-input-hidden" required>
                    </div>
                    
                    <!-- PREVIEW GAMBAR -->
                    <div class="image-preview-container" id="imagePreview">
                        <img id="previewImage" src="#" alt="Preview Gambar" class="image-preview">
                        <div class="preview-info">
                            <i class="fas fa-check-circle"></i> Gambar siap diupload
                        </div>
                    </div>
                    
                    <div class="upload-hint">
                        <i class="fas fa-info-circle"></i> Format: JPG, PNG, WEBP. Maksimal 5MB.
                    </div>
                    
                    <?php if (isset($validation) && $validation->hasError('image')): ?>
                        <div class="error-message"><?= $validation->getError('image') ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- FORM ACTIONS -->
        <div class="form-actions">
            <a href="/admin/products" class="btn btn-cancel">
                <i class="fas fa-times"></i> Batal
            </a>
            <button type="submit" class="btn btn-submit">
                <i class="fas fa-save"></i> Simpan Produk
            </button>
        </div>
    </form>
</div>

<!-- JAVASCRIPT UNTUK UPLOAD GAMBAR -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const uploadContainer = document.getElementById('uploadContainer');
        const uploadButton = document.getElementById('uploadButton');
        const fileInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');
        
        // Klik tombol atau container
        uploadButton.addEventListener('click', () => fileInput.click());
        uploadContainer.addEventListener('click', (e) => {
            if (e.target !== uploadButton && e.target !== fileInput) fileInput.click();
        });
        
        // Drag & drop
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadContainer.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            uploadContainer.classList.add('dragover');
        }
        
        function unhighlight() {
            uploadContainer.classList.remove('dragover');
        }
        
        // Handle file drop
        uploadContainer.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            fileInput.files = files;
            handleFiles(files);
            unhighlight();
        }
        
        // Handle file selection
        fileInput.addEventListener('change', function() {
            handleFiles(this.files);
        });
        
        function handleFiles(files) {
            if (files.length > 0) {
                const file = files[0];
                
                // Validasi ukuran file (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar! Maksimal 5MB.');
                    return;
                }
                
                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak didukung! Gunakan JPG, PNG, atau WEBP.');
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    imagePreview.style.display = 'block';
                    
                    // Update text
                    uploadContainer.querySelector('.file-upload-text h4').textContent = file.name;
                    uploadContainer.querySelector('.file-upload-text p').innerHTML = 
                        `<i class="fas fa-file-image"></i> ${formatBytes(file.size)}`;
                    
                    // Hide upload icon when preview is shown
                    uploadContainer.querySelector('.file-upload-icon').style.display = 'none';
                }
                
                reader.readAsDataURL(file);
            }
        }
        
        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(decimals)) + ' ' + sizes[i];
        }
        
        // Reset preview jika form direset
        const form = document.querySelector('form');
        form.addEventListener('reset', function() {
            imagePreview.style.display = 'none';
            previewImage.src = '#';
            uploadContainer.querySelector('.file-upload-icon').style.display = 'block';
            uploadContainer.querySelector('.file-upload-text h4').textContent = 'Unggah Gambar Produk';
            uploadContainer.querySelector('.file-upload-text p').innerHTML = 
                'Seret file ke sini atau klik untuk memilih gambar dari komputer Anda';
        });
    });
</script>

<?= $this->endSection() ?>