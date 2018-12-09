<?php $title = 'Nouvelle categorie'; ?>
<?php ob_start(); ?>

<h3>Nouvelle categorie</h3>
<form method="POST">
	Name<br>
	<input type="text" name="name"><br>
	<input type="submit" value="Ajouter">
</form>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
