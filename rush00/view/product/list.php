<?php $title = 'Produits'; ?>
<?php ob_start(); ?>

<h3>Liste des produits</h3>

<form method="GET">
	<input type="hidden" name="action" value="list_products">
	<input type="text" name="name" value="<?php if (isset($_GET['name'])) { echo htmlspecialchars($_GET['name']); } ?>">
	<select name="category">
		<option value="">Aucun</option>
		<?php foreach ($categories as $category) { ?>
		<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
		<?php } ?>
	</select>
	<input type="submit" value="Rechercher">
</form>

<div>
	<?php foreach($products as $product) { ?>
	<div class="product" style="display:inline-block; text-align:center;">
		<div><img src="<?= htmlspecialchars($product['img']) ?>" width="120px" height="auto"></div>
		<a href="index.php?action=show_product&id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name'])?></a><br>
		Prix : <?= htmlspecialchars($product['price']) ?><br>
		<button>Ajouter au panier</button><br>
		<?php if (productSecurity('edit', $product)) : ?>
		<a href="">Editer</a><br>
		<?php endif; ?>
		<?php if (productSecurity('remove', $product)) : ?>
		<a href="">Supprimer</a><br>
		<?php endif; ?>
	</div>
	<?php } ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
