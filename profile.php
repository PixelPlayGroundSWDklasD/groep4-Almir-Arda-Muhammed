<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova Gaming - Profiel</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <style>
        /* Stijlen voor profile.php */
        .mo-1-main-container-profile {
            max-width: 900px;
            margin: 20px auto;
            background-color: transparent;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border: 4px solid #f53fa1;
        }

        .mo-2-page-title-profile {
            font-size: 36px;
            color: #00ecff;
            text-align: center;
            margin-bottom: 20px;
        }

        .mo-3-highscores-section {
            margin-top: 40px;
        }

        .mo-3-highscores-section h2 {
            font-size: 28px;
            color: #00ecff;
            margin-bottom: 15px;
        }

        .mo-4-game-scores {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mo-4-game-scores h3 {
            color: #000; /* Zwart maken */
        }

        .mo-5-scores-list {
            list-style: none;
            padding: 0;
            color: black;
        }

        .mo-5-scores-list li {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .mo-6-change-password-section,
        .mo-7-change-username-section {
            margin-top: 40px;
        }

        .mo-6-change-password-section h2,
        .mo-7-change-username-section h2 {
            font-size: 28px;
            color: #00ecff;
            margin-bottom: 15px;
        }

        .mo-6-change-password-section input,
        .mo-7-change-username-section input {
            width: calc(100% - 22px);
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .mo-6-change-password-section button,
        .mo-7-change-username-section button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .mo-6-change-password-section button:hover,
        .mo-7-change-username-section button:hover {
            background-color: #2980b9;
        }

        .mo-6-badges-section {
            margin-top: 40px;
        }

        .mo-6-badges-section h2 {
            font-size: 28px;
            color: #00ecff;
            margin-bottom: 20px;
        }

        .mo-7-badges-list {
            list-style: none;
            padding: 0;
        }

        .mo-7-badges-list li {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mo-7-badges-list h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .mo-7-badges-list p {
            font-size: 18px;
            color: #666;
        }

        .btn-3{
            display: inline-block;
            padding: 10px 20px;
            background-color: #00ecff;
            border-radius: 20px;
            text-align: center;
            font-size: 15px;
            
        }
    </style>
</head>
<body>
    <?php
    include 'header.php';

    // Placeholder for session start
    // session_start();
    // Check if user is logged in, if not, redirect to login page
    // if (!isset($_SESSION['user_id'])) {
    //     header("Location: login.php");
    //     exit();
    // }
    ?>
    <main class="mo-1-main-container-profile">
        <h1 class="mo-2-page-title-profile">Mijn Profiel</h1>
        
        <!-- Sectie met highscores -->
        <section class="mo-3-highscores-section">
            <h2>Mijn Highscores</h2>
            <div class="mo-4-game-scores">
                <h3>Mijn highscores</h3>
                <ul class="mo-5-scores-list">
                    <li>Highscore 1</li>
                    <li>Highscore 2</li>
                    <li>Highscore 3</li>
                    <li>Highscore 4</li>
                    <li>Highscore 5</li>
                </ul>
            </div>
            <!-- Voeg meer game-scores secties toe indien nodig -->
        </section>

        <!-- Formulier voor wachtwoord wijzigen -->
        <section class="mo-6-change-password-section">
            <h2>Wachtwoord Wijzigen</h2>
            <form action="change_password.php" method="post">
                <label for="old_password">Oud Wachtwoord:</label>
                <input type="password" id="old_password" name="old_password" required><br><br>
                
                <label for="new_password">Nieuw Wachtwoord:</label>
                <input type="password" id="new_password" name="new_password" required><br><br>
                
                <label for="confirm_new_password">Bevestig Nieuw Wachtwoord:</label>
                <input type="password" id="confirm_new_password" name="confirm_new_password" required><br><br>
                
                <button type="submit">Wijzig Wachtwoord</button>
            </form>
        </section>

        <?php // Simulated badges data (fetch from database in real scenario)
    $badges = [
        ['id' => 1, 'name' => 'Badge 1', 'description' => 'Eerste badge behaald!'],
        ['id' => 2, 'name' => 'Badge 2', 'description' => 'Tweede badge behaald!']
    ]; ?>

        <!-- Formulier voor gebruikersnaam wijzigen -->
        <section class="mo-7-change-username-section">
            <h2>Gebruikersnaam Wijzigen</h2>
            <form action="change_username.php" method="post">
                <label for="new_username">Nieuwe Gebruikersnaam:</label>
                <input type="text" id="new_username" name="new_username" required><br><br>
                
                <label for="confirm_new_username">Bevestig Nieuwe Gebruikersnaam:</label>
                <input type="text" id="confirm_new_username" name="confirm_new_username" required><br><br>
                
                <button type="submit">Wijzig Gebruikersnaam</button>
            </form>
        </section>


        <section class="mo-6-badges-section">
            <h2>Mijn Badges</h2>
            <ul class="mo-7-badges-list">
                <?php foreach ($badges as $badge): ?>
                    <li>
                        <h3><?php echo $badge['name']; ?></h3>
                        <p><?php echo $badge['description']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        
        <!-- Include friends.php voor vriendenbeheer -->
        <?php include 'friends.php'; ?>
        <a href="logout.php" class="btn-3">Logout</a>
    </main>
    <?php
    include 'footer.php';
    ?>
    <script src="https://unpkg.com/scrollreveal"></script>    
    <script src="js/app.js"></script>     
</body>
</html>