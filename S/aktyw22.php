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
     <link href="style33.css" rel="stylesheet" type="text/css"/>
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
    <div class="test">Aktywne</div>
     <a href="omnie.php">
    <div class="test">O mnie</div>
       </a>
    <div class="test22">Zakończone</div>
     <a href=index.php>
    <div class="test1">Przeglądaj ogłoszenia</div>
           </a>
    <div style="clear:both"></div>
    </div>
       </div>
        <div id="naglowek">
 
        </div>  
        
        </div>
        <div id="container1">
    <div id="kategorie1">
        <div id="nagl">
            <h1>Aktywne ogłoszenia</h1>   
        </div>
 <?php 
                           
                               
                    require_once "connect.php";
                                 
                    $polaczenie = @new mysqli($host, $db_user, $db_passwd, $db_name);
                                mysqli_query($polaczenie,"SET CHARSET utf8");
    mysqli_query($polaczenie,"SET NAMES utf8 COLLATE utf8_polish_ci");
                    if($polaczenie -> connect_errno!=0){
                        echo "Błąd: ".$polaczenie->connect_errno;
                    }
                    
                    else{
                        $kwerenda = "SELECT  * FROM o WHERE user='".$_SESSION['user']."'";
                        if($rezultat = @$polaczenie->query($kwerenda)){
                            $ile_o = $rezultat->num_rows;
                            if($ile_o>0){  
                                echo "<table align=center id=\"o\">";
                                echo "<th></th><th>Tytuł</th><th>Kategoria</th><th>Typ</th><th>Opis</th><th>Imie</th><th>Lokalizacja</th>><th></th>";
                                while ($wiersz = mysqli_fetch_assoc($rezultat)) {            
                                
                                $tytul = $wiersz['tytul'];
                              
                                    echo "<tr><td><img src='obrazki/".$_SESSION['user']."/".$wiersz['tytul']."/1.jpg'></td><td>".$wiersz['tytul']."</td><td>".$wiersz['kategoria']."</td><td>".$wiersz['typ']."</td><td>".$wiersz['opis']."</td><td>".$wiersz['imie']."</td><td>".$wiersz['lok']."</td>
                                    </td>";     
                                
                                }
                                echo "</table>";
                                $rezultat->free_result();
                                
                            }
                            else{
                                echo "Nieznany błąd";
                            }
                        $polaczenie->close();
                        }
                    }
                    ?>
        </div>
        </div>
        <div id="container">
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