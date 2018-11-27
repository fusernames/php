<?php

define('CONTROLLER', __DIR__.'/controller/');
define('MODEL', __DIR__.'/model/');
define('VIEW', __DIR__.'/view/');
define('DB_USERS', __DIR__.'/private/users');
define('DB_PRODUCTS', __DIR__.'/private/products');
define('BASE', VIEW.'base.php');
session_start();
require_once MODEL.'database.php';
require_once MODEL.'globals.php';
require_once CONTROLLER.'indexController.php';
require_once CONTROLLER.'userController.php';

function rooter() {
	global $CUR_USER;
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'index') {
			indexAction();
		} else if ($_GET['action'] == 'login') {
			loginAction();
		} else if ($_GET['action'] == 'register') {
			registerAction();
		} else if ($_GET['action'] == 'logout') {
			logoutAction();
		} else if ($_GET['action'] == 'user_edit') {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			} else {
				$id = $CUR_USER['id'];
			}
			editUserAction($id);
		} else if ($_GET['action'] == 'user_remove') {
			if (isset($_GET['id'])) {
				removeUserAction($_GET['id']);
			} else {
				exit('error');
			}
		} else {
			exit('no controller found');
		}
	} else {
		indexAction();
	}
}

rooter();
