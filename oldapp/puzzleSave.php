<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/bin/functions.php';
require_once ROOT_DIR . '/bin/Puzzle.php';
require_once ROOT_DIR . '/bin/PuzzleInformation.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['id']) && $_POST['id'] > -1) {
    $puzzleId = $_POST['id'];
	//echo $puzzleId;
    $puzzle = getpuzzleById($puzzleId);
	//print_r($puzzle);
	if($puzzle == null)
	{
		printErrorMessage("Puzzle Not Found.");
	}
	
}
/*public $id;
    public $puzzleCreatorId;
    public $image;
    public $description;
	public $puzzleName;
	public $puzzleKeywords;
	public $puzzleInstructions;
	public $puzzleProject;
	public $solutionImage;
	public $solutionText;
	public $puzzleNotes;
	public $puzzleCreated;
	public $puzzleUpdated;*/
$newName = $_POST['name'];
$newCreatorId = $_POST['creatorId'];
$newDescription = $_POST['description'];
$newKeywords = $_POST['keywords'];
$newInstructions = $_POST['instructions'];
$newProject = $_POST['project'];
$newSolutionText = $_POST['solutionText'];
$newNotes = $_POST['notes'];

//print_r($puzzle);
$puzzle->puzzleCreatorId = $newCreatorId;
$puzzle->puzzleName = $newName;
$puzzle->description = $newDescription;
$puzzle->puzzleKeywords = $newKeywords;
$puzzle->puzzleInstructions = $newInstructions;
$puzzle->puzzleProject = $newProject;
$puzzle->solutionText = $newSolutionText;
$puzzle->puzzleNotes = $newNotes;

//print_r($puzzle);


$saved = $puzzle->updatePuzzle();

if($saved)
{
	header( 'Location: puzzleEdit.php?id=' . $puzzle->id . '&success=true');
	exit();
}
else{
	header( 'Location: puzzleEdit.php?id=' . $puzzle->id . '&success=false');
	exit();
	}

