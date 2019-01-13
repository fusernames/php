<?php $title = 'Editer '.htmlspecialchars($category['name']); ?>
<?php ob_start(); ?>

<form method="POST">
	Nom<br>
	<input type="text" name="name" value="<?= htmlspecialchars($category['name']) ?>"><br>
	<input type="submit" value="Editer">
</form>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
