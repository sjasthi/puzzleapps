<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/Connection.php';
require_once ROOT_DIR . '/App.php';
class App
{
    public $id;
	public $name;
	public $path;
	public $description;
	public $notes;
	public $inputFromDB;
	public $inputFromUI;
	public $outputToDB;
	public $outputToUI;
	public $developer;
	public $status;
    public $token;
	public $playable;
	public $icon;
	public $numPuzzles;
	
	
	public function updatePuzzleCreator()
	{

		filter_var($this->name, FILTER_SANITIZE_STRING);
		filter_var($this->path, FILTER_SANITIZE_STRING);
		filter_var($this->token, FILTER_SANITIZE_STRING);
		filter_var($this->icon, FILTER_SANITIZE_STRING);
		filter_var($this->description, FILTER_SANITIZE_STRING);
		filter_var($this->notes, FILTER_SANITIZE_STRING);
		filter_var($this->inputFromDB, FILTER_SANITIZE_STRING);
		filter_var($this->inputFromUI, FILTER_SANITIZE_STRING);
		filter_var($this->outputToDB, FILTER_SANITIZE_STRING);
		filter_var($this->outputToUI, FILTER_SANITIZE_STRING);
		filter_var($this->status, FILTER_SANITIZE_STRING);
		filter_var($this->developer, FILTER_SANITIZE_STRING);
		filter_var($this->status, FILTER_SANITIZE_STRING);
		
		//print_r($this);
		$success = false;
		try {
			$connection = new Connection();
			$db = $connection->getConnection();
			
			$sqlExecSP = "call updatePuzzleCreator(
			\"" . $this->id . "\",
			\"" . $this->name . "\",
			\"" . $this->path . "\",
			\"" . $this->description . "\",
			\"" . $this->notes . "\",
			\"" . $this->inputFromDB . "\",
			\"" . $this->inputFromUI . "\",
			\"" . $this->outputToDB . "\",
			\"" . $this->outputToUI . "\",
			\"" . $this->developer . "\",
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
		filter_var($this->name, FILTER_SANITIZE_STRING);
		filter_var($this->path, FILTER_SANITIZE_STRING);
		filter_var($this->token, FILTER_SANITIZE_STRING);
		filter_var($this->icon, FILTER_SANITIZE_STRING);
		filter_var($this->description, FILTER_SANITIZE_STRING);
		filter_var($this->notes, FILTER_SANITIZE_STRING);
		filter_var($this->inputFromDB, FILTER_SANITIZE_STRING);
		filter_var($this->inputFromUI, FILTER_SANITIZE_STRING);
		filter_var($this->outputToDB, FILTER_SANITIZE_STRING);
		filter_var($this->status, FILTER_SANITIZE_STRING);
		filter_var($this->outputToUI, FILTER_SANITIZE_STRING);
		filter_var($this->developer, FILTER_SANITIZE_STRING);
		filter_var($this->status, FILTER_SANITIZE_STRING);
		$returnID = -1;
		try {
			$connection = new Connection();
			$db = $connection->getConnection();
			$sqlExecSP = "call createNewPuzzleCreator
			(
			\"" . $this->name . "\",
			\"" . $this->path . "\",
			\"" . $this->description . "\",
			\"" . $this->notes . "\",
			\"" . $this->inputFromDB . "\",
			\"" . $this->inputFromUI . "\",
			\"" . $this->outputToDB . "\",
			\"" . $this->outputToUI . "\",
			\"" . $this->developer . "\",
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
		return strcmp(strtolower($a->name), strtolower($b->name));
	}

	
}



