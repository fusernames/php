<?php $title = 'Mon panier'; ?>
<?php ob_start(); ?>

<h3><?= $title ?></h3>

<?php if (isset($cart)) : ?>
<table>
	<tr>
		<th>Produit</th>
		<th>Prix</th>
		<th>Quantite</th>
	</tr>
	<?php foreach ($cart as $elem) { ?>
	<tr style="text-align:center;">
		<td><?= htmlspecialchars($elem['name']) ?></td>
		<td><?= htmlspecialchars($elem['price']) ?></td>
		<td><?= $elem['quantity'] ?></td>
		<td><a href="index.php?action=remove_from_cart&id_product=<?= $elem['id'] ?>">Retirer</a></td>
	</tr>
	<?php } ?>
</table>
<a href="index.php?action=empty_cart"><button>Vider le panier</button></a>
<a href="index.php?action=add_order"><button>Commander</button></a>
<?php else : ?>
Votre panier est vide.
<?php endif; ?>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
