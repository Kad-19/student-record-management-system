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
    $fname = test_input($_POST['fname']);
    $lname = test_input($_POST['lname']);
    $department = test_input($_POST['department']);
    $status = "Active";
    $year = 1;
    $semester = 1;
    $section = test_input($_POST['section']);
    $university = $_SESSION['university'];
    $password = $lname . "12345";
    $email = test_input($_POST['email']);

    $statement = $conn->prepare("SELECT count(*) FROM student WHERE email='$email'");
    $statement->execute();
    $statement2 = $conn->prepare("SELECT count(*) FROM student WHERE id='$id'");
    $statement2->execute();
    if($statement->fetchColumn() == 0 && $statement2->fetchColumn() == 0){
        $statement = $conn->prepare("INSERT INTO student VALUES ('$id', '$fname', '$lname', '$department', '$status', $year, $semester, '$section', '$university', 0, 0, '$password', '$email')");
        $statement->execute();
        include "Alert.php";
        show_alert("", "You have successfully registered the student", "http://localhost/student-record-management-system/admin.php#register-student");
    }
    else{
        include "Alert.php";
        show_alert("", "A student with this id or email already exists!", "http://localhost/student-record-management-system/admin.php#register-student");
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
