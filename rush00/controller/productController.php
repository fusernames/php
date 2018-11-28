<?php

require_once MODEL.'database.php';
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
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		editProduct($id);
	$product = getDataById(DB_PRODUCTS, $id);
	$categories = getDatas(DB_CATEGORIES);
	require VIEW.'product/edit.php';
}

function removeProductAction($id) {
	adminOnly();
	removeDataById(DB_PRODUCTS, $id);
	if ($_SERVER['HTTP_REFERER']) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: index.php?action=index');
	}
}
?>
