<?php
// date_default_timezone_set("Europe/Amsterdam");
// $date = date("d-m");
// $time = date("H:i");
// echo $date;
// echo $time;
require_once "config.php";
$ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
echo getRealIpAddr();
?>