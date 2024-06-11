<?php
session_start();
// phpinfo();
$servername = "localhost";
$port = "3307"; // Specify the port separately
$username = "root";
$dbpassword = "";
$database = "SRMS";
$dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4"; // Use $servername and $port variables

try {
    // Create connection using PDO
    $conn = new PDO($dsn, $username, $dbpassword);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = test_input($_POST['id']);
    $fname = test_input($_POST['fname1']);
    $lname = test_input($_POST['lname1']);
    $department = test_input($_POST['department']);
    $status = test_input($_POST['status']);
    $section = test_input($_POST['section']);
    if($status == "Readmition") $status = "Active";

    $year = 1;
    $semester = 1;
    $university = $_SESSION['university'];
    $password = $lname . "12345";
    $email = test_input($_POST['email']);

    $statement = $conn->prepare("UPDATE student SET fname='$fname', lname='$lname', department='$department', section='$section', status='$status' WHERE id='$id'");
    $statement->execute();
    header("Location: http://localhost/student-record-management-system/admin.php#update-student");
} catch (PDOException $e) {
    // If connection fails, catch the exception and display the error message
    echo "Connection failed: " . $e->getMessage();
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
