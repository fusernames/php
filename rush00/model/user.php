<?php

function checkUser($user, $checkDouble = TRUE) {
	if (!isset($user['username']) || !isset($user['passwd']) || !isset($user['role']))
		return FALSE;
	if (!$user['username'] || !$user['passwd'] || !$user['role'])
		return FALSE;
	if ($user['role'] != 'admin' && $user['role'] != 'user')
		return FALSE;
	if ($checkDouble) {
		$test = getDataBy(DB_USERS, 'username', $user['username']);
		if ($test) {
			return FALSE;
		}
	}
	return TRUE;
}

function register($username, $passwd, $role = 'user') {
	$new['username'] = $username;
	$new['passwd'] = hash('whirlpool', $passwd);
	$new['role'] = $role;
	if (!checkUser($new))
		exit ('error');
	addData(DB_USERS, $new);
}

function editUser($id) {
	$edited = getDataById(DB_USERS, $id);
	$oldusername = $edited['username'];
	$edited['username'] = $_POST['username'];
	if (isset($_POST['newpasswd']) && $_POST['newpasswd'])
		$edited['passwd'] = hash('whirlpool', $_POST['newpasswd']);
	if (userSecurity('user_edit_role', $id))
		$edited['role'] = $_POST['role'];
	if ($edited['username'] != $oldusername) {
		if (!checkUser($edited))
			exit ('error');
	} else {
		if (!checkUser($edited, FALSE))
			exit ('errorr');
	}
	editData(DB_USERS, $edited);
}

function login($username, $passwd) {
	$passwd = hash('whirlpool', $passwd);
	$datas = getDatas(DB_USERS);
	foreach ($datas as $data) {
		if ($data['username'] == $username && $data['passwd'] == $passwd) {
			$_SESSION['id'] = $data['id'];
			return;
		}
	}
	exit('error');
}

