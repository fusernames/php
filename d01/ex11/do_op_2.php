#!/usr/bin/php
<?php

if ($argc != 2)
{
	echo('Incorrect Parameters'.PHP_EOL);
	return ;
}
trim($argv[1]);
$params = sscanf($argv[1], "%d %c %d %s");
if (!is_numeric($params[0]) || !$params[1] || !is_numeric($params[2]) || $params[3]) {
	echo ('Syntax Error'.PHP_EOL);
	return ;
}
if (($params[0] == 0 || $params[2] == 0) && ($params[1] == '/' || $params[2] == '%'))
	echo '0'.PHP_EOL;
else if ($params[1] == "+")
	echo($params[0] + $params[2].PHP_EOL);
else if ($params[1] == "-")
	echo($params[0] - $params[2].PHP_EOL);
else if ($params[1] == "*")
	echo($params[0] * $params[2].PHP_EOL);
else if ($params[1] == "/")
	echo($params[0] / $params[2].PHP_EOL);
else if ($params[1] == "%")
	echo($params[0] % $params[2].PHP_EOL);
else {
	echo 'Syntax Error'.PHP_EOL;
}
