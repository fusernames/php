<?php

require_once MODEL.'database.php';
require_once MODEL.'security.php';
require_once MODEL.'user.php';

function loginAction() {
	if (isset($_POST['username']) && isset($_POST['passwd'])) {
		login($_POST['username'], $_POST['passwd']);
	}
	if (isset($_SESSION['id']))
		header('Location: index.php?action=index');
	require VIEW.'user/login.php';
}

function registerAction() {
	if (isset($_SESSION['id'])) {
		header('Location: index.php?action=index');
	}
	if (isset($_POST['username']) && isset($_POST['passwd'])) {
		register($_POST['username'], $_POST['passwd']);
		header('Location: index.php?action=login');
	}
	require VIEW.'user/register.php';
}

function logoutAction() {
	if (isset($_SESSION['id'])) {
		unset($_SESSION['id']);
		if ($_SERVER['HTTP_REFERER']) {
			header('Location: '.$_SERVER['HTTP_REFERER']);
		} else {
			header('Location: index.php?action=index');
		}
	}
}

function removeUserAction($id) {
	userOnly();
	if (!userSecurity('user_remove', $id))
		exit('error');
	removeDataById(DB_USERS, $id);
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function editUserAction($id) {
	userOnly();
	if (!userSecurity('user_edit', $id))
		exit('error');
	if (isset($_POST['username']) && isset($_POST['passwd']))
		editUser($id);
	require VIEW.'user/edit_user.php';
}
