#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo("Incorrect Parameters\n");
	return ;
}
trim($argv[1]);
$params = sscanf($argv[1], "%d %c %d %s");
if (!$params[0] || !$params[1] || !$params[2] || $params[3])
{
	echo ("Syntax Error\n");
	return ;
}
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
	return;
?>
