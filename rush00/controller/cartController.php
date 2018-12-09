<?php

function showCartAction() {
	if (isset($_SESSION['cart'])) {
		foreach ($_SESSION['cart'] as $elem) {
			$cart[$elem['id']] = getDataById(DB_PRODUCTS, $elem['id']);
			$cart[$elem['id']]['quantity'] = $elem['quantity'];
		}
	}
	require VIEW.'cart/show.php';
}

function addToCartAction($id_product, $quantity = 1) {
	$product = getDataById(DB_PRODUCTS, $id_product);
	if (!$product)
		notFound();
	if (isset($_SESSION['cart'][$id_product])) {
		$_SESSION['cart'][$id_product]['quantity'] += $quantity;
	} else {
		$_SESSION['cart'][$id_product]['id'] = $id_product;
		$_SESSION['cart'][$id_product]['quantity'] = $quantity;
	}
	if ($_SERVER['HTTP_REFERER']) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: index.php?action=index');
	}
}

function removeFromCartAction($id_product) {
	$product = getDataById(DB_PRODUCTS, $id_product);
	if (!$product)
		notFound();
	unset($_SESSION['cart'][$id_product]);
	if ($_SERVER['HTTP_REFERER']) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: index.php?action=index');
	}
}

function emptyCartAction() {
	unset($_SESSION['cart']);
	$_SESSION['cart'] = array();
	if ($_SERVER['HTTP_REFERER']) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: index.php?action=index');
	}
}
