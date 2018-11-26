<?php $title = 'Log In' ?>

<?php ob_start() ?>
<h2>Login</h2>
<form method="POST">
	Username<br>
	<input type="text" name="username"><br>
	Password<br>
	<input type="text" name="passwd"><br>
	<input type="submit">
</form>
<?php $content = ob_get_clean() ?>
<?php require BASE ?>
