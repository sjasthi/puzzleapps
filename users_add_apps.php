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
$addAppsSuccess = false;
if (isset($_POST['add-apps-submit'])) {
    if (isset($_POST['addAppsId'])) {
        $addAppsSuccess = true;
        $countApps = count($_POST['addAppsId']);
        for ($i = 0; $i < $countApps; $i++) {
            $appId = $_POST['addAppsId'][$i];
            $sql = "INSERT INTO users_apps (user_id, app_id) VALUES ('$userId', '$appId')";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $addAppsSuccess = false;
            }
        }
    }
    if (!$addAppsSuccess) {
        echo '<script type="text/javascript">
                alert("Error adding one or more apps.");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Apps added!");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
    }
}
