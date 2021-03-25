<?php
    session_start(); 
	include "config.php";
	ob_start();
?>
<!DOCTYPE html>
<html lang="pl-PL" >

<head>
  <meta charset="UTF-8">
  <title><?php echo $lang['title12'];?></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/montserrat.css">
	<link rel="stylesheet" href="css/reset.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="icon" type="image/ico" href="images/favicon.ico"/>
	<script src="js/jquery-2.2.4.min.js"></script>
	
	<script type="text/javascript">
	function InvalidEmail(textbox) {
		if (textbox.value == '') {
			textbox.setCustomValidity('<?php echo $lang['war'] ?>');
		}
		else if(textbox.validity.typeMismatch){
			textbox.setCustomValidity('<?php echo $lang['war2'] ?>');
		}
		else {
			textbox.setCustomValidity('');
		}
		return true;
	}
	
	var error_onsubmit = false;

	
	function validateOnSubmit(){
		var password = document.getElementById("reg_passwd");
		var confirm_password = document.getElementById("reg_repasswd");
			if(password.value != confirm_password.value) {
				confirm_password.setCustomValidity('<?php echo $lang['war5'] ?>');
				error_onsubmit = true;
			} else {
				confirm_password.setCustomValidity('');
			}
		if (!error_onsubmit) {
			return true;
			}
		else {
			return false;
			}
			
	}
	function check (input) {
		if (input.value.search(new RegExp(input.getAttribute('pattern'))) >= 0) {
			input.setCustomValidity('');
		} else {
			input.setCustomValidity('<?php echo $lang['war4'] ?>');
		}
	}

	function InvalidPassword(passbox) {
		if (passbox.value == '') {
			passbox.setCustomValidity('<?php echo $lang['war'] ?>');
		}
		else if(passbox.validity.typeMismatch){
			passbox.setCustomValidity('<?php echo $lang['war2'] ?>');
		}
		else {
			passbox.setCustomValidity('');
		}
		return true;
	}
	</script>
<style type="text/css">
* {
box-sizing: unset;
}
nav {
width: 100%;
background: rgba(255,100,20,0.9);
min-height: 2%;
overflow: hidden;
box-shadow: 10px 8px 12px 0 rgba(0, 0, 0, 0.2), 0 8px 25px 0 rgba(0, 0, 0, 0.19);
border-bottom: 2px solid dimgray;
letter-spacing: 1px;
display: block;
position: fixed;
top: 0;
}

nav a {
text-align: center;
color: rgba(0,0,0,0.7);
font-weight: 500;
font-size: 16px;
float: left;
min-width: 30px;
padding: 0.7% 1.5% 0.7% 1.5%;
text-decoration: none;
transition-duration: .3s;
}

nav a:hover {
background: rgba(105,105,105,1);
color: rgba(255,255,255,0.9);
}

footer {
text-align: center;
position: fixed;
bottom: 0;
left: 0;
padding: 0.5%;
width: 100%;
min-height: 1.5%;
background: rgba(0,0,0,1);
color: rgba(255,255,255,0.6);
border-top: 2px solid gray;
font-size: 12px;
}

.login-info {
float: right;
font-weight: bold;
cursor: pointer;
}
</style> 
</head>

