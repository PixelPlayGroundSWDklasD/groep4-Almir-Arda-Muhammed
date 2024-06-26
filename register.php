<?php
include 'lib/connection.php';

$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userid'];
    $password = $_POST['wachtwoord'];
    $geheimevraag = $_POST['geheimevraag'];
    $antw_vraag = $_POST['antw_vraag'];

    $sql = "INSERT INTO gebruikerss (Id, gebruikers, wachtwoord, geheimevraag, antw_vraag) VALUES (NULL, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Fout bij voorbereiden van de query: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $geheimevraag, $antw_vraag);

    if (!mysqli_stmt_execute($stmt)) {
        $errorMessage = "Fout bij uitvoeren van de query: " . mysqli_stmt_error($stmt);
    } else {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova Gaming - Registreren</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="author" content="Almir Maksuti">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="wrapper">
            <?php if (!empty($errorMessage)) : ?>
                <p><?php echo $errorMessage; ?></p>
            <?php endif; ?>

            <form id="registration-form" action="" method="POST">
                <h1>Registreren</h1>
                <div class="input-box">
                    <input type="text" placeholder="Gebruikersnaam" name="userid" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Wachtwoord" name="wachtwoord" id="ww" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Wachtwoord herhalen" name="wachtwoord_conf" id="ww-h" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Geheime vraag" name="geheimevraag" required>
                    <i class="ri-questionnaire-line"></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Antwoord vraag" name="antw_vraag" required>
                    <i class="ri-question-answer-line"></i>
                </div>
                <div>
                    <input type="checkbox" id="toggle-password">
                    <label for="toggle-password">Wachtwoord tonen</label>
                </div>
                <div>
                    <input type="submit" value="Registreren" name="verzenden" class="btn">
                </div>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>