<?php
// Initialize the session
session_start();
require_once "config.php";
date_default_timezone_set("Europe/Amsterdam");
$date = date("d-m");
$time = date("H:i");
$sql = "UPDATE uren SET uitclock = '".$time."' 
WHERE data = '".$date."' AND username = '".$_SESSION["username"]."' 
";
$result = $link->query($sql);

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>