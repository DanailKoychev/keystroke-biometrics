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
$sigmas = 2.0;
$percentage = 0.8;

$result = parliament($data, $sigmas, $percentage);
// $result_time_hist = compare_time_hist($hist);



//echo print_r($result);
//echo print_r("--- Hist Metric ----\n");
// echo print_r($result_time_hist);


 ?>
