<?php
$nav_selected = "SPONSOR";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

        <h3>How can you help?</h3>

        <p>There are several ways you can help!</p>
        <ol>
            <li>Help create puzzles in <a href="http://google.com">Indic</a> language.</li>
            <li>Compile your puzzles into a book.</li>
            <li>Sponsor a book!  Here are the <a href="books.php">books</a> available for sponsorship.</li>
            <li>Provide feedback on the puzzles, apps, and books.</li>
            <li>Share the puzzles with teachers, schools, and students.</li>
            <li>Register and join the Indic puzzle community.</li>
        </ol>

    </div>
</div>

<?php include("footer.php"); ?>
