<?php
      }}}                                                    
                                                          
   if(($opcja)=="edytuj")
   { 
    
  $error="";
  require("connect.php");
  if(isset($_POST['edytuj'])){
$user_id=$_SESSION['id'];
      
	  $imie=$_POST['imie'];
		if($imie=="") $error="<font color=\"red\">Podaj imię!</font><BR>";
		else $imie="\"$imie\"";
      
	  $nazwisko=$_POST['nazwisko'];
	  if($nazwisko=="") $error=$error."<font color=\"red\">Podaj nazwisko!</font><BR>";
	  else $nazwisko="\"$nazwisko\"";
      
	  $adres=$_POST['adres'];
      if($adres=="") $error=$error."<font color=\"red\">Podaj adres!</font><BR>";
      else $adres="\"$adres\"";
      
	  $miejscowosc=$_POST['miejscowosc'];
      if($miejscowosc=="") $error=$error."<font color=\"red\">Podaj miejscowość!</font><BR>";
      else $miejscowosc="\"$miejscowosc\"";
      
      $kod=$_POST['kod'];
      if($kod=="") $error=$error."<font color=\"red\">Podaj kod pocztowy!</font><BR>";
      else $kod="\"$kod\"";
      
      $kraj=$_POST['kraj'];
      if($kraj=="") $error=$error."<font color=\"red\">Podaj kraj!</font><BR>";
      else $kraj="\"$kraj\"";
      
      $telefon=$_POST['telefon'];
      if($telefon=="") $error=$error."<font color=\"red\">Podaj numer telefonu!</font><BR>";
      else $telefon="\"$telefon\"";
      
      
      $email=$_POST['email'];
    $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
    {
        $error=$error."<font color=\"red\">Podaj poprawny email!</font><BR>";
        
    }else
    {
        $email="\"$email\"";
    }
      
	  
	  $kwerenda="update klienci set `imie`=$imie, `nazwisko`=$nazwisko, `adres`=$adres, `miejscowosc`=$miejscowosc, `kod pocztowy`=$kod, `kraj`=$kraj, `telefon`=$telefon,
      `email`=$email where `id`=$user_id";
      
  //echo $kwerenda;
    if($error==""){
	  mysqli_query($polaczenie,$kwerenda) or die(mysqli_error($polaczenie));
		header("Location:mojekonto.php?opcja=dane");
    }
		//*/
		
	  
  }

	echo $error;
	//*/

	if(isset($_SESSION['id'])){
		$user_id=$_SESSION['id'];
	  require_once("connect.php");
	  $kwerenda="select * from klienci where id=$user_id";
	  $wynik=mysqli_query($polaczenie,$kwerenda);
	  $krotka=mysqli_fetch_assoc($wynik);
        $imie=$krotka['imie'];
	  $nazwisko=$krotka['nazwisko'];
	  $adres=$krotka['adres'];
	  $miejscowosc=$krotka['miejscowosc'];
	  $kod=$krotka['kod pocztowy'];
	  $kraj=$krotka['kraj'];
	  $telefon=$krotka['telefon'];
	  $email=$krotka['email'];

	}else if(isset($_POST['edytuj'])){
		$imie=$_POST['imie'];
		$nazwisko=$_POST['nazwisko'];
		$adres=$_POST['adres'];
		$miejscowosc=$_POST['miejscowosc'];
		$kod=$_POST['kod pocztowy'];
		$kraj=$_POST['kraj'];
		$telefon=$_POST['telefon'];
		$email=$_POST['email'];
	}
	
?>  
   <div id="form">  
    <form method="post">
Imię:<input type="text" name="imie" value="<?php echo $imie;?>"><BR>
 
  Nazwisko:<input type="text" name="nazwisko" required value="<?php echo $nazwisko;?>"><BR>
  
  Adres:<input type="text" name="adres" value="<?php echo $adres;?>"><BR>
  
  Miejscowość:<input type="text" name="miejscowosc" value="<?php echo $miejscowosc;?>"><BR>
   
    Kod pocztowy:<input type="kod_pocztowy" pattern="^[0-9]{2}-[0-9]{3}$" name="kod" value="<?php echo $kod;?>"><BR>
     
      Kraj:<input type="text" name="kraj" value="<?php echo $kraj;?>"><BR>
        Telefon:<input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" name="telefon" value="<?php echo $telefon;?>"><BR>
          Email:<input type="text" name="email" value="<?php echo $email;?>"><BR>
  <input type="submit" name="edytuj" value="Zapisz dane">

</form>  
</div>
   <?php }?>    

    
    <?php