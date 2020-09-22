<?php
include_once 'db_configuration.php';

if (isset($_GET['id'])){

  $delete_id = $_GET['id'];

  $sql = "DELETE FROM puzzlecreator
          WHERE id = '$delete_id'";

  mysqli_query($db, $sql);
  header('location: puzzlecreator.php?DeletePuzzleCreator=Success');

}//end if
?>
