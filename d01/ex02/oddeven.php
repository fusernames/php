#!/bin/usr/php
<?php
while (1)
{
	echo("entrez un nombre: ");
	$nbr = trim(fgets(STDIN));
	if (!is_numeric($nbr))
		echo("'".$nbr."' n'est pas un nombre\n");
	else if ($nbr % 2)
		echo($nbr." est un nombre impair\n");
	else if ($nbr % 2 == 0)
		echo($nbr." est un nombre pair\n");
}
