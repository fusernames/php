<?php

session_start();
require_once __DIR__.'/config/defines.php';
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
