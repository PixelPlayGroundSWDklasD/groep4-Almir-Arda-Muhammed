<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$database = "pixelplaygroundd";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $wachtwoord = $_POST['wachtwoord'];

    
    $sql = "SELECT * FROM gebruikerss WHERE gebruikers = '$userid' AND wachtwoord = '$wachtwoord'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        
        $user = $result->fetch_assoc();

        
        $_SESSION['userid'] = $user['gebruikers']; 

        
        header("Location: index.php");
        exit();
    } else {
        $errorMessage = 'Invalid username or password.';
    }
}

$conn->close();
?>