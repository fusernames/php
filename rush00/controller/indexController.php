<?php

function indexAction() {
	$products = getDatas(DB_PRODUCTS);
	require VIEW.'index/index.php';
}
