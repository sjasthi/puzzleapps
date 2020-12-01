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
$removeAppsSuccess = false;
if (isset($_POST['remove-apps-submit'])) {
    if (isset($_POST['removeAppsId'])) {
        $removeAppsSuccess = true;
        $countApps = count($_POST['removeAppsId']);
        for ($i = 0; $i < $countApps; $i++) {
            $appId = $_POST['removeAppsId'][$i];
            $sql = "DELETE FROM users_apps WHERE user_id = '$userId' AND app_id = '$appId'";
            $result = mysqli_query($db, $sql);

            if(!$result) {
                $removeAppsSuccess = false;
            }
        }
    }
    if (!$removeAppsSuccess) {
        echo '<script type="text/javascript">
                alert("Error removing one or more apps.");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Apps removed.");
                window.location = "users_modify.php?id='.$userId.'"
                </script>';
    }
}
