<?php $title = 'Register' ?>
<?php ob_start() ?>

<h2>Register</h2>
<form method="POST">
	Username<br>
	<input type="text" name="username"><br>
	Password<br>
	<input type="text" name="passwd"><br>
	<input type="submit">
</form>

<?php $content = ob_get_clean() ?>
<?php require BASE ?>
