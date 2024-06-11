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
    $role = test_input($_POST['role']);
    $university = test_input($_POST['university']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    $statement = $conn->prepare("SELECT university, password, id FROM $role WHERE email='$email'");
    $statement->execute();

    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k=>$value){
        if($university == $value['university'] && $password == $value['password']){
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $value['id'];
            $_SESSION['university'] = $university;
            header("Location: http://localhost/student-record-management-system/$role.php");
        }
    }
    include "Alert.php";
    show_alert("test", "it works", "http://localhost/student-record-management-system/login.html");

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
