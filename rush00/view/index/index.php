<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>

<div>
	<?php foreach($products as $product) { ?>
	<div class="product">
		<img src="<?= htmlspecialchars($product['img']) ?>">
		<a href="index.php?action=product_show&id="<?= $product['id'] ?>><?= $product['name']?></a>
		<p>Prix : <?= $product['price'] ?></p>
	</div>
	<?php } ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
