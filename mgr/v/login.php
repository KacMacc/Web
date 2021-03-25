<?php
session_start();
    
 include('Connect.php');
 header('Content-Type: application/json');
 
 class User
 {
 private $db;
 private $connection;
     
 function __construct()
 {
 
 $this->db = new Connection();
 $this->connection=$this->db->get_connection();
 }

 public function does_user_exist($user,$pass){

    $query = "SELECT * FROM users WHERE user='$user' AND pwd='$pass'";
    $result=mysqli_query($this->connection,$query);

    if(mysqli_num_rows($result)>0){

    $row= mysqli_fetch_array($result);
    $data = array(); 

    array_push($data,array( 
    "Id"=>$row['id'],
    "Login"=>$row['user'],
    "Pwd"=>$row['pwd'],
    "Access"=>$row['access'] ) );
    
    $json['status']=200;
    $json['message']='Login Successful';
    $json['detail']=$data;
    
    echo json_encode($json);
    
    mysqli_close($this->connection);
    }else { 
    $json['status']=400;
    $json['message']='Wrong email or password';
    echo json_encode($json);
    mysqli_close($this->connection);
    }
    }
    }
    
    $user1 = new User();

    if($_SERVER['REQUEST_METHOD'] == 'post') {
    $user=$_POST['use'];
    $pass=$_POST['pas'];
    if (!empty($user) && !empty($pass)) {
    //$encrypted_password=md5($pass);
    $user1-> does_user_exist($user,$pass);
    header('Location:mgr/v/index.html');
    }else {
    $json['status']=100;
    $json['message']='You must fill both fields';
    echo json_encode($json);
    header('Location:wyb.php');
   
    }
}
?>