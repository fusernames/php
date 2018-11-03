#!usr/bin/php
<?php
function	ft_translate($str)
{
	$dates_fr = array(
		"janvier", "fevrier", "mars", "avril", "mai", "juin",
		"juillet", "aout", "septembre", "octobre", "novembre", "decembre"
	);
	$dates_en = array(
		"junary", "february", "march", "april", "may", "june",
		"july", "august", "september", "october", "november", "december"
	);
	$days_fr = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
	$days_en = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
	$str = str_ireplace($dates_fr, $dates_en, $str);
	$str = str_ireplace($days_fr, $days_en, $str);
	return $str;
}

date_default_timezone_set('Europe/Paris');
if ($argc > 1)
{
	$str = ft_translate($argv[1]);
	$ret = strtotime($str);
	if (empty($ret))
		echo "Wrong Format\n";
	else
		echo $ret."\n";
}
?>
