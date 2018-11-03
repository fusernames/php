#!/bin/usr/php
<?php
if ($argc == 2)
{

	$str = file_get_contents($argv[1]);
	$explode = explode('title="', $str);
	for($i = 1; $i < count($explode) ; $i++)
	{
		$title = explode('"', $explode[$i]);
		$title[0] = strtoupper($title[0]);
		$explode[$i] = implode('"', $title);
	}
	$str = implode('title="', $explode);

	$explode = explode("<a", $str);
	for($i = 1; $i < count($explode); $i++)
	{
		$link = explode("<", $explode[$i]);
		$title = explode(">", $link[0]);
		$title[1] = strtoupper($title[1]);
		$link[0] = implode(">", $title);
		$explode[$i] = implode("<", $link);
	}
	$str = implode("<a", $explode);
	echo $str;
}
?>
