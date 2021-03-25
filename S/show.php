<?php
  session_start();

?>

<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
</HEAD>
<BODY>

<?php
  require("connect.php");
$polaczenie= @new mysqli($host,$db_user,$db_password,$db_name);

  $kwerenda="select * from uzytkownicy";
  $wynik=mysqli_query($polaczenie,$kwerenda);


  echo "<TABLE border=\"1\">";
  echo "<TR><TH>Login</TH><TH>E-mail</TH><TH>Akcje</TH></TR>";
  
  while($krotka=mysqli_fetch_assoc($wynik)){
    echo "<TR><TD>";
    echo $krotka['user'];
    echo "</TD><TD>";
    echo $krotka['email'];
	echo "</TD></TR>";
	}
  
  echo "</TABLE>";
?>

</BODY>
</HTML>
