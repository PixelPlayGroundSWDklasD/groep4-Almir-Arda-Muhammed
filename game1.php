<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Almir Maksuti">
<meta name="keywords" content="">
<title>Guess the Flag Game</title>
<link rel="stylesheet" href="css/style.css">
<style>
     body {
        font-family: Arial, sans-serif;
        text-align: center;
        min-height: 100vh;
    }

    .flag-game-container {
    max-width: 500px;
    margin: 0 auto;
    margin-top: 50px;
    padding: 20px;
    border: 3px solid #f53fa1;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: #00ecff;
    margin-bottom: 50px;
}

.flag-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.game-button {
    background-color: #f53fa1;
    color: #4c1432;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin: 5px;
}
.game-button:hover {
    background-color: #d42f85;
}
.guess-input {
    padding: 10px;
    font-size: 16px;
    border: 2px solid #f53fa1;
    border-radius: 5px;
    width: calc(100% - 24px); 
    box-sizing: border-box;
}
.input-label {
    display: block;
    margin-bottom: 10px;
    font-size: 18px;
}

.guess-input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid #00ecff;
    border-radius: 40px;
    font-size: 16px;
    color: #fff;
    padding: 20px 45px 20px 20px;
}
.guess-input::placeholder {
    color: #fff;
}
</style>
</head>
<?php include 'header.php';?>
<body>
<div class="flag-game-container">
    <h2>Guess the Flag Game</h2>
    <p>High Score: <span id="high-score-display">0</span></p>
    <img id="current-flag" class="flag-image" src="" alt="Flag">
    <div>
        <label for="country-guess" class="input-label">Enter your guess:</label>
        <input type="text" id="country-guess" class="guess-input" placeholder="Enter country name" onkeydown="handleKeyDown(event)">
        <button class="game-button" onclick="checkGuess()">Check Guess</button>
    </div>
    <p id="guess-result"></p>
    <button class="game-button" onclick="restartGame()">Restart Game</button>
</div>

<script src="game1.js"></script>
</body>
</html>
