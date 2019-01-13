<?php

function showCartAction() {
	$total = 0;
	if (isset($_SESSION['cart'])) {
		foreach ($_SESSION['cart'] as $elem) {
			$product = getDataById(DB_PRODUCTS, $elem['id']);
			if (!$product) {
				removeFromCartAction($elem['id']);
			} else {
				$cart[$elem['id']] = getDataById(DB_PRODUCTS, $elem['id']);
				$cart[$elem['id']]['quantity'] = $elem['quantity'];
				$cart[$elem['id']]['total'] = $product['price'] * $elem['quantity'];
				$total += $cart[$elem['id']]['total'];
			}
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
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function removeFromCartAction($id_product) {
	unset($_SESSION['cart'][$id_product]);
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function emptyCartAction() {
	unset($_SESSION['cart']);
	$_SESSION['cart'] = array();
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function addOneToCartAction($id_product)
{
	if (isset($_SESSION['cart'][$id_product])) {
		$_SESSION['cart'][$id_product]['quantity'] += 1;
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function removeOneFromCartAction($id_product)
{
	if (isset($_SESSION['cart'][$id_product])) {
		if ($_SESSION['cart'][$id_product]['quantity'] > 1)
			$_SESSION['cart'][$id_product]['quantity'] -= 1;
		else
			unset($_SESSION['cart'][$id_product]);
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
}
