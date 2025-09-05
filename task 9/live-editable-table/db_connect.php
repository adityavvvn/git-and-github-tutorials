<?php
$servername = "localhost";
$username = "root";
$password = ""; // XAMPP default has no password
$dbname = "testdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
