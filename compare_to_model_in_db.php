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

function merge_bins_50($bins){
    $len = count($bins)/50;
    $new_bins = array();
    for($i = 0; $i < 50; $i++) {
        $current_bin = 0;
        for($j = 0; $j < 4; $j++){
            $current_bin += $bins[$i+$j];
        }
    array_push($new_bins, $current_bin);
    }
    return $new_bins;
}    


function parliament($current_data, $sigmas, $percentage, $hist){
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
      if(count($current_data) > 0) {
          $metric_hold = is_within_limit($current_data, $model, $sigmas, $percentage);
      }
      if(isset($model['bins']) && count($hist) != 0) {
    # MERGE BINS 50 ------------
          $metric_hist = bhatta($model['bins'], $hist);
          //$metric_hist50 = bhatta(merge_bins_50($model['bins']),merge_bins_50($hist));

          //echo print_r(merge_bins_50($hist));
          //echo round($metric_hist, 2) . " " .
              //round($metric_hist50, 2). " " . $username . "\n"; 

            
          //echo round($metric_hold, 2) . "   " . round($metric_hist, 2) ."   ";
          //echo "p+:" . round(($metric_hist*0.5 + 0.5*$metric_hold), 2) .  "  " . "p*:" . round(($metric_hist*$metric_hold), 2) . "   " . $username . "\n";

          $parliament_decision = $metric_hist*0.5 + 0.5*$metric_hold;
          if($parliament_decision > 0.2){
            array_push($within_limit, array($username, $parliament_decision));
          }
      }
    }
  }
  $conn = null;
  //return $within_limit; 
  usort($within_limit, "compare_similarity");
  return $within_limit;
}

function compare_similarity($u1, $u2){
    if($u1[1] < $u2[1]){
        return 1;
    }
    if($u1[1] == $u2[1]){
        return 0;
    }
    if($u1[1] > $u2[1]){
        return -1;
    }
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
          //echo round(bhatta($model['bins'], $current_data), 2);
          //echo  " ";
          //echo $username;
          //echo "\n";
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
    if($sumP == 0 || $sumQ == 0) {
        return 1;
    }
    for($i = 0; $i < count($p); $i++){
        $sum += sqrt(($p[$i]/$sumP) * ($q[$i]/$sumQ));
    }
    return $sum;
    //return -log($sum);
}

?>
