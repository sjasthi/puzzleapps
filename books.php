<?php
$nav_selected = "BOOKS";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

        <h3>What book would you like to download and play today?</h3>
        <h4>Here are some books from Indic Puzzles.<br>
        Explore, download, play, and sponsor!</h4>

    </div>
</div>

<?php include("footer.php"); ?>
