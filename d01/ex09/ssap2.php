#!/usr/bin/php
<?php

function isalpha($c) {
	$c = ord($c);
	return (($c >= 65 && $c <= 90) || ($c >= 97 && $c <= 122));
}

function strisalpha($str) {
	for ($i = 0; $str[$i]; $i++) {
		if (!isalpha($str[$i]))
			return 0;
	}
	return 1;
}

if ($argc < 2)
	return;
unset($argv[0]);
$str = implode(" ", $argv);
while(strstr($str, "  "))
	$str = str_replace("  "," ", $str);
$str = trim($str);
$args = explode(" ", $str);
natcasesort($args);
$strings = array();
$numerics = array();
$others = array();
foreach($args as $arg)
{
	if (strisalpha($arg))
		array_push($strings, $arg);
	else if (is_numeric($arg))
		array_push($numerics, $arg);
	else
		array_push($others, $arg);
}
sort($numerics, SORT_STRING);
foreach($strings as $str)
	if ($str)
		echo($str."\n");
foreach($numerics as $num)
	if ($str)
 		echo($num."\n");
foreach($others as $other)
	if ($str)
		echo($other."\n");
?>
