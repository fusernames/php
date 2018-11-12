<?php
session_start();
if (isset($_POST['msg']) && isset($_POST['submit'])
	&& ($_POST['submit'] == 'OK') && $_SESSION['loggued_on_user']) {
	$new['login'] = $_SESSION['loggued_on_user'];
	$new['time'] = time();
	$new['msg'] = $_POST['msg'];
	mkdir('../private', 0777);
	$fd = fopen('private/chat');
	flock($fd, LOCK_SH);
	flock($fd, LOCK_EX);
	$messages = unserialize(file_get_contents('../private/chat'));
	$i = 0;
	foreach($messages as $message)
		$i++;
	$messages[$i] = $new;
	file_put_contents('../private/chat', serialize($messages));
	fclose($fd);
}
?>
<html>
	<head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form action="speak.php" method="post">
			<input type="text" name="msg"/>
			<input type="submit" name="submit" value="OK"/>	
		</form>
	</body>
</html>
