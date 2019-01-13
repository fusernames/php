<?php

require_once MODEL.'database.php';

function notFound() {
	exit('Ressource not found');
}

function unAuthorized() {
	exit('unAuthorized');
}

function userOnly($action = 'login') {
	global $CUR_USER;
	if (!isset($CUR_USER)) {
		header('Location: index.php?action='.$action);
		exit();
	}
}

function adminOnly($action = 'index') {
	global $CUR_USER;
	userOnly();
	if ($CUR_USER['role'] == 'admin')
		return TRUE;
	header('Location: index.php?action='.$action);
	exit();
}

function userSecurity($action, $user) {
	global $CUR_USER;
	if (!isset($CUR_USER))
		return FALSE;
	if ($action == 'edit') {
		if ($CUR_USER['id'] == $user['id'])
			return TRUE;
		if ($CUR_USER['role'] == 'admin')
			return TRUE;
	}
	if ($action == 'edit_role') {
		if ($CUR_USER['role'] == 'admin')
			return TRUE;
	}
	if ($action == 'remove') {
		if ($CUR_USER['role'] == 'admin')
			return TRUE;
	}
	return FALSE;
}

function productSecurity($action, $product = NULL) {
	global $CUR_USER;
	if (!isset($CUR_USER))
		return FALSE;
	if ($CUR_USER['role'] == 'admin') {
		return TRUE;
	}
	return FALSE;
}

function orderSecurity($action, $order) {
	global $CUR_USER;
	if (!isset($CUR_USER))
		return FALSE;
	if ($CUR_USER['role'] == 'admin')
		return TRUE;
	if ($action == 'show' && $order['id_user'] == $CUR_USER['id'])
		return TRUE;
	if ($action == 'list' && $order['id_user'] && $order['id_user'] == $CUR_USER['id'])
		return TRUE;
	return FALSE;
}
