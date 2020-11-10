<?php

$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['puzzlesToRemove[]'])) {
    $puzzlesToRemove = $_GET['puzzlesToRemove[]'];
    echo $puzzlesToRemove;
}
?>
