<?php

session_start();

//magical reccurance relation for calculating variance
function next_m($k, $m, $x){
  return $m + ($x - $m) / $k;
}

function next_s($s, $m, $mnew, $k, $x){
  return $s + ($x - $m) * ($x - $mnew);
}

$key         = $_POST["key"];
$timeStampUp   = $_POST["timeStampUp"];
$timeStampBrowserSpecificUp = $_POST['timeStampBrowserSpecificUp'];
$timeStampDown = $_POST["timeStampDown"];
$timeStampBrowserSpecificDown = $_POST["timeStampBrowserSpecificDown"];
$timeHold = $_POST["timeHold"];
$timeHoldBrowserSpecific = $_POST["timeHoldBrowserSpecific"];
$shiftKey    = $_POST["shiftKey"];

if($key == "!") { $key = "excl"; } 
if($key == "|") { $key = "pipe"; }

$data = array(
    "key"     => $key,
    "timeStampUp"  => $timeStampUp,
    "timeStampBrowserSpecificUp" => $timeStampBrowserSpecificUp,
    "timeStampDown" => $timeStampDown,
    "timeStampBrowserSpecificDown" => $timeStampBrowserSpecificDown,
    "timeHold" => $timeHold,
    "timeHoldBrowserSpecific" => $timeHoldBrowserSpecific,
    "shiftKey"   => $shiftKey

);


$key_hold = $data["key"] . "_hold";
//echo print_r($_SESSION);
if(isset($_SESSION[$key_hold])){
  $info = $_SESSION[$key_hold];
  $new_occurrences = $info["occurrences"] + 1;
  $new_mean = ($info["mean"] * $info["occurrences"] + $data["timeHold"]) / $new_occurrences;

  $m_prev = $_SESSION[$key_hold]["m"];
  $s_prev = $_SESSION[$key_hold]["s"];

  $m_new = next_m($new_occurrences, $m_prev, $data["timeHold"]);
  $s_new = next_s($s_prev, $m_prev, $m_new, $new_occurrences, $data["timeHold"]);

  $_SESSION[$key_hold]["mean"] = $new_mean;
  $_SESSION[$key_hold]["occurrences"] = $new_occurrences;
  $_SESSION[$key_hold]["m"] = $m_new;
  $_SESSION[$key_hold]["s"] = $s_new;
  $_SESSION[$key_hold]["variance"] = $s_new / $new_occurrences;

}else{
  //first event of a given key
  $info = array(
    "mean" => $data["timeHold"],
    "variance" => 0,
    "occurrences" => 1,
    "m" => $data["timeHold"],
    "s" => 0,
  );
  $_SESSION[$key_hold] = $info;
}



if(isset($_SESSION['all_events'])){
    echo "-------------------------\n";
    echo print_r($data);
    echo "\n";
    //echo print_r($data['key'];
    //echo '\n ==============================';
    array_push($_SESSION['all_events'], $data);
}else{
    $_SESSION["all_events"] = array($data);
}

function f($a, $b){
    if($a['timeStampDown'] > $b['timeStampDown']){
       return 1;
    }else{
        return -1;
    }
}

if(isset($_SESSION['all_events'])){
    usort($_SESSION['all_events'], 'f');
}



if(!isset($_SESSION['times_between_keys'])){
    $_SESSION['times_between_keys'] = array();
}

$allEventsLen = count($_SESSION['all_events']);
if($allEventsLen > 1){

    array_push($_SESSION['times_between_keys'],
        $_SESSION['all_events'][$allEventsLen-1]['timeStampDown'] - $_SESSION['all_events'][$allEventsLen-2]['timeStampDown']);
}

$max_duration = 2000;
$bin_count = 200;
$bin_size = $max_duration / $bin_count; 


if(isset($_SESSION['bins'])){
    $val = intval($_SESSION['times_between_keys'][count($_SESSION['times_between_keys'])-1] / $bin_size);
    if($val < $bin_count){
        $_SESSION['bins'][$val]++;
    }
}
else{
    $_SESSION['bins'] = array_fill(0, $bin_count, 0);
}

#  ONLY  WORKS  WITH  EQUAL  LENGHT  HISTOGRAMS  with  NO   0-s  !
//$_SESSION['test'] = bhatta(array(1,1,2,1,0,0), array(1,2,1,0,0,0)); # testing K-L divergence
    

 ?>
