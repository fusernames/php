<form method="POST">
	Username<br>
	<input type="text" name="username" value="<?= $GLOBALS['USER']['username'] ?>"><br>
	New password<br>
	<input type="text" name="passwd"><br>
	<?php if (userSecurity('user_edit_role', $id)) :?>
	<select name="group">
		<option value="user">USER</option>
		<option value="admin">ADMIN</option>
	</select>
	<?php endif ?>
	<input type="submit" value="Edit user">
</form>