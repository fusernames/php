#!/usr/bin/php
<?php

if ($argc > 1) {
	$str = $argv[1];
	$str = preg_replace("/[[:space:]]+/"," ",$str);
	$str = trim($str);
	if ($str)
		echo $str.PHP_EOL;
}
