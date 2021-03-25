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

function rmrf($dir) {
    foreach (glob($dir) as $file) {
        if (is_dir($file)) { 
            rmrf("$file/*");
            rmdir($file);
        } else {
            unlink($file);
        }
    }
}     

if($polaczenie -> connect_errno!=0){
        echo "Błąd: ".$polaczenie->connect_errno;
    }
else{
    $user= $_SESSION['user'];
    $ktoreooo = mysqli_real_escape_string($polaczenie,$_POST['usun_o']);
    $pobierzo = "DELETE FROM o WHERE tytul = '$ktoreooo'";             
$sql = "SELECT * FROM o WHERE tytul='$ktoreooo'";
$zapytanie = mysqli_query($polaczenie,$sql);
$wiersz = mysqli_fetch_assoc($zapytanie);
$id = $wiersz['id'];
    if($rezultat = @$polaczenie->query($pobierzo)){  
       $dir_f = "D:/Gry/xampp/htdocs/S/obrazki/".$_SESSION['user']."/".$wiersz['id'];
        rmrf($dir_f);

        echo '<script language="javascript">';
        echo 'alert("Ogłoszenie zostało usunięte!")';
        echo '</script>';
        header("Refresh:0.1; aktyw22-1.php", true, 303);
        
       
        
    }    
    $polaczenie->close();
}
    
?>