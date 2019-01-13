<?php

require_once MODEL.'category.php';

function addCategoryAction()
{
	adminOnly();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		addCategory();
	}
	require VIEW.'category/add.php';
}

function editCategoryAction($id)
{
	adminOnly();
	$category = getDataById(DB_CATEGORIES, $id);
	if (!$category)
		notFound();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		editCategory($category);
	$category = getDataById(DB_CATEGORIES, $id);
	require VIEW.'category/edit.php';
}

function removeCategoryAction($id)
{
	adminOnly();
	$category = getDataById(DB_CATEGORIES, $id);
	if (!$category)
		notFound();
	removeDataById(DB_CATEGORIES, $id);
	if ($_SERVER['HTTP_REFERER']) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: index.php?action=index');
	}
}

function listCategoriesAction()
{
	adminOnly();
	$categories = getDatas(DB_CATEGORIES);
	require VIEW.'category/list.php';
}
