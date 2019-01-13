<?php

function indexAction() {
	$products = getDatas(DB_PRODUCTS);
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
			$total = array_sum(array_column($cart, 'total'));
		}
	}
	$categories = getDatas(DB_CATEGORIES);
	require VIEW.'index/index.php';
}
