<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "one_solution";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>