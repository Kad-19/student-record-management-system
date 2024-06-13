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
    
    $course_code = test_input($_POST['course-code']);

    $statement = $conn->prepare("DELETE FROM mycourse WHERE courseCode='$course_code' AND studid='".$_SESSION['id']."' AND status='Registered'");
    $statement->execute();
    include "Alert.php";
    show_alert("", "You have successfully dropped ".$course_code, "http://localhost/student-record-management-system/student.php#drop-course");

    $conn = NULL;
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
