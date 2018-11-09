<?php
$usr = 'zaz';
$pwd = 'jaimelespetitsponeys';

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $usr) || ($_SERVER['PHP_AUTH_PW'] != $pwd)) {
	header('WWW-Authenticate: Basic realm="My Realm"');
	header('HTTP/1.0 401 Unauthorized');
	echo 'Text to send if user hits Cancel button';
	exit;
} else {
	$data = file_get_contents('../img/42.png');
	$img = 'data:image/png;base64,'.base64_encode($data);
}
?>
<html><body>
Bonjour Zaz<br />
<img src='<?php echo $img ?>'>
</body></html>
