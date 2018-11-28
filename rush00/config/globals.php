<?php

require_once MODEL.'database.php';

if (isset($_SESSION['id']))
	$CUR_USER = getDataById(DB_USERS, $_SESSION['id']);
