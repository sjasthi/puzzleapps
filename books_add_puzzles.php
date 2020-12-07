<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_POST['book-id'])) {
    $bookId = $_POST['book-id'];
}
$addPuzzlesSuccess = false;
if (isset($_POST['add-puzzles-submit'])) {
    if (isset($_POST['addPuzzlesId'])) {
        $addPuzzlesSuccess = true;
        $countPuzzles = count($_POST['addPuzzlesId']);
        for ($i = 0; $i < $countPuzzles; $i++) {
            $puzzleId = $_POST['addPuzzlesId'][$i];
            $sql = "INSERT into books_puzzles (book_id, puzzle_id) VALUES ('$bookId', '$puzzleId')";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $addPuzzlesSuccess = false;
                die('Add puzzle failed: ' . mysqli_error($db));
            }
        }
    }
    if (!$addPuzzlesSuccess) {
        echo '<script type="text/javascript">
                alert("Error adding one or more puzzles.");
                window.location = "books_modify.php?id='.$bookId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Puzzles added!");
                window.location = "books_modify.php?id='.$bookId.'"
                </script>';
    }
}
