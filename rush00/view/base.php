<html>
<head>
	<title>Rush00 - <?= $title; ?></title>
	<style>
		body {
			font-family:Sans-Serif, Arial;
		} 
	</style>
</head>
	<header style="margin-bottom:20px;">
		<h2>Rush00 - Le i commerce ^^</h2>
		<a href="index.php?action=index">Accueil</a>
		<a href="index.php?action=list_products">Produits</a>
		<?php if (isset($GLOBALS['CUR_USER'])) : ?>
		<a href="index.php?action=logout">Deconnexion</a>
		<a href="index.php?action=edit_user">Editer profile</a> 
		<?php else : ?>
		<a href="index.php?action=login">Connexion</a>
		<a href="index.php?action=register">Inscription</a>
		<?php endif; ?>
		<?php if (isset($GLOBALS['CUR_USER']) && productSecurity('create')) : ?>
		<a href="index.php?action=add_product">Nouveau produit</a> 
		<?php endif; ?>
	</header>
	<?= $content; ?>
</body>
</html>
