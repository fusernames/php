<?php

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
	if (isset($_SESSION['id']))
		header('Location: index.php?action=index');
	if (isset($_POST['username']) && isset($_POST['passwd'])) {
		register($_POST['username'], $_POST['passwd']);
		header('Location: index.php?action=login');
	}
	require VIEW.'user/register.php';
}

function editUserAction($id) {
	userOnly();
	$user = getDataById(DB_USERS, $id);
	if (!$user || !userSecurity('edit', $user))
		header('Location: index.php?action=user_edit');
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		editUser(&$user);
	require VIEW.'user/edit.php';
}

function removeUserAction($id) {
	adminOnly();
	$user = getDataById(DB_USERS, $id);
	if (!$user)
		notFound();
	removeDataById(DB_USERS, $id);
	header('Location: '.$_SERVER['HTTP_REFERER']);
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
