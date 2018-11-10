<?php
session_start();
if (isset($_GET['login']) && isset($_GET['passwd']) && $_GET['submit'] == 'OK') {
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<form method="get">
<input type="text" name="login", value="<?php echo $_SESSION['login'] ?>"/>
<input type="text" name="passwd" value="<?php echo $_SESSION['passwd'] ?>"/>
<input type="submit" name="submit" value="OK"/>
</form>
