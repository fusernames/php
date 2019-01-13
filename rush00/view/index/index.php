<?php $title = 'Accueil'; ?>
<?php ob_start(); ?>

<?php if (isset($GLOBALS['CUR_USER'])) : ?>
<h4 style="margin-top:30px">Bienvenue <?= htmlspecialchars($GLOBALS['CUR_USER']['username']) ?></h4>
<?php else : ?>
<?php endif; ?>

<h3 style="margin-top:30px">Votre panier</h3>
<?php if (isset($cart)) : ?>
<table>
	<tr>
		<th>Produit</th>
		<th>Prix</th>
		<th>Quantité</th>
		<th>Total</th>
	</tr>
	<?php foreach ($cart as $elem) : ?>
	<tr>
		<td><?= htmlspecialchars($elem['name']) ?></td>
		<td><?= $elem['price'] ?></td>
		<td><?= $elem['quantity'] ?></td>
		<td><?= $elem['total'] ?></td>
		<td>
			<a href="index.php?action=remove_1_from_cart&id_product=<?= $elem['id'] ?>"><button>-1</button></a>
			<a href="index.php?action=add_1_to_cart&id_product=<?= $elem['id'] ?>"><button>+1</button></a>
		</td>
		<td><a href="index.php?action=remove_from_cart&id_product=<?= $elem['id'] ?>">Retirer</a></td>
	</tr>
	<?php endforeach; ?>
	<?php if ($total != '0') : ?>
	<tr>
		<td colspan="3"><b>Total</b></td>
		<td><?= $total ?></td>
	</tr>
	<?php endif; ?>
</table>
<a href="index.php?action=empty_cart"><button>Vider le panier</button></a>
<a href="index.php?action=add_order"><button>Commander</button></a>
<?php else : ?>
Votre panier est vide.
<?php endif; ?>

<h3 style="margin-top:30px;text-align:center;">Derniers produits</h3>
<div style="text-align:center">
	<?php foreach($products as $product) { ?>
	<div class="product" style="display:inline-block; text-align:center;">
		<div><img src="<?= htmlspecialchars($product['img']) ?>" width="120px" height="auto"></div>
		<a href="index.php?action=show_product&id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name'])?></a><br>
		Prix : <?= htmlspecialchars($product['price']) ?><br>
		<form method="get" action="index.php">
			<input type="hidden" name="action" value="add_to_cart">
			<input type="hidden" name="id_product" value="<?= $product['id'] ?>">
			<input style="width:30px; text-align:center;" type="number" name="quantity" value="1" min="1"><br>
			<button>Ajouter au panier</button>
		</form>
	</div>
	<?php } ?>
</div>

<?php foreach ($categories as $category) : ?>
<h3 style="margin-top:30px;text-align:center;"><?= $category['name'] ?></h3>
	<div style="text-align:center">
	<?php foreach($products as $product) : ?>
		<?php if ($product['category_1'] == $category['id'] || $product['category_2'] == $category['id']) : ?>
		<div class="product" style="display:inline-block; text-align:center;">
			<div><img src="<?= htmlspecialchars($product['img']) ?>" width="120px" height="auto"></div>
			<a href="index.php?action=show_product&id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name'])?></a><br>
			Prix : <?= htmlspecialchars($product['price']) ?><br>
			<form method="get" action="index.php">
				<input type="hidden" name="action" value="add_to_cart">
				<input type="hidden" name="id_product" value="<?= $product['id'] ?>">
				<input style="width:30px; text-align:center;" type="number" name="quantity" value="1" min="1"><br>
				<button>Ajouter au panier</button>
			</form>
		</div>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
