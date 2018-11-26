<?php

require_once MODEL.'database.php';

if (isset($_SESSION['id']))
	$USER = getDataById(DB_USERS, $_SESSION['id']);
