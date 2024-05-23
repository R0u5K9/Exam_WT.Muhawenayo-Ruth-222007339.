<?php

$servername = "localhost";
$username = "root";
$password = "";//this is empty because I din't set any password
 $dbname = "online_risk_mgt_training_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);


      $Cid="";
$Cname="";
$desc="";


$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //GET METHOD: show the data of category

   if ( !isset($_GET["CategoryID"]) ){

   header("Location: category.php");
    exit;
   }

    $Cid = $_GET["CategoryID"];

     //read the data of categories selected from database table
   $sql = "SELECT * FROM categories WHERE CategoryID=$Cid";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

   if (!$row) {

    header("Location: category.php");
    exit;
   }

    $Cname = $row["CategoryName"];
    $desc = $row["Description"];
    
}
   else{
    //POST METHOD: update the data of category

    $Cid = $_POST["CategoryID"];
    $Cname =$_POST ["CategoryName"];
    $desc = $_POST["Description"];
    
    do {

       if  ( empty($Cid) || empty($Cname) || empty($desc)) {
            $errorMessage = "All fields are required";
            break;
       }

          
       $sql = "UPDATE categories SET CategoryName='$Cname', Description='$desc' WHERE CategoryID= $Cid";
       $result = $connection->query($sql);
   

    if (!$result){
        $errorMessage = "Invalid query: .$connection->error";
        break;
    }
    $successMessage = "category updated successfully";
    header("Location: category.php");
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
    <input type="hidden" name="CategoryID" value="<?php echo $Cid; ?>">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> CategoryName</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="CategoryName" value="<?php echo $Cid; ?>">
          </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Description</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="Description" value="<?php echo $desc; ?>">
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
        <a class='btn btn-outline-primary btn-sm' href="category.php" role="button">cancel</a>
      </div>
        </div>
       
</form>
</div> 
</body>
</htm