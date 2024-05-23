<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_risk_mgt_training_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

$Fname = $_POST['Firstname'];
$Lname = $_POST['Lastname'];
$email = $_POST['Email'];
$user = $_POST['Username'];
$password = $_POST['Password'];
$role = $_POST['Role'];

$sql = "INSERT INTO users (Firstname, Lastname, Email, Username,  Password, Role) VALUES ('$Fname','$Lname','$email','$user','$password', '$role')";
if ($conn->query($sql) === TRUE) {
    echo "successfully registered!";
    header("Location: login.html");
    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>