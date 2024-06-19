<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova Gaming - Highscores</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/highscores.css">
    <style>
        /* Stijlen voor highscores.php */
        .mo-1-main-container-highscores {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .mo-2-page-title-highscores {
            font-size: 36px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .scores-container {
            margin-top: 40px;
        }

        .game-scores {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .game-scores h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 15px;
        }

        

        .game-scores ul {
            list-style: none;
            padding: 0;
        }

        .game-scores ul li {
            font-size: 18px;
            color: #666;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="mo-1-main-container-highscores">
        <h1 class="mo-2-page-title-highscores">Mijn Highscores</h1>

        <div class="scores-container">
            <?php foreach ($scores as $game_id => $game_scores): ?>
                <div class="game-scores">
                    <h2><?php echo htmlspecialchars($games[$game_id]); ?></h2>
                    <ul>
                        <?php
                        // Limit to top 5 scores per game
                        $top_scores = array_slice($game_scores, 0, 5);
                        foreach ($top_scores as $score): ?>
                            <li>Highscore: <?php echo htmlspecialchars($score['highscore']); ?> - Datum: <?php echo htmlspecialchars($score['timestamp']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/app.js"></script>
</body>
</html>