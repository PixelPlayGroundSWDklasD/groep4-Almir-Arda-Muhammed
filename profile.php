<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    // Niet ingelogd, stuur door naar inlogpagina
    header("Location: login.html");
    exit();
}

// Inclusie van de databaseverbinding
include 'lib/connection.php'; 

// Query om badges op te halen
$sql = "SELECT * FROM badges";
$result = mysqli_query($conn, $sql);

// Controleer of er resultaten zijn
if (mysqli_num_rows($result) > 0) {
    // Initialiseer een array voor badges
    $badges = array();

    // Vul de array met resultaten van de query
    while ($row = mysqli_fetch_assoc($result)) {
        $badges[] = $row;
    }
} else {
    // Geen badges gevonden in de database
    $badges = array(); // Lege array om fouten te voorkomen bij foreach-loop
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammed yesilkaya">
    <meta name="keywords" content="">
    <title>Profile</title>
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
    <main id="mo-profile-main-container">
        <h1 id="mo-profile-page-title">Mijn Profiel</h1>

        
        <?php include 'highscores.php'; ?>

        
        <section id="mo-profile-change-password-section">
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

        
        <section id="mo-profile-change-username-section">
            <h2>Gebruikersnaam Wijzigen</h2>
            <form action="change_username.php" method="post">
                <label for="new_username">Nieuwe Gebruikersnaam:</label>
                <input type="text" id="new_username" name="new_username" required><br><br>

                <label for="confirm_new_username">Bevestig Nieuwe Gebruikersnaam:</label>
                <input type="text" id="confirm_new_username" name="confirm_new_username" required><br><br>

                <button type="submit">Wijzig Gebruikersnaam</button>
            </form>
        </section>

        
        <section id="mo-profile-badges-section">
            <h2>Badges</h2>
            <ul class="mo-profile-badges-list">
                <?php foreach ($badges as $badge) : ?>
                    <li>
                        <div class="badge-info">
                            <h3 class="badge-name"><?php echo htmlspecialchars($badge['naam']); ?></h3>
                            <p class="badge-description"><?php echo htmlspecialchars($badge['badge_condition']); ?></p>
                        </div>
                        <?php if (!empty($badge['image'])) : ?>
                            <img src="<?php echo htmlspecialchars($badge['image']); ?>" alt="<?php echo htmlspecialchars($badge['naam']); ?>">
                        <?php else : ?>
                            <p>Afbeelding niet beschikbaar</p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
    
    <?php include 'add_badges.php'; ?>
    <?php include 'friends.php'; ?>
    <?php include 'footer.php'; ?>
    
    <?php include 'friends.php'; ?>
        <a href="logout.php" class="btn-3">Logout</a>
        


</body>

</html>