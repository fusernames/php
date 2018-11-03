#!bin/usr/php
<?php
if ($argc != 2)
	return ;
$html = file_get_contents($argv[1]);
$dir = basename($argv[1]);
preg_match_all('/<img.+src\s*=\s*"(.+?)"/', $html, $results);
$results = $results[1];
print_r($results);
if (!empty($results))
{
	if (!file_exists(basename($dir)))
		mkdir($dir);
	foreach ($results as $result)
	{
		if ($result[0] == "/" && $result[1] == "/")
			$result = "http:".$result;
		else if ($result[0] == "/")
			$result = $argv[1].$result;
		echo $result."\n";
		$image = file_get_contents($result);
		file_put_contents($dir."/".basename($result), $image);
	}
}
