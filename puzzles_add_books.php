<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_POST['puzzle-id'])) {
    $puzzleId = $_POST['puzzle-id'];
}
$addBooksSuccess = false;
if (isset($_POST['add-books-submit'])) {
    if (isset($_POST['addBookId'])) {
        $addBooksSuccess = true;
        $countBooks = count($_POST['addBookId']);
        for ($i = 0; $i < $countBooks; $i++) {
            $bookId = $_POST['addBookId'][$i];
            $sql = "INSERT into books_puzzles (book_id, puzzle_id) VALUES ('$bookId', '$puzzleId')";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $addBooksSuccess = false;
                die('Add book failed: ' . mysqli_error($db));
            }
        }
    }
    if (!$addBooksSuccess) {
        echo '<script type="text/javascript">
                alert("Error adding one or more books.");
                window.location = "puzzles_modify.php?id='.$puzzleId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Books added!");
                window.location = "puzzles_modify.php?id='.$puzzleId.'"
                </script>';
    }
}

