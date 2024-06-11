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

    $currentPassword = test_input($_POST['current-password']);
    $newPassword = test_input($_POST['new-password']);
    $confirmPassword = test_input($_POST['confirm-password']);

    if($newPassword != $confirmPassword){
        header("Location: http://localhost/student-record-management-system/changePassword.html");
        die("New password and Confirm password don't match");
    }

    $statement = $conn->prepare("SELECT password from ".$_SESSION['role']." where id = '".$_SESSION['id']."'");
    $statement->execute();
    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
        if($currentPassword != $value['password']){
            header("Location: http://localhost/student-record-management-system/changePassword.html");
            die("Incorrect Old password");
        }
    }

    $statement = $conn->prepare("UPDATE ".$_SESSION['role']." SET password='$newPassword' WHERE id='".$_SESSION['id']."'");
    $statement->execute();
    header("Location: http://localhost/student-record-management-system/".$_SESSION['role'].".php");

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
