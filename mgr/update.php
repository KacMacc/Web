<?php

session_start();
    
 include('Connect.php');
 header('Content-Type: application/json');
 
 class Up
 {
 private $db;
 private $connection;
     
 function __construct()
 {
 //constructor call
 $this->db = new Connection();
 $this->connection=$this->db->get_connection();
 }

 public function does_phone_number_exist($edit)
 {
 // does user already exist or not
    $id = $_POST['id'];

   //$query="INSERT INTO phone_numbers(id, phone_number) VALUES (NULL, '$phone_number')";
   $query="UPDATE phone_numbers SET phone_number='$phone_number' WHERE id='$id'";


   $is_inserted=mysqli_query($this->connection, $query);

$table= array();

   if($is_inserted == 1){
$json['status']=200;
     $json['message']= $edit.' number edited correctly';
   }else {
$json['status']=401;
     $json['message']='Something wrong';
   }
  
   echo json_encode($json);
   //echo json_encode($table); 
    
   mysqli_close($this->connection);
 }
 } 

$register=new Up();
 
?>