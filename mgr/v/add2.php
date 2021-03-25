<?php

session_start();
    
 include('Connect.php');
 header('Content-Type: application/json');
 
 class Add
 {
 private $db;
 private $connection;
     
 function __construct()
 {
 //constructor call
 $this->db = new Connection();
 $this->connection=$this->db->get_connection();
 }

 public function does_phone_number_exist($phone_number)
 {
 // does user already exist or not

 $query = "SELECT * FROM phone_numbers WHERE phone_number='$phone_number'";
 $result=mysqli_query($this->connection,$query);
     
 $query2 = "SELECT * FROM blocked_phone_numbers WHERE phone_number='$phone_number'";
 $result2=mysqli_query($this->connection,$query2);

 $query3 = "SELECT * FROM used_phone_number WHERE used_phone_number='$phone_number'";
 $result3=mysqli_query($this->connection,$query3);
 
 //$table= array();
  
 if(mysqli_num_rows($result2)>0){
 
$json['status']=69;
$json['message']= $phone_number.' is blocked in this system!';
     
   echo json_encode($json);
   mysqli_close($this->connection);
     
 }elseif(mysqli_num_rows($result)>0){
     
  $json['status']=400;
  $json['message']= $phone_number.' already exists!';

     echo json_encode($json);
     mysqli_close($this->connection);
         
 }elseif(mysqli_num_rows($result3)>0){
     
  $json['status']=401;
  $json['message']= $phone_number.' already exists and is in use!';

     echo json_encode($json);
     mysqli_close($this->connection);
         
 }else{
  
   $query="INSERT INTO blocked_phone_numbers (id, phone_number) VALUES (NULL, '$phone_number')";
     
   $is_inserted=mysqli_query($this->connection, $query);

$table= array();

   if($is_inserted == 1){
$json['status']=200;
     $json['message']= $phone_number.' number added correctly';
   }else {
$json['status']=401;
     $json['message']='Something wrong';
   }
  
   echo json_encode($json);
   //echo json_encode($table); 
    
   mysqli_close($this->connection);
 }
 } 
     
  public function does_card_number_exist($card_number)
 {
 // does user already exist or not
 $query = "SELECT * FROM card_numbers WHERE card_number='$card_number'";
 $result=mysqli_query($this->connection,$query);  

 $query2 = "SELECT * FROM blocked_card_numbers WHERE card_number='$card_number'";
 $result2=mysqli_query($this->connection,$query2);

 $query3 = "SELECT * FROM used_card_number WHERE used_card_number='$card_number'";
 $result3=mysqli_query($this->connection,$query3);
        
     
 if(mysqli_num_rows($result2)>0){
     
$json['status']=69;
$json['message']=$card_number.' is blocked in this system!';
     
   echo json_encode($json);
   mysqli_close($this->connection);
     
 }elseif(mysqli_num_rows($result)>0){ 
     
$json['status']=400;
$json['message']=$card_number.' already exists!';

  echo json_encode($json);
    mysqli_close($this->connection);

 }elseif(mysqli_num_rows($result3)>0){ 
     
  $json['status']=401;
  $json['message']= $card_number.' already exists and is in use!';
  
    echo json_encode($json);
      mysqli_close($this->connection);
  
   }else{
     
   $query="INSERT INTO blocked_card_numbers(id, card_number) VALUES (NULL, '$card_number')";
     
   $is_inserted=mysqli_query($this->connection, $query);
  
   if($is_inserted == 1){
$json['status']=200;
     $json['message']= $card_number.' number added correctly';
   }else {
$json['status']=401;
     $json['message']='Something wrong';
   }
   echo json_encode($json);
   mysqli_close($this->connection);
 }
 }
 }


 $register=new Add();

 if(isset($_POST['phone_number']) && !isset($_POST['card_number']) && isset($_POST['card_number'])==false)
 {
   $phone_number=$_POST['phone_number'];
   $num_length = strlen((string)$phone_number);

 if (!empty($phone_number) && $num_length == 9){
     $register-> does_phone_number_exist($phone_number);
   }else {
$json['status']=100;
     $json['message']='Numer musi mieć 9 cyfr!';
     echo json_encode($json);
   }
 }

 if(isset($_POST['card_number']) && !isset($_POST['phone_number']) && isset($_POST['phone_number'])==false)
 {
   $card_number=$_POST['card_number'];
   $num_length1 = strlen((string)$card_number);

 if (!empty($card_number) && $num_length1 == 16) {
     $register-> does_card_number_exist($card_number);
   }else {
$json['status']=100;
     $json['message']='Numer musi mieć 16 cyfr!';
     echo json_encode($json);
   }
 }



?>