<!DOCTYPE html>
<html>
<head>
    <title>FENGMARKET</title>
</head>
<body>

<h1>Daftar Produk</h1>

<?php if (empty($products)) : ?>
    <p>Belum ada produk.</p>
<?php else : ?>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li>
                <strong><?= esc($product['name']) ?></strong><br>
                Harga: Rp <?= number_format($product['price']) ?><br>
                <?= esc($product['description']) ?>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
