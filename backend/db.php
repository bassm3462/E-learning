<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="my_project2";
// Create connection
$conn = mysqli_connect($servername, $username, $password,"my_project2");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>