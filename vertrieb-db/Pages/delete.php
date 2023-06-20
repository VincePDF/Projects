<?php
ini_set('display_errors',1);

if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "customeroverview";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database, 3306);

    $sql = "DELETE FROM customers WHERE id=$id";
    $connection->query($sql);
}

header("location: customerdatabase.php");
exit;
?>