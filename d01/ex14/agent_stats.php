#!/usr/bin/php
<?php

function getDatas()
{
	$datas = file_get_contents("php://stdin");
	$datas = explode("\n", $datas);
	foreach($datas as &$line)
	{
		$explode = explode(';', $line);
		$line = array();
		foreach($explode as $param) {
			array_push($line, $param);
		}
	}
	return $datas;
}

if ($argc > 1) {
	$average = array();
	$datas = getDatas();
	if ($argv[1] == 'moyenne') {
		foreach ($datas as $data) {
			if ($data[2] != 'moulinette' && is_numeric($data[1]) && (!empty($data[1]) || $data[1] == '0'))
				array_push($average, $data[1]);
		}
		echo array_sum($average) / count($average).PHP_EOL;
	}
	if ($argv[1] == 'moyenne_user') {
		foreach($datas as $data) {
			if ($data[2] != 'moulinette' && is_numeric($data[1]) && (!empty($data[1]) || $data[1] == '0')) {
				if (!isset($average[$data[0]]))
					$average[$data[0]] = array();
				array_push($average[$data[0]], $data[1]);
			}
		}
		ksort($average);
		foreach ($average as $key => $user)
			echo $key.':'.array_sum($user) / count($user).PHP_EOL;
	}
	if ($argv[1] == 'ecart_moulinette') {
		foreach($datas as $data) {
			if ($data[2] != 'moulinette' && is_numeric($data[1]) && (!empty($data[1]) || $data[1] == '0')) {
				if (!isset($average[$data[0]]['user']))
					$average[$data[0]]['user'] = array();
				array_push($average[$data[0]]['user'], $data[1]);
			}
		}
		foreach($datas as $data) {
			if ($data[2] == 'moulinette' && is_numeric($data[1]) && (!empty($data[1]) || $data[1] == '0')) {
				if (!isset($average[$data[0]]['moulinette']))
					$average[$data[0]]['moulinette'] = array();
				array_push($average[$data[0]]['moulinette'], $data[1]);
			}
		}
		ksort($average);
		foreach ($average as $key => $user)
			echo $key.':'.(
				 (array_sum($user['user']) / count($user['user'])) - (array_sum($user['moulinette']) / count($user['moulinette']))
			).PHP_EOL;
	}
}
return;
