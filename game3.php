<!DOCTYPE html>

<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammed yesilkaya">
    <meta name="keywords" content="">
    <title>Quiz Game</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    #result {
        color: #000000; 
    }
    main {
        height: 780px;
    }
</style>
<main>
<body class="quizgame-body">
<?php include 'header.php';?>
    <div class="quizgame-container">
        <h1 id="question" class="quizgame-question"></h1>
        <div id="options" class="quizgame-options"></div>
        <div id="result" class="quizgame-result"></div>
        <h2 class="quizgame-scores-title">Opgeslagen scores</h2>
        <ul id="savedData" class="quizgame-saved-scores"></ul>
        <button id="openConfirmation" class="quizgame-open-confirmation">Open Confirmation Box</button>
    </div>
    <div class="quizgame-confirmation-box" id="confirmationTemplate">
        <div id="message" class="quizgame-message">Are you sure you want to proceed?</div>
        <div class="buttons">
            <button id="confirm" class="quizgame-confirm">OK</button>
            <button id="cancel" class="quizgame-cancel">CANCEL</button>
            <button id="no" class="quizgame-no">NO</button>
        </div>
    </div>
    <script src="game3.js"></script>
</body>
</main>
<footer><?php include 'footer.php';?> </footer>
</html>