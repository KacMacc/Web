<?php
session_start();
require_once "connect.php";

$polaczenie= @new mysqli($host,$db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error:".$polaczenie->connect_errno;
}
else
{
$log =$_POST['loginy'];
$has =$_POST['hasla'];
    
    
$log = htmlentities($log, ENT_QUOTES, "UTF-8");


//$sql = "SELECT * FROM uzytkownicy WHERE user='$log' AND pass='$has'";
    
if ($resul = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s'", mysqli_real_escape_string($polaczenie, $log))))
{
   $ile_userow = $resul->num_rows;
    
    if($ile_userow>0)
    {
        
        $wiersz=$resul->fetch_assoc();
        if(password_verify($has, $wiersz['pass']))
        {
            $_SESSION['zalogowany']=true;
            $_SESSION['id']=$wiersz['id'];
            $_SESSION['user']=$wiersz['user'];  
            $_SESSION['email']=$wiersz['email']; 
            $_SESSION['uprawnienia']=$wiersz['uprawnienia'];

            unset($_SESSION['blad']);

            $resul->close();
           // if(isset($_SESSION['uprawnienia']))
           // if($_SESSION['uprawnienia']==0){ 
           // header ('Location:admin.php');
           //     }  else{
             header('Location:panelU.php');
           // }
        } else{
    
        $_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        header('Location:zaloguj.php?opcja=zaloguj');
    }  
        
        
    }else{
    
        $_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        header('Location:zaloguj.php?opcja=zaloguj');
    }   
}
  
$polaczenie->close();
}
    
?>