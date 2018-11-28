<?php

require_once MODEL.'category.php';

function addCategoryAction() {
	adminOnly();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		addCategory();
	require VIEW.'category/add.php';
}

function editCategoryAction($id) {
	adminOnly();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		editCategory($id);
	require VIEW.'category/edit.php';
}

function removeCategoryAction($id) {
	adminOnly();
	removeDataById(DB_CATEGORIES, $id);
	if ($_SERVER['HTTP_REFERER']) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: index.php?action=index');
	}
}
