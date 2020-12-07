<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
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
            mkdir("images/apps/", 0775);
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["icon"]["size"] > 500000) {
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
            $success = false;
        } else {
            if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
                $success = true;
            } else {
                echo "Sorry, there was an error uploading your file.";
                $success = false;
            }
        }
    } else {
        $fileNameQuery = "SELECT * FROM apps WHERE id = '$id'";
        $result = $db->query($fileNameQuery);
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fileName = $row['icon'];
            }
        }
    }

    if (isset($_GET['id'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $path = mysqli_real_escape_string($db, $_POST['path']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $notes = mysqli_real_escape_string($db, $_POST['notes']);
        $inputFromDB = ( isset($_POST['inputFromDB']) ) ? 1 : 0;
        $inputFromUI = ( isset($_POST['inputFromUI']) ) ? 1 : 0;
        $outputToDB = ( isset($_POST['outputToDB']) ) ? 1 : 0;
        $outputToUI = ( isset($_POST['outputToUI']) ) ? 1 : 0;
        $developer = mysqli_real_escape_string($db, $_POST['developer']);
        $status = ( isset($_POST['status']) ) ? 1 : 0;
        $token = mysqli_real_escape_string($db, $_POST['token']);
        $playable = ( isset($_POST['playable']) ) ? 1 : 0;
        $icon = mysqli_real_escape_string($db, $fileName);

        $sql = "UPDATE apps
                SET name='$name',
                    path='$path',
                    description='$description',
                    notes = '$notes',
                    inputFromDB = '$inputFromDB',
                    inputFromUI = '$inputFromUI',
                    outputToDB = '$outputToDB',
                    outputToUI = '$outputToUI',
                    developer = '$developer',
                    status = '$status',
                    token = '$token',
                    playable = '$playable',
                    icon = '$icon'
                WHERE id = '$id'";

        $result = mysqli_query($db, $sql);

        if(!$result) {
            die('Update app failed: ' . mysqli_error($db));
        } else { echo '<h1>App Updated!</h1>'; }

        if(!$result) {
            echo '<script type="text/javascript">
                alert("Error updating app. Try again.");
                window.location = "apps_modify.php?id='.$id.'"
                </script>';
        } else {
            echo '<script type="text/javascript">
                alert("App updated!");
                window.location = "apps_modify.php?id='.$id.'"
                </script>';
        }
    }

echo '</div></div>';
include("footer.php");
