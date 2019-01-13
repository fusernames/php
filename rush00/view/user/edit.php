<?php $title = 'Editer '.htmlspecialchars($user['username']); ?>
<?php ob_start(); ?>

<form method="POST">
	Nom d'utilisateur<br>
	<input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>"><br>
	Nouveau mot de passe<br>
	<input type="text" name="newpasswd"><br>
	<?php if (userSecurity('edit_role', $user)) :?>
	Role<br>
	<select name="role">
		<option value="admin">ADMIN</option>
		<option value="user" <?php if ($user['role'] == 'user') : ?>selected<?php endif; ?>>USER</option>
	</select><br>
	<?php endif; ?>
	<input type="submit" value="Editer">
</form>
<a href="index.php?action=remove_user&id=<?= $user['id'] ?>"><button>Supprimer</button></a>

<?php $content = ob_get_clean(); ?>
<?php require BASE; ?>
