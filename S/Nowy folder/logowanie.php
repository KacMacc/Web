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

$sql = "SELECT * FROM uzytkownicy WHERE user='$log' AND pass='$has'";
    
if ($resul = @$polaczenie->query($sql))
{
   $ile_userow = $resul->num_rows;
    if($ile_userow=1)
    {
        $wiersz=$resul->fetch_assoc();
        $_SESSION['user']=$wiersz['user'];
        
        $resul->close();
        
        header('Location:paneluzyt.php');
    }else{
        
        
    }   
}
  
$polaczenie->close();
}
    
?>