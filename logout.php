<?php
	require_once './app/User.php';
	$user = new User();
	$user->logout();
	header("Location: http://".$_SERVER['SERVER_NAME'].'/signin.php');
