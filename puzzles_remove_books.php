<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_POST['puzzle-id'])) {
    $puzzleId = $_POST['puzzle-id'];
    console_log($puzzleId);
}
$removeBooksSuccess = false;
console_log(isset($_POST['remove-books-submit']));
console_log(isset($_POST['removeBookId']));
if (isset($_POST['remove-books-submit'])) {
    if (isset($_POST['removeBooksId'])) {
        $removeBooksSuccess = true;
        $countBooks = count($_POST['removeBooksId']);
        console_log($countBooks);
        for ($i = 0; $i < $countBooks; $i++) {
            $bookId = $_POST['removeBooksId'][$i];
            console_log("Book ID: " . $bookId);
            $sql = "DELETE FROM books_puzzles WHERE book_id = '$bookId' AND puzzle_id = '$puzzleId'";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $removeBooksSuccess = false;
                die('Remove books failed: ' . mysqli_error($db));
            }
        }
    }
    if (!$removeBooksSuccess) {
        echo '<script type="text/javascript">
                alert("Error removing one or more books.");
                window.location = "puzzles_modify.php?id='.$puzzleId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Books removed!");
                window.location = "puzzles_modify.php?id='.$puzzleId.'"
                </script>';
    }
}
