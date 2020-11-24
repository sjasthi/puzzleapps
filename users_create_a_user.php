<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>
<div class="right-content">
    <div class="container">

        <?php
        $addUserSuccess = false;
        if (isset($_POST['add-user-submit'])) {
            $addUserSuccess = true;
            $firstName = mysqli_real_escape_string($db, $_POST['first_name']);
            $lastName = mysqli_real_escape_string($db, $_POST['last_name']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $role = mysqli_real_escape_string($db, $_POST['role']);
            if ($email != "") {
                $emailResult = mysqli_query($db,"SELECT * FROM users where email='".$email."'");
                $num_rows = mysqli_num_rows($emailResult);
                if ($num_rows > 0) {
                    $addUserSuccess = false;
                    $createErrorMessage = "Email address already in use. Try again with a unique email.";
                }
            }
            $notes = mysqli_real_escape_string($db, $_POST['notes']);
            echo $email;
            echo $role;

            $sql = "INSERT INTO users (first_name, last_name, email, role) VALUES ('$firstName', '$lastName', '$email', '$role')";
            $result = mysqli_query($db, $sql);
            if(!$result) {
                $addUserSuccess = false;
            }

            $user = mysqli_query($db,"SELECT LAST_INSERT_ID()")->fetch_row();
            $userId = $user[0];

            if (!$addUserSuccess) {
                echo '<script type="text/javascript">
                alert("Error adding new user: '.$createErrorMessage.'");
                window.location = "users_create.php"
                </script>';
            } else {
                echo '<script type="text/javascript">
                alert("User added!");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
            }
        }

        echo '</div></div>';
        include("footer.php"); ?>
