<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Rush00 - <?= $title; ?></title>
	<style>
		body {
			font-family:Sans-Serif, Arial;
			margin:15px;
		}
		a {
			text-decoration:none;
			color:#2e86de;
		}
		header a {
			padding: 0 6px;
		}
		table {
			text-align: left !important;
		}
		table th {
			padding:5px 10px;
		}
		table td {
			padding:5px 10px;
		}
		h1, h2, h3, h4 {
			font-weight:normal;
		}
	</style>
</head>
<body>
	<header style="margin-bottom:30px;">
		<h2>Rush00, Le I commerce</h2>
		<a href="index.php?action=index">Accueil</a>
		<a href="index.php?action=list_products">Produits</a>
		<a href="index.php?action=show_cart">Panier(<?= count($_SESSION['cart']) ?>)</a>
		<?php if (isset($GLOBALS['CUR_USER'])) : ?>
		<a href="index.php?action=list_orders&id_user=<?= $GLOBALS['CUR_USER']['id'] ?>">Mes commandes</a>
		<a href="index.php?action=edit_user">Editer profil</a>
		<?php if ($GLOBALS['CUR_USER']['role'] == 'admin') : ?>
		<a href="index.php?action=administration">Administration</a>
		<?php endif; ?>
		<span style="float:right;">
			<a href="index.php?action=logout">Déconnexion</a>
		</span>
		<?php else : ?>
		<span style="float:right;">
			<a href="index.php?action=login">Connexion</a>
			<a href="index.php?action=register">Inscription</a>
		</span>
		<?php endif; ?>
	</header>
	<h4 style="text-align:center;"><em><?= $title ?></em></h4>
	<?= $content; ?>
</body>
</html>
