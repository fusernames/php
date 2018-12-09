<?php

require_once CONTROLLER.'userController.php';
require_once CONTROLLER.'productController.php';
require_once CONTROLLER.'categoryController.php';
require_once CONTROLLER.'cartController.php';
require_once CONTROLLER.'orderController.php';

function getId() {
	if (isset($_GET['id']))
		$id = $_GET['id'];
	else
		$id = 0;
	return ($id);
}

function orderRoutes() {
	switch ($_GET['action']) {
		case 'show_order':
			showOrderAction(getId());
			break;
		case 'list_orders':
			if (isset($_GET['id']))
				listOrderAction($_GET['id']);
			else
				listOrderAction();
			break;
		case 'add_order':
			addOrderAction();
			break;
		case 'remove_order':
			removeOrderAction(getId());
			break;
	}
}

function cartRoutes() {
	switch ($_GET['action']) {
		case 'show_cart':
			showCartAction();
			break;
		case 'add_to_cart':
			addToCartAction($_GET['id_product']);
			break;
		case 'remove_from_cart':
			removeFromCartAction($_GET['id_product']);
			break;
		case 'empty_cart':
			emptyCartAction($_GET['id_product']);
			break;
	}
}

function productRoutes() {
	switch ($_GET['action']) {
		case 'show_product':
			showProductAction(getId());
			break;
		case 'add_product':
			addProductAction();
			break;
		case 'edit_product':
			editProductAction(getId());
			break;
		case 'remove_product':
			removeProductAction(getId());
			break;
		case 'list_products':
			listProductsAction();
			break;
	}
}

function categoryRoutes() {
	switch ($_GET['action']) {
		case 'add_category':
			addCategoryAction();
			break;
		case 'edit_category':
			editCategoryAction(getId());
			break;
		case 'remove_category':
			removeCategoryAction(geyId());
			break;
	}
}

function adminRoutes() {
	switch ($_GET['action']) {
	}
}

function userRoutes() {
	global $CUR_USER;
	switch ($_GET['action']) {
		case 'login':
			loginAction();
			break;
		case 'register':
			registerAction();
			break;
		case 'logout':
			logoutAction();
			break;
		case 'edit_user':
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
			} else {
				$id = $CUR_USER['id'];
			}
			editUserAction($id);
			break;
		case 'remove_user':
			removeUserAction(getId());
			break;
		}
}
