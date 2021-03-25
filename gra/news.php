<?php
   session_start();
   date_default_timezone_set("Europe/Berlin");
   require 'connection.php';
   include "config.php";
	ob_start();
   ?>
<html lang="pl-PL">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	        <link rel="icon" type="image/ico" href="images/favicon.ico"/>


      <?php
         if (!isset($_GET['task'])) {
         ?>
      <title id="title"><?php echo $lang['title'] ?></title>
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

         <div class="info bottom-info">
            <h1><?php echo $lang['news'] ?></h1>
            <?php
			
               $sql = "SELECT * FROM news ORDER BY n_id DESC";
               $query = mysqli_query($conn,$sql);
               $num = mysqli_num_rows($query);
               if ($num > 0) {
				while ($row = mysqli_fetch_assoc($query)) {
               ?>
            <div class="news" id="<?php echo $row['n_id']; ?>">
               <div class="title">
                  <?php echo $row['title']; ?>
               </div>
               <div class="desc">
                  <?php echo $row['text']; ?>
               </div>
               <div class="author">
                  Dodał: 
                  <?php
                     echo $row['owner'];
                     ?>, dnia <?php echo $row['date']; ?>
               </div>
            </div>
            <?php
               }
               }
               ?>
         </div>
		 <?php
           require 'footer.php';
		 ?>
      </div>
   </body>
</html>
