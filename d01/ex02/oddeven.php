#!/usr/bin/php
<?php

while (1)
{
	echo("entrez un nombre: ");
	$usr = fgets(STDIN);
	if (!$usr) {
		echo PHP_EOL;
		break;
	}
	$nbr = trim($usr);
	if (!is_numeric($nbr))
		echo "'".$nbr."' n'est pas un chiffre".PHP_EOL;
	else if ($nbr % 2)
		echo "Le chiffre ".$nbr." est Impair".PHP_EOL;
	else if ($nbr % 2 == 0)
		echo "Le chiffre ".$nbr." est Pair".PHP_EOL;
}
