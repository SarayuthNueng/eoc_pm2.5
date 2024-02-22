<?php
$servername = "192.168.0.250";
$username = "hos";
$password = "sa";
$dbname = "sa";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>