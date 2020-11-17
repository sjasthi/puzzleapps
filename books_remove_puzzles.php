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
$removePuzzlesSuccess = false;
if (isset($_POST['remove-puzzles-submit'])) {
    if (isset($_POST['removePuzzleId'])) {
        $removePuzzlesSuccess = true;
        $countPuzzles = count($_POST['removePuzzleId']);
        for ($i = 0; $i < $countPuzzles; $i++) {
            $puzzleId = $_POST['removePuzzleId'][$i];
            $sql = "DELETE FROM books_puzzles WHERE book_id = '$bookId' AND puzzle_id = '$puzzleId'";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $removePuzzlesSuccess = false;
                die('Remove puzzles failed: ' . mysqli_error($db));
            }
        }
    }
    if (!$removePuzzlesSuccess) {
        echo '<script type="text/javascript">
                alert("Error removing one or more puzzles.");
                window.location = "books_modify.php?id='.$bookId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Puzzles removed!");
                window.location = "books_modify.php?id='.$bookId.'"
                </script>';
    }
}
