<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<div class="right-content">
    <div class="container">
        <?php

        if (isset($_GET['id'])){
        $firstName = mysqli_real_escape_string($db, $_POST['first_name']);
        $lastName = mysqli_real_escape_string($db, $_POST['last_name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $role = mysqli_real_escape_string($db, $_POST['role']);
        $notes = mysqli_real_escape_string($db, $_POST['notes']);

        $sql = "UPDATE users
                SET first_name='$firstName',
                    last_name='$lastName',
                    email='$email',
                    role='$role',
                    notes = '$notes',
                    modified_at = '".date("Y-m-d H:i:s")."'
                WHERE id = '$id'";

        $result = mysqli_query($db, $sql);

        if(!$result) {
            echo '<script type="text/javascript">
            alert("Error updating user.");
            window.location = "users_modify.php?id='.$id.'"
            </script>';
        } else {
            echo '<script type="text/javascript">
            alert("User updated!");
            window.location = "users_modify.php?id='.$id.'"
            </script>';
        }
    }

echo '</div></div>';
include("footer.php");
