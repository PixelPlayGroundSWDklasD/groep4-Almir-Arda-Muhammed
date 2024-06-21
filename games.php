<!DOCTYPE html>

<html lang="nl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Choose your favorite games">
    <meta name="author" content="A.Ilhan">
    <meta name="keywords" content="games, templates, choose">
    <title>Nova Gaming - Games</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="games-container">
        <div class="game-template">
            <img src="img/guess.jpeg" alt="Flag Game" class="game-image">
            <h2 class="game-title">Guess The Flag</h2>
            <p class="game-description">Test your knowledge of flags from around the world. How many can you guess correctly?</p>
            <button class="choose-button" onclick="window.location.href = 'game1.php'">Go to Guess The Flag</button>
        </div>
        <div class="game-template">
            <img src="img/rara.webp" alt="Footballer Game" class="game-image">
            <h2 class="game-title">Guess the Footballer</h2>
            <p class="game-description">Test your football knowledge with our "Guess the Footballer" game! Play solo or challenge friends. Join now and show off your skills!</p>
            <button class="choose-button" onclick="window.location.href = 'game2.php'">Go to Guess The Footballer</button>
        </div>
        <div class="game-template">
            <img src="img/quiz.png" alt="General Knowledge" class="game-image">
            <h2 class="game-title">General Knowledge Quiz</h2>
            <p class="game-description">Test your smarts with our fun general knowledge quiz! Play solo or with friends. Join now and see how you score!</p>
            <button class="choose-button" onclick="window.location.href = 'game3.php'">Go to General Knowledge Quiz</button>
        </div>
    </div>
    <br><br><br><br><br>  

    <canvas id="flappyCanvas" class="game-canvas" width="320" height="480"></canvas>

    <?php include 'footer.php'; ?>