<?php
session_start();

require 'CONSTANTS.php';

$user = DBUSER;
$pass = DBPASS;
$host = HOST;
$dbname = DBNAME;


$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);


$username = $_POST["username"];

$hold_time = array();

$hist = array();

foreach($_SESSION as $key => $value){
  if(strpos($key, 'hold') !== false){
    $hold_time[$key] = $value;
  }
}

$hist['bins'] = $_SESSION['bins'];

$hold_time_in_js = json_encode($hold_time);
$hist_in_js = json_encode($hist);


$sql_insert_model = "INSERT INTO metrics(username, hold_time, histogram) VALUES (:username, :hold_time_metric, :histogram_metric)";
$stmt = $conn->prepare($sql_insert_model);
$stmt->bindParam(":username", $username);
$stmt->bindParam(":hold_time_metric", $hold_time_in_js);
$stmt->bindParam(":histogram_metric", $hist_in_js);
$success = $stmt->execute();

if($success){
  echo "success";
}else{
  echo "failure";
}
$conn = null;

 ?>
