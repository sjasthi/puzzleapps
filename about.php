<?php
$nav_selected = "ABOUT";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');

?>

<div class="right-content">
    <div class="container">

        <h3>Hello Puzzler!</h3>
        <h4>Welcome to Indic Puzzles!</h4>

        <p>
            Children learn best when the learning experiences include puzzles.
            There are numerous tools and web sites available to generate and play English puzzles.
            However, the resources to generate and play puzzles in Indian languages are not available.
        </p>
        <p>
            The goal of Indic Puzzles is to support the community of teachers, schools, and children
            interested in learning Indic Languages through puzzles.
        </p>

    </div>
</div>

<?php include("footer.php"); ?>
