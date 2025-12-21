<?= $this->extend('user/layout/main') ?>
<?= $this->section('content') ?>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;">

    <!-- GAMBAR -->
    <div>
        <?php if ($product['image']): ?>
            <img src="<?= base_url('uploads/products/' . $product['image']) ?>"
                 style="width:100%;border-radius:16px;">
        <?php endif; ?>
    </div>

    <!-- INFO -->
    <div>
        <h2><?= esc($product['name']) ?></h2>

        <p style="color:#00ffcc;font-size:22px;font-weight:700;">
            Rp <?= number_format($product['price'], 0, ',', '.') ?>
        </p>

        <p style="margin-top:10px;color:#a8b2d1;">
            Stok tersedia: <?= $product['stock'] ?> unit
        </p>

        <hr style="margin:25px 0;border-color:rgba(255,255,255,0.1);">

        <p style="white-space:pre-line;color:#e6f1ff;">
            <?= esc($product['description']) ?>
        </p>

        <!-- CTA -->
        <a href="https://wa.me/628xxxxxxxxxx?text=Halo Admin, saya tertarik dengan produk <?= urlencode($product['name']) ?>"
           target="_blank"
           style="
            display:inline-block;
            margin-top:30px;
            padding:14px 30px;
            background:#00ffcc;
            color:#0a192f;
            border-radius:12px;
            font-weight:700;
            text-decoration:none;
           ">
            💬 Chat Admin via WhatsApp
        </a>
    </div>

</div>

<?= $this->endSection() ?>
