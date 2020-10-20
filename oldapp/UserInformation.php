<?php


function getUsers()
{
	try {
		$connection = new Connection();
		$db = $connection->getConnection();
		$sqlExecSP = "call GetUserInfo()";
		$stmt = $db->prepare($sqlExecSP);
		$stmt->execute();
		$i = 0;
		$users = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$user = new user();
			$user->id = $row["id"];
			$user->name = $row["username"];
			$user->creatorAccessId = $row["creatorAccessId"];
			$users[$i] = $user;
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
	return $users;
}
