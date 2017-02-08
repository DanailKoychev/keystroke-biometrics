<?php
session_start();
require 'compare_to_model_in_db.php';

$data = array();

foreach($_SESSION as $key => $value){
  if($key != "username" && $key != "password"){
    $data[$key] = $value;
  }
}
$sigmas = 2.0;
$percentage = 0.8;
$result = compare($data, $sigmas, $percentage);

echo print_r($result);


 ?>
