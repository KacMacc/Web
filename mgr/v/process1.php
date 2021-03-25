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

    $sql = $conn->query("SELECT * FROM used_phone_number");
    $numbers1 = array();

    while($row = $sql->fetch_assoc()){
        array_push($numbers1, $row);
    }
    $result['numbers'] = $numbers1;
}

if($action == 'read_card'){

    $sql = $conn->query("SELECT * FROM used_card_number");
    $numbers1 = array();

    while($row = $sql->fetch_assoc()){
        array_push($numbers1, $row);
    }
    $result['numbers'] = $numbers1;
}


if($action =='delete'){

$id = $_POST['id'];

$sql = $conn->query("DELETE FROM used_phone_numbers WHERE id='$id'");

if($sql){
    $result['message'] = "Numer karty poprawnie usunięty";
}else{
    $result['error'] = true;
    $result['message'] = "Nie udało się usunąc numeru!";
}
}

$conn->close();
echo json_encode($result)

 ?>