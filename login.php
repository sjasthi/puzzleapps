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

        <h3>Hello Puzzler!</h3>
        <h4>Welcome to Indic Puzzles!</h4>
        <h4><br><br>TODO: Login Form</h4>
        <h4><br>Don't have an account? <a href="login_create.php">Create one!</a></h4>

    </div>
</div>

<?php include("footer.php"); ?>
