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

    if($newPassword == $confirmPassword){
        $statement = $conn->prepare("SELECT password from ".$_SESSION['role']." where id = '".$_SESSION['id']."'");
        $statement->execute();
        foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
            if($currentPassword == $value['password']){
                $statement = $conn->prepare("UPDATE ".$_SESSION['role']." SET password='$newPassword' WHERE id='".$_SESSION['id']."'");
                $statement->execute();
                include "Alert.php";
                show_alert("", "You have successfully changed your password", "http://localhost/student-record-management-system/".$_SESSION['role'].".php");
            }
            else{
                include "Alert.php";
                show_alert("", "Incorrect Old password", "http://localhost/student-record-management-system/changePassword.html");
            }
        }
    }
    else{
        include "Alert.php";
        show_alert("", "New password and Confirm password do not match", "http://localhost/student-record-management-system/changePassword.html");
    }

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
