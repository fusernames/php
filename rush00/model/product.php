<?php

require_once MODEL.'database.php';
require_once MODEL.'security.php';

function checkProduct($product) {
	if (!isset($product['name']) || !isset($product['img']) || !isset($product['price']))
		return (FALSE);
	if (!$product['name'] || !$product['img'])
		return (FALSE);
	if (!is_numeric($product['price']))
		return (FALSE);
	if ($product['category_1'] && !getDataById(DB_CATEGORIES, $product['category_1']))
		return (FALSE);
	if ($product['category_2'] != $product['category_1'] && $product['category_2']
		&& getDataById(DB_CATEGORIES, $_POST['category_2']))
		return (FALSE);
	return (TRUE);
}

function addProduct() {
	$product['name'] = $_POST['name'];
	$product['description'] = $_POST['description'];
	$product['img'] = $_POST['img'];
	$product['price'] = $_POST['price'];
	$product['category_1'] = $_POST['category_1'];
	$product['category_2'] = $_POST['category_2'];
	if (!checkProduct($product))
		exit('error');
	addData(DB_PRODUCTS, $product)
}

function editProduct($edit) {
	$product['name'] = $_POST['name'];
	$product['description'] = $_POST['description'];
	$product['img'] = $_POST['img'];
	$product['price'] = $_POST['price'];
	$product['category_1'] = $_POST['category_1'];
	$product['category_2'] = $_POST['category_2'];
	if (!checkProduct($product))
		exit('error');
	editData(DB_PRODUCTS, $id, $product)
}

?>
