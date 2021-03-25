<?php
	include "config.php";
	session_start();
	
	if (isset($_SESSION['active'])) {
		require 'connection.php';
			$nick=$_SESSION['active'];
			$nickname = "SELECT id_users FROM usrs WHERE nickname='$nick'";
			$getnick = mysqli_fetch_assoc(mysqli_query($conn,$nickname));
		
			mysqli_query($conn,"UPDATE aspects SET fun=50, science=50, money=50, relationships=50 WHERE id_users='$getnick[id_users]'");
			header("Location: play.php");
	}
	else {
		$reg_msg=$lang['niemasz2'];
		setcookie('17aae1232663897b994a9', $reg_msg, time() + 60 * 60*24*365);
		header("Location: login.php");
		exit();
	}
?>