<?php $title = 'S\'enregistrer' ?>
<?php ob_start() ?>

<form method="POST">
	Nom d'utilisateur<br>
	<input type="text" name="username"><br>
	Mot de passe<br>
	<input type="password" name="passwd"><br>
	<input type="submit">
</form>

<?php $content = ob_get_clean() ?>
<?php require BASE ?>
