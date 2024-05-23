<?php
if (isset($_GET["InstructorID"]) ){
    $inst = $_GET["InstructorID"];

    $servername = "localhost";
    $username = "root";
    $password = "";          //this is empty because I din't set any password
    $dbname = "online_risk_mgt_training_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$sql = " DELETE FROM instructors WHERE InstructorID=$inst";

$connection->query($sql);
}

header("Location: instructor.php");
exit;
?>