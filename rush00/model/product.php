<?php

require_once MODEL.'database.php';
require_once MODEL.'security.php';

function addProduct() {
	if (!isset($_POST['name']) || !isset($_POST['img']) || !isset($_POST['price'])) {
		return (1);
	}
	$product['name'] = $_POST['name'];
	$product['description'] = $_POST['description'];
	$product['img'] = $_POST['img'];
	$product['price'] = $_POST['price'];
	if ($_POST['category_1'] && getDataById(DB_CATEGORIES, $_POST['category_1']))
		$product['category_1'] = $_POST['category_1'];
	if ($_POST['category_2'] != $_POST['category_1'] && $_POST['category_2'] && getDataById(DB_CATEGORIES, $_POST['category_2']))
		$product['category_2'] = $_POST['category_2'];
	addData(DB_PRODUCTS, $product)	
}
?>
