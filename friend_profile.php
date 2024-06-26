<?php
include 'lib/connection.php'; 

if (isset($_GET['id'])) {
    $friend_id = $_GET['id'];

    $sql_friend = "SELECT * FROM gebruikerss WHERE id = ?";
    $stmt_friend = mysqli_prepare($conn, $sql_friend);
    mysqli_stmt_bind_param($stmt_friend, "i", $friend_id);
    mysqli_stmt_execute($stmt_friend);
    $result_friend = mysqli_stmt_get_result($stmt_friend);

    if ($row_friend = mysqli_fetch_assoc($result_friend)) {
        $friend_name = htmlspecialchars($row_friend['gebruikers']);
    } else {
        echo "Vriend niet gevonden.";
        exit(); 
    }

    mysqli_stmt_close($stmt_friend);
} else {
    echo "Geen vriend-ID opgegeven.";
    exit(); 
}

$sql_badges = "SELECT b.* FROM badges b JOIN badges ub ON b.id = ub.badge_condition WHERE ub.naam = ?";
$stmt_badges = mysqli_prepare($conn, $sql_badges);
mysqli_stmt_bind_param($stmt_badges, "i", $friend_id);
mysqli_stmt_execute($stmt_badges);
$result_badges = mysqli_stmt_get_result($stmt_badges);

$badges = [];

if (mysqli_num_rows($result_badges) > 0) {
    while ($row_badge = mysqli_fetch_assoc($result_badges)) {
        $badges[] = $row_badge;
    }
}

mysqli_stmt_close($stmt_badges);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Muhammed yesilkaya">
    <title>Nova Gaming - Vriend Profiel</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        main {
            height: 300px;
        }

        .friend-profile-container {
            padding-left: 0x;
        }

        .mo-badges-teskt- {
            padding-left: 600px;
        }

        .mo-badges-teskt-2 {
            padding-left: 0px;
        }

        .mo-badges-teskt- {
            padding-left: 0px;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<main class="friend-profile-container">
    <h1><?php echo $friend_name; ?>'s Profiel</h1>
</main>

<section class="friend-details">
    <h2></h2>
    <?php include 'highscores_friend.php'; ?>
</section>

<section class="friend-details">
    <h2 class="mo-badges-teskt-2">Badges van <?php echo $friend_name; ?></h2>
    <ul class="badges-section">
        <?php if (!empty($badges)) : ?>
            <?php foreach ($badges as $badge) : ?>
                <li class="badge-item">
                    <div class="badge-info">
                        <h3 class="badge-name"><?php echo htmlspecialchars($badge['naam']); ?></h3>
                        <p class="badge-description"><?php echo htmlspecialchars($badge['badge_condition']); ?></p>
                    </div>
                    <?php if (!empty($badge['image'])) : ?>
                        <img class="badge-image" src="<?php echo htmlspecialchars($badge['image']); ?>" alt="<?php echo htmlspecialchars($badge['naam']); ?>">
                    <?php else : ?>
                        <p>Afbeelding niet beschikbaar</p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        <?php else : ?>
            <li class="mo-badges-teskt-">Geen badges gevonden voor <?php echo $friend_name; ?></li>
        <?php endif; ?>
    </ul>
</section>

<?php include 'footer.php'; ?>

</body>
</html>