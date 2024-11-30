<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "studentdb";

    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM student WHERE id=$id";
    $conn->query($sql);
}

header("location:/StudentManagementSystem/index.php");
exit();

?>