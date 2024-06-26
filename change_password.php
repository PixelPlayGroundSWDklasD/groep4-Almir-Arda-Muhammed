<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'lib/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_new_password = mysqli_real_escape_string($conn, $_POST['confirm_new_password']);

    if ($new_password !== $confirm_new_password) {
        die("Nieuwe wachtwoorden komen niet overeen.");
    }

    $sql = "SELECT wachtwoord FROM gebruikerss WHERE Id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $stored_password = $user['wachtwoord'];

        if ($old_password === $stored_password) {
            $update_sql = "UPDATE gebruikerss SET wachtwoord = ? WHERE Id = ?";
            $update_stmt = mysqli_prepare($conn, $update_sql);
            mysqli_stmt_bind_param($update_stmt, "si", $new_password, $user_id);

            if (mysqli_stmt_execute($update_stmt)) {
                echo "Wachtwoord succesvol gewijzigd.";
            } else {
                echo "Er is een probleem opgetreden bij het wijzigen van het wachtwoord: " . mysqli_error($conn);
            }
        } else {
            echo "Oud wachtwoord is niet correct.";
        }
    } else {
        echo "Gebruiker niet gevonden.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
<meta name="author" content="Muhammed yesilkaya">
