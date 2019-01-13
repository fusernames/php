<?php

define('CONFIG', __DIR__.'/config/');
define('CONTROLLER', __DIR__.'/controller/');
define('MODEL', __DIR__.'/model/');
define('VIEW', __DIR__.'/view/');
define('DB_USERS', __DIR__.'/private/users');
define('DB_PRODUCTS', __DIR__.'/private/products');
define('DB_CATEGORIES', __DIR__.'/private/categories');
define('DB_ORDERS', __DIR__.'/private/orders');
define('BASE', VIEW.'base.php');
session_start();
require_once MODEL.'database.php';
require_once CONFIG.'globals.php';
require_once CONFIG.'routes.php';
require_once MODEL.'security.php';
require_once CONTROLLER.'indexController.php';

function router() {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'index')
			indexAction();
		userRoutes();
		productRoutes();
		categoryRoutes();
		cartRoutes();
		orderRoutes();
		adminRoutes();
	} else {
		indexAction();
	}
}

date_default_timezone_set('Europe/Paris');
router();
