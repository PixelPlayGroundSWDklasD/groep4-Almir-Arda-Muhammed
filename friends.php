<?php
include 'lib/connection.php'; 

$user_id = 1; 

if (!function_exists('getFriends')) {
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
}

$friends = getFriends($conn, $user_id);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova Gaming - Friends</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="author" content="Muhammed yesilkaya">
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

        .mo-1-main-container-friends {
            max-width: 900px;
            margin: 20px auto;
            background-color: transparent;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border: 4px solid #f53fa1;
        }

        .mo-2-page-title-friends {
            font-size: 36px;
            color: #00ecff;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .mo-3-friends-section {
            margin-top: 40px;
        }

        .mo-4-friend {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mo-4-friend h2 {
            color: #000;
        }

        .mo-5-friend-highscores {
            list-style: none;
            padding: 0;
        }

        .mo-5-friend-highscores h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        .mo-5-friend-highscores li {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }

        .mo-4-friend a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
            padding-right: 10px;
            font-size: 16px;
        }

        .mo-4-friend a:hover {
            color: #2980b9;
        }

        .mo-8-friends-list {
            list-style: none;
            padding: 0;
        }

        .mo-8-friends-list li {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mo-8-friends-list h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .mo-8-friends-list p {
            font-size: 18px;
            color: black;
        }

        .btn-3 {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00ecff;
            border-radius: 20px;
            text-align: center;
            font-size: 15px;
            cursor: pointer;
            color: black;
            border: none;
        }

        .btn-3:hover {
            background-color: white;
        }
    </style>
</head>
<body>
<main class="mo-1-main-container-friends">
    <h1 class="mo-2-page-title-friends">Mijn Vrienden</h1>

    <section class="mo-3-friends-section">
        <ul class="mo-8-friends-list">
            <?php if (!empty($friends)) : ?>
                <?php foreach ($friends as $friend) : ?>
                    <li class="mo-4-friend">
                        <h2><?php echo $friend['gebruikers']; ?></h2>
                        <p>User ID: <?php echo $friend['id']; ?></p>
                        <a href="friend_profile.php?id=<?php echo $friend['id']; ?>" class="btn-3">Bekijk Profiel</a>
                        <a href="remove_friend.php?id=<?php echo $friend['id']; ?>" class="btn-3">Verwijder Vriend</a>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li>Geen vrienden gevonden.</li>
            <?php endif; ?>
        </ul>
    </section>

    <section class="mo-9-add-friend-section">
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