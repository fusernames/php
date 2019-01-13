<?php

require_once MODEL.'database.php';

function checkProduct($product) {
	if (!isset($product['name']) || !isset($product['img'])
		|| !isset($product['price']))
		return (FALSE);
	if (!$product['name'] || !$product['img'])
		return (FALSE);
	if (!is_numeric($product['price']))
		return (FALSE);
	if ($product['category_1']
		&& !(getDataById(DB_CATEGORIES, $product['category_1'])))
		return (FALSE);
	if ($product['category_2']
		&& !(getDataById(DB_CATEGORIES, $product['category_2'])))
		return (FALSE);
	if ($product['category_1'] && $product['category_2']
		&& $product['category_1'] == $product['category_2'])
		return (FALSE);
	return (TRUE);
}

function hydrateProduct($tab, $product = NULL) {
	$product['name'] = $tab['name'];
	$product['description'] = $tab['description'];
	$product['img'] = $tab['img'];
	$product['price'] = $tab['price'];
	$product['category_1'] = $tab['category_1'];
	$product['category_2'] = $tab['category_2'];
	return ($product);
}

function addProduct($tab = NULL) {
	if ($tab === NULL && isset($_POST))
		$tab = $_POST;
	$product = hydrateProduct($tab);
	if (!checkProduct($product))
		exit('Produit invalide');
	addData(DB_PRODUCTS, $product);
}

function editProduct($product) {
	$product = hydrateProduct($_POST, $product);
	if (!checkProduct($product))
		exit('Produit invalide');
	editData(DB_PRODUCTS, $product);
}
