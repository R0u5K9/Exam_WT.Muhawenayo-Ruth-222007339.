<?php
if (isset($_GET["StudentID"]) ){
    $stdID = $_GET["StudentID"];

    $servername = "localhost";
    $username = "root";
    $password = "";          //this is empty because I din't set any password
    $dbname = "online_risk_mgt_training_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$sql = " DELETE FROM students WHERE StudentID=$stdID";

$connection->query($sql);
}

header("Location: student.php");
exit;
?>