<body>
	<?php 
		require('nav.php');
	?>


	<section class="user">
	<div class="error">
			<?php
				if (@strlen($_COOKIE['17aae1232663897b994a9b'])==1){
					?>
					<script>
					$(function() {
					  $('.error').css({ 'color': '#4F8A10', 'background-color': '#DFF2BF'});
					});
					</script>
					<?php
				}
				echo $_COOKIE['17aae1232663897b994a9'];
				if (strlen($_COOKIE['17aae1232663897b994a9']) > 0){
					?>
					<script>
					$(function() {
					  $(".error").css("visibility", "visible");
					});
					</script>
					<?php
				}
				else{
				?>
					<script>
					$(function() {
					  $(".error").css("visibility", "hidden");
					});
					</script>
					<?php
				}
			?>
	</div>
	  <div class="user_options-container">
		<div class="user_options-text">
		  <div class="user_options-unregistered">
			<h2 class="user_unregistered-title"><?php echo $lang['niemasz'] ?></h2>
			<p class="user_unregistered-text"><?php echo $lang['dolacz'] ?></p>
			<button class="user_unregistered-signup" id="signup-button"><?php echo $lang['zal3'] ?></button>
		  </div>

		  <div class="user_options-registered">
			<h2 class="user_registered-title"><?php echo $lang['niemasz1'] ?></h2>
			<p class="user_registered-text"><?php echo $lang['dolacz1'] ?></p>
			<button class="user_registered-login" id="login-button"><?php echo $lang['zal4'] ?></button>
		  </div>
		</div>
		
		<div class="user_options-forms" id="user_options-forms">
		  <div class="user_forms-login">
			<h2 class="forms_title"><?php echo $lang['zal5'] ?></h2>
			<form class="forms_form" id="login" method="post" action="log.php">
			  <fieldset class="forms_fieldset">
				<div class="forms_field">
				  <input type="text" placeholder="Login" id = "log_nickname" name= "log_nickname" class="forms_field-input" oninvalid="this.setCustomValidity('<?php echo $lang['war6'] ?>')" oninput="this.setCustomValidity('')" required autofocus />
				</div>
				<div class="forms_field">
				  <input type="password" placeholder="<?php echo $lang['pss'] ?>" id = "log_passwd" name= "log_passwd" class="forms_field-input" oninvalid="this.setCustomValidity('<?php echo $lang['war7'] ?>')" oninput="this.setCustomValidity('')" required />
				</div>
			  </fieldset>
			  <div class="forms_buttons">
				<button type="button" class="forms_buttons-forgot"><?php echo $lang['pss1'] ?></button>
				<input type="submit" value="<?php echo $lang['zal2'] ?>" class="forms_buttons-action">
			  </div>
			</form>
		  </div>
		  
		  <div class="user_forms-signup">
			<h2 class="forms_title"><?php echo $lang['rej'] ?></h2>
			<form class="forms_form" id="register" method="post" action="reg.php" onsubmit="return validateOnSubmit()">
			  <fieldset class="forms_fieldset">
				<div class="forms_field">
				  <input type="text" placeholder="Login" id = "reg_nickname" name= "reg_nickname" class="forms_field-input"  
				  oninvalid="this.setCustomValidity('<?php echo $lang['war6'] ?>')" oninput="this.setCustomValidity('')" required />
				</div>
				<div class="forms_field">
				  <input type="email" placeholder="E-mail" id = "reg_email" name = "reg_email" oninvalid="InvalidEmail(this);" oninput="InvalidEmail(this);" class="forms_field-input" required />
				</div>
				<div class="forms_field">
				  <input type="password" placeholder="<?php echo $lang['pss'] ?>" id = "reg_passwd" name = "reg_passwd" class="forms_field-input" pattern=".{6,}" oninput="check(this)" oninvalid="InvalidPassword(this);" oninput="InvalidPassword(this);"  required />
				</div>
				<div class="forms_field">
				  <input type="password" placeholder="<?php echo $lang['pss2'] ?>" id = "reg_repasswd" name = "reg_repasswd" class="forms_field-input" required />
				</div>
			  </fieldset>
			  <div class="forms_buttons">
				<input type="submit" value="<?php echo $lang['rej2'] ?>" class="forms_buttons-action">
			  </div>
			</form>
		  </div>
		  
		</div>
	  </div>
	</section>

<footer>
Copyright &copy; 2018 Bazy Danych 2
</footer>
	<script  src="js/index.js"></script>
</body>
<?php  setcookie('17aae1232663897b994a9', '', time() + 60 * 60*24*365);?>
<?php  setcookie('17aae1232663897b994a9b', '', time() + 60 * 60*24*365);?>
</html>
