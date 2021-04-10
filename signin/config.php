<?php
	session_start();
	require_once "../GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("893626421120-qd35kcp386n7d7pj458fc9cqbjgqdmk2.apps.googleusercontent.com");
	$gClient->setClientSecret("hzS5dt2XY8wuf-n9aXfecMZ9");
	$gClient->setApplicationName("HantechPro");
	$gClient->setRedirectUri("https://hantechdesign.com/signin/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
