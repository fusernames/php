<?php $title = 'Commande'; ?>
<?php ob_start(); ?>

<?php if ($orders): ?>
<table>
	<tr>
		<th>Utilisateur</th>
		<th>Id</th>
		<th>Date</th>
		<th>Total</th>
	</tr>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?= $order['user']['username'] ?></td>
		<td><?= $order['id'] ?></td>
		<td><?= date('j M Y H:i', $order['time']) ?></td>
		<td><?= $order['total'] ?></td>
		<?php if (orderSecurity('remove', $order)) : ?>
		<td>
			<a href="index.php?action=remove_order&id=<?= $order['id'] ?>"><button>Supprimer</button></a>
		</td>
		<?php endif; ?>
		<td>
			<a href="index.php?action=show_order&id=<?= $order['id'] ?>">Voir plus</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php else: ?>
Aucune commande trouvée.
<?php endif; ?>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
