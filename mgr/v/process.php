<?php
session_start();

$conn = new mysqli("localhost", "root", "", "pieclando");

if($conn->connect_error){
    die("Połączenie nie udane".$conn->connect_error);
}

$result = array('error'=>false);
$action='';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

if($action == 'read'){

    $sql = $conn->query("SELECT * FROM phone_numbers");
    $numbers = array();

    while($row = $sql->fetch_assoc()){
        array_push($numbers, $row);
    }
    $result['numbers'] = $numbers;
}

if($action == 'read_used'){

    $sql = $conn->query("SELECT * FROM used_phone_number");
    $numbers1 = array();

    while($row = $sql->fetch_assoc()){
        array_push($numbers1, $row);
    }
    $result['numbers'] = $numbers1;
}

if($action == 'read_blocked_phones'){

    $sql = $conn->query("SELECT * FROM blocked_phone_numbers");
    $numbers = array();

    while($row = $sql->fetch_assoc()){
        array_push($numbers, $row);
    }
    $result['numbers'] = $numbers;
}



if($action =='delete'){

#$id = $_POST['id'];
$phone = $_POST['phone_number'];

$sql = $conn->query("DELETE FROM phone_numbers WHERE phone_number='$phone'");

if($sql){
    $result['message'] = $phone.' deleted correctly!';
}else{
    $result['error'] = true;
    $result['message'] = 'ERROR OCCURED '.$phone.' couldnt be deleted!';
}
}

if($action =='delete_blocked_phones'){

    #$id = $_POST['id'];
    $phone = $_POST['phone_number'];
    
    $sql = $conn->query("DELETE FROM blocked_phone_numbers WHERE phone_number='$phone'");
    
    if($sql){
        $result['message'] = $phone.' deleted correctly!';
    }else{
        $result['error'] = true;
        $result['message'] = 'ERROR OCCURED'.$phone.' couldnt be deleted!';
    }
    }

if($action =='use'){

    #$id = $_POST['id'];
    $phone = $_POST['phone_number'];
    
    $sql = $conn->query("INSERT INTO used_phone_number (`id`, `used_phone_number`, `in_date`, `out_date`, `date_diff`) VALUES (NULL, '$phone', NULL, NULL, NULL);");
    
    
    if($sql){
        $result['message'] = $phone.' used correctly!';
    }else{
        $result['error'] = true;
        $result['message'] = 'ERROR OCCURED'.$phone.' couldnt be used!';
    }

    $sql1 = $conn->query("DELETE FROM phone_numbers WHERE phone_number='$phone'");

    if($sql1){
        $result['message'] = $phone.' used correctly!';
    }else{
        $result['error'] = true;
        $result['message'] = 'ERROR OCCURED'.$phone.' couldnt be used!';
    }
    }

$conn->close();
echo json_encode($result)

 ?>