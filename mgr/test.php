<?php
include('con.php');
header('Content-Type: application/json');

class User
{
private $db;
private $connection;
    
function __construct()
{
$this->db = new DB_Connection();
$this->connection=$this->db->get_connection();
}
    
public function does_user_exist($mail,$pass){
    
$query = "SELECT * FROM user WHERE email='$mail' AND password='$pass'";
$result=mysqli_query($this->connection,$query);
if(mysqli_num_rows($result)>0){
$row= mysqli_fetch_array($result);
$data = array(); 
array_push($data,array( "user_id"=>$row['user_id'],
"name"=>$row['name'],
"email"=>$row['email'],
"mobile"=>$row['mobile'],
"address"=>$row['address'],
"password"=>$row['password'], ) );

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

$user = new User();
if(isset($_POST['email'],$_POST['password']))
{
$mail=$_POST['email'];
$pass=$_POST['password'];
if (!empty($mail) && !empty($pass)) {
$encrypted_password=md5($pass);
$user-> does_user_exist($mail,$encrypted_password);
}else {
$json['status']=100;
$json['message']='You must fill both fields';
echo json_encode($json);
}
}
?>