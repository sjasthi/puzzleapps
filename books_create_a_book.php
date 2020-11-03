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
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $authorId = mysqli_real_escape_string($db, $_POST['author_id']);
        $sponsorId = mysqli_real_escape_string($db, $_POST['sponsor_id']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $notes = mysqli_real_escape_string($db, $_POST['notes']);
        $frontCover = uploadFile('front_cover') ? mysqli_real_escape_string($db, $_POST['front_cover']) : 'default.png';
        $backCover = uploadFile('back_cover') ? mysqli_real_escape_string($db, $_POST['back_cover']) : 'default.png';
        $sql = "INSERT INTO books (title, author_id, sponsor_id, description, notes, front_cover, back_cover)
                   VALUES ('$title', '$authorId', '$sponsorId', '$description', '$notes', '$front_cover', '$back_cover')";

        $result = mysqli_query($db, $sql);

        if(!$result) {
            die('Create book failed: ' . mysqli_error($db));
        }
        echo '<h1>Book Created!</h1>';
        ?>
    </div>
</div>
<?php include("footer.php");
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
        //echo $target_file;
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
