#!/bin/usr/php
<?php
$str = $argv[1];
$str = preg_replace("/[[:blank:]]+/"," ",$str);
$str = trim($str);
echo($str."\n");
?>
