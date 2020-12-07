<?php
if (isset($_POST['import-solution-images'])) {
    $countFiles = count($_FILES['solution-images-file']['name']);
    $solutionImageSuccess = false;
    $target_dir = "images/puzzles/solution/";
    $allowableExtensions = array("jpeg", "jpg", "png", "gif");
    for($i = 0; $i < $countFiles; $i++) {

        $filename = $_FILES['solution-images-file']['name'][$i];
        $solutionImageFile = $target_dir . $filename;
        $uploadOk = 1;
        $solutionImageFileType = strtolower(pathinfo($solutionImageFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["solution-images-file"]["tmp_name"][$i]);

        if ($check != false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if (!file_exists($target_dir)) {
            mkdir("images/puzzles/solution/", 0777);
        }

        if (file_exists($solutionImageFile)) {
            $uploadOk = 1;
        }

        if ($_FILES["solution-images-file"]["size"][$i] > 500000) {
            $uploadOk = 0;
        }

        if (!in_array($solutionImageFileType, $allowableExtensions)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $solutionImageSuccess = false;
        } else {
            if (move_uploaded_file($_FILES["solution-images-file"]["tmp_name"][$i], $solutionImageFile)) {
                $solutionImageSuccess = true;
            } else {
                $solutionImageSuccess = false;
            }
        }
    }

    if (!$solutionImageSuccess) {
        echo "<script type=\"text/javascript\">
                alert(\"Error adding one or more solution images. Please check imported images and retry.\");
                window.location = \"puzzles_import.php\"
                </script>";
    } else {
        echo "<script type=\"text/javascript\">
                alert(\"Solution images were successfully imported.\");
                window.location = \"puzzles_import.php\"
                </script>";
    }
}
