<?php

function showProduct($id) {
	$product = getDataById($id);
	require VIEW.'product/show.php';
}

function addProductAction() {
	adminOnly();
	if (isset($_POST['name'])) {
		addProduct();
	}
	require VIEW.'product/add.php';
}
?>
