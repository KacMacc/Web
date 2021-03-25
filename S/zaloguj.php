<?php
session_start();
$opcja=$_GET['opcja'];
if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
  header ('Location:panelU.php');
 exit;
}

if(isset($_POST['email']))
{ 
    $polaczenie= @new mysqli($host,$db_user,$db_password,$db_name);
    $ok=true;
    
    //Sprawdzenie czy login jest poprawny
    //mysqli_real_escape_string($polaczenie,$_POST['login']);
    $login=mysqli_real_escape_string($polaczenie,$_POST['login']);
    
    //Sprawdzenie długości loginu
    if((strlen($login)<3 || (strlen($login))>15)){
        
       $ok=false; 
        $_SESSION['e_login']="Login musi posiadać od 3 do 20 znaków!";
    }
    //Sprawdzenie liter i znaków w loginie
    if(ctype_alnum($login)==false)
    {
        $ok=false;
        $_SESSION['e_login']="Login nie może zawierać polskich liter";  
    }
    
    //Sprawdzenie czy email jest poprawny
    $email=mysqli_real_escape_string($polaczenie,$_POST['email']);
    $emailok = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if((filter_var($emailok, FILTER_SANITIZE_EMAIL)==false) || ($emailok!=$email))
    {
        $ok=false; 
        $_SESSION['e_email']="Podaj poprawny adres e-mail";  
    }
    
    //Sprawdzenie czy haslo jest poprawne i czy dlugosc odpowiednia
    $haslo1=mysqli_real_escape_string($polaczenie,$_POST['haslo1']);
    $haslo2=mysqli_real_escape_string($polaczenie,$_POST['haslo2']);
    
    if((strlen($haslo1)<8 || (strlen($haslo1))>20)){
        
       $ok=false; 
        $_SESSION['e_haslo']="Haslo musi posiadać od 8 do 20 znaków";
    }
    
    if($haslo1!=$haslo2)
    {
        $ok=false; 
        $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
    }
    
    $haslohash = password_hash($haslo1, PASSWORD_DEFAULT);
    
    //Akceptacja regulaminu
    if(!isset($_POST['regulamin']))
    {
        $ok=false; 
        $_SESSION['e_regulamin']="Musisz zaakceptować regulamin!";
    }
    
    //Bot czy nie
    $sekret="6Lc8mFcUAAAAANUf8wLGVL2E7U2DmS-7aTlTEdKl";
    
    $check=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
    
    
    $odp=json_decode($check);
    
    if($odp->success==false)
     {
        $ok=false; 
        $_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
    }
    
    
    //Zapamiętanie wprowadzonych danych
    $_SESSION['fr_login']=$login;
    $_SESSION['fr_email']=$email;
    $_SESSION['fr_haslo1']=$haslo1;
    $_SESSION['fr_haslo2']=$haslo2;
    
    
    require_once"connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
 
    try
    {
      $polaczenie= @new mysqli($host,$db_user,$db_password,$db_name);  
        if($polaczenie->connect_errno!=0)
{
    throw new Exception(mysqli_connect_errno());
}
    else{
        
        //Sprawdzenie czy istenieje email
        $resul=$polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
        
        if(!$resul) throw new Exception($polaczenie->error);
        $ilemaili=$resul->num_rows;
        
        
        if($ilemaili>0)
        { 
        $ok=false; 
        $_SESSION['e_email']="Istnieje już konto z takim e-mailem!";
        }
   
        //Sprawdzenie czy istenieje login
        $resul=$polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$login'");
        
        if(!$resul) throw new Exception($polaczenie->error);
        $ilelogin=$resul->num_rows;
        
        
        if($ilelogin>0)
        { 
        $ok=false; 
        $_SESSION['e_login']="Istnieje już konto z takim loginem!";
        }
        
    if($ok==true)
    {
      if($polaczenie ->query("INSERT INTO uzytkownicy VALUES(NULL, '$login', '$haslohash', '$email', DEFAULT)"))
      {
          $_SESSION['udanarejestracja']=true;
          header('Location:witaj.php');
      }else
      {
          throw new Exception($polaczenie->error);
      }
    }
        
        $polaczenie->close();
    }
    }
    catch(Exception $e)
    {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodniści</span>';
        //echo '<br/>Informacja deweloperska:'.$e;
            
    }
    
    
    
    
}
    
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Zaloguj lub Zarejestruj</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
	<meta name="description" content="Zaloguj się by dodać ogłoszenie" />
	<meta name="keywords" content="logowanie, oszłoszenie" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		 <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
	<link rel="stylesheet" href="style1.css" type="text/css" />
	
