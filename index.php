<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = "admin"; 
$dbname = "test_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM crud";
$result = $conn->query($sql);
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1>Student Crud Application</h1>
                </div>
                <div class="card-body">
                    <button class="btn btn-success">
                        <a href="add.php" class="text-light">ADD</a>
                    </button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Reg_Number</th>
                                <th scope="col">Student_Name</th>
                                <th scope="col">Subject_Name</th>
                                <th scope="col">Mark</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Reg_Number"] . "</td>";
                                    echo "<td>" . $row["Student_Name"] . "</td>";
                                    echo "<td>" . $row["Subject_Name"] . "</td>";
                                    echo "<td>" . $row["Mark"] . "</td>";
                                    echo "<td>";
                                    echo "<button class=\"btn btn-success\">";
                                    echo "<a href=\"update.php?reg_number=" . $row["Reg_Number"] . "\" class=\"text-light\">Update</a>";
                                    echo "</button> ";
                                    echo "<form action=\"delete.php\" method=\"POST\" style=\"display:inline-block;\">";
                                    echo "<input type=\"hidden\" name=\"reg_number\" value=\"" . $row["Reg_Number"] . "\">";
                                    echo "<button type=\"submit\" class=\"btn btn-danger\">Delete</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan=\"5\">No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$conn->close();
?>
</body>
</html>
