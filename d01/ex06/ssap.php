#!/usr/bin/php
<?php

if ($argc > 1) {
	unset($argv[0]);
	$str = implode(" ", $argv);
	$args = explode(" ", $str);
	sort($args);
	foreach($args as $arg) {
		if ($arg != '')
			echo $arg.PHP_EOL;
	}
}
