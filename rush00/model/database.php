<?php

function getDatas($db) {
	if (!file_exists($db))
		return (NULL);
	$db = file_get_contents($db);
	$datas = unserialize($db);
	return ($datas);
}

function getDataById($db, $id) {
	$datas = getDatas($db);
	if (isset($datas[$id]))
		return ($datas[$id]);
	return (NULL);
}

function getDataBy($db, $key, $value) {
	$datas = getDatas($db);
	foreach($datas as $data) {
		if ($data[$key] == $value)
			return ($data);
	}
	return (NULL);
}

function countData($db, $plus = true) {
	if (!file_exists($db.'_count')) {
		$count = 0;
	} else {
		$count = intval(file_get_contents($db.'_count'));
	}
	if ($plus)
		file_put_contents($db.'_count', $count + 1);
	return ($count + 1);
}

function addData($db, $new) {
	$datas = getDatas($db);
	$count = countData($db);
	$new['id'] = $count;
	$datas[$count] = $new; 
	file_put_contents($db, serialize($datas));
}

function removeDataById($db, $id) {
	$datas = getDatas($db);
	if (!isset($datas[$id]))
		return (1);
	unset($datas[$id]);
	file_put_contents($db, serialize($datas));
	return (0);
}

function editData($db, $edited) {
	$datas = getDatas($db);
	$datas[$edited['id']] = $edited;
	file_put_contents($db, serialize($datas));
}

function peelDatasContains(&$datas, $key, $contains) {
	foreach ($datas as $data) {
		if (stripos($data[$key], $contains) === false)
			unset($datas[$data['id']]);
	}
}

function peelDatasEqual(&$datas, $key, $value, $key2 = NULL) {
	foreach ($datas as $data) {
		if (!$key2) {
			if ($data[$key] != $value)
				unset($datas[$data['id']]);
		} else {
			if ($data[$key] != $value && $data[$key2] != $value)
				unset($datas[$data['id']]);
		}
	}
	return ($datas);
}
