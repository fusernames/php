<?php

function checkProduct($product) {
	if (!isset($product['name']) || !isset($product['img'])
		|| !isset($product['price']) || !isset($product['stock']))
		return (FALSE);
	if (!$product['name'] || !$product['img'])
		return (FALSE);
	if (!is_numeric($product['price']))
		return (FALSE);
	if (!is_numeric($product['stock']) || $product['stock'] <= 0)
		return (FALSE);
	if ($product['category_1']
		&& !getDataById(DB_CATEGORIES, $product['category_1']))
		return (FALSE);
	if ($product['category_2']
		&& !getDataById(DB_CATEGORIES, $product['category_2']))
		return (FALSE);
	return (TRUE);
}

function hydrateProduct($product = NULL) {
	$product['name'] = $_POST['name'];
	$product['description'] = $_POST['description'];
	$product['img'] = $_POST['img'];
	$product['price'] = $_POST['price'];
	$product['stock'] = $_POST['stock'];
	$product['category_1'] = $_POST['category_1'];
	$product['category_2'] = $_POST['category_2'];
	return ($product);
}

function addProduct() {
	if (!checkProduct($_POST))
		exit('errorr');
	$product = hydrateProduct();
	addData(DB_PRODUCTS, $product);
}

function editProduct($product) {
	if (!checkProduct($_POST))
		exit('error');
	hydrateProduct($product);
	editData(DB_PRODUCTS, $product);
}

?>
