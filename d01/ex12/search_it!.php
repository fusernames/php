#!/usr/bin/php
<?php

if ($argc < 3)
	return;
$key = $argv[1];
unset($argv[0]);
unset($argv[1]);
foreach($argv as $arg)
{
	$ret = explode(":", $arg);
	if (isset($ret[1]))
		$array[$ret[0]] = $ret[1];
}
if ($array)
	if (array_key_exists($key, $array))
		echo ($array[$key].PHP_EOL);
