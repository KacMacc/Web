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

    $sql = $conn->query("SELECT * FROM card_numbers");
    $numbers = array();

    while($row = $sql->fetch_assoc()){
        array_push($numbers, $row);
    }
    $result['numbers'] = $numbers;
}

if($action == 'read_card'){

    $sql = $conn->query("SELECT * FROM used_card_number");
    $numbers1 = array();

    while($row = $sql->fetch_assoc()){
        array_push($numbers1, $row);
    }
    $result['numbers'] = $numbers1;
}
if($action == 'read_blocked_phones'){

    $sql = $conn->query("SELECT * FROM blocked_card_numbers");
    $numbers = array();

    while($row = $sql->fetch_assoc()){
        array_push($numbers, $row);
    }
    $result['numbers'] = $numbers;
}


if($action =='delete'){

#$id = $_POST['id'];
$card = $_POST['card_number'];

$sql = $conn->query("DELETE FROM card_numbers WHERE card_number='$card'");

if($sql){
    $result['message'] = $card.' deleted correctly!';
}else{
    $result['error'] = true;
    $result['message'] = 'ERROR OCCURED '.$card.' couldnt be deleted!';
}
}

if($action =='delete_blocked'){

    #$id = $_POST['id'];
    $card = $_POST['card_number'];
    
    $sql = $conn->query("DELETE FROM blocked_card_numbers WHERE card_number='$card'");
    
    if($sql){
        $result['message'] = $card.' deleted correctly!';
    }else{
        $result['error'] = true;
        $result['message'] = 'ERROR OCCURED '.$card.' couldnt be deleted!';
    }
    }

if($action =='use'){

    #$id = $_POST['id'];
    $card = $_POST['card_number'];
    
    $sql = $conn->query("INSERT INTO used_card_number (`id`, `used_card_number`, `in_date1`, `out_date1`, `date_diff1`) VALUES (NULL, '$card', NULL, NULL, NULL);");
    
    
    if($sql){
        $result['message'] = $card.' used correctly!';
    }else{
        $result['error'] = true;
        $result['message'] = 'ERROR OCCURED'.$card.' couldnt be used!';
    }

    $sql1 = $conn->query("DELETE FROM card_numbers WHERE card_number='$card'");
    
    if($sql1){
        $result['message'] = $card.' used correctly!';
    }else{
        $result['error'] = true;
        $result['message'] = 'ERROR OCCURED'.$card.' couldnt be used!';
    }
    }

$conn->close();
echo json_encode($result)

 ?>