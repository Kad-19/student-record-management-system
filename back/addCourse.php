<?php
session_start();
$servername = "localhost";
$port = "3307"; // Specify the port separately
$username = "root";
$dbpassword = "";
$database = "SRMS";
$dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4"; // Use $servername and $port variables

try{
    $conn = new PDO($dsn, $username, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $course_code = test_input($_POST['course-code']);
    
    $statement1 = $conn->prepare("SELECT course_name FROM courses WHERE course_code='$course_code'");
    foreach($statement1->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
        echo "executed";
        $course_name = $value['course_name'];
        $statement = $conn->prepare("INSERT INTO mycourse(studid, coursename, coursecode, status) VALUES('".$_SESSION['id']."', '$course_name', '$course_code', 'Registered')");
        $statement->execute();
        header("Location: http://localhost/student-record-management-system/student.php#add-course");
        }
        $conn = NULL;
}
catch(PDOException $e){
    echo $e->getMessage();
    }

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}