<?php
	session_start();
	include "config.php";
	unset($_SESSION['active']);
	session_destroy();
	$reg_msg='<i class="fas fa-check-circle"></i>&nbsp;'.$lang['welcome2'];
	setcookie('17aae1232663897b994a9', $reg_msg, time() + 60 * 60*24*365);
	setcookie('17aae1232663897b994a9b', 1 , time() + 60 * 60*24*365);
    header("Location: login.php");
    exit();
?>
			
