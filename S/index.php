<?php
session_start();
if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
  header ('Location:indexL.php');
 exit;
}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
 <meta charset="utf-8"/>
  <title>Domator</title>  
     <link href="style.css" rel="stylesheet" type="text/css"/>
    <meta name="description" content="Ogłoszenia o nieruchomościach"/>
    <meta name="keywords" content="nieruchomości, dom, mieszkanie, ogłoszenie, wynajem, kupno, działki" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
    <link href="Nowy folder/css/fontello.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    </head>

    <body>
    <div id="container"> 
      <div class="rectangle"></div>
    <form action=dodaj.php>
    <div id="topbarL"> <input type="submit" value="+ Dodaj ogłoszenie"></div>
        </form>
    <div id="topbarR"><br/><a i class="icon-home-outline"  href="zaloguj.php?opcja=zaloguj">Zaloguj</a> </div>  
 <div style="clear:both;"></div>
       
        <div id="powitanie">
     Domator
    <br/> Twój dom, Twoje ogłoszenia
       </div>
    
        
        <div id="naglowek">
        Wybierz, co Cię interesuje
        </div>  
        
        
    <div id="kategorie">
    <a href="m.php">
        <div class="test">Mieszkania</div></a>
         <a href="d.php">
        <div class="test">Domy</div></a>
        <a href="dz.php">
    <div class="test00">Działki</div></a>
        <a href="bik.php">
            <div class="test1">Biura i lokale</div></a>
        <a href="g.php">  <div class="test2">Garaże</div></a>
    <div style="clear:both"></div>
    </div>
        
        
        
        <div id="stopa">
       <div id="stopa1">
           Autor strony: Kacper Maćkowiak &copy; </div>
            
            <div id="stopa2">
                Bazy danych 1 - projekt zaliczeniowy
            </div>
         <div style="clear:both"></div>
        </div>
        
       
        
        
        
        
        
        
        
        
        
        
        </div>
        
 
    </body>
    
    

</html>