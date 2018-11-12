<?php
session_start();
$messages = unserialize(file_get_contents('../private/chat'));
foreach ($messages as $message) {
	date_default_timezone_set('Europe/Paris');
	echo date("[H:i] ", $message['time']);
	echo '<b>'.$message['login'].'</b>: '.$message['msg'].'<br />';
}
?>
