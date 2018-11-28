<html>
<head>
	<title>Rush00 - <?= $title; ?></title>
</head>
	<header>
		<a href="index.php?action=index">Accueil</a>
		<?php if (isset($GLOBALS['CUR_USER'])) : ?>
		<a href="index.php?action=logout">Deconnexion</a>
		<a href="index.php?action=user_edit">Editer profile</a> 
		<?php else : ?>
		<a href="index.php?action=login">Connexion</a>
		<a href="index.php?action=register">Inscription</a>
		<?php endif; ?>
		<?php if (isset($GLOBALS['CUR_USER']) && $GLOBALS['CUR_USER']['role'] == 'admin') : ?>
		<a href="">Administration</a>
		<?php endif; ?>
	</header>
	<?= $content; ?>
</body>
</html>
