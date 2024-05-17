<?php
$servername = "localhost";
$username = "pixel";
$password = "12345";

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>