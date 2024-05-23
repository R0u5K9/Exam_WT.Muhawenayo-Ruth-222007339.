<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_risk_mgt_training_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

$username = $_POST['Username'];
$password = $_POST['Password'];

$sql = "SELECT *FROM users WHERE Username='$username' AND Password='$password'";
$result =$conn->query($sql);
if ($result->num_rows >0) {
  header("Location:Home.php");
      exit();
} else {
    echo " invalid credentials";
}

$conn->close();
?>
