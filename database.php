<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "library_management_system";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>