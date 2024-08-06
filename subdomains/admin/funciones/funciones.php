<?php
$servername = "92.249.44.105";
$username = "u361450795_root";
$password = "toor123";
$database = "u361450795_sql_integral";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
