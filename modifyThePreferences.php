<?php

$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PREFERENCES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_POST['app_rows'])){

    $app_rows = mysqli_real_escape_string($db, $_POST['app_rows']);
    $app_show = mysqli_real_escape_string($db, $_POST['app_show']);
    $app_height = mysqli_real_escape_string($db, $_POST['app_height']);
    $app_width = mysqli_real_escape_string($db, $_POST['app_width']);
    $puzzle_rows = mysqli_real_escape_string($db, $_POST['puzzle_rows']);
    $puzzle_show = mysqli_real_escape_string($db, $_POST['puzzle_show']);
    $puzzle_height = mysqli_real_escape_string($db, $_POST['puzzle_height']);
    $puzzle_width = mysqli_real_escape_string($db, $_POST['puzzle_width']);
    $book_rows = mysqli_real_escape_string($db, $_POST['book_rows']);
    $book_show = mysqli_real_escape_string($db, $_POST['book_show']);
    $book_height = mysqli_real_escape_string($db, $_POST['book_height']);
    $book_width = mysqli_real_escape_string($db, $_POST['book_width']);

    $sql1 = "UPDATE `preferences` SET `preference_value`= $app_rows WHERE `preference_name`= 'apps_per_row'";
    $sql2 = "UPDATE `preferences` SET `preference_value`= $app_show WHERE `preference_name`= 'apps_to_show'";
    $sql3 = "UPDATE `preferences` SET `preference_value`= $app_height WHERE `preference_name`= 'app_height'";
    $sql4 = "UPDATE `preferences` SET `preference_value`= $app_width WHERE `preference_name`= 'app_width'";
    $sql5 = "UPDATE `preferences` SET `preference_value`= $puzzle_rows WHERE `preference_name`= 'puzzles_per_row'";
    $sql6 = "UPDATE `preferences` SET `preference_value`= $puzzle_show WHERE `preference_name`= 'puzzles_to_show'";
    $sql7 = "UPDATE `preferences` SET `preference_value`= $puzzle_height WHERE `preference_name`= 'puzzle_height'";
    $sql8 = "UPDATE `preferences` SET `preference_value`= $puzzle_width WHERE `preference_name`= 'puzzle_width'";
    $sql9 = "UPDATE `preferences` SET `preference_value`= $book_rows WHERE `preference_name`= 'books_per_row'";
    $sql10 = "UPDATE `preferences` SET `preference_value`= $book_show WHERE `preference_name`= 'books_to_show'";
    $sql11 = "UPDATE `preferences` SET `preference_value`= $book_height WHERE `preference_name`= 'book_height'";
    $sql12 = "UPDATE `preferences` SET `preference_value`= $book_width WHERE `preference_name`= 'book_width'";

    mysqli_query($db, $sql1);
    mysqli_query($db, $sql2);
    mysqli_query($db, $sql3);
    mysqli_query($db, $sql4);
    mysqli_query($db, $sql5);
    mysqli_query($db, $sql6);
    mysqli_query($db, $sql7);
    mysqli_query($db, $sql8);
    mysqli_query($db, $sql9);
    mysqli_query($db, $sql10);
    mysqli_query($db, $sql11);
    mysqli_query($db, $sql12);



    header('location: admin_preferences.php?preferencesUpdated=Success');
}//end if
?>
