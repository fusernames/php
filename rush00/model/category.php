<?php

function checkCategory($category, $action) {
	if (!isset($category['name']) || !$category['name'])
		return FALSE;
	if (getDataBy(DB_CATEGORIES, 'name', $category['name']))
		return FALSE;
	return TRUE;
}

function addCategory() {
	$category['name'] = $_POST['name'];
	if (checkCategory($category, 'add')) {
		addData(DB_CATEGORIES, $category);
	} else {
		exit ('error');
	}
}

function editCategory($category) {
	$category['name'] = $_POST['name'];
	if (checkCategory($category, 'edit')) {
		editData(DB_CATEGORIES, $category);
	} else {
		exit ('error');
	}
}
