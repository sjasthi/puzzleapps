<?php
$nav_selected = "APPS";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

        <h3>What app would you like to play today?</h3>

    </div>
</div>

<?php include("footer.php"); ?>
