<?php

function checkCategory($category) {
	if (!isset($category['name']))
		return FALSE;
	if (!$category['name'])
		return FALSE;
	if (getDataBy(DB_CATEGORIES, 'name', $category['name']))
		return FALSE;
	return TRUE;
}

function addCategory() {
	$category['name'] = $_POST['name'];
	if (checkCategory($category)) {
		addData(DB_CATEGORIES, $category);
	} else {
		exit ('error');
	}
}

function editCategory($id) {
	if (!($category = getDataById(DB_CATEGORY, $id)))
		exit ('error');
	$category['name'] = $_POST['name'];
	if (checkCategory($category)) {
		addData(DB_CATEGORIES, $category);
	} else {
		exit ('error');
	}
}
