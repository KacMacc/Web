<?php
session_start();
if((empty($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==false))
{
header ('Location:zaloguj.php?opcja=zaloguj');
 exit;
}
if ((!isset($_GET['edycja'])) || (empty($_GET['edycja'])))
{
  header ('Location:dodaj.php');
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
        //$_SESSION['edycja']=$tytul1;
    $tytul1 = mysqli_real_escape_string($polaczenie,$_GET['edycja']);
    $tytul = mysqli_real_escape_string($polaczenie,$_POST['tytul']);
    $typ1=mysqli_real_escape_string($polaczenie,$_POST['typ1']);
    $kat =mysqli_real_escape_string($polaczenie,$_POST['kat']);
    $opis = mysqli_real_escape_string($polaczenie,$_POST['opis']);
    $imie = mysqli_real_escape_string($polaczenie,$_POST['imie']);
    $lok =mysqli_real_escape_string($polaczenie, $_POST['lok']);
    $tel =mysqli_real_escape_string($polaczenie, $_POST['tel']);
                        
 $kwerenda="UPDATE o SET tytul='$tytul', kategoria='$kat', typ='$typ1', opis='$opis', imie='$imie', lok='$lok', tel='$tel' WHERE tytul='$tytul1'";            
        //echo $kwerenda;                
     if($rezultat =@$polaczenie->query($kwerenda))  {
         
         echo '<script language="javascript">';
        echo 'alert("Ogłoszenie zostało zedytowane!")';
        echo '</script>';
        header("Refresh:0.1; aktyw22-1.php", true, 303);
  
     }
                        
  }

$polaczenie->close();


?>