<?php
function auth($login, $password)
{
	$accounts = unserialize(file_get_contents('../private/passwd'));
	foreach ($accounts as $account)
	{
		if ($account['login'] == $login && $account['passwd'] == hash('whirlpool', $password))
			return (TRUE);
	}
	return (FALSE);
}
