<?php
$hostname = "localhost";
$username = "root";
$database = "rental_management_system";
$password = "";


$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
