<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

        <h1>Import Puzzles</h1>
        <form class="form" action="puzzles_create_puzzles.php" method="POST">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Puzzles</button>
        </form>

    </div>
</div>

<?php include("footer.php"); ?>
