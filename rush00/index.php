<?php

define('CONTROLLER', __DIR__.'/controller/');
define('MODEL', __DIR__.'/model/');
define('VIEW', __DIR__.'/view/');
define('DB_USERS', __DIR__.'/private/users');
define('DB_PRODUCTS', __DIR__.'/private/products');
define('DB_CATEGORIES', __DIR__.'/private/categories');
define('BASE', VIEW.'base.php');
session_start();
require_once MODEL.'database.php';
require_once MODEL.'globals.php';
require_once CONTROLLER.'indexController.php';
require_once CONTROLLER.'userController.php';
require_once CONTROLLER.'productController.php';

function rooter() {
	global $CUR_USER;
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'index':
				indexAction();
				break;
			case 'login':
				loginAction();
				break;
			case 'register':
				registerAction();
				break;
			case 'logout':
				logoutAction();
				break;
			case 'user_edit':
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
				} else {
					$id = $CUR_USER['id'];
				}
				editUserAction($id);
				break;
			case 'user_remove':
				if (isset($_GET['id'])) {
					removeUserAction($_GET['id']);
				} else {
					exit('error');
				}
				break;
			case 'product_add':
				addProductAction();
				break;
			case 'product_edit':
				if (isset($_GET['id'])) {
					editProductAction($_GET['id']);
				}
				break;
			case 'product_remove':
				if (isset($_GET['id']))
					removeProductAction($_GET['id']);
				break;
			default:
				exit('no controller found');
				break;
		}
	} else {
		indexAction();
	}
}

rooter();
