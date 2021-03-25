<?php

session_start();
    
 include('Connect.php');
header('Content-Type: application/json');
 
 class Show
 {
 private $db;
 private $connection;
     
 function __construct()
 {
 
 $this->db = new Connection();
 $this->connection=$this->db->get_connection();
 }


  public function show_phone_number()
  {
 $query = "SELECT * FROM phone_numbers";

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


$show = new Show();
$show-> show_phone_number();

?>