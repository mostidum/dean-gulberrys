<?php
$dbServername = "cs532.mysql.database.azure.com";
$dbUsername = "dean";
$dbPassword = "Gulberry!";
$dbName = "CS532";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}
?>