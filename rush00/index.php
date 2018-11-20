<?php
session_start();
require(__DIR__ . '/src/controller.php');

if (isset($_GET['action']) {
	if ($_GET['action'] == 'overview') {
		index();
	}
} else {

}
?>