</head>

<body>
<?php if(($opcja)== "zaloguj"){?>
	<div id="container">
        <a href=zaloguj.php?opcja=zaloguj><div class="zakladka3">
             Zaloguj
   </div></a>
    <a href=zaloguj.php?opcja=rej><div class="zakladka2">
           Rejestracja
    </div></a>
         <div style="clear:both;"></div>
        <div id="container11">
        <?php
            if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
			unset($_SESSION['blad']);
            ?>
		<form action="logowanie.php" method="post">
			<h1>Zaloguj się do swojego konta</h1>
			<input type="text" name="loginy" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'" required>
			
			<input type="password" name="hasla" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'" required>
			
			<input type="submit" value="Zaloguj się">
			
		</form>
	</div>
	</div>
	<?php } ?>
	<?php if(($opcja)== "rej"){?>
	<div id="container">
        <a href=zaloguj.php?opcja=zaloguj><div class="zakladka">
             Zaloguj
   </div></a>
    <a href=zaloguj.php?opcja=rej><div class="zakladka1">
           Rejestracja
    </div></a>
         <div style="clear:both;"></div>
        <div id="container11">
            <?php
            if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
            ?>
		<form method="post">
			<h1>Załóż swoje konto</h1>
			<input type="text" name="login" value="<?php if(isset($_SESSION['fr_login']))
            {
            echo $_SESSION['fr_login']; 
            unset($_SESSION['fr_login']);   
            }                                     
            ?>" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'"reqired>
            
            <?php
            if(isset($_SESSION['e_login']))
            {
               echo'<div class="error">'.$_SESSION['e_login'].'</div>';
                unset($_SESSION['e_login']);  
            }
            ?>
			
			<input type="password" name="haslo1" value="<?php if(isset($_SESSION['fr_haslo1']))
            {
             echo $_SESSION['fr_haslo1']; 
            unset($_SESSION['fr_haslo1']);   
            }                                     
            ?>" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'"accept="" required>
             <?php
            if(isset($_SESSION['e_haslo']))
            {
               echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
                unset($_SESSION['e_haslo']);  
            }
            ?>
            
            <input type="password" name="haslo2" value="<?php if(isset($_SESSION['fr_haslo2']))
            {
             echo $_SESSION['fr_haslo2']; 
            unset($_SESSION['fr_haslo2']);   
            }                                     
            ?>" placeholder="Powtóz hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Powtóz hasło'" required>
            
            <input type="text" name="email" value="<?php if(isset($_SESSION['fr_email']))
            {
             echo $_SESSION['fr_email']; 
            unset($_SESSION['fr_email']);   
            }                                     
            ?>" placeholder="Adres e-mail" onfocus="this.placeholder=''" onblur="this.placeholder='Adres e-mail'" required>
			
              <?php
            if(isset($_SESSION['e_email']))
            {
               echo'<div class="error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);  
            }
            ?>
            
           <label><input type="checkbox" name="regulamin"/> Akceptuje regulamin</label>
            
            <?php
            if(isset($_SESSION['e_regulamin']))
            {
               echo'<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                unset($_SESSION['e_regulamin']);  
            }
            ?>
            
            <div class="g-recaptcha" data-sitekey="6Lc8mFcUAAAAAIySmjeYCdnwzyBWWkAMP0MgPVsd"></div>
            
             <?php
            if(isset($_SESSION['e_bot']))
            {
               echo'<div class="error">'.$_SESSION['e_bot'].'</div>';
                unset($_SESSION['e_bot']);  
            }
            ?>
            
			<input type="submit" value="Zarejestruj się">
			
		</form>
	</div>
	</div>
		<?php } ?>
</body>
</html>