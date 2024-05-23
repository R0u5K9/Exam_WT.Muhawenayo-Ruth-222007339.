<?php

$servername = "localhost";
$username = "root";
$password = "";//this is empty because I din't set any password
 $dbname = "online_risk_mgt_training_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);


      $stdid="";
$Uid="";
$prog="";


$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //GET METHOD: show the data of student

   if ( !isset($_GET["StudentID"]) ){

   header("Location: student.php");
    exit;
   }

    $stdid = $_GET["StudentID"];

     //read the data of students selected from database table
   $sql = "SELECT * FROM students WHERE StudentID=$stdid";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

   if (!$row) {

    header("Location: student.php");
    exit;
   }

    $Uid = $row["UserID"];
    $prog = $row["Progress"];
    
}
   else{
    //POST METHOD: update the data of student

    $stdid = $_POST["StudentID"];
    $Uid =$_POST ["UserID"];
    $Prog = $_POST["Progress"];
    
    do {

       if  ( empty($stdid) || empty($Uid) || empty($prog)) {
            $errorMessage = "All fields are required";
            break;
       }

          
       $sql = "UPDATE students SET UserID='$Uid', Progress='$prog' WHERE StudentID= $stdid";
       $result = $connection->query($sql);
   

    if (!$result){
        $errorMessage = "Invalid query: .$connection->error";
        break;
    }
    $successMessage = "user updated successfully";
    header("Location: student.php");
    exit;
    
    } while (false);

   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>Tables</title>

  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
    body{
    margin: 0;
                padding: 0;
                font-family: "roboto", sans-serif;
                margin-left: 0px;
    background: url("img/images.jpeg") no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;
    font-size: 25px;
    font-weight: 600;
    color:lightseagreen;
}
    </style>
</head>
<body>
<div class="container my-5">
  <h2> Update Students</h2>

  <?php
if (!empty($errorMessage) ) {
  echo"
  <div class='alert alert-warning  alert-dismissible fade show' role='alert'>
  <strong>$errorMessage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert aria-label='Close'></button>
  </div>
  ";
}
?>

<form method="post">
    <input type="hidden" name="StudentID" value="<?php echo $stdid; ?>">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> UserID</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="UserID" value="<?php echo $Uid; ?>">
          </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Progress</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="Progress" value="<?php echo $prog; ?>">
          </div>
        </div>

        
        
        <?php
        if (!empty($successMessage) ){
            echo"
            <div class='row mb-3>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>  
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            </div>
            </div>
            ";
        }
        ?>

        <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

        <div class="col-sm-3 d-grid">
        <a class='btn btn-outline-primary btn-sm' href="student.php" role="button">cancel</a>
      </div>
        </div>
       
</form>
</div> 
</body>
</html> 

