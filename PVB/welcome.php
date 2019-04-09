<?php
// Initialize the session
session_start();
require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; margin: 50px; text-align: left; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Welkom, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Je bent in geklokt.</h1>
    </div>
    <h1>Huidige dag: <?php
    $sql = "SELECT data, inclock, uitclock FROM uren WHERE username = '".$_SESSION["username"]."' AND uitclock IS NULL";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["data"]." | ".$row["inclock"]." - ".$row["uitclock"]."<br>";
        }
    } else {
        echo "0 results";
    }
    ?></h1>
    <h3>Afgelopen dagen:</h3>
    <?php
    $sql = "SELECT data, inclock, uitclock FROM uren WHERE username = '".$_SESSION["username"]."' AND uitclock != ''";
    $result = $link->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["data"]." | ".$row["inclock"]." - ".$row["uitclock"]."<br>";
        }
    } else {
        echo "0 results";
    }
    ?>
    <br>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Verander Wachtwoord</a>
        <a href="logout.php" class="btn btn-danger">Uitklokken</a>
    </p>
</body>
</html>