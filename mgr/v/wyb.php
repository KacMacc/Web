<?php
session_start();

if((empty($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==false))
{
header ('Location:i.php');
 exit;

if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
{
  header ('Location:wyb.php');
 exit;
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta
      name="viewport"
      content="width=device-width", initial-scale=1, shrink-to-fit=no"
    />
    <title>Aplication to making wałki</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
 
    <script
      src="https://kit.fontawesome.com/bc3017ba69.js"
      crossorigin="anonymous"
    ></script>

  </head>

  <body>
    <div id="app">
      
      <div class="container-fluid">
        <div class="row bg-dark">
          <div class="col-lg-12">
            <p class="text-center text-light display-4 pt-2">
              Aplication to making wałki
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-3">
          <div class="col-lg-11">
          <h3> <?php echo "<p>Loged as: ".$_SESSION['user'];?></h3>
          </div>
          <button class="btn btn_info float-right">
            <i class="fas fa-user-slash" p style="color:red;"></i>&nbsp;&nbsp;<a href="wyloguj.php"><p style="color:red;">Log out</p></a>
            </button>
        </div>
        <hr class="bg-info" />
        <div class="form-group">
        <p class="text-center text-red display-4 pt-2">
              Phone numbers
            </p>
        <a href="telefony.php" class="btn btn-info btn-block btn-lg">
                    Phone numbers
                  </a>
                </div>
                <div class="form-group">
                <a href="index3.php" class="btn btn-danger btn-block btn-lg">
                    Used phone numbers
                  </a>
                </div>
                <div class="form-group">
                <a href="block_phones.php" class="btn btn-warning btn-block btn-lg">
                  Blocked phone numbers
                  </a>
                </div>
                <hr class="bg-info" />
                <p class="text-center text-red display-4 pt-2">
              Card numbers
            </p>
                <div class="form-group">
                <a href="karty.php" class="btn btn-info btn-block btn-lg">
                    Card numbers
                  </a>
                </div>
                
                <div class="form-group">
                <a href="index4.php" class="btn btn-danger btn-block btn-lg">
                  Used card numbers
                  </a>
                </div>
                
                <div class="form-group">
                <a href="block_cards.php" class="btn btn-warning btn-block btn-lg">
                  Blocked card numbers
                  </a>
                </div>
  
  </body>
</html>
