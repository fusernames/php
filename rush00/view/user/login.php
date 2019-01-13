<?php $title = 'Connexion' ?>
<?php ob_start() ?>

<form method="POST">
	Nom d'utilisateur<br>
	<input type="text" name="username"><br>
	Mot de passe<br>
	<input type="text" name="passwd"><br>
	<input type="submit" name="Valider">
</form>

<?php $content = ob_get_clean() ?>
<?php require BASE ?>
