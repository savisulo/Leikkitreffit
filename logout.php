<?php
session_start();
$_SESSION = array();
session_destroy();
// Redirect to the login page:
header('location: login.php?status=logoutsuccess');
	exit;
?>