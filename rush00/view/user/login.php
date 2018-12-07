<?php $title = 'Log In' ?>
<?php ob_start() ?>
<h3>Login</h3>
<form method="POST">
	Username<br>
	<input type="text" name="username"><br>
	Password<br>
	<input type="text" name="passwd"><br>
	<input type="submit">
</form>
<?php $content = ob_get_clean() ?>
<?php require BASE ?>
