<?php $title = 'Register' ?>
<?php ob_start() ?>

<h3>Creer un compte</h3>
<form method="POST">
	Username<br>
	<input type="text" name="username"><br>
	Password<br>
	<input type="text" name="passwd"><br>
	<input type="submit">
</form>

<?php $content = ob_get_clean() ?>
<?php require BASE ?>
