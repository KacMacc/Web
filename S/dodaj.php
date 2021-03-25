<?php
session_start();
if((empty($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==false))
{
header ('Location:zaloguj.php?opcja=zaloguj');
 exit;

if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
  header ('Location:dodaj.php');
 exit;
}
}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
 <meta charset="utf-8"/>
  <title>Domator</title>  
    <meta name="description" content="Ogłoszenia o nieruchomościach"/>
    <meta name="keywords" content="nieruchomości, dom, mieszkanie, ogłoszenie,wynajem, kupno, działki" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <link href="style22.css" rel="stylesheet" type="text/css"/>
    <link href="css/fontello.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    </head>
    
     <body>
    <div id="container"> 
      <div class="rectangle1"></div>
    <div id="topbarL">
<?php echo "<p>Zalogowany jako: ".$_SESSION['user'];?></div> 
    <form action=wylogowanie.php>
    <div id="topbarR"><input type="submit" value="Wyloguj"></div> 
        </form>
 <div style="clear:both;"></div>
        <div id="powitanie">
   <div id="kategorie">
<div class="test00">Dodaj ogłoszenie</div>
       <a href=index.php>
    <div class="test1">Powrót na stronę główną</div>
           </a>
    <div style="clear:both"></div>
    </div>
       </div>
    
       
        <div id="naglowek">
 
        </div>  
        
    <form method="post" action="dodaj_db.php" enctype="multipart/form-data">    
    <div id="kategorie1">
       <input type="text" name="tytul" placeholder="Wpisz tytuł" onfocus="this.placeholder=''" onblur="this.placeholder='Wpisz tytuł'" required><br/>
   
<div class="select">
    <select name=kat>
        <option>Wybierz kategorie</option>
        <option >Mieszkanie</option>
        <option value="Dom">Dom</option>
        <option value="Działka">Działka</option>
        <option value="Biura i lokale">Biura i lokale</option>
        <option value="Garaż">Garaż</option>
    </select>
    <div class="select_arrow">
    </div>
</div>
        <div class="select">
    <select name=typ1>
        <option>Wybierz typ ogłoszenia</option>
        <option value=Kupię>Kupię</option>
        <option value="Sprzedam">Sprzedam</option>
        <option value="Wynajmę">Wynajmę</option>
    </select>
    <div class="select_arrow">
    </div>
</div>
    <textarea autoResize() name="opis" placeholder="Tutaj wpisz opis (Max = 1000 znaków)" onfocus="this.placeholder=''" onblur="this.placeholder='Tutaj wpisz opis (Max = 1000 znaków)'" maxlength="1000" required></textarea>
<input type="file" name="dom_img" id="file_input">
        <input type="text" name="imie" placeholder="Imię" onfocus="this.placeholder=''" onblur="this.placeholder='Imię'" required><br/>
        <input type="text" name="lok" placeholder="Lokalizacja" onfocus="this.placeholder=''" onblur="this.placeholder='Lokalizacja'" required><br/>
        <input type="text" name="tel" placeholder="Telefon" onfocus="this.placeholder=''" onblur="this.placeholder='Telefon'" required><br/>
        <button type="summit">Dodaj ogłoszenie</button>
</div>
</form>
        
        
        <div id="stopa">
       <div id="stopa1">
           Autor strony: Kacper Maćkowiak &copy; </div>
            
            <div id="stopa2">
                Bazy danych 1 - projekt zaliczeniowy
            </div>
         <div style="clear:both"></div>
        </div>
        

        </div>
    

    </body>

    
    

</html>