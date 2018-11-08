<?php
if (!isset($_SERVER['PHP_AUTH_USER']) {
	header('WWW-Authenticate: Basic realm="AH"');
	header('HTTP/1.0 401 Unauthorized');
}
else {
	echo 'salut';
	echo $_SERVER['PHP_AUTH_USER'];
}
