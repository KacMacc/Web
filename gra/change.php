<?php
	include "config.php";
	session_start();
	
	if (isset($_SESSION['active'])) {
		require 'connection.php';
		
		if (isset($_GET['val1']) ){
            $id_question = $_GET['val1'];
		}
		if (isset($_GET['val2']) ){
            $side = $_GET['val2'];
		}
		if ((isset($_GET['val1'])) AND (isset($_GET['val2']))){
			$search = "SELECT * FROM questions WHERE q_id='$id_question'";
			$query = mysqli_fetch_assoc(mysqli_query($conn,$search));
			
			if ($side=='left'){
				$impact=explode(",",$query["impact1"]); 
				array_walk( $impact, 'intval' );
			}
			else{
				$impact=explode(",",$query["impact2"]);
				array_walk( $impact, 'intval' );
			}
			$nick=$_SESSION['active'];
			$nickname = "SELECT id_users FROM usrs WHERE nickname='$nick'";
			$getnick = mysqli_fetch_assoc(mysqli_query($conn,$nickname));
			

			if (isset($_SESSION['days'])){
				$_SESSION['days']++;
			}
			$_SESSION['repeat']=$_SESSION['repeat'].','.$id_question;
			mysqli_query($conn,"UPDATE aspects SET fun=fun+$impact[0], science=science+$impact[1], money=money+$impact[2], relationships=relationships+$impact[3] WHERE id_users='$getnick[id_users]'");
			header("Location: play.php");
		}
	}
	else {
		$reg_msg=$lang['niemasz2'];
		setcookie('17aae1232663897b994a9', $reg_msg, time() + 60 * 60*24*365);
		header("Location: login.php");
		exit();
	}
?>