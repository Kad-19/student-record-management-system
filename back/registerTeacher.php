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
    $university = $_SESSION['university'];
    $password = $id . "12345";
    $email = test_input($_POST['email']);

    $statement = $conn->prepare("SELECT count(*) FROM teacher WHERE email='$email'");
    $statement->execute();
    $statement2 = $conn->prepare("SELECT count(*) FROM teacher WHERE id='$id'");
    $statement2->execute();
    if($statement->fetchColumn() == 0 && $statement2->fetchColumn() == 0){
        $statement = $conn->prepare("INSERT INTO teacher VALUES ('$id', '$university', '$password', '$email')");
        $statement->execute();
        include "Alert.php";
        show_alert("", "You have successfully registered the teacher", "http://localhost/student-record-management-system/admin.php#register-teacher");
    }
    else{
        include "Alert.php";
        show_alert("", "A teacher with this id or email already exists!", "http://localhost/student-record-management-system/admin.php#register-teacher");
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
