<?php
require_once __DIR__.'/../bootstrap.php';
require_once ROOT_DIR . '/src/lib/Connection.php';
class Puzzle
{
	public $id;
    public $puzzleCreatorId;
	public $puzzleCreatorName;
	public $path;
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
	public $puzzleUpdated;
	
	public function updatePuzzle()
	{
		filter_var($this->id, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleCreatorId, FILTER_SANITIZE_STRING);
		filter_var($this->image, FILTER_SANITIZE_STRING);
		filter_var($this->description, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleName, FILTER_SANITIZE_STRING);
		filter_var($this->path, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleKeywords, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleProject, FILTER_SANITIZE_STRING);
		filter_var($this->solutionImage, FILTER_SANITIZE_STRING);
		filter_var($this->solutionText, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleNotes, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleInstructions, FILTER_SANITIZE_STRING);
		
		if($this->puzzleCreatorId == null)
		{
			return false;
		}
		try {
			$connection = new Connection();
			$db = $connection->getConnection();
			$sqlExecSP = "call updatePuzzle
			(\"" . $this->id . "\",
			\"" . $this->puzzleCreatorId . "\",
			\"" . $this->image . "\",
			\"" . $this->description . "\",
			\"" . $this->puzzleName . "\",
			\"" . $this->path . "\",
			\"" . $this->puzzleKeywords . "\",
			\"" . $this->puzzleProject . "\",
			\"" . $this->solutionImage . "\",
			\"" . $this->solutionText . "\",
			\"" . $this->puzzleNotes . "\",
			\"" . $this->puzzleInstructions . "\"
			)";
			$stmt = $db->prepare($sqlExecSP);
			$stmt->execute();
		} catch (Exception $e) {
			return false;
		} finally {
		$connection = null;
		$stmt = NULL;
		$db = NULL;
			return true;
		}
		
	}
	public function persistNewPuzzle()
	{
		filter_var($this->puzzleCreatorId, FILTER_SANITIZE_STRING);
		filter_var($this->image, FILTER_SANITIZE_STRING);
		filter_var($this->description, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleName, FILTER_SANITIZE_STRING);
		filter_var($this->path, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleKeywords, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleProject, FILTER_SANITIZE_STRING);
		filter_var($this->solutionImage, FILTER_SANITIZE_STRING);
		filter_var($this->solutionText, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleNotes, FILTER_SANITIZE_STRING);
		filter_var($this->puzzleInstructions, FILTER_SANITIZE_STRING);
		$returnID = -1;
		
		if($this->puzzleCreatorId == null)
		{
			echo 'oops';
			return -1;
		}
		try {
			$connection = new Connection();
			$db = $connection->getConnection();
			$sqlExecSP = "call createNewPuzzle
			(\"" . $this->puzzleCreatorId . "\",
			\"" . $this->image . "\",
			\"" . $this->description . "\",
			\"" . $this->puzzleName . "\",
			\"" . $this->path . "\",
			\"" . $this->puzzleKeywords . "\",
			\"" . $this->puzzleProject . "\",
			\"" . $this->solutionImage . "\",
			\"" . $this->solutionText . "\",
			\"" . $this->puzzleNotes . "\",
			\"" . $this->puzzleInstructions . "\"
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
	public function deletePuzzle()
	{
		
		try {
			$connection = new Connection();
			$db = $connection->getConnection();
			$sqlExecSP = "call deletePuzzle
			(
			\"" . $this->id . "\",
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
	public static function cmp($a, $b) 
	{
		return strcmp(strtolower($a->puzzleName), strtolower($b->puzzleName));
	}	
	public static function cmpc($a, $b) 
	{
		return strcmp(strtolower($a->puzzleCreatorName), strtolower($b->puzzleCreatorName));
	}
	public static function cmpcreated($a, $b) 
	{
		return strcmp(strtolower($a->puzzleCreated), strtolower($b->puzzleCreated));
	}
	public static function cmpupdated($a, $b) 
	{
		return strcmp(strtolower($a->puzzleUpdated), strtolower($b->puzzleUpdated));
	}
}