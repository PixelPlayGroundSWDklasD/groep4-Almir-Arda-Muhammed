<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="A.Ilhan, Arda Ilhan">
    <meta name="keywords" content="">
    <title>Nova Gaming</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .centered-box {
            width: 350px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            border: 3px solid #f53fa1;
            border-radius: 50px;
            background-color: transparent;
        }
    </style>
</head>
<body>

    <?php
    include 'header.php';
    ?>



    <div class="centered-box">
        <?php
        if (isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
            echo "Welcome back, $userid!";
        } else {
            header("Location: login.html");
            exit();
        }
        ?>    
    </div>
    
    <section class="home">
        <div class="home-text">
            <span>Nova games Release</span>
            <h1>Play games everyday <br> Become a legend</h1>
            <p>No matter where you are, with a growing library of experience there is no limit.</p>

            <div class="icons">
                <a href="#"><i class="ri-windows-fill"></i></a>
                <a href="#"><i class="ri-apple-fill"></i></a>
                <a href="#"><i class="ri-playstation-fill"></i></a>
                <a href="#"><i class="ri-xbox-fill"></i></a>
            </div>
            <div class="main-btnn">
                <a href="register.php" class="btn">Join Gaming!</a>
                <a href="games.php" class="btn22">See all games</a>
            </div>
        </div>

        <div class="home-img">
            <img src="img/Princess-Peach.png">
        </div>
    </section>

    <?php
    include 'footer.php';
    ?>

    <script src="https://unpkg.com/scrollreveal"></script>    
    <script src="js/app.js"></script>     

</body>
</html>
