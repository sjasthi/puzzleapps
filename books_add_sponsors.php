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
$addSponsorsSuccess = false;
if (isset($_POST['add-sponsors-submit'])) {
    if (isset($_POST['addSponsorsId'])) {
        $addSponsorsSuccess = true;
        $countSponsors = count($_POST['addSponsorsId']);
        for ($i = 0; $i < $countSponsors; $i++) {
            $userId = $_POST['addSponsorsId'][$i];
            $sql = "INSERT INTO users_books (user_id, book_id) VALUES ('$userId', '$bookId')";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $addSponsorsSuccess = false;
            }
        }
    }
    if (!$addSponsorsSuccess) {
        echo '<script type="text/javascript">
                alert("Error adding one or more sponsors.");
                window.location = "books_modify.php?id='.$bookId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Sponsors added!");
                window.location = "books_modify.php?id='.$bookId.'"
                </script>';
    }
}
