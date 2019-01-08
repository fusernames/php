#!/usr/bin/php
<?php

if ($argc > 1) {
	$str = $argv[1];
	while(strstr($str, "  "))
		$str = str_replace("  "," ", $str);
	$str = trim($str);
	if ($str)
		echo $str.PHP_EOL;
}
