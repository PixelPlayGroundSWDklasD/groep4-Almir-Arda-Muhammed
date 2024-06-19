<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PixelPlayGround - Vrienden</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Algemene stijlen */
        

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Stijlen voor friends.php */
        .mo-1-main-container-friends {
            max-width: 900px;
            margin: 20px auto;
            background-color: transparent;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            
        }

        .mo-2-page-title-friends {
            font-size: 36px;
            color: #00ecff;
            text-align: center;
            margin-bottom: 20px;
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
            color: #000; /* Zwart maken */
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

        
    </style>
</head>
<body>
    <?php
    // Placeholder for session start
    // session_start();
    // Check if user is logged in, if not, redirect to login page
    // if (!isset($_SESSION['user_id'])) {
    //     header("Location: login.php");
    //     exit();
    // }

    // Simulated data
    $friends = [
        ['id' => 1, 'username' => 'Vriend1', 'highscores' => [100, 250, 500]],
        ['id' => 2, 'username' => 'Vriend2', 'highscores' => [300, 600, 800]],
        ['id' => 3, 'username' => 'Vriend3', 'highscores' => [150, 400, 700]]
    ];

   
    ?>
    <main class="mo-1-main-container-friends">
        <h1 class="mo-2-page-title-friends">Mijn Vrienden</h1>
        
        <!-- Sectie met vrienden -->
        <section class="mo-3-friends-section">
            <?php foreach ($friends as $friend): ?>
                <div class="mo-4-friend">
                    <h2><?php echo $friend['username']; ?></h2>
                    <ul class="mo-5-friend-highscores">
                        <h3>Highscores</h3>
                        <?php foreach ($friend['highscores'] as $score): ?>
                            <li><?php echo $score; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="friend_profile.php?id=<?php echo $friend['id']; ?>">Bekijk profiel</a>
                    <a href="#">Verwijder vriend</a>
                </div>
            <?php endforeach; ?>
        </section>

        
        
    </main>
    <?php
    
    ?>
    <script src="https://unpkg.com/scrollreveal"></script>    
    <script src="js/app.js"></script>     
</body>
</html>