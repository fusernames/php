#!/usr/bin/php
<?php

function ft_split($str)
{
	$str = trim(preg_replace("/[[:blank:]]+/"," ",$str));
	$array = explode(" ", $str);
	sort($array);
	return ($array);
}
