<?php $title = 'Commandes '.$order['id']; ?>
<?php ob_start(); ?>

<?php if (isset($order)) : ?>
<p>
  <?= date('\l\e j M Y à H\hi', $order['time']) ?> par <b><?= $order['user']['username'] ?></b>(<?= $order['id_user'] ?>)
</p>
<table>
	<tr>
		<th>Produit</th>
		<th>Prix</th>
		<th>Quantite</th>
		<th>Total</th>
	</tr>
	<?php foreach ($order['products'] as $elem) : ?>
	<tr>
		<td><?= htmlspecialchars($elem['name']) ?></td>
		<td><?= $elem['price'] ?></td>
		<td><?= $elem['quantity'] ?></td>
		<td><?= $elem['total'] ?></td>
    <?php if (orderSecurity('remove', $order)) : ?>
    <td><a href="index.php?action=remove_from_order&id=<?= $order['id'] ?>&id_product=<?= $elem['id'] ?>"><button>Retirer</button></a></td>
    <?php endif; ?>
	</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="3"><b>Total</b></td>
		<td><?= $order['total'] ?></td>
	</tr>
</table>
<br>
<?php if (orderSecurity('remove', $order)) : ?>
<form method="POST" action="index.php?action=add_to_order&id=<?= $order['id'] ?>">
  Id produit :<br>
  <input type="text" name="id_product"><br>
  Quantité :<br>
  <input type="text" name="quantity"><br>
  <input type="submit" value="Ajouter à la commande"><br>
</form>
<?php endif; ?>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
