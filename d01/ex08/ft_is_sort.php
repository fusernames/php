#!/bin/usr/php
<?php
function ft_is_sort($tab)
{
	$sorted = $tab;
	sort($sorted);
	if ($sorted === $tab)
		return (1);
	else
		return (0);
}

$tab = array("!", "42", "Hello World", "salut");
if (ft_is_sort($tab))
	echo("ca marche");
else
	echo("c pas trie");
?>
