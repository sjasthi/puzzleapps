<?php
if (isset($_POST['import-book-images'])) {
    $countFiles = count($_FILES['book-images-file']['name']);
    $bookImageSuccess = false;
    $target_dir = "images/books/";
    $allowableExtensions = array("jpeg", "jpg", "png", "gif");
    for($i = 0; $i < $countFiles; $i++) {
        $filename = $_FILES['book-images-file']['name'][$i];
        $bookImageFile = $target_dir . $filename;
        $uploadOk = 1;
        $bookImageFileType = strtolower(pathinfo($bookImageFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["book-images-file"]["tmp_name"][$i]);

        if ($check != false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if (!file_exists($target_dir)) {
            mkdir("images/books/", 0777);
        }

        if (file_exists($bookImageFile)) {
            $uploadOk = 1;
        }

        if ($_FILES["book-images-file"]["size"][$i] > 500000) {
            $uploadOk = 0;
        }

        if (!in_array($bookImageFileType, $allowableExtensions)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $bookImageSuccess = false;
        } else {
            if (move_uploaded_file($_FILES["book-images-file"]["tmp_name"][$i], $bookImageFile)) {
                $bookImageSuccess = true;
            } else {
                $bookImageSuccess = false;
            }
        }
    }

    if (!$bookImageSuccess) {
        echo "<script type=\"text/javascript\">
                alert(\"Error adding one or more book cover images. Please check imported images and retry.\");
                window.location = \"books_import.php\"
                </script>";
    } else {
        echo "<script type=\"text/javascript\">
                alert(\"Book cover images were successfully imported.\");
                window.location = \"books_import.php\"
                </script>";
    }
}

