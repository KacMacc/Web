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
      <link rel="icon" type="image/ico" href="images/favicon.ico"/>
      <script src="js/jquery-2.2.4.min.js"></script>
      <style>
         body {
			 background-image: radial-gradient(circle, #565657, #5c606d, #5d6a83, #58779a, #4884b1);
			 background-size: cover;
			 background-position: center;
         }
         #glowne_okno {
			 width: 640px;
			 height: 600px;
			 /*background-color: white;*/
			 margin: 0 auto;
			 margin-top: 11.5vh;
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
         .login-info {
			 float: right;
			 font-weight: bold;
			 cursor: pointer;
         }
		 .tooltip {
		  position: relative;
		  display: inline-block;
		  border-bottom: 1px dotted black;
		}

		.tooltip .tooltiptext {
		  visibility: hidden;
		  width: 235px;
		  background-color: black;
		  color: #fff;
		  text-align: center;
		  border-radius: 6px;
		  padding: 5px 0;

		  /* Position the tooltip */
		  position: absolute;
		  z-index: 1;
		}

		.tooltip:hover .tooltiptext {
		  visibility: visible;
		}
		#love:hover .tooltiptext{
			left:70px;
		  top:-10px;
		}
		#nope:hover .tooltiptext{
			left:-240px;
		  top:-10px;
		}
		h4 {
			font-size: 27px;
			line-height: 40px;
			margin:15px 5px 0 5px;
		}
		
		.cal-container {
		  position: static;
		}

		.calendar-container {
		  position: relative;
		  width: 100%;
		}

		.calendar-container header {
		  background: #e66b6b;
		  color: #fff;
		  padding: 2.5em 2em;
		}

		.day {
		  font-size: 3em;
		  font-weight: 900;
		  line-height: 1em;
		}

		.month {
		  font-size: 2.5em;
		  line-height: 1em;
		  text-transform: lowercase;
		}

		.calendar {
		  background: #fff;
		  border-radius: 0 0 1em 1em;
		  box-shadow: 0 2px 1px rgba(0, 0, 0, 0.2), 0 3px 1px #fff;
		  color: #555;
		  display: inline-block;
		  padding: 2em;
		}

		.calendar thead {
		  color: #e66b6b;
		  font-weight: 700;
		  text-transform: uppercase;
		}

		.calendar td {
		  padding: .5em 1em;
		  text-align: center;
		}
		.ring-left,
		.ring-right {
		  position: absolute;
		  top: 140px;
		}

		.ring-left {
		  left: 2em;
		}

		.ring-right {
		  right: 2em;
		}

		.ring-left:before,
		.ring-left:after,
		.ring-right:before,
		.ring-right:after {
		  background: #fff;
		  border-radius: 4px;
		  box-shadow: 0 3px 1px rgba(0, 0, 0, 0.3), 0 -1px 1px rgba(0, 0, 0, 0.2);
		  content: "";
		  display: inline-block;
		  margin: 8px;
		  height: 32px;
		  width: 8px;
		}
      </style>
      <script>
         window.onload = function() {
         	var can_fun = document.getElementById('canvas_fun'),
         	can_scie = document.getElementById('canvas_science'),
         	can_mon = document.getElementById('canvas_money'),
         	can_rel = document.getElementById('canvas_relationships'),
         	spanFunProcent = document.getElementById('fun_procent'),
         	spanScieProcent = document.getElementById('science_procent'),
         	spanMonProcent = document.getElementById('money_procent'),
         	spanRelProcent = document.getElementById('relationships_procent'),
         	fun = can_fun.getContext('2d'),
         	sci = can_scie.getContext('2d'),
         	mon = can_mon.getContext('2d'),
         	rel = can_rel.getContext('2d');
         	
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
					){
			?>
			window.location.href = "dead.php";
			<?php
					}
            }
            ?>
         	
         	var fun_percentage=<?php echo $getAspects['fun']; ?>;//zmienna fun
         	var science_percentage=<?php echo $getAspects['science']; ?>;//zmienna science
         	var money_percentage=<?php echo $getAspects['money']; ?>;//zmienna money
         	var relationships_percentage=<?php echo $getAspects['relationships']; ?>;//zmienna relationships
         	var posX = can_fun.width / 2,
         		posY = can_fun.height / 2,
         		fps = 1000 / 200,
         		procent = 0,
         		oneProcent = 360 / 100,
         		resultFun = oneProcent * fun_percentage,
         		resultSci = oneProcent * science_percentage,
         		resultMon = oneProcent * money_percentage,
         		resultRel = oneProcent * relationships_percentage;
         		
         		fun.lineCap = 'round';
         		sci.lineCap = 'round';
         		mon.lineCap = 'round';
         		rel.lineCap = 'round';
         		funMove();
         		sciMove();
         		monMove();
         		relMove();
         		
			function funMove(){
         	var deegres = 0;
         	var acrInterval = setInterval (function() {
         	deegres += 1;
         	fun.clearRect( 0, 0, can_fun.width, can_fun.height );
         	procent = deegres / oneProcent;
         
         	spanFunProcent.innerHTML = "<i class='fas fa-glass-martini'></i>";
         
         	fun.beginPath();
         	fun.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
         	fun.strokeStyle = '#b1b1b1';
         	fun.lineWidth = '10';
         	fun.stroke();
         
         	fun.beginPath();
         	fun.strokeStyle = '#fff242';
         	fun.lineWidth = '10';
         	fun.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
         	fun.stroke();
         	if( deegres >= resultFun ) clearInterval(acrInterval);
         	}, fps);
         }
         
         function sciMove(){
         	var deegres = 0;
         	var acrInterval = setInterval (function() {
         	deegres += 1;
         	sci.clearRect( 0, 0, can_scie.width, can_scie.height );
         	procent = deegres / oneProcent;
         
         	spanScieProcent.innerHTML = "<i class='fas fa-graduation-cap'></i>";
         
         	sci.beginPath();
         	sci.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
         	sci.strokeStyle = '#b1b1b1';
         	sci.lineWidth = '10';
         	sci.stroke();
         
         	sci.beginPath();
         	sci.strokeStyle = '#337fea';
         	sci.lineWidth = '10';
         	sci.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
         	sci.stroke();
         	if( deegres >= resultSci ) clearInterval(acrInterval);
         	}, fps);
         }
         
         function monMove(){
         	var deegres = 0;
         	var acrInterval = setInterval (function() {
         	deegres += 1;
         	mon.clearRect( 0, 0, can_mon.width, can_mon.height );
         	procent = deegres / oneProcent;
         
         	spanMonProcent.innerHTML = "<i class='fas fa-dollar-sign'></i>";
         
         	mon.beginPath();
         	mon.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
         	mon.strokeStyle = '#b1b1b1';
         	mon.lineWidth = '10';
         	mon.stroke();
         
         	mon.beginPath();
         	mon.strokeStyle = 'darkgreen';
         	mon.lineWidth = '10';
         	mon.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
         	mon.stroke();
         	if( deegres >= resultMon ) clearInterval(acrInterval);
         	}, fps);
         }
         
         function relMove(){
         	var deegres = 0;
         	var acrInterval = setInterval (function() {
         	deegres += 1;
         	rel.clearRect( 0, 0, can_rel.width, can_rel.height );
         	procent = deegres / oneProcent;
         
         	spanRelProcent.innerHTML = "<i class='fas fa-heartbeat'></i>";
         
         	rel.beginPath();
         	rel.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + 360) );
         	rel.strokeStyle = '#b1b1b1';
         	rel.lineWidth = '10';
         	rel.stroke();
         
         	rel.beginPath();
         	rel.strokeStyle = '#ea3333';
         	rel.lineWidth = '10';
         	rel.arc( posX, posY, 70, (Math.PI/180) * 270, (Math.PI/180) * (270 + deegres) );
         	rel.stroke();
         	if( deegres >= resultRel ) clearInterval(acrInterval);
         	}, fps);
         }
         }
		 
		
      </script>
   </head>
   <body>
      <?php 
		require('nav.php');
	?>
	<?php
		if(!isset($_SESSION['repeat'])) {
			$_SESSION['repeat'] = '0';
		}
		$repeat=$_SESSION['repeat'];
		$search="SELECT q_id,question,answer1,answer2 FROM questions WHERE q_id NOT IN ($repeat)  ORDER BY RAND() LIMIT 1";
		$query = mysqli_fetch_assoc(mysqli_query($conn,$search));
	
	?>
	<script>
		function leftSwipe() {
				setTimeout(function(){
					window.location.href = "change.php?val1=<?php echo $query["q_id"];?>&val2=left";
					}, 300);
			 }
		function rightSwipe() {
				setTimeout(function(){
					window.location.href = "change.php?val1=<?php echo $query["q_id"];?>&val2=right";
					}, 300);
			 }
	</script>
      <div id="glowne_okno">
         <div class="game">
            <div class="stats">
               <div class="canvas-wrap">
                  <canvas id="canvas_science" width="150px" height="150px"></canvas>
                  <span id="science_procent"></span>
                  <canvas id="canvas_relationships" width="150px" height="150px"></canvas>
                  <span id="relationships_procent"></span>
                  <canvas id="canvas_fun" width="150px" height="150px"></canvas>
                  <span id="fun_procent"></span>
                  <canvas id="canvas_money" width="150px" height="150px"></canvas>
                  <span id="money_procent"></span>
               </div>
            </div>
            <div class="tinder">
               <div class="tinder--status">
                  <i class="fa fa-remove"></i>
                  <i class="fa fa-heart"></i>
               </div>
               <div class="tinder--cards">
                  <div class="tinder--card">
                     
					 <div class="cal-container">
						<div class="calendar-container">
							<header>
								<div class="day"><?php
									if(!isset($_SESSION['days'])){
										$_SESSION['days'] = 1;
									}
									echo $_SESSION['days'];
									?>
								</div>
									<div class="month">Dzień</div>
							</header>
							<div class="ring-left"></div>
							<div class="ring-right"></div>
						</div>
					</div>
					 
					 
					 
                     <h4><?php
							echo $query["question"];
							
						?></h4>
                     <p>
						
					</p>
                  </div>
              
                  <div class="tinder--card">
                     <img src="images/revers.jpg">
                     </div>
                     <div class="tinder--card">
                     <img src="images/revers.jpg">
                     </div>
                     <div class="tinder--card">
                     <img src="images/revers.jpg">
                     </div>
                     <div class="tinder--card">
                     <img src="images/revers.jpg">
                     </div>	
               </div>
               <div class="tinder--buttons">


                  <button class="tooltip" id="nope" onclick="leftSwipe()">
					<i class="far fa-hand-point-left"></i>
						<span class="tooltiptext">
						  <?php
							echo $query["answer1"];
							?>
						</span>
				</button>
				  
                  <button class="tooltip" id="love" onclick="rightSwipe()">
					<i class="far fa-hand-point-right"></i>
						<span class="tooltiptext">
							  <?php
								echo $query["answer2"];
								?>
						</span>
					</button>
               </div>
            </div>
         </div>
         <script src="js/hammer.min.js"></script>
         <script  src="js/index2.js"></script>
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