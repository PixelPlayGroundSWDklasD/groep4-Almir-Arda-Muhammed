<?php
session_start();

include 'lib/connection.php';

$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userid'];
    $password = $_POST['wachtwoord'];

    $sql = "SELECT Id, wachtwoord FROM gebruikerss WHERE gebruikers = ?";
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
        mysqli_stmt_bind_result($stmt, $user_id, $plain_password);
        mysqli_stmt_fetch($stmt);

        if ($password === $plain_password) {
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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="author" content="Arda Ilhan, Almir Maksuti">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="wrapper">
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <?php if (!empty($errorMessage)) : ?>
                <p><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <input type="text" placeholder="Username" id="userid" name="userid" required><br>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="wachtwoord" name="wachtwoord" required><br>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Dont have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>