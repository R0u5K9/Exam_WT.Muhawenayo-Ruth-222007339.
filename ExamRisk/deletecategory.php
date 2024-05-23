<?php
if (isset($_GET["CategoryID"]) ){
    $Cid = $_GET["CategoryID"];

    $servername = "localhost";
    $username = "root";
    $password = "";          //this is empty because I din't set any password
    $dbname = "online_risk_mgt_training_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$sql = " DELETE FROM categories WHERE CategoryID=$Cid";

$connection->query($sql);
}

header("Location: category.php");
exit;
?>