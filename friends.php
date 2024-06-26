<?php
include 'lib/connection.php'; 

$user_id = 1;

function getFriends($conn, $user_id) {
    $sql = "SELECT u.gebruikers, u.id
            FROM gebruikerss AS u
            INNER JOIN vrienden AS v ON u.id = v.vriend_id
            WHERE v.gebruiker_id = $user_id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}


$friends = getFriends($conn, $user_id);
?>

<!DOCTYPE html>

<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammed yesilkaya">
    <meta name="keywords" content="">
    <title>friends</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <main class="mo_friends-main-container">
        <h1 class="mo_friends-page-title">Mijn Vrienden</h1>

        <section class="mo_friends-friends-section">
            <ul class="mo_friends-friends-list">
                <?php foreach ($friends as $friend) : ?>
                    <li class="mo_friends-friend">
                        <h2><?php echo $friend['gebruikers']; ?></h2>
                        <p>User ID: <?php echo $friend['id']; ?></p>
                        <a href="friend_profile.php?id=<?php echo $friend['id']; ?>" class="btn-3">Bekijk Profiel</a>
                        <a href="remove_friend.php?id=<?php echo $friend['id']; ?>" class="btn-3">Verwijder Vriend</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="mo_friends-add-friend-section">
            <h2>Vrienden Toevoegen</h2>
            <form action="add_friend.php" method="post">
                <label for="search_username">Gebruikersnaam Zoeken:</label>
                <input type="text" id="search_username" name="search_username" required>
                <button type="submit" class="btn-3">Voeg Toe</button>
            </form>
        </section>
    </main>
</body>
</html>