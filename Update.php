<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "test_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$reg_number = $_GET['reg_number'];
$sql = "SELECT * FROM crud WHERE Reg_Number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $reg_number);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1>Update Student</h1>
                </div>
                <div class="card-body">
                    <form action="update_process.php" method="POST">
                        <input type="hidden" name="reg_number" value="<?php echo $row['Reg_Number']; ?>">
                        <div class="mb-3">
                            <label for="student_name" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $row['Student_Name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject_name" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php echo $row['Subject_Name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="mark" class="form-label">Mark</label>
                            <input type="number" class="form-control" id="mark" name="mark" value="<?php echo $row['Mark']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
