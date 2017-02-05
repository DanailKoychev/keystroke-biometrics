<?php

session_start();

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
echo session_id();
$key_hold = $data["key"] . "_hold";

if(isset($_SESSION[$key_hold])){
  $info = $_SESSION[$key_hold];
  $examples = $info["examples"];
  $new_occurrences = $info["occurrences"] + 1;
  $new_mean = ($info["mean"] * $info["occurrences"] + $data["timeHold"]) / $new_occurrences;
  $new_variance = 0;
  for($i = 0; $i < count($examples); $i++) {
    $new_variance += pow($new_mean - $examples[i], 2);
  }
  $new_variance += pow($new_mean - $data["timeHold"], 2);
  $new_variance /= $new_occurrences;
  array_push($examples, $data["timeHold"]);

  $_SESSION[$key_hold]["mean"] = $new_mean;
  $_SESSION[$key_hold]["variance"] = $new_variance;
  $_SESSION[$key_hold]["occurrences"] = $new_occurrences;
  $_SESSION[$key_hold]["examples"] = $examples;
  echo "well this seems to work";
}else{
  //first event of a given key
  echo "first";
  $info = array(
    "mean" => $data["timeHold"],
    "variance" => 0,
    "occurrences" => 1,
    "examples" => array($data["timeHold"])
  );
  $_SESSION[$key_hold] = $info;
}

// $js = json_encode($data);
// echo json_encode($_SESSION);

// $myfile = fopen("files/file.txt", "a");
// fwrite($myfile, $js."\n");
// fclose($myfile);

 ?>
