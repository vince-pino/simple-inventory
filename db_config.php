<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "simple_inventory";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
mysqli_set_charset($conn, "utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>