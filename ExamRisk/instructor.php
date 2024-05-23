<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online risk management training system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

    .button{
    padding: 5px;
background: green;
text-decoration: none;
float: left;
margin-left: 300px;
margin-top: -40px;
border-radius: 5px;
color: #fff;
font-weight: 600;
}

.button2{
    padding: 5px;
background: green;
text-decoration: none;
float: right;
margin-right: 310px;
margin-top: -40px;
border-radius: 5px;
color: #fff;
font-weight: 600;
}
</style>

</head>
<body>
    <div class="container my-5">
        <h2>List of Instructors</h2>
        <a class="btn btn-primary" href="insertuser.php" role="button">New user</a>
        <br><br>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th>ID</th>
                <th>USERID</th>
                <th>LASTNAME</th>
                <th>QUALIFICATION</th>
                <th>EXPERIENCE</th>
                <th>SPECIALISATION</th>
                <th>BIO</th>
                <th>DateOfJoining</th>
                <th>ACTION</th>
</tr>
</thead>
<tbody>
    <tr>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";//this is empty because I din't set any password
    $dbname = "online_risk_mgt_training_system";

    //create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($connection->connect_error) {
        die("Connection failed: " .$connection->connect_error);
    }
    //read all rows from database table
    $sql= "SELECT * FROM instructors";
    $result= $connection->query($sql);
    if(!$result) {
        die("invalid query: " .$connection->error);
    }
    //read data of each row
    while($row = $result->fetch_assoc()){
        echo"
        <tr>
        <td>$row[InstructorID]</td>
        <td>$row[UserID]</td>
        <td>$row[Qualification]</td>
        <td>$row[experience]</td>
        <td>$row[Specialization]</td>
        <td>$row[Bio]</td>
        <td>$row[DateOfJoining]</td>
        
        <td>
         <a class='btn btn-primary btn-sm' href='updatinstructor.php?InstructorID=$row[InstructorID]'>Edit</a>
         <a class='btn btn-danger btn-sm' href='deleteUser.php?InstructorID=$row[InstructorID]' role='button'>delete</a>
       </td>
       </tr>
       ";
    }
    ?>
</tbody>
</table>
</div>
<div class="button">
    <a class='btn' href='student.php'>Go back</a>
</div>

<div class="button2">
    <a class='btn' href='category.php'>Next page</a>
</div>
</body>
</html>