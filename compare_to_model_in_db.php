<?php
require 'CONSTANTS.php';

function is_within_limit($current_data, $other, $sigmas, $percentage){
  //percentage should be a number between 0 and 1
  $count_within_limit = 0;
  $differences = 0;
  foreach ($current_data as $key_press => $metric) {
    if (isset($other[$key_press])){
      $other_metric = $other[$key_press];
      $current_mean = $metric['mean'];

      $other_mean = $other_metric['mean'];
      $other_standart_deviation = sqrt($other_metric['variance']);
      $difference = abs($current_mean - $other_mean);

      $differences += $difference;

      if($difference <= $sigmas * $other_standart_deviation){
        $count_within_limit += 1;
      }
    }
  }
  return $count_within_limit / count($current_data);

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
      $metric = is_within_limit($current_data, $model, $sigmas, $percentage);
      echo "hold ".$username . " " . $metric . "\n";
      // if(is_within_limit($current_data, $model, $sigmas, $percentage)){
      //   array_push($within_limit, $username);
      // }
    }
  }
  $conn = null;
  return $within_limit;
}


function parliament($current_data, $sigmas, $percentage){
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
      $metric_hold = is_within_limit($current_data, $model, $sigmas, $percentage);
      // echo "hold ".$username . " " . $metric_hold. "\n";
      // if(is_within_limit($current_data, $model, $sigmas, $percentage)){
      //   array_push($within_limit, $username);
      // }
      $metric_hist = -1;
      if(isset($model['bins'])) {
          if(bhatta($model['bins'], $current_data) > 0.9){
            array_push($within_limit, $username);
          }
          $metric_hist = bhatta($model['bins'], $current_data);
          // echo round(bhatta($model['bins'], $current_data), 2);
          // echo  " ";
          // echo $username;
          // echo "\n";
      }
      if ($metric_hist != -1){
        echo "parliament: " . round(($metric_hist*0.5 + 0.5*$metric_hold), 2) . " " . $username;
      }else{
        echo "just hold: " . round($metric_hold, 2) . " " . $username;

      }
    }
  }
  $conn = null;
  return $within_limit;
}

function compare_time_hist($current_data){
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
      if(isset($model['bins'])) {
          if(bhatta($model['bins'], $current_data) > 0.9){
            array_push($within_limit, $username);
          }
          echo round(bhatta($model['bins'], $current_data), 2);
          echo  " ";
          echo $username;
          echo "\n";
      }
    }
  }
  $conn = null;
  return $within_limit;


}
function bhatta($p, $q) {
    $sum = 0;
    $sumP = array_sum($p);
    $sumQ = array_sum($q);
    for($i = 0; $i < count($p); $i++){
        $sum += sqrt(($p[$i]/$sumP) * ($q[$i]/$sumQ));
    }
    return $sum;
    //return -log($sum);
}

?>
