<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

    <?php
    $frontCoverFile = null;
    $frontSuccess = true;
    if (isset($_FILES["front_cover"]) && is_uploaded_file($_FILES["front_cover"]['tmp_name'])) {
        $frontSuccess = false;
        $target_dir = "images/books/";
        $frontCoverFileName = basename($_FILES["front_cover"]["name"]);
        $frontCoverFile = $target_dir . $frontCoverFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($frontCoverFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["front_cover"]["tmp_name"]);
        if ($check != false) {
            $uploadOk = 1;
        } else {
            echo "Sorry, not an image.";
            $uploadOk = 0;
        }

        if(!file_exists($target_dir)) {
            mkdir("images/books/", 0775);
        }

        if (file_exists($frontCoverFile)) {
            $uploadOk = 1;
        }

        if ($_FILES["front_cover"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        $allowableExtensions = array("jpeg", "jpg", "png", "gif");
        if (!in_array($imageFileType, $allowableExtensions)) {
            echo "Sorry, only jpg, png, and gif files allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $frontSuccess = false;
        } else {
            if (move_uploaded_file($_FILES["front_cover"]["tmp_name"], $frontCoverFile)) {
                $frontSuccess = true;
            } else {
                echo "Sorry, there was an error uploading your file.";
                $frontSuccess = false;
            }
        }
    }

    $backCoverFile = null;
    $backSuccess = true;
    if (isset($_FILES["back_cover"]) && is_uploaded_file($_FILES["back_cover"]['tmp_name'])) {
        $frontSuccess = false;
        $target_dir = "images/books/";
        $backCoverFileName = basename($_FILES["back_cover"]["name"]);
        $backCoverFile = $target_dir . $backCoverFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($backCoverFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["back_cover"]["tmp_name"]);
        if ($check != false) {
            $uploadOk = 1;
        } else {
            echo "Sorry, not an image.";
            $uploadOk = 0;
        }

        if(!file_exists($target_dir)) {
            mkdir("images/books/", 0775);
        }

        if (file_exists($backCoverFile)) {
            $uploadOk = 1;
        }

        if ($_FILES["back_cover"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        $allowableExtensions = array("jpeg", "jpg", "png", "gif");
        if (!in_array($imageFileType, $allowableExtensions)) {
            echo "Sorry, only jpg, png, and gif files allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $backSuccess = false;
        } else {
            if (move_uploaded_file($_FILES["back_cover"]["tmp_name"], $backCoverFile)) {
                $backSuccess = true;
            } else {
                echo "Sorry, there was an error uploading your file.";
                $backSuccess = false;
            }
        }
    }

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $authorId = mysqli_real_escape_string($db, $_POST['author_id']);
    $sponsorId = mysqli_real_escape_string($db, $_POST['sponsor_id']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $notes = mysqli_real_escape_string($db, $_POST['notes']);
    $frontCover = mysqli_real_escape_string($db, $frontCoverFileName);
    $backCover = mysqli_real_escape_string($db, $backCoverFileName);

    $sql = "INSERT INTO books (title, author_id, sponsor_id, description, notes, front_cover, back_cover)
            VALUES ('$title', '$authorId', '$sponsorId', '$description', '$notes', '$frontCover', '$backCover')";
    $result = mysqli_query($db, $sql);

    if(!$result) {
        die('Create book failed: ' . mysqli_error($db));
    } else { echo '<h1>Book Created!</h1>'; }

echo '</div></div>';
include("footer.php");
