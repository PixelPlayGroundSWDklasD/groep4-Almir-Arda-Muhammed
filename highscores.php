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
    <meta name="author" content="Muhammed yesilkaya">
    <title>Nova Gaming - Mijn Highscores</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .mo-highscores-section {
            margin-top: 40px;
            text-align: center;
        }

        .mo-highscores-title {
            font-size: 24px;
            color: #00ecff;
        }

        .mo-highscores-game-scores {
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mo-highscores-subtitle {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        .mo-highscores-scores-list {
            list-style: none;
            padding: 0;
        }

        .mo-highscores-score-item {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }

        .mo-highscores-no-score {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <section class="mo-highscores-section">
        <h2 class="mo-highscores-title">Highscores</h2>
        <div class="mo-highscores-game-scores">
            <h3 class="mo-highscores-subtitle">highscores</h3>
            <ul class="mo-highscores-scores-list">
                <?php if (!empty($highscores)) : ?>
                    <?php foreach ($highscores as $highscore) : ?>
                        <li class="mo-highscores-score-item"><?php echo $highscore['highscore']; ?></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li class="mo-highscores-no-score">Geen highscores gevonden.</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</body>
</html>