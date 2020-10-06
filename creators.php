<?php
/**
 * Created by PhpStorm.
 * User: Sandip
 * Date: 9/28/2018
 * Time: 11:33 PM
 */
require_once __DIR__.'/bootstrap.php';
include_once ROOT_DIR . '/db_configuration.php';
require_once ROOT_DIR . '/bin/PuzzleCreator.php';
require_once ROOT_DIR . '/bin/functions.php';

printHeader();

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$target_file = null;
$success = true;
if (isset($_FILES["fileToUpload"]) && is_uploaded_file($_FILES["fileToUpload"]['tmp_name'])) {
  $success = false;
    $target_dir = "images/icons/";
  $path_parts = pathinfo($_FILES["fileToUpload"]["name"]);
  $extension = $path_parts['extension'];
  $target_file = $target_dir . getToken(16) . "." . $extension;
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
  if(!file_exists($target_dir))
  {
    mkdir("images/icons/", 0700);
  }

  $uploadOk = 1;
  //echo $target_file;
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check == false) {
    $uploadOk = 0;
    $errorReason = "not an image.";
  }
  if (file_exists($target_file)) {
    unlink($target_file);
  }
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $success = true;
    } else {
      $success = false;
    }
  }
  
}

if (isset($_POST['id'])){

    $update_id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $notes = mysqli_real_escape_string($db, $_POST['notes']);
    $inputFromDB = mysqli_real_escape_string($db, $_POST['inputFromDB']);
    $inputFromUI = mysqli_real_escape_string($db, $_POST['inputFromUI']);
    $outputToDB = mysqli_real_escape_string($db, $_POST['outputToDB']);
    $outputToUI = mysqli_real_escape_string($db, $_POST['outputToUI']);
    $developer = mysqli_real_escape_string($db, $_POST['developer']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $token = mysqli_real_escape_string($db, $_POST['token']);
    $playable = mysqli_real_escape_string($db, $_POST['playable']);
    $icon = mysqli_real_escape_string($db, $_POST['target_file']);

    $result = $db->query("SELECT * FROM applications WHERE name='$name'");

    if ( $result->num_rows == 0 ) {
        $sql = "INSERT INTO applications(id, name, description, notes, 
                            inputFromDB, inputFromUI, outputToDB, outputToUI, developer, 
                            status, token, playable, icon)
                   VALUES ('$update_id', '$name', '$description', '$notes', 
                          '$inputFromDB', '$inputFromUI', '$outputToDB', '$outputToUI', 
                          '$developer', '$status', '$token', '$playable', '$icon')";

        mysqli_query($db, $sql);
        header('location: applications.php?PuzzleCreatorCreated=Success');
    } else{
        header('location: applications.php?PuzzleCreatorCreated=Failed');
    }
    printFooter();
}//end if
?>