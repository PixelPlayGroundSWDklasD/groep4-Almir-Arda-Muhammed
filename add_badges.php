<?php
include 'lib/connection.php';

function generateSafeFileName($filename) {
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $safe_filename = $basename . '_' . uniqid() . '.' . $extension;
    return $safe_filename;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $badge_name = mysqli_real_escape_string($conn, $_POST['badge_name']);
    $badge_description = mysqli_real_escape_string($conn, $_POST['badge_description']);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["badge_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["badge_image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    if ($_FILES["badge_image"]["size"] > 500000) {
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        $safe_filename = generateSafeFileName($_FILES["badge_image"]["name"]);
        if (move_uploaded_file($_FILES["badge_image"]["tmp_name"], $target_dir . $safe_filename)) {
            $sql = "INSERT INTO badges (name, badge_condition, image) VALUES ('$badge_name', '$badge_description', '$target_dir$safe_filename')";

            if ($conn->query($sql) === TRUE) {
                echo "Badge succesvol toegevoegd.";
            } else {
                echo "Fout bij toevoegen van badge: " . $conn->error;
            }
        } else {
            echo "Sorry, er was een probleem met het uploaden van je bestand.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muhammed yesilkaya">
    <meta name="keywords" content="">
    <title>add_badges</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
</body>
</html>