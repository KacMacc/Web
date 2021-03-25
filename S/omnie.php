<?php
session_start();
if((empty($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==false))
{
header ('Location:niehakuj.php');
 exit;
}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
 <meta charset="utf-8"/>
  <title>Domator</title>  
     <link href="style3.css" rel="stylesheet" type="text/css"/>
    <meta name="description" content="Ogłoszenia o nieruchomościach"/>
    <meta name="keywords" content="nieruchomości, dom, mieszkanie, ogłoszenie, wynajem, kupno, działki" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="css/fontello.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    </head>

    <body>
<?php if(isset($_SESSION['uprawnienia']))
if($_SESSION['uprawnienia']==1){ ?>
    <div id="container"> 
      <div class="rectangle1"></div>
    <div id="topbarL">
<?php echo "<p>Zalogowany jako: ".$_SESSION['user'];?></div> 
    <form action=wylogowanie.php>
    <div id="topbarR"><input type="submit" value="Wyloguj"></div> 
        </form>
 <div style="clear:both;"></div>
        <div id="powitanie">
   <div id="kategorie">
       <a href="aktyw22-1.php">
    <div class="test">Aktywne</div>
       </a>
     <a href="omnie.php">
    <div class="testo">O mnie</div>
       </a>
     <a href=index.php>
    <div class="test1">Przeglądaj ogłoszenia</div>
           </a>
    <div style="clear:both"></div>
    </div>
       </div>
        
    <div id="kategorie1">
        <div id="nagl">
            <h1>O mnie</h1>   
        </div>
<?php 
 echo "<p><br/><b>E-mail</b>:   "  .$_SESSION['email'];
 ?>
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
 <?php } ?> 
        
        <?php if(isset($_SESSION['uprawnienia']))
if($_SESSION['uprawnienia']==0){ ?>
           <div id="container"> 
      <div class="rectangle1"></div>
    <div id="topbarL">
<?php echo "<p>Zalogowany jako: ".$_SESSION['user'];?></div> 
    <form action=wylogowanie.php>
    <div id="topbarR"><input type="submit" value="Wyloguj"></div> 
        </form>
 <div style="clear:both;"></div>
        <div id="powitanie">
   <div id="kategorie">
       <a href="uzyt.php">
           <div class="test00">Użytkownicy</div></a>
     <a href="omnie.php">
    <div class="test001">O mnie</div>
       </a>
     <a href=index.php>
    <div class="test1">Przeglądaj ogłoszenia</div>
           </a>
    <div style="clear:both"></div>
    </div>
       </div>     
    <div id="kategorie1">
        <div id="nagl">
            <h1>O mnie</h1>   
        </div>
<?php 
 echo "<p><br/><b>E-mail</b>:   "  .$_SESSION['email'];
 ?>
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
        
         <?php } ?> 
    </body>
    
    

</html>