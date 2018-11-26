<?php

require_once MODEL.'database.php';
require_once MODEL.'security.php';

function register($username, $passwd, $role = 'user') {
	$new['username'] = $username;
	$new['passwd'] = hash('whirlpool', $passwd);
	$new['role'] = $role;
	$datas = getDatas(DB_USERS);
	foreach($datas as $data) {
		if ($data['username'] == $new['username'])
			exit('error');
	}
	addData(DB_USERS, $new);
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

function editUser($id) {
	$edited = getDataById(DB_USERS, $id);
	$edited['username'] = $_POST['username'];
	if (isset($_POST['newpasswd']))
		$edited['password'] = hash('whirlpool', $_POST['newpasswd']);
	if (userSecurity('edit_user_role', $id))
		$edited['role'] = $_POST['role'];
	editData(DB_USERS, $edited);
}
