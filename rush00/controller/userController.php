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

function registerAction()
{
	global $CUR_USER;
	if (isset($CUR_USER['id']) && $CUR_USER['role'] == 'user')
		header('Location: index.php?action=index');
	if (isset($_POST['username']) && isset($_POST['passwd'])) {
		register($_POST['username'], $_POST['passwd']);
		header('Location: index.php?action=login');
	}
	require VIEW.'user/register.php';
}

function editUserAction($id)
{
	userOnly();
	$user = getDataById(DB_USERS, $id);
	if (!$user)
	 	return notFound();
	if (!userSecurity('edit', $user))
		return unAuthorized();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		editUser($user);
	$user = getDataById(DB_USERS, $id);
	require VIEW.'user/edit.php';
}

function removeUserAction($id)
{
	userOnly();
	$user = getDataById(DB_USERS, $id);
	if (!$user)
		return notFound();
	removeDataById(DB_USERS, $id);
	if ($id == $_SESSION['id'])
		unset($_SESSION['id']);
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

function logoutAction()
{
	if (isset($_SESSION['id'])) {
		unset($_SESSION['id']);
		header('Location: index.php?action=index');
	}
}

function listUsersAction()
{
		adminOnly();
		$users = getDatas(DB_USERS);
		require VIEW.'user/list.php';
}
