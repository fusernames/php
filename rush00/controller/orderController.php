<?php

function addOrderAction() {
	global $CUR_USER;
	userOnly();
	if (isset($_SESSION['cart'])) {
		foreach ($_SESSION['cart'] as $elem) {
			$order[$elem['id']] = getDataById(DB_PRODUCTS, $elem['id']);
			$order[$elem['id']]['quantity'] = $elem['quantity'];
			$order['id_user'] = $CUR_USER['id'];
		}
		addData(DB_ORDERS, $order);
	}
	if ($_SERVER['HTTP_REFERER']) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: index.php?action=index');
	}
}

function removeOrderAction($id) {
	userOnly();
	$order = getDataById(DB_ORDERS, $id);
	if (!$order)
		notFound();
	if (orderSecurity('remove', $order)) {
		removeDataById(DB_ORDERS, $id);
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function showOrderAction($id) {
	userOnly();
	$order = getDataById(DB_ORDERS, $id);
	if (!$order)
		notFound();
	if (!orderSecurity('show', $order))
		exit('error');
	require VIEW.'order/show.php';
}

function listOrderAction($id_user = NULL) {
	userOnly();
	if (!orderSecurity('list', array('id_user' => $id_user))) {
		exit ('error');
	}
	$orders = getDatas(DB_ORDERS);
	if (isset($id_user))
		$orders = peelDatasEqual($orders, 'id_user', $id_user);
	require VIEW.'order/list.php';
}
