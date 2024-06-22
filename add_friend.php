<?php
include 'lib/connection.php';

$user_id = 1;

$friend_username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_username = $_POST['search_username'];

    $sql = "SELECT Id, gebruikers FROM gebruikerss WHERE gebruikers = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $search_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $friend = mysqli_fetch_assoc($result);
        $friend_id = $friend['Id'];
        $friend_username = $friend['gebruikers'];

        $check_sql = "SELECT * FROM vrienden WHERE gebruiker_id = ? AND vriend_id = ?";
        $check_stmt = mysqli_prepare($conn, $check_sql);
        mysqli_stmt_bind_param($check_stmt, "ii", $user_id, $friend_id);
        mysqli_stmt_execute($check_stmt);
        $check_result = mysqli_stmt_get_result($check_stmt);

        if (mysqli_num_rows($check_result) > 0) {
            echo "Deze gebruiker is al je vriend.";
        } else {
            $insert_sql = "INSERT INTO vrienden (gebruiker_id, vriend_id) VALUES (?, ?)";
            $insert_stmt = mysqli_prepare($conn, $insert_sql);
            mysqli_stmt_bind_param($insert_stmt, "ii", $user_id, $friend_id);
            if (mysqli_stmt_execute($insert_stmt)) {
                echo $friend_username;
            } else {
                echo "Er is een probleem opgetreden bij het toevoegen van de vriend: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Gebruiker niet gevonden.";
    }
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
    <title>add_friend</title>
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