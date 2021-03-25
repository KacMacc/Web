<?php

session_start();
    
include('Connect.php');
header('Content-Type: application/json');
 
 class Show1
 {
 private $db;
 private $connection;
     
 function __construct()
 {
 
 $this->db = new Connection();
 $this->connection=$this->db->get_connection();
 }


public function show_card_number()
{
$query = "SELECT * FROM card_numbers";

$result=mysqli_query($this->connection,$query);
     
      
$table= array();

      while($row=mysqli_fetch_assoc($result))
      {
          $json_array[]=$row;
      }
    $table['numbers']=$json_array;
echo json_encode($table);   
 }
 
 }

$show = new Show1();
$show-> show_card_number();

?>