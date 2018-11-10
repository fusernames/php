<?php
if (isset($_POST['login']) && isset($_POST['passwd']) && $_POST['submit'] == 'OK') {
	if (!$_POST['passwd'])
		exit("ERROR\n");
	$create['login'] = $_POST['login'];
	$create['passwd'] = hash('whirlpool', $_POST['passwd']);
	mkdir('../private', 0777);
	$accounts = unserialize(file_get_contents('../private/passwd'));
	foreach($accounts as $account) {
		if ($account['login'] == $create['login'])
			exit("ERROR\n");
	}
	$i = 0;
	foreach ($accounts as $account)
		$i++;
	$accounts[$i] = $create;
	file_put_contents('../private/passwd', serialize($accounts));
	echo "OK\n";
	header('location: index.html');
}
?>
