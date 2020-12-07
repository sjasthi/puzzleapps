<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if(ISSET($_POST["import-metadata"])) {
    $filename = $_FILES["metadata-file"]["tmp_name"];
    if ($_FILES["metadata-file"]["size"] > 0) {
        $file = fopen($filename, "r");
        fgetcsv($file, 10000, ",");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sql = "INSERT into books (title, author_id, directions, notes, front_cover, back_cover)
                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."')";
            console_log($sql);
            $result = mysqli_query($db, $sql);
            if (!$result) {
                echo "<script type=\"text/javascript\">
                    alert(\"Invalid File: Please check file format and retry.\");
                    window.location = \"books_import.php\"
                    </script>";
            } else {
                console_log($result);
                echo "<script type=\"text/javascript\">
                    alert(\"File has been successfully imported.\");
                    window.location = \"books_import.php\"
                    </script>";
            }
        }
        fclose($file);
    }
}
