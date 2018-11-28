<?php

function indexAction() {
	require VIEW.'index/index.php';
	$products = getDatas(DB_PRODUCTS);
}
