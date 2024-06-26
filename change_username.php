<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

include 'lib/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    $new_username = mysqli_real_escape_string($conn, $_POST['new_username']);
    $confirm_new_username = mysqli_real_escape_string($conn, $_POST['confirm_new_username']);

    if ($new_username !== $confirm_new_username) {
        die("Nieuwe gebruikersnamen komen niet overeen.");
    }

    $update_sql = "UPDATE gebruikerss SET gebruikers = ? WHERE id = ?";
    $update_stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($update_stmt, "si", $new_username, $user_id);

    if (mysqli_stmt_execute($update_stmt)) {
        echo "Gebruikersnaam succesvol gewijzigd.";
    } else {
        echo "Er is een probleem opgetreden bij het wijzigen van de gebruikersnaam: " . mysqli_error($conn);
    }

    mysqli_stmt_close($update_stmt);
}

mysqli_close($conn);
?>

<meta name="author" content="Muhammed yesilkaya">