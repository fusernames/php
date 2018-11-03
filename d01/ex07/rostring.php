#!/bin/usr/php
<?php

$str = preg_replace("/[[:blank:]]+/"," ",$argv[1]);
trim($str);
$array = explode(" ", $argv[1]);
array_unshift($array, $array[count($array) - 1]);
unset($array[count($array) - 1]);
$str = implode(" ", $array);
echo($str."\n");
?>
