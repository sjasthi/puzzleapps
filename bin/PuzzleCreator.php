<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/puzzleapps/bin/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/puzzleapps/bin/PuzzleCreator.php';
class PuzzleCreator
{
    public $puzzleCreatorId;
	public $puzzleCreatorName;
	public $puzzleCreatorDescription;
	public $notes;
	public $inputFromDatabase;
	public $inputFromUI;
	public $outputToDatabase;
	public $outputToUI;
	public $developedBy;
	public $status;
    public $token;
	public $playable;
	public $icon;
	public $numPuzzles;
	
	
	public function updatePuzzleCreator()
	{

		filter_var($this->puzzleCreatorName, FILTER_SANITIZE_STRING);
		filter_var($this->token, FILTER_SANITIZE_STRING);
		filter_var($this->icon, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleCreatorDescription, FILTER_SANITIZE_STRING);
		filter_var($this->notes, FILTER_SANITIZE_STRING);
		filter_var($this->inputFromDatabase, FILTER_SANITIZE_STRING);
		filter_var($this->inputFromUI, FILTER_SANITIZE_STRING);
		filter_var($this->outputToDatabase, FILTER_SANITIZE_STRING);
		filter_var($this->outputToUI, FILTER_SANITIZE_STRING);
		filter_var($this->status, FILTER_SANITIZE_STRING);
		filter_var($this->developedBy, FILTER_SANITIZE_STRING);
		filter_var($this->status, FILTER_SANITIZE_STRING);
		
		//print_r($this);
		$success = false;
		try {
			$connection = new Connection();
			$db = $connection->getConnection();
			
			$sqlExecSP = "call updatePuzzleCreator(
			\"" . $this->puzzleCreatorId . "\",
			\"" . $this->puzzleCreatorName . "\",
			\"" . $this->puzzleCreatorDescription . "\",
			\"" . $this->notes . "\",
			\"" . $this->inputFromDatabase . "\",
			\"" . $this->inputFromUI . "\",
			\"" . $this->outputToDatabase . "\",
			\"" . $this->outputToUI . "\",
			\"" . $this->developedBy . "\",
			\"" . $this->status . "\",
			\"" . $this->token . "\",
			\"" . $this->playable . "\",
			\"" . $this->icon . "\"
			)";
			//print_r($this);
			$stmt = $db->prepare($sqlExecSP);
			//print_r($this);
			$stmt->execute();
			//print_r($this);
			$success = true;
		} catch (Exception $e) {
			$success = false;
			echo ($e);
		} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
			return $success;
		}
		
	}
	public function persistNewPuzzleCreator()
	{
		filter_var($this->puzzleCreatorName, FILTER_SANITIZE_STRING);
		filter_var($this->token, FILTER_SANITIZE_STRING);
		filter_var($this->icon, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleCreatorDescription, FILTER_SANITIZE_STRING);
		filter_var($this->notes, FILTER_SANITIZE_STRING);
		filter_var($this->inputFromDatabase, FILTER_SANITIZE_STRING);
		filter_var($this->inputFromUI, FILTER_SANITIZE_STRING);
		filter_var($this->outputToDatabase, FILTER_SANITIZE_STRING);
		filter_var($this->status, FILTER_SANITIZE_STRING);
		filter_var($this->outputToUI, FILTER_SANITIZE_STRING);
		filter_var($this->developedBy, FILTER_SANITIZE_STRING);
		filter_var($this->status, FILTER_SANITIZE_STRING);
		$returnID = -1;
		try {
			$connection = new Connection();
			$db = $connection->getConnection();
			$sqlExecSP = "call createNewPuzzleCreator
			(
			\"" . $this->puzzleCreatorName . "\",
			\"" . $this->puzzleCreatorDescription . "\",
			\"" . $this->notes . "\",
			\"" . $this->inputFromDatabase . "\",
			\"" . $this->inputFromUI . "\",
			\"" . $this->outputToDatabase . "\",
			\"" . $this->outputToUI . "\",
			\"" . $this->developedBy . "\",
			\"" . $this->status . "\",
			\"" . $this->token . "\",
			\"" . $this->playable . "\",
			\"" . $this->icon . "\"
			)";
			$stmt = $db->prepare($sqlExecSP);
			$stmt->execute();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$returnID = $row["id"];
			}
		} catch (Exception $e) {
			echo($e);
			return -1;
		} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
		//echo $returnID;
		return $returnID;
		}
		
	}
	public function deletePuzzleCreator()
	{
		
		try {
			$connection = new Connection();
			$db = $connection->getConnection();
			$sqlExecSP = "call deletePuzzleCreator
			(
			\"" . $this->puzzleCreatorId . "\"
			)";
			$stmt = $db->prepare($sqlExecSP);
			$stmt->execute();
		} catch (Exception $e) {
			return -1;
		} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
		}
		
	}
	function cmpc($a, $b) 
	{
		return strcmp(strtolower($a->puzzleCreatorName), strtolower($b->puzzleCreatorName));
	}

	
}



