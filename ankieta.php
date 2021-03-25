<link rel="stylesheet" href="style/style.css">

<?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_passwd, $db_name);

	mysqli_query($polaczenie, "SET NAMES utf8");

if($polaczenie -> connect_errno!=0){
        echo "Błąd: ".$polaczenie->connect_errno;
    }
else{
	$pytanie1 = $_POST['pytanie1'];
	$pytanie2 = $_POST['pytanie2'];
	$pytanie3 = $_POST['pytanie3'];
	//$pytanie4 = $_POST['pytanie4'];
	$pytanie5 = $_POST['pytanie5'];
	//$pytanie6 = $_POST['pytanie6'];
	$pytanie7 = $_POST['pytanie7'];
	$pytanie8 = $_POST['pytanie8'];
	$pytanie9 = $_POST['pytanie9'];
	$pytanie10 = $_POST['pytanie10'];


   $opcje= $_POST['opc'];
   $opcje2= $_POST['dup'];

$arr = array();
$arr2 = array();


   foreach ($opcje as $cos)
   {
    array_push($arr, $cos);
   }
   //
    foreach($opcje2 as $cos2)
   {
  array_push($arr2, $cos2);
   }


    $str = implode(",", $arr);
$str2 = implode(",", $arr2);
    //echo $str;

    $dodaj_query = "INSERT INTO ankieta (pytanie1, pytanie2, pytanie3, pytanie4, pytanie5, pytanie6, pytanie7, pytanie8, pytanie9, pytanie10) VALUES ('$pytanie1', '$pytanie2', '$pytanie3',  '$str', '$pytanie5','$str2','$pytanie7','$pytanie8','$pytanie9','$pytanie10')";

    $dodaj_query2 = "SELECT COUNT(*) FROM ankieta";

    $rezultat2 = @$polaczenie->query($dodaj_query2);

    $dupa= mysqli_fetch_assoc($rezultat2);
    //echo $dupa['COUNT(*)'];




	if($rezultat = @$polaczenie->query($dodaj_query)){

        echo '<div class="alert">  <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span><strong>Brawo,</strong> dane przesłane prawidłowo!<br><p>Dziękujęmy za wypełnienie ankiety.</p><br>Do tej pory ankietę wypełniło: '.$dupa['COUNT(*)'].' osób.</div>';
        //echo '<script language="javascript">';
        //echo 'alert("Dane zostały pomyślnie przesłane!")';
       	//echo '</script>';
      	header("Refresh:3.1; index.php", true, 303);


  }
  else{
        echo "Jakiś błąd";
	  	//echo '<br><br>';
	  	//echo '<p>'.$dodaj_query.'</p>';
   }
}


   $polaczenie->close();
?>
