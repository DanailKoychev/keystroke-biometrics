<?php

$key         = $_POST["key"];
$timeStamp   = $_POST["timeStamp"];
$timeStampBrowserSpecific = $_POST['timeStampBrowserSpecific'];
$shiftKey    = $_POST["shiftKey"];
$type        = $_POST["type"];

$data = array(
    "key"     => $key,
    "timeStamp"  => $timeStamp,
    "timeStampBrowserSpecific" => $timeStampBrowserSpecific,
    "shiftKey"   => $shiftKey,
    "type"      => $type
);
$js = json_encode($data);
echo $js;

$myfile = fopen("/opt/lampp/htdocs/KeyboardDynamics/files/file.txt", "a");
fwrite($myfile, $js."\n");
fclose($myfile);

 ?>
