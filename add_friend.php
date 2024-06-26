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


<meta name="author" content="Muhammed yesilkaya">