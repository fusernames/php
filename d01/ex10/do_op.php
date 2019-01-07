#!/usr/bin/php
<?php

if ($argc != 4) {
	echo 'Incorrect Parameters'.PHP_EOL;
	return 1;
}
unset($argv[0]);
$params = array_values(array_map('trim', $argv));
if ($params[1] == "+")
	echo $params[0] + $params[2].PHP_EOL;
else if ($params[1] == "-")
	echo $params[0] - $params[2].PHP_EOL;
else if ($params[1] == "*")
	echo $params[0] * $params[2].PHP_EOL;
else if ($params[1] == "/")
	echo $params[0] / $params[2].PHP_EOL;
else if ($params[1] == "%")
	echo $params[0] % $params[2].PHP_EOL;
