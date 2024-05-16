<?php
session_start();
function getMycourses(){
    $servername = "localhost";
    $port = "3307"; // Specify the port separately
    $username = "root";
    $dbpassword = "";
    $database = "SRMS";
    $dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4";
    $conn = new PDO($dsn, $username, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->prepare("SELECT coursecode, coursename, grade, grademark, status FROM mycourse WHERE studid='" . $_SESSION['id'] . "'");
    $statement->execute();

    $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $k => $value){
        echo "
            <tr>
                <td>".$value['courseName']."</td>
                <td>".$value['courseCode']."</td>
                <td>".$value['grade']."</td>
                <td>".$value['gradeMark']."</td>
                <td>".$value['status']."</td>
            </tr>
        ";
    }
}