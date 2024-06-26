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

<meta name="author" content="Muhammed yesilkaya">