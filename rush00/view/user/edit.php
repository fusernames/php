<?php $title = 'Editer '.htmlspecialchars($user['username']); ?>
<?php ob_start(); ?>

<h2>Editer <?= htmlspecialchars($user['username']) ?></h2>
<form method="POST">
	Username<br>
	<input type="text" name="username" value="<?= $GLOBALS['CUR_USER']['username'] ?>"><br>
	New password<br>
	<input type="text" name="newpasswd"><br>
	<?php if (userSecurity('user_edit_role', $id)) :?>
	<select name="group">
		<option value="user">USER</option>
		<option value="admin">ADMIN</option>
	</select>
	<?php endif ?>
	<input type="submit" value="Editer">
</form>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
