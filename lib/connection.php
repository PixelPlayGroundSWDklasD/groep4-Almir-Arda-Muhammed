<?php
$servername = "localhost";
$username = "pixell";
$password = "1234567";
$database = "pixelplaygroundd";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['verzenden'])) {
  $userid = $_POST['userid'];
  $wachtwoord = $_POST['wachtwoord'];
  $wachtwoordconf = $_POST['wachtwoord_conf'];
  $geheimevraag = $_POST['geheimevraag'];
  $antw_vraag = $_POST['ant_geh_vraag'];
}

$sql = "INSERT INTO gebruikerss (id, gebruikers, wachtwoord, geheimevraag, antw_vraag) VALUES (NULL, '$userid', '$wachtwoord', '$geheimevraag', '$antw_vraag')";

if ($conn->query($sql) === TRUE) {
  echo "New user created succesfully";
  echo "Welkom $userid";
} else {
  echo "Error: " . $sql . "<br>"  . $conn->error;
}

$conn->close();
?>

