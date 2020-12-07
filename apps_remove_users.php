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
$removeUsersSuccess = false;
if (isset($_POST['remove-users-submit'])) {
    if (isset($_POST['removeUsersId'])) {
        $removeUsersSuccess = true;
        $countUsers = count($_POST['removeUsersId']);
        for ($i = 0; $i < $countUsers; $i++) {
            $userId = $_POST['removeUsersId'][$i];
            $sql = "DELETE FROM users_apps WHERE user_id = '$userId' AND app_id = '$appId'";
            console_log($sql);
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $removeUsersSuccess = false;
                console_log($removeUsersSuccess);
            }
        }
    }
    if (!$removeUsersSuccess) {
        echo '<script type="text/javascript">
                alert("Error removing one or more users.");
                window.location = "apps_modify.php?id='.$appId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Users removed.");
                window.location = "apps_modify.php?id='.$appId.'"
                </script>';
    }
}
