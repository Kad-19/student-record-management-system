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
    $course_name = test_input($_POST['course-name']);
    $credit_hour = test_input($_POST['credit-hr']);
    $department = test_input($_POST['department']);
    $year = test_input($_POST['year']);
    $semester = test_input($_POST['semester']);
    $prerequisite = test_input($_POST['prerequisite']);

    $statement = $conn->prepare("SELECT count(*) FROM courses WHERE course_code='$course_code'");
    $statement->execute();
    $statement2 = $conn->prepare("SELECT count(*) FROM courses WHERE course_code='$prerequisite'");
    $statement2->execute();
    if($statement->fetchColumn() == 0 && ($prerequisite == "" || $statement2->fetchColumn() != 0)){
        $statement = $conn->prepare("INSERT INTO courses VALUES ('$course_code', '$course_name', $credit_hour, '$department', $year, $semester, '$prerequisite')");
        $statement->execute();
        header("Location: http://localhost/student-record-management-system/admin.php#add-new-course");
    }
    else{
        echo "A course with this code already exists or the prerequisite doesn't exist!";
    }
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
