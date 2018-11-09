<?php
$usr = 'zaz';
$pwd = 'jaimelespetitsponeys';

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
	header('WWW-Authenticate: Basic realm="My Realm"');
	header('HTTP/1.0 401 Unauthorized');
exit;
$data = file_get_contents('../img/42.png');
$img = 'data:image/png;base64,'.base64_encode($data);
if (($_SERVER['PHP_AUTH_USER'] == $usr) && ($_SERVER['PHP_AUTH_PW'] == $pwd)): ?>
<html><body>
	Bonjour Zaz<br />
	<img src='<?php echo $img ?>'>
</body></html>
<?php else: ?>
<body><html>Cette zone est accessible uniquement aux membres du site</body></html>
<?php endif; ?>
