<?php
   include "config.php";
   session_start();
   require 'connection.php';
   ?>
<!DOCTYPE html>
<html lang="pl-PL">
   <head>
      <meta charset="UTF-8">
      <title>pwrStarGames - Game</title>
	  <link rel="stylesheet" href="fonts/montserrat.css">
	  <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet" href="css/all.css">
      <link rel="stylesheet" href="css/reset.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/dead.css">
	  <link rel='stylesheet' href='https://code.getmdl.io/1.3.0/material.indigo-pink.min.css'>
	  <link rel="stylesheet" href="css/contact.css">
      <link rel="icon" type="image/ico" href="images/favicon.ico"/>
      <script src="js/jquery-2.2.4.min.js"></script>
   </head>
   <body>
      <?php 
		require('nav.php');
	?>
      <div id="glowne_okno">
         <div class="game">
					<div class="demo-container mdl-grid">
						<div class="mdl-cell mdl-cell--1-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
						<div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--10-col">
							<h5>Zostaw nam wiadomość</h5>
							<form class="sendEmail" method="post" autocomplete="off">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input" type="email" id="from" data-required="true">
									<label class="mdl-textfield__label" for="sample3">Twój email</label>
								</div>
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<textarea class="mdl-textfield__input" type="text" rows="3" id="emailbody" data-required="true"></textarea>
									<label class="mdl-textfield__label" for="sample5">Treść</label>
								</div>
								<div>
									<button style="background-color: #3baddc;" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Wyślij</button>
									<div class="mdl-spinner mdl-js-spinner is-active"></div>
									<span class="success-help">Twoja wiadomość została wysłana.</span>
								</div>
							</form>
						</div>
					</div>
         </div>
      </div>
      <?php
           require 'footer.php';
		 ?>
   </body>
       <script src='js/material.min.js'></script>
    <script src="js/mail.js"></script>
</html>