<?php
session_start();

$user = 'root';
$pass = '';
$host = "localhost";
$dbname = "keystroke_biometrics";


$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$data = array();

$username = $_POST["username"];
$password = $_POST["password"];

foreach($_SESSION as $key => $value){
  if($key != "username" && $key != "password"){
    $data[$key] = $value;
  }
}

$model_in_js = json_encode($data);

$sql_insert_user = "INSERT INTO users(username, password) VALUES( :username, :password)";
$stmt = $conn->prepare($sql_insert_user);
$stmt->bindParam(":username", $username);
$stmt->bindParam(":password", $password);
$success = $stmt->execute();

if($success){
  echo "User successfully added!";
}else{
  echo "Couldn't add user :(";
}

$sql_insert_model = "INSERT INTO model(username, hold_time) VALUES (:username, :hold_time_metric)";
$stmt = $conn->prepare($sql_insert_model);
$stmt->bindParam(":username", $username);
$stmt->bindParam(":hold_time_metric", $model_in_js);
$success = $stmt->execute();

if($success){
  echo "Model successfully added!";
}else{
  echo "Coulnd't add model :(";
}

$conn = null;

 ?>
