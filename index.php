<?php 

function selectQuery($mysqli){
    $sql = 'SELECT * FROM users';
    $result = $mysqli->query($sql);

    if($result){
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[]= $row;
        }
        $jsonData = json_encode($data);
        echo $jsonData;
    }
}

function insertionQuery($mysqli){
 $data = json_decode(file_get_contents('php://input'),true);
 $name = $data['name'];
 print_r($name);
}

$host='localhost';
$user='root';
$password='';
$database='api';
$mysqli;

try{
    $mysqli = new mysqli($host,$user,$password,$database);
}catch(mysqli_sql_exception $e){
    echo $e;
    die();
}

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

//$json = json_encode($method);
//print_r($json);

switch($method){
    case 'GET':
        selectQuery($mysqli);
        break;
    case 'POST';
        break;
    case 'PUT':
        break;
    case 'PATCH':
        break;
    case 'DELETE':
        break;
    default:
        echo 'metodo no permitido';
        break;
    }
?>