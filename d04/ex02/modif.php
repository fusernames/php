<?php
if (isset($_POST['login']) && isset($_POST['oldpw']) && isset($_POST['newpw']) && $_POST['submit'] == 'OK') {
	$found = 0;
	$accounts = unserialize(file_get_contents('../private/passwd'));
	for($i = 0; $accounts && $accounts[$i]; $i++) {
		if ($accounts[$i]['login'] == $_POST['login']
			&& $accounts[$i]['passwd'] == hash('whirlpool', $_POST['oldpw'])) {
			$found = 1;
			$accounts[$i]['passwd'] = hash('whirlpool', $_POST['newpw']);
		}
	}
	if (!$_POST['newpw'] || !$found)
		exit("ERROR\n");
	file_put_contents('../private/passwd', serialize($accounts));
	exit("OK\n");
}
?>
