<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php ");
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

<!DOCTYPE html>

<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammed yesilkaya">
    <meta name="keywords" content="">
    <title>change_password</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
</body>
</html>