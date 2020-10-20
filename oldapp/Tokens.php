<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/App.php';
require_once ROOT_DIR . '/Connection.php';
function getTokens()
{
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getTokens()";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		$i = 0;
		$tokens = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$tokens[$i] = $row['token'];
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
	return $tokens;
}
function getPuzzleCreatorsInformation()
{
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getPuzzleCreatorsInformation()";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		$i = 0;
		$creators = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$puzzleCreator = new App();
			$puzzleCreator->puzzleCreatorId = $row["puzzleCreatorId"];
			$puzzleCreator->token = $row["token"];
			$puzzleCreator->puzzleCreatorName = $row["puzzleCreatorName"];
			$puzzleCreator->path = $row["path"];
			$puzzleCreator->puzzleCreatorDescription = $row["description"];
			$puzzleCreator->notes = $row["notes"];
			$puzzleCreator->inputFromDB = $row["inputFromDB"];
			$puzzleCreator->inputFromUI = $row["inputFromUI"];
			$puzzleCreator->ouputToDB = $row["outputToDB"];
			$puzzleCreator->ouputToUI = $row["outputToUI"];
			$puzzleCreator->developedBy = $row["developer"];
			$puzzleCreator->status = $row["status"];
			$puzzleCreator->playable = $row["playable"];
			$puzzleCreator->icon = $row["icon"];
			$puzzleCreator->numPuzzles = $row["numPuzzles"];
			$creators[$i] = $puzzleCreator;
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
	return $creators;
}
function getPuzzleCreatorIDFromToken($token)
{
	$token = filter_var(($token), FILTER_SANITIZE_STRING);
	$id = -1;
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getPuzzleIDfromToken(\"" . $token . "\")";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['puzzleCreatorID'];
		}
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	} catch (Exception $e) {
		return -1;
	} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	}
	return $id;
}
function getpuzzleCreatorById($id)
{
	try {
		$puzzleCreator = new App();
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call getPuzzleCreatorById(\"" . $id . "\")";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$puzzleCreator->puzzleCreatorId = $row["puzzleCreatorId"];
			$puzzleCreator->puzzleCreatorDescription = $row["description"];
			$puzzleCreator->notes = $row["notes"];
			$puzzleCreator->inputFromDatabase = $row["inputFromDB"];
			$puzzleCreator->inputFromUI = $row["inputFromUI"];
			$puzzleCreator->outputToDatabase = $row["outputToDB"];
			$puzzleCreator->outputToUI = $row["outputToUI"];
			$puzzleCreator->developedBy = $row["developer"];
			$puzzleCreator->status = $row["status"];
			$puzzleCreator->token = $row["token"];
			$puzzleCreator->puzzleCreatorName = $row["puzzleCreatorName"];
			$puzzleCreator->path = $row["path"];
			$puzzleCreator->playable = $row["playable"];
			$puzzleCreator->icon = $row["icon"];
			$puzzleCreator->numPuzzles = $row["numPuzzles"];
		}
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	} catch (Exception $e) {
		return null;
	} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
	}
	return $puzzleCreator;
}

