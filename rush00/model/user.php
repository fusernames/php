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
		exit ('Utilisateur invalide');
	addData(DB_USERS, $new);
}

function editUser($user) {
	$oldusername = $user['username'];
	$user['username'] = $_POST['username'];
	if (isset($_POST['newpasswd']) && $_POST['newpasswd'])
		$user['passwd'] = hash('whirlpool', $_POST['newpasswd']);
	if (userSecurity('edit_role', $user))
		$user['role'] = $_POST['role'];
	if ($user['username'] != $oldusername) {
		if (!checkUser($user))
			exit ('Utilisateur invalide');
	} else {
		if (!checkUser($user, FALSE))
			exit ('Utilisateur invalide');
	}
	editData(DB_USERS, $user);
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
	exit('Utilisateur ou Mot de passe invalide');
}
