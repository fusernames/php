<?php

function productRoutes() {
	global $CUR_USER;
	switch ($_GET['action']) {
		case 'add_product':
			addProductAction();
			break;
		case 'edit_product':
			if (isset($_GET['id']))
				editProductAction($_GET['id']);
			break;
		case 'remove_product':
			if (isset($_GET['id']))
				removeProductAction($_GET['id']);
			break;
		case 'list_products':
			listProductsAction();
			break;
	}
}

function categoryRoutes() {
	global $CUR_USER;
	switch ($_GET['action']) {
		case 'add_category':
			addCategoryAction();
			break;
		case 'edit_category':
			if (isset($_GET['id']))
				editCategoryAction($id);
			break;
		case 'remove_category':
			if (isset($_GET['id']))
				removeCategoryAction($id);
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
			if (isset($_GET['id'])) {
				removeUserAction($_GET['id']);
			} else {
				exit('error');
			}
			break;
		}
}
