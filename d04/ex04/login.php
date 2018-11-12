<?php
session_start();
include 'auth.php';
if (isset($_POST['login']) && isset($_POST['passwd'])
	&& auth($_POST['login'], $_POST['passwd'])) {
	$_SESSION['loggued_on_user'] = $_POST['login'];
} else if (!$_SESSION['loggued_on_user']){
	$_SESSION['loggued_on_user'] = '';
	echo "ERROR\n";
	exit();
}?>
<html><body>
	<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
	<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
</body></html>
