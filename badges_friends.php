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
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["badge_image"]["tmp_name"]);
    if($check === false) {
        echo "Bestand is geen afbeelding.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Sorry, het bestand bestaat al.";
        $uploadOk = 0;
    }

    if ($_FILES["badge_image"]["size"] > 500000) {
        echo "Sorry, je bestand is te groot.";
        $uploadOk = 0;
    }

    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_extensions)) {
        echo "Sorry, alleen JPG, JPEG, PNG & GIF bestanden zijn toegestaan.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        $safe_filename = generateSafeFileName($_FILES["badge_image"]["name"]);
        if (move_uploaded_file($_FILES["badge_image"]["tmp_name"], $target_dir . $safe_filename)) {
            echo "Het bestand ". htmlspecialchars( basename( $_FILES["badge_image"]["name"])). " is geüpload.";

            $sql = "INSERT INTO badges (name, badge_condition, image) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $badge_name, $badge_description, $target_dir . $safe_filename);

            if (mysqli_stmt_execute($stmt)) {
                echo "Badge succesvol toegevoegd.";
            } else {
                echo "Fout bij toevoegen van badge: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Sorry, er was een probleem met het uploaden van je bestand.";
        }
    }
}

$conn->close();
?>
<meta name="author" content="Muhammed yesilkaya">