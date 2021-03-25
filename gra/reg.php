<?php
    session_start();
	include "config.php";
	require 'connection.php';

	if($conn -> connect_errno!=0){
        echo "Błąd: ".$conn->connect_errno;
    }
	else{
		$nickname = htmlentities($_POST['reg_nickname'],ENT_QUOTES,"utf-8");
		$email = htmlentities($_POST['reg_email'],ENT_QUOTES,"utf-8");
		$passwd = htmlentities(sha1($_POST['reg_repasswd']),ENT_QUOTES,"utf-8");
		
		if (!($nickname=='') or !($email=='')){
			$check_email = $conn->query("SELECT COUNT(*) FROM usrs WHERE email='$email'  LIMIT 1")->fetch_row();
			if ($check_email[0] >= 1) {
				$reg_msg='<i class="fas fa-times-circle"></i>&nbsp;'.$lang['zajety'];
				setcookie('17aae1232663897b994a9', $reg_msg, time() + 60 * 60*24*365);
			}
			
			$check_nick = $conn->query("SELECT COUNT(*) FROM usrs WHERE nickname='$nickname'  LIMIT 1")->fetch_row();
			if ($check_nick[0] >= 1) {
				$reg_msg='<i class="fas fa-times-circle"></i>&nbsp;'.$lang['zajety2'];
				setcookie('17aae1232663897b994a9', $reg_msg, time() + 60 * 60*24*365);
			}
			
			if (!($check_email[0] >= 1) && !($check_nick[0] >= 1)){
				$conn->query("INSERT INTO `usrs` (nickname, email, password) VALUES('$nickname','$email','$passwd')");
				$last_id=$conn->query("SELECT LAST_INSERT_ID()")->fetch_row();
				$conn->query("INSERT INTO `aspects` (id_users) VALUES($last_id[0])");
				$reg_msg='<i class="fas fa-check-circle"></i>&nbsp;'.$lang['welcome'];
				setcookie('17aae1232663897b994a9', $reg_msg, time() + 60 * 60*24*365);
				setcookie('17aae1232663897b994a9b', 1 , time() + 60 * 60*24*365);
			}
			if (isset($_SESSION['active'])) {
				header('Location: index.php');
			}
			else {
				header('Location: login.php');
			}
		}
    }
    $conn->close();
	
    
?>