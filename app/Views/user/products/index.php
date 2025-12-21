<?= $this->extend('user/layout/main') ?>
<?= $this->section('content') ?>

<h2 style="margin-bottom:30px;">🔥 Produk Digital FENGMARKET</h2>

<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:25px;">
    
    <?php foreach ($products as $product): ?>
    <div style="
        background:#112240;
        border-radius:16px;
        padding:20px;
        border:1px solid rgba(100,255,218,0.15);
    ">
        <?php if ($product['image']): ?>
            <img src="<?= base_url('uploads/products/' . $product['image']) ?>"
                 style="width:100%;border-radius:12px;margin-bottom:15px;">
        <?php endif; ?>

        <h3 style="font-size:16px;"><?= esc($product['name']) ?></h3>

        <p style="color:#00ffcc;font-weight:700;">
            Rp <?= number_format($product['price'], 0, ',', '.') ?>
        </p>

        <p style="font-size:13px;color:#a8b2d1;">
            Stok: <?= $product['stock'] ?> unit
        </p>

        <a href="/products/<?= $product['id'] ?>"
           style="
            display:block;
            margin-top:15px;
            padding:10px;
            background:#00ffcc;
            color:#0a192f;
            text-align:center;
            border-radius:10px;
            text-decoration:none;
            font-weight:700;
           ">
            Lihat Detail
        </a>
    </div>
    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>
