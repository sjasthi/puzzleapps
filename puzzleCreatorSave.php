<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/bin/functions.php';
require_once ROOT_DIR . '/bin/PuzzleCreator.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_POST['id']) && $_POST['id'] > -1) {
    $puzzleCreatorId = $_POST['id'];
	//echo $puzzleId;
    $puzzleCreator = getPuzzleCreatorById($puzzleCreatorId);
	if(!validateUserAccess($_SESSION['creatorAccessId'], $puzzleCreator->puzzleCreatorId))
	{
		header('Location: login.php?logout=true&message=Invalid Access');
		exit;
	}
	//print_r($puzzleCreator);
	if($puzzleCreator == null)
	{
		printErrorMessage("Puzzle Creator Not Found.");
	}
	
}
//print_r($puzzleCreator);
/*
	public $puzzleCreatorId;
	public $puzzleCreatorName;
    public $token;
	public $playable;
	public $icon;

*/
$puzzleCreatorName = $_POST['name'];
if(isset($_POST['playable']))
{
	$puzzleCreatorPlayable = 1;
}
else
{
	$puzzleCreatorPlayable = 0;
}
if(isset($_POST['inputFromDB']))
{
	$inputFromDB = 1;
}
else
{
	$inputFromDB = 0;
}
if(isset($_POST['inputFromUI']))
{
	$inputFromUI = 1;
}
else
{
	$inputFromUI= 0;
}
if(isset($_POST['ouputToDB']))
{
	$outputToDB = 1;
}
else
{
	$outputToDB= 0;
}
if(isset($_POST['ouputToUI']))
{
	$outputToUI = 1;
}
else
{
	$outputToUI= 0;
}
if(isset($_POST['status']))
{
	$status = $_POST['status'];
}
if(isset($_POST['description']))
{
	$description = $_POST['description'];
}
if(isset($_POST['notes']))
{
	$notes = $_POST['notes'];
}
if(isset($_POST['developer']))
{
	$developer = $_POST['developer'];
}
$puzzleCreator->inputFromDatabase = $inputFromDB;
$puzzleCreator->inputFromUI = $inputFromUI;
$puzzleCreator->outputToDatabase = $outputToDB;
$puzzleCreator->outputToUI = $outputToUI;
$puzzleCreator->puzzleCreatorDescription = $description;
$puzzleCreator->notes = $notes;
$puzzleCreator->developedBy = $developer;
$puzzleCreator->status = $status;
$puzzleCreator->puzzleCreatorName = $puzzleCreatorName;
$puzzleCreator->playable = $puzzleCreatorPlayable;


$saved = $puzzleCreator->updatePuzzleCreator();
//print_r($puzzleCreator);
if($saved)
{
	header( 'Location: puzzleCreatorEdit.php?id=' . $puzzleCreator->puzzleCreatorId . '&success=true');
	exit();
}
else{
	header( 'Location: puzzleCreatorEdit.php?id=' . $puzzleCreator->puzzleCreatorId . '&success=false');
	exit();
	}

