<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_POST['app-id'])) {
    $appId = $_POST['app-id'];
}
$addUsersSuccess = false;
if (isset($_POST['add-users-submit'])) {
    if (isset($_POST['addUsersId'])) {
        $addUsersSuccess = true;
        $countUsers = count($_POST['addUsersId']);
        for ($i = 0; $i < $countUsers; $i++) {
            $userId = $_POST['addUsersId'][$i];
            $sql = "INSERT INTO users_apps (user_id, app_id) VALUES ('$userId', '$appId')";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $addUsersSuccess = false;
            }
        }
    }
    if (!$addUsersSuccess) {
        echo '<script type="text/javascript">
                alert("Error adding one or more users.");
                window.location = "apps_modify.php?id='.$appId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Users added!");
                window.location = "apps_modify.php?id='.$appId.'"
                </script>';
    }
}
