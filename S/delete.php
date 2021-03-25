
<?php
  require("connect.php");
  session_start();
  if((empty($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==false))
{
header ('Location:niehakuj.php');
}
if($_SESSION['uprawnienia']>0){
    header ('Location:niehakuj.php');
  }
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
  
 $polaczenie= @new mysqli($host,$db_user,$db_password,$db_name);
mysqli_query($polaczenie,"SET CHARSET utf8");
    mysqli_query($polaczenie,"SET NAMES utf8 COLLATE utf8_polish_ci");
if($polaczenie -> connect_errno!=0){
        echo "Błąd: ".$polaczenie->connect_errno;
    }else{
  $user=mysqli_real_escape_string($polaczenie,$_GET['user']);
  $kwerenda="delete from uzytkownicy where user=\"$user\"";
	mysqli_query($polaczenie,$kwerenda);
    if($rezultat = @$polaczenie->query($kwerenda)){  
       $dir_f = "D:/Gry/xampp/htdocs/S/obrazki/".$user."/";
        rmrf($dir_f);
    
    echo '<script language="javascript">';
        echo 'alert("Użytkownik został usunięty!")';
        echo '</script>';
        header("Refresh:0.1; uzyt.php", true, 303);
    
    
    
	mysqli_close($polaczenie);
  //header("Location:uzyt.php");
}
}
?>
