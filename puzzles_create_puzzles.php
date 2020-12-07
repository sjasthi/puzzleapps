<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if(ISSET($_POST["import-metadata"])) {
    $filename = $_FILES["metadata-file"]["tmp_name"];
    if ($_FILES["metadata-file"]["size"] > 0) {
        $file = fopen($filename, "r");
        fgetcsv($file, 10000, ",");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sql = "INSERT into puzzles (title, sub_title, app_id, author_id, directions, notes, puzzle_image, solution_image)
                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."')";
            console_log($sql);
            $result = mysqli_query($db, $sql);
            if (!$result) {
                echo "<script type=\"text/javascript\">
                    alert(\"Invalid File: Please check file format and retry.\");
                    window.location = \"puzzles_import.php\"
                    </script>";
            } else {
                console_log($result);
                echo "<script type=\"text/javascript\">
                    alert(\"File has been successfully imported.\");
                    window.location = \"puzzles_import.php\"
                    </script>";
            }
        }
        fclose($file);
    }
}