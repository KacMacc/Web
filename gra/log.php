<?php

    session_start(); 
	include "config.php";
    require 'connection.php';
    
	if($conn -> connect_errno!=0){
        echo "Błąd: ".$conn->connect_errno;
    }
	else{
		@$log_login=htmlentities($_POST["log_nickname"],ENT_QUOTES,"utf-8");
		@$log_password=sha1($_POST["log_passwd"]);
		@$log_password=htmlentities($log_password,ENT_QUOTES,"utf-8");
		$check_login = $conn->query("SELECT COUNT(*) FROM usrs WHERE nickname = '$log_login' AND password = '$log_password'")->fetch_row();
		
		if ($check_login[0] == 1) {
			$_SESSION['active'] = $log_login;
			header('Location: play.php');
		}
		else{
			$reg_msg='<i class="fas fa-times-circle"></i>&nbsp;'.$lang['war3'];
			setcookie('17aae1232663897b994a9', $reg_msg, time() + 60 * 60*24*365);
			header('Location: login.php');
		}

	}
    $conn->close();
?>