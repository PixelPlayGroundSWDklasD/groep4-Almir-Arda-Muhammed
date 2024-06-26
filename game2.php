<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Arda Ilhan">
    <title>Guess the Football Player</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
.playertemplate{
    display: hidden;
}
</style>
<body class="game2body">
    <?php include 'header.php'; ?>
    <div class="game2container">
        <h1 class="game2h1">Guess the Football Player</h1>
        <div class="input-container">
            <label for="guessInput">Enter your guess:</label>
            <input type="text" id="guessInput" placeholder="Enter full name">
            <button onclick="checkGuess()">Guess</button>
            <button onclick="restartGame()">Restart Game</button>
        </div>
        <p class="hint2" id="hintMessage"></p>
        <p class="result2" id="resultMessage"></p>
        <p class="score2">Score: <span id="currentScore">0</span></p>
        <p class="score2">High Score: <span id="highScore">0</span></p>
    </div>

    <template id="playerTemplate">
        <div class="player">
            <p class="player-name"></p>
            <p class="player-country"></p>
            <p class="player-club"></p>
            <p class="player-position"></p>
        </div>
    </template>

    <script src="js/game2.js"></script>
</body>
</html>
