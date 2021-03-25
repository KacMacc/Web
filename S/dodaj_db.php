<?php
    session_start(); 
if((empty($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==false))
{
header ('Location:niehakuj.php');
 exit;
}
    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_passwd, $db_name);
 mysqli_query($polaczenie,"SET CHARSET utf8");
    mysqli_query($polaczenie,"SET NAMES utf8 COLLATE utf8_polish_ci");
    
if($polaczenie -> connect_errno!=0){
        echo "Błąd: ".$polaczenie->connect_errno;
    }

else{
    $id = $id;
    $user= $_SESSION['user'];
    $tytul = mysqli_real_escape_string($polaczenie,$_POST['tytul']);
    $typ1=mysqli_real_escape_string($polaczenie,$_POST['typ1']);
    $kat=mysqli_real_escape_string($polaczenie,$_POST['kat']);
    $opis = mysqli_real_escape_string($polaczenie,$_POST['opis']);
    $imie = mysqli_real_escape_string($polaczenie,$_POST['imie']);
    $lok =mysqli_real_escape_string($polaczenie, $_POST['lok']);
    $tel =mysqli_real_escape_string($polaczenie, $_POST['tel']);
    $dom_img=$_FILES['dom_img'];

    $dodaj_query = "INSERT INTO o (user, tytul, kategoria, typ ,opis, imie, lok, tel) VALUES ('$user', '$tytul', '$kat', '$typ1', '$opis', '$imie', '$lok', '$tel')";
    
   
    if($rezultat = @$polaczenie->query($dodaj_query)){
        
     
        //mkdir("D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$wiersz['id']."/", 0777, true);
        header("Location:witaj2.php");     
    }
   else{
        echo "jakos błąd";
       // echo $dodaj_query;
    }       
    
    
    /*  UPLOAD OBRAZKA NA SERWER */
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
           
            
$sql = "SELECT * FROM o WHERE tytul='$tytul'";
$zapytanie = mysqli_query($polaczenie,$sql);
$wiersz = mysqli_fetch_assoc($zapytanie);
$id = $wiersz['id'];
         
  
          //mkdir("D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/", 0777,);
mkdir("D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$wiersz['id']."/", 0777, true);

      
            
            
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $_FILES["dom_img"]["name"])){
                echo $_FILES["dom_img"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["dom_img"]["tmp_name"], "D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$wiersz['id']."/". $_FILES["dom_img"]["name"]);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["dom_img"]["error"];
    }
            
 rename("D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$wiersz['id']."/". $_FILES["dom_img"]["name"],"D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$wiersz['id']."/1.jpg");
            
            
            
            
            
            
            
}
    
    
    
    
    
    
    
    
    
    
    
    $polaczenie->close();
}













    
?>