<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_POST['user-id'])) {
    $userId = $_POST['user-id'];
}
$addSponsorshipsSuccess = false;
if (isset($_POST['add-sponsorships-submit'])) {
    if (isset($_POST['addSponsorshipsId'])) {
        $addSponsorshipsSuccess = true;
        $countSponsorships = count($_POST['addSponsorshipsId']);
        for ($i = 0; $i < $countSponsorships; $i++) {
            $bookId = $_POST['addSponsorshipsId'][$i];
            $sql = "INSERT INTO users_books (user_id, book_id) VALUES ('$userId', '$bookId')";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $addSponsorshipsSuccess = false;
                die('Add sponsorship failed: ' . mysqli_error($db));
            }
        }
    }
    if (!$addSponsorshipsSuccess) {
        echo '<script type="text/javascript">
                alert("Error adding one or more sponsorships.");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Sponsorships added!");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
    }
}
