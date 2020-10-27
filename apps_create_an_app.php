<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>
<div class="right-content">
    <div class="container">

        <?php
$target_file = null;
$success = true;
if (isset($_FILES["icon"]) && is_uploaded_file($_FILES["icon"]['tmp_name'])) {
    $success = false;
    $target_dir = "images/apps/thumbnails/";
    $path_parts = pathinfo($_FILES["icon"]["name"]);
    $extension = $path_parts['extension'];
    $target_file = $target_dir . getToken(16) . "." . $extension;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if(!file_exists($target_dir))
    {
        mkdir("images/apps/thumbnails/", 0700);
    }

    $uploadOk = 1;
    //echo $target_file;
    $check = getimagesize($_FILES["icon"]["tmp_name"]);
    if ($check == false) {
        $uploadOk = 0;
        $errorReason = "not an image.";
    }
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    if ($_FILES["icon"]["size"] > 5000000) {
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
        if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
            $success = true;
        } else {
            $success = false;
        }
    }

}
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $path = mysqli_real_escape_string($db, $_POST['path']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $notes = mysqli_real_escape_string($db, $_POST['notes']);
    if (isset($_POST['inputFromDB']) and ($_POST['inputFromDB']=='on')) $inputFromDB=1; else $inputFromDB=0;
    if (isset($_POST['inputFromUI']) and ($_POST['inputFromUI']=='on')) $inputFromUI=1; else $inputFromUI=0;
    if (isset($_POST['outputToDB']) and ($_POST['outputToDB']=='on')) $outputToDB=1; else $outputToDB=0;
    if (isset($_POST['outputToUI']) and ($_POST['outputToUI']=='on')) $outputToUI=1; else $outputToUI=0;
    $developer = mysqli_real_escape_string($db, $_POST['developer']);
    if (isset($_POST['status']) and ($_POST['status']=='on')) $status=1; else $status=0;
    $token = mysqli_real_escape_string($db, $_POST['token']);
    if (isset($_POST['playable']) and ($_POST['playable']=='on')) $playable=1; else $playable=0;
    $icon = mysqli_real_escape_string($db, $_POST['icon']);

        $sql = "INSERT INTO apps(name, description, path, notes, 
                            inputFromDB, inputFromUI, outputToDB, outputToUI, developer, 
                            status, token, playable, icon)
                   VALUES ('$name', '$description', '$path', '$notes', 
                          '$inputFromDB', '$inputFromUI', '$outputToDB', '$outputToUI', 
                          '$developer', '$status', '$token', '$playable', '$icon')";
        mysqli_query($db, $sql);
?>
    <h1>App created!</h1>
    </div>
</div>

<?php include("footer.php"); ?>
