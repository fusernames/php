<?php

require_once MODEL.'database.php';

function userOnly($action = 'login') {
	global $USER;
	if (!isset($USER)) {
		header('Location: index.php?action='.$action);
	}
}

function userSecurity($action, $id) {
	global $USER;
	if ($action == 'user_edit') {
		if ($USER['id'] == $id)
			return (TRUE);
		if ($USER['role'] == 'admin')
			return (TRUE);
	}
	if ($action == 'user_edit_role') {
		if ($USER['role'] == 'admin')
			return (TRUE);
	}
	if ($action == 'user_remove') {
		if ($USER['role'] == 'admin')
			return (TRUE);
	}
	return (FALSE);
}
