#!/usr/bin/php
<?php

if ($argc < 2)
	return;
unset($argv[0]);
$str = implode(" ", $argv);
$args = explode(" ", $str);
natcasesort($args);
$strings = array();
$numerics = array();
$others = array();
foreach($args as $arg)
{
	if (ctype_alpha($arg))
		array_push($strings, $arg);
	else if (is_numeric($arg))
		array_push($numerics, $arg);
	else
		array_push($others, $arg);
}
sort($numerics, SORT_STRING);
foreach($strings as $str)
	echo($str."\n");
foreach($numerics as $num)
	echo($num."\n");
foreach($others as $other)
	echo($other."\n");
?>
