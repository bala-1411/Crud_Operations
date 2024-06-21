<?php
$servername = "localhost"; 
$username = "root"; 
$password = "admin"; 
$dbname = "test_db"; 


$conn = new mysqli($servername, $username, $password, $dbname);

  if(isset($_POST['submit']))
  {
    $Reg_Number = $_POST['Reg_Number'];
    $Student_Name = $_POST['Student_Name'];
    $Subject_Name =$_POST['Subject_Name'];
    $Mark =$_POST['Mark'];

    $sql = "INSERT INTO crud(Reg_Number,Student_Name,Subject_Name,Mark) values(' $Reg_Number',' $Student_Name','$Subject_Name','$Mark')";

    if ($conn->query($sql) === TRUE)
    {
        header("Location:index.php");
    }
    else
    {
    echo "Some thing Error" .$connection->error;
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
            <div class="card-header">
                <h1>Student Crud Application<h2>
            </div>
                        <div class="card-body">

                        <form action="add.php" method="post">
                            <div class="form-group">
                                <label>Reg_Number</label>
                                <input type="text" name="Reg_Number" class="form-control"  placeholder="Enter Reg_Number">
                
                            </div>
                            <div class="form-group">
                                <label>Student_Name</label>
                                <input type="text" name="Student_Name" class="form-control"  placeholder="Enter Student_Name">
                
                            </div>
                            <div class="form-group">
                                <label>Subject_Name</label>
                                <input type="text" name="Subject_Name" class="form-control"  placeholder="Enter Subject_Name">
                
                            </div>
                            <div class="form-group">
                                <label>Mark</label>
                                <input type="text" name="Mark" class="form-control"  placeholder="Enter Mark">
                            </div>
                            <br/>
                           
                            <input type="submit" class="btn btn-primary" name="submit" value="register">
                            </form>



                
            </div>
            
            </div>


        </div>
    </div>
</div>
    
</body>
</html>