#!/bin/usr/php
<?php
if ($argc > 1)
{
	$ret = preg_replace('/[ \t]+/', ' ', $argv[1]);
	echo $ret;
}
?>
