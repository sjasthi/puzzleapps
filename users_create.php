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

        <h1>Create A User</h1>
        <form class="form" action="users_create_a_user.php" method="POST">
            <button type="submit" name="submit" class="btn btn-success btn-sm">Create</button>
        </form>

    </div>
</div>

<?php include("footer.php"); ?>
