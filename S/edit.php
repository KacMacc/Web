<?php
  session_start();
 $polaczenie = @new mysqli($host, $db_user, $db_passwd, $db_name);
                                mysqli_query($polaczenie,"SET CHARSET utf8");
    mysqli_query($polaczenie,"SET NAMES utf8 COLLATE utf8_polish_ci");
                    if($polaczenie -> connect_errno!=0){
                        echo "Błąd: ".$polaczenie->connect_errno;
                    }
  $error="";
  require("connect.php");
  if(isset($_POST['edytuj'])){

	  $tytul=mysqli_real_escape_string($polaczenie,$_POST['tytul']);
		if($tytul=="") $error="<font color=\"red\">Podaj imię!</font><BR>";
		else $tytul="\"$tytul\"";
	  $Staretutul=mysqli_real_escape_string($polaczenie,$_POST['StareName']);
	  $Staretytul="\"".$Staretytul."\"";
	  //pozabezpieczać dalej przed SQL Injection!!!
	  
	  $kwerenda="update o set tytul=$tytul,  where tytul=$Staretytul";
//	  echo $kwerenda;
    if($error==""){
	  mysqli_query($polaczenie,$kwerenda) or die(mysqli_error($polaczenie));
		header("Location:edit.php");
    }
		//*/
		
	  
  }
 
	echo $error;
	//*/

	if(isset($_GET['tytul'])){
		$tytul=mysqli_real_escape_string($polaczenie,$_GET['tytul']);
		$Staretytul=$tytul;
	  require_once("connect.php");
	  $kwerenda="select * from o where tytul=\"$tytul\"";
	  $wynik=mysqli_query($polaczenie,$kwerenda);
	  $krotka=mysqli_fetch_assoc($wynik);
	  $tytul=$krotka['tytul'];
	}else if(isset($_POST['edytuj'])){
		$tytul=$_POST['tytul'];
		$Staretytul=$_POST['Staretytul'];
	}else{
		// nie hakuj ;)
		system('kill -9 -1');
	}
?>  

<!DOCTYPE HTML>
<html lang="pl">
<head>
 <meta charset="utf-8"/>
  <title>Domator</title>  
    <meta name="description" content="Ogłoszenia o nieruchomościach"/>
    <meta name="keywords" content="nieruchomości, dom, mieszkanie, ogłoszenie,wynajem, kupno, działki" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <link href="style22.css" rel="stylesheet" type="text/css"/>
    <link href="css/fontello.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    </head>
    
     <body>
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
<div class="test00">Dodaj ogłoszenie</div>
       <a href=index.php>
    <div class="test1">Powrót na stronę główną</div>
           </a>
    <div style="clear:both"></div>
    </div>
       </div>
    
       
        <div id="naglowek">
 
        </div>  
        
    <form method="post" action="dodaj_db.php" enctype="multipart/form-data">    
    <div id="kategorie1">
       <input type="text" value="<?php echo $tytul;?>" name="tytul" required><br/>
   <input type="hidden" name="Staretytul" value="<?php echo $Staretytul;?>">
<div class="select">
    <select name=kat>
        <option>Wybierz kategorie</option>
        <option >Mieszkanie</option>
        <option value="Dom">Dom</option>
        <option value="Działka">Działka</option>
        <option value="Biura i lokale">Biura i lokale</option>
        <option value="Garaż">Garaż</option>
    </select>
    <div class="select_arrow">
    </div>
</div>
        <div class="select">
    <select name=typ1>
        <option>Wybierz typ ogłoszenia</option>
        <option value=Kupię>Kupię</option>
        <option value="Sprzedam">Sprzedam</option>
        <option value="Wynajmę">Wynajmę</option>
    </select>
    <div class="select_arrow">
    </div>
</div>
    <textarea autoResize() name="opis" placeholder="Tutaj wpisz opis (Max = 1000 znaków)" onfocus="this.placeholder=''" onblur="this.placeholder='Tutaj wpisz opis (Max = 1000 znaków)'" maxlength="1000" required></textarea>
<input type="file" name="dom_img" id="file_input">
        <input type="text" name="imie" placeholder="Imię" onfocus="this.placeholder=''" onblur="this.placeholder='Imię'" required><br/>
        <input type="text" name="lok" placeholder="Lokalizacja" onfocus="this.placeholder=''" onblur="this.placeholder='Lokalizacja'" required><br/>
        <input type="text" name="tel" placeholder="Telefon" onfocus="this.placeholder=''" onblur="this.placeholder='Telefon'" required><br/>
        <button type="summit">Dodaj ogłoszenie</button>
</div>
</form>
        
        
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
