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
<!DOCTYPE html>

<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammed yesilkaya">
    <meta name="keywords" content="">
    <title>change_username</title>
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