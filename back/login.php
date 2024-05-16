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
    // echo '<script>alert("This is an alert message");</script>';
    $role = test_input($_POST['role']);
    $university = test_input($_POST['university']);
    $email = $_POST['email'];
    $password = test_input($_POST['password']);

    $statement = $conn->prepare("SELECT university, password, id FROM $role WHERE email='$email'");
    $statement->execute();

    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k=>$value){
        if($university == $value['university'] && $password == $value['password']){
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $value['id'];
            header("Location: http://localhost/subFolder/student-record-management-system/Student.php");
        }
        else{
            header("Location: http://localhost/subFolder/student-record-management-system/login.html");
        }
        // echo "<script type='text/javascript'>
        // function redirect (role, auth){
        //     if(auth){
        //         window.href = '' + role + '.php';
        //         console.log('auth');
        //     }
        //     else{
        //         console.log('not auth')
        //     }
        // }
        // redirect('".$_SESSION['role']."', true);
        // </script>";
        // echo "dlaf";
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


