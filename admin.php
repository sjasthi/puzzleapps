<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "RELEASES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';
?>

<div class="right-content">
    <div class="container">

        <h3>Hello (admin)!</h3>
        <h4>Welcome to Indic Puzzles administration panel!</h4>

    </div>
</div>

<?php include("footer.php"); ?>
