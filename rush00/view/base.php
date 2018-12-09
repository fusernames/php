<html>
<head>
	<title>Rush00 - <?= $title; ?></title>
	<style>
		body {
			font-family:Sans-Serif, Arial;
		} 
	</style>
</head>
<body>
	<header style="margin-bottom:20px;">
		<h2>Rush00 - Le i commerce ^^</h2>
		<a href="index.php?action=index">Accueil</a>
		<a href="index.php?action=list_products">Produits</a>
		<a href="index.php?action=show_cart">Panier</a>
		<?php if (isset($GLOBALS['CUR_USER'])) : ?>
		<a href="index.php?action=edit_user">Editer profil</a> 
		<a href="index.php?action=logout">Deconnexion</a>
		<?php else : ?>
		<a href="index.php?action=login">Connexion</a>
		<a href="index.php?action=register">Inscription</a>
		<?php endif; ?>
	</header>
	<?= $content; ?>
</body>
</html>
