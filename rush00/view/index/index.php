<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>

<div>
	<?php foreach($products as $product) { ?>
	<div class="product" style="display:inline-block; text-align:center;">
		<div><img src="<?= htmlspecialchars($product['img']) ?>" width="120px" height="auto"></div>
		<a href="index.php?action=show_product&id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name'])?></a><br>
		Prix : <?= htmlspecialchars($product['price']) ?><br>
		<a href="index.php?action=add_to_cart&id_product=<?= $product['id'] ?>"><button>Ajouter au panier</button></a><br>
	</div>
	<?php } ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
