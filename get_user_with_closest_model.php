<?php
session_start();
require 'compare_to_model_in_db.php';

$data = array();
$hist = array();

foreach($_SESSION as $key => $value){
    if(strpos($key, 'hold') !== false){
    $data[$key] = $value;
  }

    if($key == 'bins'){
        $hist = $value;
    }
}
$sigmas = 1.5;
$percentage = 0.8;

$result = parliament($data, $sigmas, $percentage, $hist);

$result_json = "[";
foreach($result as $user){
    $result_json = $result_json . "{\"username\":\"" . $user[0] . "\", \"similarity\":\"" . $user[1] . "\"},";
}


if($result_json[strlen($result_json) - 1] == ","){
    $result_json =  substr($result_json, 0, strlen($result_json)-1);
}
$result_json = $result_json . "]";

echo $result_json;



//echo print_r(json_encode($result));
// $result_time_hist = compare_time_hist($hist);
//echo print_r($result);
//echo print_r("--- Hist Metric ----\n");
// echo print_r($result_time_hist);

 ?>
