<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Error</title>
	<meta name="description" content="Error" />
	<meta name="keywords" content="logowanie, oszłoszenie" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		 <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
	<link rel="stylesheet" href="style4.css" type="text/css" />
	
</head>

<body>

	<div id="container">
        <p>Nie jesteś zalogowany lub nie masz uprawnień by dostać się do tej witryny!</p>
        <form action="index.php">
			<input type="submit" value="Powrót do strony głównej">
			
		</form>
    </div>
	
</body>
</html>