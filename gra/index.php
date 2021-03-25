<?php
include "config.php";
   session_start();
   date_default_timezone_set("Europe/Berlin");
   require 'connection.php';
   ?>
<html lang="pl-PL">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
	        <link rel="icon" type="image/ico" href="images/favicon.ico"/>

      <?php
         if (!isset($_GET['task'])) {
         ?>
      <title id="title"><?php echo $lang['title11'] ?></title>
      <?php
         }
         elseif ((isset($_GET['task'])) && ($_GET['task'] == "news")) {
         ?>
      <title id="title"><?php echo $lang['title'] ?></title>
      <?php
         }
         ?>
      <style type="text/css">
         body {
         min-height: 85vh;
         text-align: center;
         background: url('images/dribble-ui-001-bg.jpg') no-repeat center;
         background-size: cover;
         background-attachment: fixed;
         margin: 0;
         padding: 0;
         overflow: visible;
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
         color: rgba(0,0,0,0.7);
         font-weight: 500;
         font-size: 16px;
         min-width: 30px;
         padding: 0.7% 1.5% 0.7% 1.5%;
         text-decoration: none;
         transition-duration: .3s;
         }
         nav a:hover {
         background: rgba(105,105,105,1);
         color: rgba(255,255,255,0.9);
         }
         .login-info {
         float: right;
         font-weight: bold;
         cursor: pointer;
         }
         header {
         text-align: center;
         color: rgba(255,100,20,0.6);
         }
         footer {
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
         .container {
         height: 100%;
         margin: 0;
         margin-top: 10vh;
         min-height: 85vh;
         padding: 0;
         }
         @media screen and (max-width: 736px) {
         .container {
         margin-top: 20vh;
         }
         }
         .info {
         background: rgba(255,255,255,0.9);
         width: 70%;
         margin: 0 auto;
         margin-bottom: 5vh;
         padding: 0;
         box-shadow: 10px 8px 12px 0 rgba(0, 0, 0, 0.2), 0 8px 25px 0 rgba(0, 0, 0, 0.19);
         font-size: 20px;
         color: rgba(0,0,0,0.8);
         min-height: 40vh;
         border: 2px solid dimgray;
         border-radius: 5px 5px 5px 5px;
         overflow: hidden;
         }
         @media screen and (max-width: 736px) {
         .info {
         width: 85%;
         margin-top: 5vh;
         }
         }
         .info h1 {
         color: rgba(0,0,0,0.9);
         background: rgba(255,255,102,0.8);
         border-radius: 5px 5px 0 0;
         width: 100%;
         margin: 0 auto;
         margin-bottom: 3%;
         padding: 2% 0 2% 0;
         text-shadow: 2px 2px 8px #FF8C00;
         }
         @media screen and (max-width: 240px) {
         .info h1 {
         font-size: 12px;
         }
         }
         @media screen and (max-width: 480px) {
         .info h1 {
         font-size: 15px;
         }
         }
         @media screen and (max-width: 736px) {
         .info h1 {
         font-size: 18px;
         }
         }
         @media screen and (max-width: 1280px) {
         .info h1 {
         font-size: 24px;
         }
         }
         .news {
         margin: 0.5% 2% 4% 2%;
         padding: 0.2%;
         text-align: left;
         border-bottom: 2px solid orangered;
         }
         .news .title {
         font-size: 25px;
         font-weight: bold;
         color: rgba(255,100,20,0.9);
         margin-bottom: 0.2%;
         padding: 0.5%;
         }
         .news .desc {
         padding: 1.5%;
         border: 1px solid silver;
         border-radius: 10px;
         }
         .news .author {
         font-style: italic;
         font-size: 14px;
         margin-top: 1.5%;
         padding: 0.5%;
         }
         .bottom-info {
         margin-bottom: 10vh;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <?php 
            require('nav.php');
            ?>
         <?php
            if (!isset($_GET['task'])) {
            ?>
         <div class="info">
            <?php 
               if (!isset($_SESSION['active'])) {
               ?>
            <h1><?php echo $lang['title2'] ?></h1>
            <?php 
               }
               else {
               ?>
            <h1>Witaj, <?php echo ucfirst($_SESSION['active']); ?>!</h1>
            <?php
               }
               ?>
            <h2>Informacje</h2>
            <?php if (isset($_SESSION['active'])) { ?><a href="play.php"><?php echo $lang['title3'] ?></a><?php } ?>
			Ta gra będzie supi
		 </div>
         <?php
            }
            ?>

         <?php
           require 'footer.php';
		 ?>
      </div>
   </body>
   <!-- <script type="text/javascript">
      var header = document.getElementById("alert");
      var title = document.getElementById("title");
      var form = document.getElementsByClassName("info")[0];
      
      title.innerHTML = "Uwaga!";
      header.innerHTML = "Uwaga!";
      
      function showIP() {
      
      title.innerHTML = "Uwaga! Twoje IP: <?php $ip = get_ip(); echo $ip; ?>";
      header.innerHTML = "Nic tu nie znajdziesz, Twoj adres IP to: <?php $ip = get_ip(); echo $ip; ?>. <br /> Mam Cie!";
      
      }
      setTimeout("showIP()", 2000);
      </script> -->
</html>
<?php
   function get_ip() {
       $ipaddress = '';
       if (getenv('HTTP_CLIENT_IP'))
           $ipaddress = getenv('HTTP_CLIENT_IP');
       else if(getenv('HTTP_X_FORWARDED_FOR'))
           $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
       else if(getenv('HTTP_X_FORWARDED'))
           $ipaddress = getenv('HTTP_X_FORWARDED');
       else if(getenv('HTTP_FORWARDED_FOR'))
           $ipaddress = getenv('HTTP_FORWARDED_FOR');
       else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
       else if(getenv('REMOTE_ADDR'))
           $ipaddress = getenv('REMOTE_ADDR');
       else
           $ipaddress = 'UNKNOWN';
    
       return $ipaddress;
   }
   ?>