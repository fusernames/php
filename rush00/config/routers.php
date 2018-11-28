<?php

function productRouter() {
	global $CUR_USER;
	switch ($_GET['action']) {
		case 'product_add':
			addProductAction();
			break;
		case 'product_edit':
			if (isset($_GET['id']))
				editProductAction($_GET['id']);
			break;
		case 'product_remove':
			if (isset($_GET['id']))
				removeProductAction($_GET['id']);
			break;
	}
}

function categoryRouter() {
	global $CUR_USER;
	switch ($_GET['action']) {
		case 'category_add':
			addCategoryAction();
			break;
		case 'category_edit':
			if (isset($_GET['id']))
				editCategoryAction($id);
			break;
		case 'category_remove':
			if (isset($_GET['id']))
				removeCategoryAction($id);
			break;
	}
}

function userRouter() {
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
		}
}
