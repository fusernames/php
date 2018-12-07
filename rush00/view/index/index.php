<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>

<h3>Accueil</h3>
<div>
	<?php foreach($products as $product) { ?>
	<div class="product" style="display:inline-block; text-align:center;">
		<div><img src="<?= htmlspecialchars($product['img']) ?>" width="120px" height="auto"></div>
		<a href="index.php?action=show_product&id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name'])?></a><br>
		Prix : <?= htmlspecialchars($product['price']) ?><br>
		<button>Ajouter au panier</button>
	</div>
	<?php } ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
