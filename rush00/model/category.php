<?php

require_once MODEL.'database.php';

function checkCategory($category, $action) {
	if (!isset($category['name']) || $category['name'] == '')
		return FALSE;
	if (getDataBy(DB_CATEGORIES, 'name', $category['name']))
		return FALSE;
	return TRUE;
}

function addCategory($name) {
	$category['name'] = $name;
	if (checkCategory($category, 'add')) {
		addData(DB_CATEGORIES, $category);
	} else {
		exit ('Categorie invalide');
	}
}

function editCategory($category) {
	$category['name'] = $_POST['name'];
	if (checkCategory($category, 'edit')) {
		editData(DB_CATEGORIES, $category);
	} else {
		exit ('Categorie invalide');
	}
}
