<?php
include 'lib/connection.php';

$user_id = 1; 

$sql = "SELECT highscore
        FROM Highscores
        WHERE gebruiker_id = $user_id
        ORDER BY highscore DESC
        LIMIT 5";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $highscores = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $highscores = [];
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
    <title>highscores_friend</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="mo-highscores_friend-section">
        <h2 class="mo-highscores_friend-title">Highscores</h2>
        <div class="mo-highscores_friend-game-scores">
            <h3 class="mo-highscores_friend-subtitle">highscores</h3>
            <ul class="mo-highscores_friend-scores-list">
                <?php if (!empty($highscores)) : ?>
                    <?php foreach ($highscores as $highscore) : ?>
                        <li class="mo-highscores_friend-score-item"><?php echo $highscore['highscore']; ?></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li class="mo-highscores_friend-no-score">Geen highscores gevonden.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</body>
</html>