<?php
session_start();

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
<?php if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
 if(isset($_SESSION['uprawnienia']))
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
    <div id=ogl>
<?php 
        $olx=$_GET['oferta'];
               require_once "connect.php";
                                 
        $polaczenie = @new mysqli($host, $db_user, $db_passwd, $db_name);
                                mysqli_query($polaczenie,"SET CHARSET utf8");
    mysqli_query($polaczenie,"SET NAMES utf8 COLLATE utf8_polish_ci");
                    if($polaczenie -> connect_errno!=0){
                        echo "Błąd: ".$polaczenie->connect_errno;
                    }
                    else{
                        $kwerenda = "SELECT  * FROM o WHERE id='$olx'";
                        if($rezultat = @$polaczenie->query($kwerenda)){
                            $ile_o = $rezultat->num_rows;
                            if($ile_o>0){  
    
        $wiersz=$rezultat->fetch_assoc();                     
                            }
                            }
                            } ?> 
        <div id=ty>
        <?php echo "<p>".$wiersz['tytul'];?>
        </div>
      <div id=ty2>
          <div id=ty22>
<?php echo "Kategria: ".$wiersz['kategoria'];
      echo "<br><br>Typ oferty: ".$wiersz['typ'];                                      
              ?>
        </div>
          <div id=ty222>
<?php echo "Wystawiający: ".$wiersz['imie'];
      echo "<br><br>Gdzie: ".$wiersz['lok'];                                        
              ?>
        </div>
           <div style="clear:both;"></div>
          <div id=ty2222>
          <?php     echo "Telefon: ".$wiersz['tel'];   ?>
          </div>    
        </div>
        <div id=ty3>
    <?php echo "<img src='obrazki/".$wiersz['user']."/".$wiersz['id']."/1.jpg'>"?>
        </div> 
        <div id=ty4>
            <div id=ty44>
            Opis
        </div> 
             <div id=ty444>           
    <?php echo $wiersz['opis'];?>
            </div>
        </div> 
        <div style="clear:both;"></div>
        
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
 <?php }  ?> 
      
        
        
<?php if((empty($_SESSION['zalogowany']))){ ?>

    <div id="container"> 
      <div class="rectangle1"></div>
    <div id="topbarL">
        <p>Przeglądasz jako: Gość </p></div> 
    <form action=wylogowanie.php>
        <div id="topbarR"><br/><a i class="icon-home-outline"  href="zaloguj.php?opcja=zaloguj">Zaloguj</a></div> 
        </form>
 <div style="clear:both;"></div>
        <div id="powitanie0">
   <div id="kategorieogl">
     <a href=index.php>
    <div class="test1">Powrót na stronę główną</div>
           </a>
    <div style="clear:both"></div>
    </div>
       </div>
       <div id=ogl>
           
           <?php 
       
        $olx=$_GET['oferta'];
               require_once "connect.php";
                                 
        $polaczenie = @new mysqli($host, $db_user, $db_passwd, $db_name);
                                mysqli_query($polaczenie,"SET CHARSET utf8");
    mysqli_query($polaczenie,"SET NAMES utf8 COLLATE utf8_polish_ci");
                    if($polaczenie -> connect_errno!=0){
                        echo "Błąd: ".$polaczenie->connect_errno;
                    }
                    else{
                        $kwerenda = "SELECT  * FROM o WHERE id='$olx'";
                        if($rezultat = @$polaczenie->query($kwerenda)){
                            $ile_o = $rezultat->num_rows;
                            if($ile_o>0){  
    
        $wiersz=$rezultat->fetch_assoc();                     
                            }
                            }
                            } ?> 
        <div id=ty>
        <?php echo "<p>".$wiersz['tytul'];?>
        </div>
      <div id=ty2>
          <div id=ty22>
<?php echo "Kategria: ".$wiersz['kategoria'];
      echo "<br><br>Typ oferty: ".$wiersz['typ'];                                      
              ?>
        </div>
          <div id=ty222>
<?php echo "Wystawiający: ".$wiersz['imie'];
      echo "<br><br>Gdzie: ".$wiersz['lok'];                                        
              ?>
        </div>
           <div style="clear:both;"></div>
          <div id=ty2222>
          <?php     echo "Telefon: ".$wiersz['tel'];   ?>
          </div>    
        </div>
        <div id=ty3>
    <?php echo "<img src='obrazki/".$wiersz['user']."/".$wiersz['id']."/1.jpg'>"?>
        </div> 
        <div id=ty4>
            <div id=ty44>
            Opis
        </div> 
             <div id=ty444>           
    <?php echo $wiersz['opis'];?>
            </div>
        </div> 
        <div style="clear:both;"></div>
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
 <?php  }?> 
        
    </body>
    
    

</html>