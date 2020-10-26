<?php
$nav_selected = "LOGIN";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

        <h3>Register</h3>
        <h4><br><br>TODO: Create User Form</h4>
        <h4><br><br>Already have an account? <a href="login.php">Log in!</a></h4>

    </div>
</div>

<?php include("footer.php"); ?>
