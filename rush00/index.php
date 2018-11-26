<?php

define('CONTROLLER', __DIR__.'/controller/');
define('MODEL', __DIR__.'/model/');
define('VIEW', __DIR__.'/view/');
define('DB_USERS', __DIR__.'/private/users');
define('BASE', VIEW.'base.php');
session_start();
require_once MODEL.'database.php';
require_once MODEL.'globals.php';
require_once CONTROLLER.'userController.php';

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'login') {
		loginAction();
	} else if ($_GET['action'] == 'register') {
		registerAction();
	} else if ($_GET['action'] == 'logout') {
		logoutAction();
	} else if ($_GET['action'] == 'edit_user') {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			$id = $currentUser['id'];
		}
		editUserAction($id);
	} else if ($_GET['action'] == 'remove_user') {
		if (isset($_GET['id'])) {
			removeUserAction($_GET['id']);
		} else {
			exit('error');
		}
	}
} else {
	exit('no controller found');
}
