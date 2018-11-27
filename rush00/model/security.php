<?php

require_once MODEL.'database.php';

function userOnly($action = 'login') {
	global $CUR_USER;
	if (!isset($CUR_USER)) {
		header('Location: index.php?action='.$action);
	}
}

function adminOnly($action = 'index') {
	global $CUR_USER;
	userOnly();
	if ($CUR_USER['role'] == 'admin')
		return (TRUE);
	header('Location: index.php?action='.$action);
}

function userSecurity($action, $id) {
	global $CUR_USER;
	if ($action == 'user_edit') {
		if ($CUR_USER['id'] == $id)
			return (TRUE);
		if ($CUR_USER['role'] == 'admin')
			return (TRUE);
	}
	if ($action == 'user_edit_role') {
		if ($CUR_USER['role'] == 'admin')
			return (TRUE);
	}
	if ($action == 'user_remove') {
		if ($CUR_USER['role'] == 'admin')
			return (TRUE);
	}
	return (FALSE);
}

function productSecurity($action, $id) {
	if ($CUR_USER['role'] == 'admin') {
		return TRUE;
}
