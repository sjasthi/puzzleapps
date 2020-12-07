<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">
<?php
$puzzleImageFile = null;
$puzzleImageSuccess = true;
if (isset($_FILES["puzzle_image"]) && is_uploaded_file($_FILES["puzzle_image"]['tmp_name'])) {
    $puzzleImageSuccess = false;
    $target_dir = "images/puzzles/";
    $puzzleImageFileName = basename($_FILES["puzzle_image"]["name"]);
    $puzzleImageFile = $target_dir . $puzzleImageFileName;
    $uploadOk = 1;
    $puzzleImageFileType = strtolower(pathinfo($puzzleImageFile, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["puzzle_image"]["tmp_name"]);
    if ($check != false) {
        $uploadOk = 1;
    } else {
        echo "Sorry, not an image.";
        $uploadOk = 0;
    }

    if(!file_exists($target_dir)) {
        mkdir("images/puzzles/", 0777);
    }

    if (file_exists($puzzleImageFile)) {
        $uploadOk = 1;
    }

    if ($_FILES["puzzle_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $allowableExtensions = array("jpeg", "jpg", "png", "gif");
    if (!in_array($puzzleImageFileType, $allowableExtensions)) {
        echo "Sorry, only jpg, png, and gif files allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $puzzleImageSuccess = false;
    } else {
        if (move_uploaded_file($_FILES["puzzle_image"]["tmp_name"], $puzzleImageFile)) {
            $puzzleImageSuccess = true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            $puzzleImageSuccess = false;
        }
    }
}

$solutionImageFile = null;
$solutionImageFileName = '';
$solutionImageSuccess = true;
if (isset($_FILES["solution_image"]) && is_uploaded_file($_FILES["solution_image"]['tmp_name'])) {
    $solutionImageSuccess = false;
    $target_dir = "images/puzzles/";
    $solutionImageFileName = basename($_FILES["solution_image"]["name"]);
    $solutionImageFile = $target_dir . $solutionImageFileName;
    $uploadOk = 1;
    $solutionImageFileType = strtolower(pathinfo($solutionImageFile, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["solution_image"]["tmp_name"]);
    if ($check != false) {
        $uploadOk = 1;
    } else {
        echo "Sorry, not an image.";
        $uploadOk = 0;
    }

    if(!file_exists($target_dir)) {
        mkdir("images/puzzles/", 0777);
    }

    if (file_exists($solutionImageFile)) {
        $uploadOk = 1;
    }

    if ($_FILES["solution_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $allowableExtensions = array("jpeg", "jpg", "png", "gif");
    if (!in_array($solutionImageFileType, $allowableExtensions)) {
        echo "Sorry, only jpg, png, and gif files allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $solutionImageSuccess = false;
    } else {
        if (move_uploaded_file($_FILES["solution_image"]["tmp_name"], $solutionImageFile)) {
            $solutionImageSuccess = true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            $solutionImageSuccess = false;
        }
    }
}

$title = mysqli_real_escape_string($db, $_POST['title']);
$appId = mysqli_real_escape_string($db, $_POST['app_id']);
$authorId = mysqli_real_escape_string($db, $_POST['author_id']);
$directions = mysqli_real_escape_string($db, $_POST['directions']);
$notes = mysqli_real_escape_string($db, $_POST['notes']);
$puzzleImage = mysqli_real_escape_string($db, $puzzleImageFileName);
$solutionImage = mysqli_real_escape_string($db, $solutionImageFileName);

$sql = "INSERT INTO puzzles (title, app_id, author_id, directions, notes, puzzle_image, solution_image)
            VALUES ('$title','$appId', '$authorId', '$directions', '$notes', '$puzzleImage', '$solutionImage')";
$result = mysqli_query($db, $sql);

$puzzle = mysqli_query($db,"SELECT LAST_INSERT_ID()")->fetch_row();
$puzzleId = $puzzle[0];

if(!$result) {
    echo '<script type="text/javascript">
                alert("Error creating puzzle. Try again.");
                window.location = "puzzles_create.php"
                </script>';
} else {
    echo '<script type="text/javascript">
                alert("Puzzle created!");
                window.location = "puzzles_modify.php?id='.$puzzleId.'"
                </script>';
}

echo '</div></div>';
include("footer.php");
