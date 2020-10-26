<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

        <h1>Update App</h1>
        <form class="form" action="apps_modify_an_app.php" method="POST">
            <button type="submit" name="submit" class="btn btn-success btn-sm">Update</button>
        </form>

    </div>
</div>

<?php include("footer.php"); ?>
