<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/bin/PuzzleCreator.php';
require_once ROOT_DIR . '/bin/functions.php';

if (isset($_POST['id'])) {

    $puzzleCreatorID = $_POST['id'];
	$puzzleCreator = getPuzzleCreatorById($puzzleCreatorID);
	$target_dir = "images/icons/";
	$path_parts = pathinfo($_FILES["file"]["name"]);
	$extension = $path_parts['extension'];
	$target_file = $target_dir . "puzzle" . getToken(16) . "." . $extension;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	if(!file_exists($target_dir))
	{
		mkdir("images/icons/", 0700);
	}

	$uploadOk = 1;
	//echo $target_file;
	$check = getimagesize($_FILES["file"]["tmp_name"]);
	if ($check == false) {
		$uploadOk = 0;
		$errorReason = "not an image.";
	}
	if (file_exists($target_file)) {
		unlink($target_file);
	}
	if (file_exists($puzzleCreator->icon)) {
		unlink($puzzleCreator->icon);
	}
	if ($_FILES["file"]["size"] > 5000000) {
		$uploadOk = 0;
		$errorReason = "image was too large.";
	}
	$allowableExtensions = array("jpeg", "jpg", "png", "PNG", "JPG", "JPEG");
	if (!in_array($extension, $allowableExtensions)) {
		$uploadOk = 0;
		$errorReason = "image has a bad extension.";
	}
	if ($uploadOk == 0) {
		$success = false;
	} else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			$success = true;
		} else {
			$success = false;
		}
	}
	$puzzleCreator->icon = $target_file;
	$puzzleCreator->updatePuzzleCreator();

	//echo "Got here " . $target_file;
    //header("HTTP/1.1 200 OK");
   // exit;
} else {
   // header("HTTP/1.1 400 " . $errorReason);
   // exit;
}

