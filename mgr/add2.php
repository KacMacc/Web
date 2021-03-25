<?php

$con=new mysqli("localhost", "root","","pieclando");
if($con->connect_error){
    die("Connection Failed!".$con->connect_error);
}

$result = array('error'=>false);
$action='';

if(isset($_POST['phone_number']) && !isset($_POST['phone_number']) && isset($_POST['phone_number'])==false){

    $card_number = $_POST['phone_number'];

    $sql=$con->query("INSERT INTO card_numbers(id, card_number) VALUES (NULL, '$card_number')");
     
   $result=mysqli_query($this->connection, $sql);

   $table= array();

   while($row=$sql->fetch_assoc())
   {
       array_push($table, $row);
   }
 $result['numbers']=$table;
   
}
echo json_encode($table);




















?>