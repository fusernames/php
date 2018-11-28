<?php $title = 'Nouvelle categorie'; ?>
<?php ob_start(); ?>

<h2>Nouvelle categorie</h2>
<form method="POST">
	Name<br>
	<input type="text" name="name"><br>
	<input type="submit" value="Ajouter">
</form>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
