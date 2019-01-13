<?php $title = 'Mon panier'; ?>
<?php ob_start(); ?>

<?php if (isset($cart)) : ?>
<table>
	<tr>
		<th>Produit</th>
		<th>Prix</th>
		<th>Quantite</th>
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

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
