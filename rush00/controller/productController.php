<?php

require_once MODEL.'product.php';

function showProduct($id) {
	$product = getDataById($id);
	require VIEW.'product/show.php';
}

function addProductAction() {
	adminOnly();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		addProduct();
	$categories = getDatas(DB_CATEGORIES);
	require VIEW.'product/add.php';
}

function editProductAction($id) {
	adminOnly();
	$product = getDataById(DB_PRODUCTS, $id);
	if (!$product)
		notFound();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		editProduct($id);
	$categories = getDatas(DB_CATEGORIES);
	require VIEW.'product/edit.php';
}

function removeProductAction($id) {
	adminOnly();
	$product = getDataById(DB_PRODUCTS, $id);
	if (!$product)
		notFound();
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
