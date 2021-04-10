<?php
    require_once "config.php";

	unset($_SESSION['access_token']);
	unset($_SESSION['user_id']);
	unset($_SESSION['name']);
	unset($_SESSION['email']);
	$gClient->revokeToken();

	header('Location:https://hantechdesign.com/home');
	exit();
?>
