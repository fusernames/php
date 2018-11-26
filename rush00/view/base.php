<html>
<head>
	<title>Rush00 - <?= $title; ?></title>
</head>
<header>
	<a href="index.php?action=index">Accueil</a>
	<?php if (isset($GLOBALS['USER'])) : ?>
	<a href="index.php?action=logout">logout</a>
	<a href="index.php?action=edit_user">Edit Profile</a> 
	<?php else : ?>
	<a href="index.php?action=login">Log In</a>
	<a href="index.php?action=register">Register</a>
	<?php endif; ?>
</header>
<body>
	<?= $content ?>
</body>
</html>
