<?php

require_once MODEL.'order.php';

function addOrderAction() {
	global $CUR_USER;
	userOnly();
	if (isset($_SESSION['cart'])) {
		foreach ($_SESSION['cart'] as $elem) {
			$product = getDataById(DB_PRODUCTS, $elem['id']);
			if (!$product)
				notFound();
			$order['products'][$elem['id']] = $product;
			$order['products'][$elem['id']]['quantity'] = $elem['quantity'];
			$order['products'][$elem['id']]['total'] = $product['price'] * $elem['quantity'];
		}
		$order['id_user'] = $CUR_USER['id'];
		$order['time'] = time();
		$order['total'] = array_sum(array_column($order['products'], 'total'));
		unset($_SESSION['cart']);
		if (!checkOrder($order))
			exit('error');
		addData(DB_ORDERS, $order);
	}
	header('Location: '.'index.php?action=list_orders&id='.$CUR_USER['id']);
}

function removeOrderAction($id) {
	userOnly();
	$order = getDataById(DB_ORDERS, $id);
	if (!$order)
		return notFound();
	if (orderSecurity('remove', $order))
		removeDataById(DB_ORDERS, $id);
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function showOrderAction($id) {
	userOnly();
	$order = getDataById(DB_ORDERS, $id);
	if (!$order)
		return notFound();
	if (!orderSecurity('show', $order))
		exit('error');
	$order['user'] = getDataById(DB_USERS, $order['id_user']);
	require VIEW.'order/show.php';
}

function listOrderAction($id_user = NULL) {
	global $CUR_USER;
	userOnly();
	if ($CUR_USER['role'] != 'admin')
		$id_user = $CUR_USER['id'];
	if (!orderSecurity('list', array('id_user' => $id_user)))
		return unAuthorized();
	$orders = getDatas(DB_ORDERS);
	if ($id_user)
		$orders = peelDatasEqual($orders, 'id_user', $id_user);
	foreach ($orders as $key => $order) {
		$orders[$key]['user'] = getDataById(DB_USERS, $order['id_user']);
	}
	require VIEW.'order/list.php';
}

function removeFromOrder($id, $id_product)
{
	adminOnly();
	$order = getDataById(DB_ORDERS, $id);
	if (!$order)
		return notFound();
	unset($order['products'][$id_product]);
	$order['total'] = array_sum(array_column($order['products'], 'total'));
	editData(DB_ORDERS, $order);
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function addToOrder($id)
{
	adminOnly();
	$order = getDataById(DB_ORDERS, $id);
	if (!$order)
		return notFound();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$product = getDataById(DB_PRODUCTS, $_POST['id_product']);
		if (!$product)
			return notFound();
		$order['products'][$product['id']] = $product;
		$order['products'][$product['id']]['quantity'] = $_POST['quantity'];
		$order['products'][$product['id']]['total'] = $product['price'] * $_POST['quantity'];
		$order['total'] = array_sum(array_column($order['products'], 'total'));
		if (!checkOrder($order))
			exit('error');
		editData(DB_ORDERS, $order);
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
}
