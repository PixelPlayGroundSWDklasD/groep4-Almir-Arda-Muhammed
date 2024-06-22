<?php
include 'lib/connection.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

if (isset($_GET['id'])) {
    $friend_id = $_GET['id'];
} elseif (isset($_POST['friend_id'])) {
    $friend_id = $_POST['friend_id'];
} else {
    echo "<p>Geen vriend-ID opgegeven.</p>";
    exit();
}

$sql = "DELETE FROM vrienden WHERE vriend_id = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Fout bij het voorbereiden van de query: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "i", $friend_id);

if (mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<p>Vriend succesvol verwijderd.</p>";
    } else {
        echo "<p>Er is geen vriend gevonden met de opgegeven vriend-ID.</p>";
    }
} else {
    echo "<p>Er is een probleem opgetreden bij het verwijderen van de vriend: " . mysqli_error($conn) . "</p>";
}

mysqli_stmt_close($stmt);

mysqli_close($conn);
?>