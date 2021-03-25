<?php
session_start();
if((empty($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==false))
{
header ('Location:zaloguj.php?opcja=zaloguj');
 exit;

if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
  header ('Location:dodaj.php');
 exit;
}
}
$polaczenie = @new mysqli($host, $db_user, $db_passwd, $db_name);
 mysqli_query($polaczenie,"SET CHARSET utf8");
    mysqli_query($polaczenie,"SET NAMES utf8 COLLATE utf8_polish_ci");
    
if($polaczenie -> connect_errno!=0){
        echo "Błąd: ".$polaczenie->connect_errno;
    }
else{
   
 require("connect.php");
  
    if(isset($_POST['edytuj'])){
	  $tytul=mysqli_real_escape_string($polaczenie,$_POST['tytul']);
		if($tytul=="") $error="<font color=\"red\">Podaj imię!</font><BR>";
		else $tytul="\"$tytul\"";
	  $Staretytul=mysqli_real_escape_string($polaczenie,$_POST['Staretytul']);
	  $Staretytul="\"".$Staretytul."\"";
       $Stareimie=mysqli_real_escape_string($polaczenie,$_POST['Stareimie']);
      $Stareimie="\"".$Stareimie."\"";
       $Staretel=mysqli_real_escape_string($polaczenie,$_POST['Staretel']);
      $Staretel="\"".$Staretel."\"";
       $Starelok=mysqli_real_escape_string($polaczenie,$_POST['Starelok']);
      $Starelok="\"".$Starelok."\"";
	  //pozabezpieczać dalej przed SQL Injection!!!
	  $kat=mysqli_real_escape_string($polaczenie,$_POST['kat']);
	  if($kat=="") $error=$error."<font color=\"red\">Podaj właściciela!</font><BR>";
	  else $typ="\"$typ\"";
	  $typ1=$_POST['typ1'];
	  $opis=$_POST['opis'];
        $imie=$_POST['imie'];
      if($imie=="") $error=$error."<font color=\"red\">Podaj właściciela!</font><BR>";
	  $tel=$_POST['tel'];
       $dom_img=$_FILES['dom_img'];
      
	  
	  $kwerenda="update o set tytul=$tytul, kategoria=$kat, typ=$typ1, opis=$opis, imie=$imie, lok=$lok, tel=$tel WHERE tytul=$Staretytul";
//	  echo $kwerenda;
    if($error==""){
	  mysqli_query($polaczenie,$kwerenda) or die(mysqli_error($polaczenie));
		header("Location:aktyw22-1.php");
    }
  }
}

 
	if(isset($_GET['tytul'])){
		$tytul=mysqli_real_escape_string($polaczenie,$_GET['tytul']);
		$Staretytul=$tytul;
        require_once("connect.php");
	  $kwerenda="select * from o where tytul=\"$tytul\"";
	  $wynik=mysqli_query($polaczenie,$kwerenda);
	  $krotka=mysqli_fetch_assoc($wynik);
	  $tytul=$krotka['tytul'];
	 $kat1=krotka['kategoria'];
	  //$typ=$krotka['typ'];
     //   $opis=$krotka['opis'];
	//  $imie=$krotka['imie'];
     //   $lok=$krotka['lok'];
	//  $tel=$krotka['tel'];
	}else if(isset($_POST['edytuj'])){
		$tytul=$_POST['tytul'];
		$Staretytul=$_POST['Staretytul'];
        $Stareimie=$_POST['Stareimie'];
        $Staretel=$_POST['Staretel'];
        $Starelok=$_POST['Starelok'];
		$kat1=$_POST['kategoria'];
	  $typ=$_POST['typ'];
        $opis=$_POST['opis'];
	  $imie=$_POST['imie'];
        $lok=$_POST['lok'];
	  $tel=$_POST['tel'];
	}
if($_SERVER["REQUEST_METHOD"] == "POST"){
     //Check if file was uploaded without errors
    if(isset($_FILES["dom_img"]) && $_FILES["dom_img"]["error"] == 0){
     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
       $filename = $_FILES["dom_img"]["name"];
        $filetype = $_FILES["dom_img"]["type"];
        $filesize = $_FILES["dom_img"]["size"];
    
        // Verify file extension
       $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 550 * 550;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            
            //mkdir("D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/", 0777,);
mkdir("D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$_POST['tytul']."/", 0777, true);
rmdir("D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$_POST['Staretytul']."/", 0777, true);
            
            
            
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $_FILES["dom_img"]["name"])){
                echo $_FILES["dom_img"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["dom_img"]["tmp_name"], "D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$_POST['tytul']."/". $_FILES["dom_img"]["name"]);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["dom_img"]["error"];
    }
            
 rename("D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$_POST['tytul']."/". $_FILES["dom_img"]["name"],"D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$_POST['tytul']."/1.jpg");
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
        
    <form method="post" action="edit.php" enctype="multipart/form-data">    
    <div id="kategorie1">
       <input type="text" name="tytul" value="<?php echo $tytul;?>"  required><br/>
 <input type="hidden" name="Staretytul" value="<?php echo $Staretytul;?>">
        
        
<div class="select">
    <select name=kat value="<?php echo $kat;?>">
        <option>Wybierz kategorie</option>
        <option value="Mieszkanie">Mieszkanie</option>
        <option value="Dom">Dom</option>
        <option value="Działka">Działka</option>
        <option value="Biura i lokale">Biura i lokale</option>
        <option value="Garaż">Garaż</option>
    </select>
    <div class="select_arrow">
    </div>
</div>
        <div class="select">
    <select name=typ1 value="<?php echo $typ1;?>">
        <option>Wybierz typ ogłoszenia</option>
        <option value=Kupię>Kupię</option>
        <option value="Sprzedam">Sprzedam</option>
        <option value="Wynajmę">Wynajmę</option>
    </select>
    <div class="select_arrow">
    </div>
</div>
    <textarea autoResize()  name="opis"   maxlength="1000" required>echo <?php echo $Stareopis;?></textarea>
     
        <input type="file" name="dom_img" id="file_input" value="<?php "<img src='obrazki/".$_SESSION['user']."/".$Staretytul."/1.jpg'>";?>">
        
        <input type="text" value="<?php echo $imie;?>" name="imie" required><br/>
    <input type="hidden" name="Stareimie" value="<?php echo $Stareimie;?>">
       
        <input type="text" name="lok" value="<?php echo $lok;?>" required>
        <input type="hidden" name="Starelok" value="<?php echo $Starelok;?>">
       
        <input type="text" name="tel"  required><br/>
        <input type="hidden" name="Staretel" value="<?php echo $Staretel;?>">
        
         <input type="submit" name="edytuj" value="Zapisz dane">
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