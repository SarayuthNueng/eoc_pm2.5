<?php
$servername = "192.168.0.250";
$username = "sa";
$password = "sa";
$dbname = "hos";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>