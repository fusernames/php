#!/usr/bin/php
<?php
unset($argv[0]);
$str = implode(" ", $argv);
$args = explode(" ", $str);
sort($args);
foreach($args as $arg)
{
	echo($arg."\n");
}
?>
