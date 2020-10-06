<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/bin/PuzzleCreator.php';
require_once ROOT_DIR . '/bin/functions.php';
session_start();
if (isset($_POST['id'])) {
	$puzzleCreatorID = $_POST['id'];
	$puzzleCreator = getPuzzleCreatorById($puzzleCreatorID);
	if(!validateUserAccess($_SESSION['creatorAccessId'], $puzzleCreator->puzzleCreatorId))
	{
		header('Location: login.php?logout=true&message=Invalid Access');
		exit;
	}
	if(file_exists($puzzleCreator->icon))
	{
		unlink($puzzleCreator->icon);
		
	}
	$puzzleCreator->icon = null;
	$puzzleCreator->updatePuzzleCreator();
	header('Location: puzzleCreatorEdit.php?id=' . $puzzleCreatorID . '');
    exit;
    
} else {
    header("HTTP/1.1 500 Failed to delete");
    exit;
}
