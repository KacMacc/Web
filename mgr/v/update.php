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
    $query = "SELECT * FROM phone_numbers WHERE phone_number='$edit'";
 $result=mysqli_query($this->connection,$query);
     
 $query2 = "SELECT * FROM blocked_phone_numbers WHERE phone_number='$edit'";
 $result2=mysqli_query($this->connection,$query2);
 
 //$table= array();
  
 if(mysqli_num_rows($result2)>0){
 
$json['status']=69;
$json['message']='This phone number is blocked in this system!';
     
   echo json_encode($json);
   mysqli_close($this->connection);
     
 }elseif(mysqli_num_rows($result)>0){
     
  $json['status']=400;
  $json['message']='This phone number already exists!';

     echo json_encode($json);
     mysqli_close($this->connection);
         
 }else{
  
   //$query="INSERT INTO phone_numbers(id, phone_number) VALUES (NULL, '$phone_number')";
   $query="UPDATE phone_numbers SET phone_number='$edit' WHERE id='$id'";


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
}

$register=new Up();

if(isset($_POST['edit']) && !isset($_POST['card_number']) && isset($_POST['card_number'])==false){
    
    $phone_number=$_POST['phone_number'];
  if (!empty($phone_number)) {
      $register-> does_phone_number_exist($phone_number);
    }else {
 $json['status']=100;
      $json['message']='You must fill all the fields';
      echo json_encode($json);
    }
  }
 
  if(isset($_POST['card_number']) && !isset($_POST['edit']) && isset($_POST['edit'])==false)
  {
    $card_number=$_POST['card_number'];
  if (!empty($card_number)) {
      $register-> does_card_number_exist($card_number);
    }else {
 $json['status']=100;
      $json['message']='You must fill all the fields';
      echo json_encode($json);
    }
  }
 
?>