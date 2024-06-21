<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "test_db";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_number = $_POST['reg_number'];
    $student_name = $_POST['student_name'];
    $subject_name = $_POST['subject_name']; 
    $mark = $_POST['mark'];


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $stmt = $conn->prepare("UPDATE crud SET Student_Name = ?, Subject_Name = ?, Mark = ? WHERE Reg_Number = ?");
    $stmt->bind_param("ssii", $student_name, $subject_name, $mark, $reg_number);

    
    if ($stmt->execute() === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}
?>
