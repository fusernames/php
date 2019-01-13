<?php

require_once CONTROLLER.'userController.php';
require_once CONTROLLER.'productController.php';
require_once CONTROLLER.'categoryController.php';
require_once CONTROLLER.'cartController.php';
require_once CONTROLLER.'orderController.php';
require_once CONTROLLER.'adminController.php';

function get($var, $default = 0) {
	if (isset($_GET[$var]))
		$ret = $_GET[$var];
	else
		$ret = $default;
	return $ret;
}

function adminRoutes() {
	switch ($_GET['action']) {
		case 'administration':
			administrationAction();
			break;
	}
}

function orderRoutes() {
	switch ($_GET['action']) {
		case 'show_order':
			showOrderAction(get('id'));
			break;
		case 'list_orders':
			listOrderAction(get('id_user', NULL));
			break;
		case 'add_order':
			addOrderAction();
			break;
		case 'remove_from_order':
			removeFromOrder(get('id'), get('id_product'));
			break;
		case 'remove_order':
			removeOrderAction(get('id'));
			break;
		case 'add_to_order':
			addToOrder(get('id'));
			break;
	}
}

function cartRoutes() {
	switch ($_GET['action']) {
		case 'show_cart':
			showCartAction();
			break;
		case 'add_to_cart':
			addToCartAction(get('id_product'));
			break;
		case 'remove_from_cart':
			removeFromCartAction(get('id_product'));
			break;
		case 'empty_cart':
			emptyCartAction(get('id_product'));
			break;
		case 'remove_1_from_cart':
			removeOneFromCartAction(get('id_product'));
			break;
		case 'add_1_to_cart':
			addOneToCartAction(get('id_product'));
			break;
	}
}

function productRoutes() {
	switch ($_GET['action']) {
		case 'show_product':
			showProductAction(get('id'));
			break;
		case 'add_product':
			addProductAction();
			break;
		case 'edit_product':
			editProductAction(get('id'));
			break;
		case 'remove_product':
			removeProductAction(get('id'));
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
			editCategoryAction(get('id'));
			break;
		case 'remove_category':
			removeCategoryAction(get('id'));
			break;
		case 'list_categories':
			listCategoriesAction();
			break;
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
			editUserAction(get('id', $CUR_USER['id']));
			break;
		case 'remove_user':
			removeUserAction(get('id'));
			break;
		case 'list_users':
			listUsersAction();
			break;
		}
}
