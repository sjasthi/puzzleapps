<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/bin/functions.php';
require_once ROOT_DIR . '/bin/Puzzle.php';
require_once ROOT_DIR . '/bin/PuzzleInformation.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['id']) && $_POST['id'] > -1) {
    $puzzleId = $_POST['id'];
	$puzzleCreator = $_POST['creatorId'];
	
}
$deleted = false;
$puzzle = getPuzzleById($puzzleId);
//print_r($puzzle);
if($puzzle->puzzleCreatorId == $puzzleCreator)
{
	$deleted = $puzzle->deletePuzzle();
	if(getPuzzleById($puzzleId) == null)
	{
		if(file_exists($puzzle->image))
		{
			unlink($puzzle->image);
		}
		$deleted =  true;
	}
	else $deleted = false;
}



if($deleted)
{
	header( 'Location: list.php?deleted=true');
	exit();
}
else{
	header( 'Location: list.php?deleted=false');
	exit();
	}

