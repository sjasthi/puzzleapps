<?php

$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['author_id'])) {
    $authorId = $_GET['author_id'];
}
if (isset($_GET['app_id'])) {
    $appId = $_GET['app_id'];
}
?>

    <div class="right-content">
        <div class="container">
        <?php

        $puzzleImageFile = null;
        $puzzleImageSuccess = true;
        if (isset($_FILES["puzzle_image"]) && is_uploaded_file($_FILES["puzzle_image"]['tmp_name'])) {
            $puzzleImageSuccess = false;
            $target_dir = "images/puzzles/main/";
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

            if(!file_exists($target_dir))
            {
                mkdir("images/puzzles/main/", 0775);
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
        } else {
            $puzzleImageFileNameQuery = "SELECT * FROM puzzles WHERE id = '$id'";
            $result = $db->query($puzzleImageFileNameQuery);
            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $puzzleImageFileName = $row['puzzle_image'];
                }
            }
        }

        $solutionImageFile = null;
        $solutionImageSuccess = true;
        if (isset($_FILES["solution_image"]) && is_uploaded_file($_FILES["solution_image"]['tmp_name'])) {
            $solutionImageSuccess = false;
            $target_dir = "images/puzzles/solution/";
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

            if(!file_exists($target_dir))
            {
                mkdir("images/puzzles/solution/", 0775);
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
        } else {
            $solutionImageFileNameQuery = "SELECT * FROM puzzles WHERE id = '$id'";
            $result = $db->query($solutionImageFileNameQuery);
            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $solutionImageFileName = $row['solution_image'];
                }
            }
        }



        if (isset($_GET['id'])){
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $subTitle = mysqli_real_escape_string($db, $_POST['sub_title']);
            $authorId = ( isset($_POST['author_id']) ) ? $_POST['author_id'] : null;
            $appId = ( isset($_POST['app_id']) ) ? $_POST['app_id'] : null;
            $directions = mysqli_real_escape_string($db, $_POST['directions']);
            $notes = mysqli_real_escape_string($db, $_POST['notes']);
            $puzzleImage = mysqli_real_escape_string($db, $puzzleImageFileName);
            $solutionImage = mysqli_real_escape_string($db, $solutionImageFileName);

            $sql = "UPDATE puzzles
                    SET title='$title',
                        sub_title='$subTitle',
                        author_id='$authorId',
                        app_id='$appId',
                        directions='$directions',
                        notes = '$notes',
                        puzzle_image = '$puzzleImage',
                        solution_image = '$solutionImage'
                    WHERE id = '$id'";

            $result = mysqli_query($db, $sql);

            if(!$result) {
                echo '<script type="text/javascript">
                alert("Error updating puzzle.");
                window.location = "puzzles_modify.php?id='.$id.'"
                </script>';
            } else {
                echo '<script type="text/javascript">
                alert("Puzzle updated!");
                window.location = "puzzles_modify.php?id='.$id.'"
                </script>';
            }
        }

echo '</div></div>';
include("footer.php");
