#!/bin/usr/php
<?php
function	ft_split($str)
{
	$str = preg_replace("/[[:blank:]]+/"," ",$str);
	$array = explode(" ", $str);
	sort($array);
	return ($array);
}

print_r(ft_split("Hello    World AAA"));
?>
