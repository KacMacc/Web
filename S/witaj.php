<?php
session_start();

if(!isset($_SESSION['udanarejestracja']))
{
  header('Location:niehakuj.php');
    exit();
}else
   {
    unset($_SESSION['udanarejestracja']);
}
//usuwanie zmiennych do zapamietywania
if(isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);

//usuwanie bledów
if(isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
if(isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
?>






<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Witaj!</title>
	<meta name="description" content="Error" />
	<meta name="keywords" content="logowanie, oszłoszenie" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		 <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
	<link rel="stylesheet" href="style4.css" type="text/css" />
	
</head>

<body>

	<div id="container">
        <p>Dziękujemy za rejestracje w naszym serwisie! Możesz już dodawać ogłoszenia!</p>
        <form action="index.php">
			<input type="submit" value="Powrót na stronę główną">
			
		</form>
    </div>
	
</body>
</html>