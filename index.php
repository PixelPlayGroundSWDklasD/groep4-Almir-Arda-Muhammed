<?php
session_start();

include 'lib/connection.php';

$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userid'];
    $password = $_POST['wachtwoord'];

    $sql = "SELECT Id, wachtwoord FROM gebruikerss WHERE gebruikersnaam = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Fout bij voorbereiden van de query: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    if (!mysqli_stmt_execute($stmt)) {
        die("Fout bij uitvoeren van de query: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $user_id, $hashed_password);
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        } else {
            $errorMessage = "Ongeldig wachtwoord.";
        }
    } else {
        $errorMessage = "Geen gebruiker gevonden met deze gebruikersnaam.";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Arda Ilhan">
    <meta name="keywords" content="">
    <title>Nova Gaming</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQ9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <?php include 'header.php'; ?>

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

    <?php include 'footer.php'; ?>
</body>
</html>