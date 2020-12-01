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
$removeSponsorsSuccess = false;
if (isset($_POST['remove-sponsors-submit'])) {
    if (isset($_POST['removeSponsorsId'])) {
        $removeSponsorsSuccess = true;
        $countSponsors = count($_POST['removeSponsorsId']);
        for ($i = 0; $i < $countSponsors; $i++) {
            $userId = $_POST['removeSponsorsId'][$i];
            $sql = "DELETE FROM users_books WHERE user_id = '$userId' AND book_id = '$bookId'";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $removeSponsorsSuccess = false;
            }
        }
    }
    if (!$removeSponsorsSuccess) {
        echo '<script type="text/javascript">
                alert("Error removing one or more sponsors.");
                window.location = "books_modify.php?id='.$bookId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Sponsors removed.");
                window.location = "books_modify.php?id='.$bookId.'"
                </script>';
    }
}
