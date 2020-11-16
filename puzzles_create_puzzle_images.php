<?php
if (isset($_POST['import-puzzle-images'])) {
    $countFiles = count($_FILES['puzzle-images-file']['name']);
    $puzzleImageSuccess = false;
    $target_dir = "images/puzzles/main/";
    $allowableExtensions = array("jpeg", "jpg", "png", "gif");
    for($i = 0; $i < $countFiles; $i++) {

        $filename = $_FILES['puzzle-images-file']['name'][$i];
        $puzzleImageFile = $target_dir . $filename;
        $uploadOk = 1;
        $puzzleImageFileType = strtolower(pathinfo($puzzleImageFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["puzzle-images-file"]["tmp_name"][$i]);

        if ($check != false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if (!file_exists($target_dir)) {
            mkdir("images/puzzles/main/", 0777);
        }

        if (file_exists($puzzleImageFile)) {
            $uploadOk = 1;
        }

        if ($_FILES["puzzle-images-file"]["size"][$i] > 500000) {
            $uploadOk = 0;
        }

        if (!in_array($puzzleImageFileType, $allowableExtensions)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $puzzleImageSuccess = false;
        } else {
            if (move_uploaded_file($_FILES["puzzle-images-file"]["tmp_name"][$i], $puzzleImageFile)) {
                $puzzleImageSuccess = true;
            } else {
                $puzzleImageSuccess = false;
            }
        }
    }

    if (!$puzzleImageSuccess) {
        echo "<script type=\"text/javascript\">
                alert(\"Error adding one or more puzzle images. Please check imported images and retry.\");
                window.location = \"puzzles_import.php\"
                </script>";
    } else {
        echo "<script type=\"text/javascript\">
                alert(\"Puzzle images were successfully imported.\");
                window.location = \"puzzles_import.php\"
                </script>";
    }
}
