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

if(isset($_SESSION[$key_hold])){
  $info = $_SESSION[$key_hold];
  $examples = $info["examples"];
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

// $js = json_encode($data);
// echo json_encode($_SESSION);

// $myfile = fopen("files/file.txt", "a");
// fwrite($myfile, $js."\n");
// fclose($myfile);

 ?>
