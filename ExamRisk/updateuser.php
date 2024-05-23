<?php

$servername = "localhost";
$username = "root";
$password = "";//this is empty because I din't set any password
 $dbname = "online_risk_mgt_training_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$id="";
$Fname="";
$Lname="";
$email="";
$user="";
$pword="";
$role="";

$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //GET METHOD: show the data of user

   if ( !isset($_GET["UserID"]) ){

   header("Location: user.php");
    exit;
   }

    $id = $_GET["UserID"];

     //read the data of item selected from database table
   $sql = "SELECT * FROM users WHERE UserID=$id";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

   if (!$row) {

    header("Location: user.php");
    exit;
   }

    $Fname = $row["Firstname"];
    $Lname = $row["Lastname"];
    $email = $row["Email"];
    $user = $row["Username"];
    $pword = $row["Password"];
    $role = $row["Role"];
}
   else{
    //POST METHOD: update the data of item

    $id = $_POST["UserID"];
    $Fname =$_POST ["Firstname"];
    $Lname = $_POST["Lastname"];
    $email = $_POST["Email"];
    $user = $_POST["Username"];
    $pword = $_POST["Password"];
    $role = $_POST["Role"];

    do {

       if  ( empty($id) || empty($Fname) || empty($Lname)  || empty($email) ||  empty($user) ||  empty($pword) || empty($role)) {
            $errorMessage = "All fields are required";
            break;
       }

          
       $sql = "UPDATE users SET Firstname='$Fname', Lastname='$Lname', Email='$email', Username='$user', Password='$pword', Role='$role' WHERE UserID= $id";
       $result = $connection->query($sql);
   

    if (!$result){
        $errorMessage = "Invalid query: .$connection->error";
        break;
    }
    $successMessage = "user updated successfully";
    header("Location: user.php");
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
  <h2> Update Users</h2>

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
    <input type="hidden" name="UserID" value="<?php echo $id; ?>">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Firstname</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="Firstname" value="<?php echo $Fname; ?>">
          </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Lastname</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="Lastname" value="<?php echo $Lname; ?>">
          </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Email</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="Email" value="<?php echo $email; ?>">
          </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Username</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="Username" value="<?php echo $user; ?>">
          </div>
        </div>
        
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Password</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="Password" value="<?php echo $pword; ?>">
          </div>
        </div>
        
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Role</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="Role" value="<?php echo $role; ?>">
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
        <a class='btn btn-outline-primary btn-sm' href="user.php" role="button">cancel</a>
      </div>
        </div>
       
</form>
</div> 
</body>
</html> 