<h1>FENGMARKET</h1>

<?php if (empty($products)) : ?>
    <p>Belum ada produk.</p>
<?php else : ?>
    <?php foreach ($products as $product) : ?>
        <h3><?= $product['name'] ?></h3>
        <p>Harga: Rp <?= number_format($product['price']) ?></p>
        <p><?= $product['description'] ?></p>
        <hr>
    <?php endforeach ?>
<?php endif ?>