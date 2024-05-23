<?php
if (isset($_GET["UserID"]) ){
    $id = $_GET["UserID"];

    $servername = "localhost";
    $username = "root";
    $password = "";          //this is empty because I din't set any password
    $dbname = "online_risk_mgt_training_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$sql = " DELETE FROM users WHERE UserID=$id";

$connection->query($sql);
}

header("Location: user.php");
exit;
?>