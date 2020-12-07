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
        $target_dir = "images/apps/";
        $fileName = basename($_FILES["icon"]["name"]);
        $target_file = $target_dir . $fileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["icon"]["tmp_name"]);
        if ($check != false) {
            $uploadOk = 1;
        } else {
            echo "Sorry, not an image.";
            $uploadOk = 0;
        }

        if(!file_exists($target_dir))
        {
            mkdir("images/apps/", 0700);
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["icon"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }

        $allowableExtensions = array("jpeg", "jpg", "png", "gif");
        if (!in_array($imageFileType, $allowableExtensions)) {
            echo "Sorry, only jpg, png, and gif files allowed.";
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $success = false;
        } else {
            if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
                $success = true;
            } else {
                echo "Sorry, there was an error uploading your file.";
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
    $icon = mysqli_real_escape_string($db, $fileName);

    $sql = "INSERT INTO apps(name, description, path, notes, 
                        inputFromDB, inputFromUI, outputToDB, outputToUI, developer, 
                        status, token, playable, icon)
               VALUES ('$name', '$description', '$path', '$notes', 
                      '$inputFromDB', '$inputFromUI', '$outputToDB', '$outputToUI', 
                      '$developer', '$status', '$token', '$playable', '$icon')";
    $result = mysqli_query($db, $sql);

    $app = mysqli_query($db,"SELECT LAST_INSERT_ID()")->fetch_row();
    $appId = $app[0];

    if(!$result) {
        echo '<script type="text/javascript">
                alert("Error creating app. Try again.");
                window.location = "apps_create.php"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("App created!");
                window.location = "apps_modify.php?id='.$appId.'"
                </script>';
    }

echo '</div></div>';
include("footer.php"); ?>
