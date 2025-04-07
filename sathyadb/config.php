<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sathyaex";
// $servername = "localhost";
// $username = "trymywebsites_sathya";
// $password = "sathya@2024";
// $dbname = "trymywebsites_sathyadb";
// Create connection
$conn = new mysqli($servername,$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>