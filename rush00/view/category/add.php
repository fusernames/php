<?php $title = 'Nouvelle categorie'; ?>
<?php ob_start(); ?>

<form method="POST">
	Nom<br>
	<input type="text" name="name"><br>
	<input type="submit" value="Ajouter">
</form>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
