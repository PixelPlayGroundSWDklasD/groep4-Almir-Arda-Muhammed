<?php include 'lib/connection.php';?>
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
    <meta name="description" content="">
    <meta name="author" content="Almir Maksuti">
    <meta name="keywords" content="">
    <title>Nova Gaming - Registreren</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="wrapper">
            <?php
            $errorMessage = '';
            $registrationSuccessful = false;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userid = $_POST['userid'];
                $wachtwoord = $_POST['wachtwoord'];
                $wachtwoord_conf = $_POST['wachtwoord_conf'];
                $geheimevraag = $_POST['geheimevraag'];
                $antw_vraag = $_POST['antw_vraag'];

                if ($wachtwoord !== $wachtwoord_conf) {
                    $errorMessage = 'Wachtwoorden komen niet overeen.';
                } else {
                    $registrationSuccessful = true;
                }
            }
            ?>
            <?php if ($registrationSuccessful): 
                
                $sql = "INSERT INTO gebruikerss (id, gebruikers, wachtwoord, geheimevraag, antw_vraag) VALUES (NULL, '$userid', '$wachtwoord', '$geheimevraag', '$antw_vraag')";

  if ($conn->query($sql) === TRUE) {
    echo "New user created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>"  . $conn->error;
  }
  ?>
            <?php if (!empty($errorMessage)) : ?>
                <p><?php echo $errorMessage; ?></p>
            <?php endif; ?>

                <div id="welcome-message" style="color: cyan;">
                    Welcome, <?php echo htmlspecialchars($userid); ?>!
            <form id="registration-form" action="" method="POST">
                <h1>Registreren</h1>
                <div class="input-box">
                    <input type="text" placeholder="Gebruikersnaam" name="userid" required>
                    <i class='bx bxs-user'></i>
                </div>
            <?php else: ?>
                <form id="registration-form" action="" method="POST">
                    <h1>Registreren</h1>
                    <table>
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
                        <?php if ($errorMessage): ?>
                            <div id="error-message" style="color: red;"><?php echo $errorMessage; ?></div>
                        <?php endif; ?>
                    </table>
                </form>
            <?php endif; ?>
    </main>
    <?php include 'footer.php'; ?>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/app.js"></script>
</body>
</html>
</html>