<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])){

  $delete_id = $_GET['id'];

  $sql = "DELETE FROM applications
          WHERE id = '$delete_id'";

  mysqli_query($db, $sql);
  header('location: applications.php?DeletePuzzleCreator=Success');

}//end if
?>
