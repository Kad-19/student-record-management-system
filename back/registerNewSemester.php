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

    $statement = $conn->prepare("SELECT year, semester FROM student WHERE id='".$_SESSION['id']."'");
    $statement->execute();
    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
        $year = $value['year'];
        $semester = $value['semester'] + 1;
        if($semester == 3){
            $year += 1;
            $semester = 1;
        }
        $statement1 = $conn->prepare("UPDATE student SET year=$year, $semester=$semester WHERE id='".$_SESSION['id']."'");
        $statement1->execute();
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
