<?php
   include "config.php";
   session_start();
   if (isset($_SESSION['active'])) {
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
      <link rel="icon" type="image/ico" href="images/favicon.ico"/>
      <script src="js/jquery-2.2.4.min.js"></script>
   </head>
   <body>
      <?php 
		require('nav.php');
	?>
      <div id="glowne_okno">
         <div class="game">			   
			   <?php
            if($conn -> connect_errno!=0){
            	echo "Błąd: ".$conn->connect_errno;
            }
            else{
            	$nickname=$_SESSION['active'];
                $sql = "SELECT * FROM aspects INNER JOIN usrs ON aspects.id_users = usrs.id_users WHERE nickname='$nickname'";
                $query = mysqli_query($conn,$sql);
                $getAspects = mysqli_fetch_assoc($query);
				if (
					($getAspects['fun']>=100) OR ($getAspects['fun']<=0) OR
					($getAspects['science']>=100) OR ($getAspects['science']<=0) OR
					($getAspects['money']>=100) OR ($getAspects['money']<=0) OR
					($getAspects['relationships']>=100) OR ($getAspects['relationships']<=0)
					){$dead_zapytanie='xD';
						if ($getAspects['fun']>=100) $dead_zapytanie=mysqli_fetch_assoc(mysqli_query($conn,"SELECT die_text FROM dead WHERE to_much=1 AND aspect_id=1 ORDER BY RAND() LIMIT 1"));
						else if ($getAspects['fun']<=0) $dead_zapytanie=mysqli_fetch_assoc(mysqli_query($conn,"SELECT die_text FROM dead WHERE to_much=0 AND aspect_id=1 ORDER BY RAND() LIMIT 1"));
						else if ($getAspects['science']>=100) $dead_zapytanie=mysqli_fetch_assoc(mysqli_query($conn,"SELECT die_text FROM dead WHERE to_much=1 AND aspect_id=2 ORDER BY RAND() LIMIT 1"));
						else if ($getAspects['science']<=0) $dead_zapytanie=mysqli_fetch_assoc(mysqli_query($conn,"SELECT die_text FROM dead WHERE to_much=0 AND aspect_id=2 ORDER BY RAND() LIMIT 1"));
						else if ($getAspects['money']>=100) $dead_zapytanie=mysqli_fetch_assoc(mysqli_query($conn,"SELECT die_text FROM dead WHERE to_much=0 AND aspect_id=3 ORDER BY RAND() LIMIT 1"));
						else if ($getAspects['money']<=0) $dead_zapytanie=mysqli_fetch_assoc(mysqli_query($conn,"SELECT die_text FROM dead WHERE to_much=0 AND aspect_id=3 ORDER BY RAND() LIMIT 1"));
						else if ($getAspects['relationships']>=100) $dead_zapytanie=mysqli_fetch_assoc(mysqli_query($conn,"SELECT die_text FROM dead WHERE to_much=1 AND aspect_id=4 ORDER BY RAND() LIMIT 1"));
						else $dead_zapytanie=mysqli_fetch_assoc(mysqli_query($conn,"SELECT die_text FROM dead WHERE to_much=0 AND aspect_id=4 ORDER BY RAND() LIMIT 1"));
						
				
						if (isset($_SESSION['days'])){
							$alived=$_SESSION['days'];
							$rank = "INSERT INTO ranking SET name='$nickname', live=$alived";
							$query2 = mysqli_query($conn,$rank);
							$_SESSION['days']=1;
						}
						
						if(isset($_SESSION['repeat'])) {
							$_SESSION['repeat'] = '0';
						}
			
			?>
						<div class="dead-page"> <?php echo $dead_zapytanie["die_text"];?>
							</br><img class="dead-img" src="images/dead.png" />
							</br><a class="new-game" href="reset.php">Zacznij od nowa</a>
                        </div>';
			<?php
					}
					else{
						header("Location: play.php");						
					}
            }
           ?>			   
         </div>
      </div>
      <?php
           require 'footer.php';
		 ?>
   </body>
</html>
<?php
   }
   else {
	   $reg_msg=$lang['niemasz2'];
	   setcookie('17aae1232663897b994a9', $reg_msg, time() + 60 * 60*24*365);
       header("Location: login.php");
	   exit();
   }
   ?>