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

    //$row= mysqli_fetch_array($result);
    //$data = array();
    $table= array();
    
          if($row=mysqli_fetch_assoc($result))
          {
            
          
        $_SESSION['zalogowany']=true;
        //$_SESSION['id']=$wiersz['id'];
        $_SESSION['user']=$row['user'];  
        //$_SESSION['uprawnienia']=$wiersz['uprawnienia'];


        //echo "<p>Zalogowany jako: ".$_SESSION['user'];
        $result->close();
        
    }
    /*array_push($data,array( 
    "Id"=>$row['id'],
    =>$row['user'],
    "Pwd"=>$row['pwd'],
    "Access"=>$row['access'] ) );*/
    //$row->close();
    
    $json['status']=200;
    $json['message']='Login Successful';

           header('Location:index.php');

    
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

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user=$_POST['use'];
    $pass=$_POST['pas'];
    if (!empty($user) && !empty($pass)) {
    //$encrypted_password=md5($pass);
    $user1-> does_user_exist($user,$pass);
    //echo "zalagowano jako ".$_SESSION['user'];
    }else {
    $json['status']=100;
    $json['message']='You must fill both fields';
    echo json_encode($json);
    }
    header('Location:wyb.php');
}
?>