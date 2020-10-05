<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/bin/functions.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['puzzlePerPage']) && $_POST['puzzlePerPage'] > 0) {
    $puzzlePerPage = $_POST['puzzlePerPage'];
	//echo $puzzleId;
    updatePuzzlePerPage($puzzlePerPage);
	
}


header( 'Location: Admin.php?success=true&message=Number updated.');
exit();
