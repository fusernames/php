#!/usr/bin/php
<?php

if ($argc > 1) {
	$str = $argv[1];
	$str = preg_replace("/[[:blank:]]+/"," ",$str);
	$str = trim($str);
	$array = explode(" ", $str);
	array_push($array, $array[0]);
	unset($array[0]);
	$str = implode(" ", $array);
	echo($str.PHP_EOL);
}
