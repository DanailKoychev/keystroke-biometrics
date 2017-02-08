<?php
require 'CONSTANTS.php';

function is_within_limit($current_data, $other, $sigmas, $percentage){
  //percentage should be a number between 0 and 1
  $count_within_limit = 0;
  foreach ($current_data as $key_press => $metric) {
    if (isset($other[$key_press])){
      $other_metric = $other[$key_press];
      $current_mean = $metric['mean'];

      $other_mean = $other_metric['mean'];
      $other_standart_deviation = sqrt($other_metric['variance']);
      $difference = abs($current_mean - $other_mean);

      if($difference <= $sigmas * $other_standart_deviation){
        $count_within_limit += 1;
      }
    }
  }
  return ($count_within_limit / count($current_data)) >= $percentage;

}

function compare($current_data, $sigmas, $percentage){
  // $percentage is the % of key_holds that must be within $sigmas of the mean
  $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);

  $sql = "SELECT * FROM model";
  $query = $conn->prepare($sql);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);

  $within_limit = array();
  if(count($result) > 0){
    foreach($result as $row){
      $username = $row['username'];
      $model = json_decode($row['hold_time'], true);
      if(is_within_limit($current_data, $model, $sigmas, $percentage)){
        array_push($within_limit, $username);
      }
    }
  }
  $conn = null;
  return $within_limit;
}
?>