<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['author_id'])) {
    $authorId = $_GET['author_id'];
}
if (isset($_GET['sponsor_id'])) {
    $sponsorId = $_GET['sponsor_id'];
}
?>

<div class="right-content">
    <div class="container">
        <?php

        if (isset($_GET['id'])){
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $authorId = ( isset($_POST['author_id']) ) ? $_POST['author_id'] : null;
            $sponsorId = ( isset($_POST['sponsor_id']) ) ? $_POST['sponsor_id'] : null;
            $description = mysqli_real_escape_string($db, $_POST['description']);
            $notes = mysqli_real_escape_string($db, $_POST['notes']);
            $frontCover = uploadFile('front_cover') ? mysqli_real_escape_string($db, $_POST['front_cover']) : 'default.png';
            $backCover = uploadFile('back_cover') ? mysqli_real_escape_string($db, $_POST['back_cover']) : 'default.png';



            $sql = "UPDATE books
                    SET title='$title',
                        author_id='$authorId',
                        sponsor_id='$sponsorId',
                        description='$description',
                        notes = '$notes',
                        front_cover = '$frontCover',
                        back_cover = '$backCover'
                    WHERE id = '$id'";

            $result = mysqli_query($db, $sql);

            if(!$result) {
                die('Update book failed: ' . mysqli_error($db));
            }
            echo '<h1>Book Updated!</h1>';
        }
    echo '</div></div>';

include("footer.php");
function uploadFile($field) {
    $target_file = null;
    $success = true;
    if (isset($_FILES[$field]) && is_uploaded_file($_FILES[$field]['tmp_name'])) {
        $success = false;
        $target_dir = "images/books/";
        $path_parts = pathinfo($_FILES[$field]["name"]);
        $extension = $path_parts['extension'];
        $target_file = $target_dir . getToken(16) . "." . $extension;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if(!file_exists($target_dir))
        {
            mkdir("images/books/", 0700);
        }

        $uploadOk = 1;
        echo $target_file;
        $check = getimagesize($_FILES[$field]["tmp_name"]);
        if ($check == false) {
            $uploadOk = 0;
            $errorReason = "not an image.";
        }
        if (file_exists($target_file)) {
            unlink($target_file);
        }
        if ($_FILES[$field]["size"] > 5000000) {
            $uploadOk = 0;
            $errorReason = "image was too large.";
        }
        $allowableExtensions = array("jpeg", "jpg", "png", "PNG", "JPG", "JPEG", "gif", "GIF");
        if (!in_array($extension, $allowableExtensions)) {
            $uploadOk = 0;
            $errorReason = "image has a bad extension.";
        }
        if ($uploadOk == 0) {
            $success = false;
        } else {
            if (move_uploaded_file($_FILES[$field]["tmp_name"], $target_file)) {
                $success = true;
            } else {
                $success = false;
            }
        }

    }
    return $success;
}
