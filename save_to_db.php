<?php
session_start();

require 'CONSTANTS.php';

$user = DBUSER;
$pass = DBPASS;
$host = HOST;
$dbname = DBNAME;


$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$data = array();

$username = $_POST["username"];


foreach($_SESSION as $key => $value){
  if($key != "username"){
    $data[$key] = $value;
  }
}

$model_in_js = json_encode($data);


$sql_insert_user = "INSERT INTO users(username) VALUES( :username)";
$stmt = $conn->prepare($sql_insert_user);
$stmt->bindParam(":username", $username);
$success = $stmt->execute();

// if($success){
//   echo "User successfully added!";
// }else{
//   echo "Couldn't add user :(";
// }

$sql_insert_model = "INSERT INTO model(username, hold_time) VALUES (:username, :hold_time_metric)";
$stmt = $conn->prepare($sql_insert_model);
$stmt->bindParam(":username", $username);
$stmt->bindParam(":hold_time_metric", $model_in_js);
$success = $stmt->execute();

if($success){
  echo "success";
}else{
  echo "failure";
}
$conn = null;

 ?>
