<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Football Player</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 20px;
            min-height: 100vh;
          
        }
        h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px #fff;
        }
        .container {
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
        .input-container {
            margin-top: 20px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 25px;
            width: 70%;
            margin-right: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #f53fa1;
            color: #4c1432;
            border: none;
            border-radius: 25px;
            margin-top: 10px;
            transition: background-color 0.3s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        button:hover {
            background-color: #45a049;
        }
        .hint2, .result2, .score2 {
            font-size: 18px;
            margin-top: 10px;
            color: #00ecff;
        }
        .result2 {
            font-weight: bold;
            color: #333;
        }
        .score2 span {
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
    include 'header.php';
    ?>

    <div class="container">
        <h1>Guess the Football Player</h1>
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

    <script src="js/game2.js"></script>

</body>
</html>
