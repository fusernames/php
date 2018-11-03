#!/usr/bin/php
<?php

unset($argv[0]);
$params = array_values(array_map('trim', $argv));
print_r($params);
if ($argc != 4)
	return ;
if ($params[1] == "+")
	echo($params[0] + $params[2]."\n");
else if ($params[1] == "-")
	echo($params[0] - $params[2]."\n");
else if ($params[1] == "*")
	echo($params[0] * $params[2]."\n");
else if ($params[1] == "/")
	echo($params[0] / $params[2]."\n");
else if ($params[1] == "%")
	echo($params[0] % $params[2]."\n");
else
	return ;

?>
