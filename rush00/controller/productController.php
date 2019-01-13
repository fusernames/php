<?php

require_once MODEL.'product.php';

function showProductAction($id = 0) {
	$product = getDataById(DB_PRODUCTS, $id);
	if (!$product)
		return notFound();
	if ($product['category_1'])
		$product['category_1'] = getDataById(DB_CATEGORIES, $product['category_1']);
	if ($product['category_2'])
		$product['category_2'] = getDataById(DB_CATEGORIES, $product['category_2']);
	require VIEW.'product/show.php';
}

function addProductAction() {
	adminOnly();
	if (!productSecurity('add', $product))
		return unAuthorized();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		addProduct();
	$categories = getDatas(DB_CATEGORIES);
	require VIEW.'product/add.php';
}

function editProductAction($id) {
	adminOnly();
	$product = getDataById(DB_PRODUCTS, $id);
	if (!$product)
		return notFound();
	if (!productSecurity('edit', $product))
		return unAuthorized();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		editProduct($product);
	$categories = getDatas(DB_CATEGORIES);
	$product = getDataById(DB_PRODUCTS, $id);
	require VIEW.'product/edit.php';
}

function removeProductAction($id) {
	adminOnly();
	$product = getDataById(DB_PRODUCTS, $id);
	if (!$product)
		return notFound();
	if (!productSecurity('delete', $product))
		return unAuthorized();
	removeDataById(DB_PRODUCTS, $id);
	if ($_SERVER['HTTP_REFERER']) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: index.php?action=index');
	}
}

function listProductsAction() {
	$products = getDatas(DB_PRODUCTS);
	$categories = getDatas(DB_CATEGORIES);
	if (isset($_GET['category']) && getDataById(DB_CATEGORIES, $_GET['category'])) {
		peelDatasEqual($products, 'category_1', $_GET['category'], 'category_2');
	}
	if (isset($_GET['name']) && $_GET['name']) {
		peelDatasContains($products, 'name', $_GET['name']);
	}
	require VIEW.'product/list.php';
}
