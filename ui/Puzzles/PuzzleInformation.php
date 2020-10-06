<?php
require_once __DIR__.'/../bootstrap.php';
require_once ROOT_DIR . '/bin/Puzzle.php';
require_once ROOT_DIR . '/bin/Connection.php';
require_once ROOT_DIR . '/bin/CreatorsConfig.php';
function getPuzzles($page, $chunk)
{
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getPuzzles(\"" . $page . "\",\"" . $chunk ."\")";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		$i = 0;
		$puzzles = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$puzzle = new Puzzle();
			$puzzle->id = $row["id"];
			$puzzle->puzzleCreatorId = $row["puzzleCreatorId"];
			$puzzle->image = $row["puzzleImage"];
			$puzzle->description = $row["puzzleDescription"];
			$puzzle->puzzleName = $row["puzzleName"];
			$puzzle->path = $row["path"];
			$puzzle->puzzleCreatorName = $row["puzzleCreatorName"];
			$puzzle->puzzleKeywords = $row["puzzleKeywords"];
			$puzzle->puzzleInstructions = $row["puzzleInstructions"];
			$puzzle->puzzleProject = $row["puzzleProject"];
			$puzzle->solutionImage= $row["solutionImage"];
			$puzzle->puzzleNotes = $row["puzzleNotes"];
			$puzzle->puzzleCreated = $row["puzzleCreated"];
			$puzzle->puzzleUpdated = $row["puzzleUpdated"];
			
			$puzzles[$i] = $puzzle;
			$i++;
		}
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	} catch (Exception $e) {
		echo $e;
	} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	}
	return $puzzles;
}
function getSearchedPuzzles($searchterm)
{
	$searchterm = filter_var($searchterm, FILTER_SANITIZE_STRING);
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getSearchedPuzzles(\"" . $searchterm . "\")";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		$i = 0;
		$puzzles = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$puzzle = new Puzzle();
			$puzzle->id = $row["id"];
			$puzzle->puzzleCreatorId = $row["puzzleCreatorId"];
			$puzzle->image = $row["puzzleImage"];
			$puzzle->description = $row["puzzleDescription"];
			$puzzle->puzzleName = $row["puzzleName"];
			$puzzle->path = $row["path"];
			$puzzle->puzzleCreatorName = $row["puzzleCreatorName"];
			$puzzle->puzzleKeywords = $row["puzzleKeywords"];
			$puzzle->puzzleInstructions = $row["puzzleInstructions"];
			$puzzle->puzzleProject = $row["puzzleProject"];
			$puzzle->solutionImage= $row["solutionImage"];
			$puzzle->puzzleNotes = $row["puzzleNotes"];
			$puzzle->puzzleCreated = $row["puzzleCreated"];
			$puzzle->puzzleUpdated = $row["puzzleUpdated"];
			
			$puzzles[$i] = $puzzle;
			$i++;
		}
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	} catch (Exception $e) {
		echo $e;
	} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	}
	return $puzzles;
}
function getPuzzlesByToken($token)
{
	$token = filter_var(($token), FILTER_SANITIZE_STRING);
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getPuzzlesByToken(\"" . $token . "\")";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		$i = 0;
		$puzzles = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$puzzle = new Puzzle();
			$puzzle->id = $row["id"];
			$puzzle->puzzleCreatorId = $row["puzzleCreatorId"];
			$puzzle->image = $row["puzzleImage"];
			$puzzle->description = $row["puzzleDescription"];
			$puzzle->puzzleName = $row["puzzleName"];
			$puzzle->puzzleCreatorName = $row["puzzleCreatorName"];
			$puzzle->path = $row["path"];
			$puzzle->puzzleKeywords = $row["puzzleKeywords"];
			$puzzle->puzzleInstructions = $row["puzzleInstructions"];
			$puzzle->puzzleProject = $row["puzzleProject"];
			$puzzle->solutionImage= $row["solutionImage"];
			$puzzle->puzzleNotes = $row["puzzleNotes"];
			$puzzle->puzzleCreated = $row["puzzleCreated"];
			$puzzle->puzzleUpdated = $row["puzzleUpdated"];
			
			$puzzles[$i] = $puzzle;
			$i++;
		}
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	} catch (Exception $e) {
		echo $e;
	} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	}
	return $puzzles;
}


function getpuzzleById($id)
{
	$id = filter_var(($id), FILTER_SANITIZE_STRING);
	$puzzle = new Puzzle();
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getPuzzleById(\"" . $id . "\")";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$puzzle->id = $row["id"];
			$puzzle->puzzleCreatorId = $row["puzzleCreatorId"];
			$puzzle->image = $row["puzzleImage"];
			$puzzle->description = $row["puzzleDescription"];
			$puzzle->puzzleName = $row["puzzleName"];
			$puzzle->path = $row["path"];
			$puzzle->puzzleCreatorName = $row["puzzleCreatorName"];
			$puzzle->puzzleKeywords = $row["puzzleKeywords"];
			$puzzle->puzzleInstructions = $row["puzzleInstructions"];
			$puzzle->puzzleProject = $row["puzzleProject"];
			$puzzle->solutionImage= $row["solutionImage"];
			$puzzle->solutionText= $row["solutionText"];
			$puzzle->puzzleNotes = $row["puzzleNotes"];
			$puzzle->puzzleCreated = $row["puzzleCreated"];
			$puzzle->puzzleUpdated = $row["puzzleUpdated"];
		}
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	} catch (Exception $e) {
		echo $e;
	} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	}
	if($puzzle->id == null)
	{
		return null;
	}
	//print_r($puzzle);
	return $puzzle;
}
function getCountOfPuzzles()
{
	$return = 0;
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getCountOfPuzzles()";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$return = $row["count"];
		}
	$connection = null;
		$stmt = NULL;
		$db = NULL;
	} catch (Exception $e) {
		echo $e;
	} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	}
	return $return;
	
}