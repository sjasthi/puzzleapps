<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="styles/main_style.css" type="text/css">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
    <title>Puzzle Creator Database</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../ccs/publishersdb.css" rel="stylesheet">
  </head>

  <body>

<?php
  require_once __DIR__.'/bootstrap.php';
  require_once ROOT_DIR . '/db_configuration.php';
  require_once ROOT_DIR . '/bin/functions.php';

  printHeader();
  
  if (isset($_GET['id'])){

    $update_id = $_GET['id'];

    $sql = "SELECT * FROM puzzlecreator
            WHERE id = '$update_id'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
  }//end if

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
            echo '<form class="form" action="view.php" method="POST">
              Name: <br> <input type="text" name="name" value="'.$row["name"].'" maxlength="65" readonly> <br>
              Puzzle Creator Description: <br> <textarea rows="5" name="puzzleCreatorDescription" value="'.$row["puzzleCreatorDescription"].'" maxlength="255" readonly> <br>
              Notes: <br> <textarea rows="5" name="notes" value="'.$row["notes"].'"  maxlength="255" readonly> <br>
              Input From DB: <br> <input type="checkbox" name="inputFromDB" value="'.$row["inputFromDB"].'"  maxlength="4" readonly> <br>
              Input From UI: <br> <input type="checkbox" name="inputFromUI" value="'.$row["inputFromUI"].'"  maxlength="4" readonly> <br>
              Output To DB: <br> <input type="checkbox" name="outputToDB" value="'.$row["outputToDB"].'"  maxlength="4" readonly> <br>
              Output To UI: <br> <input type="checkbox" name="outputToUI" value="'.$row["outputToUI"].'"  maxlength="4" readonly> <br>
              Developer: <br> <input type="text" name="developer" value="'.$row["developer"].'"  maxlength="50" readonly> <br>
              Status: <br> <input type="text" name="status" value="'.$row["status"].'"  maxlength="14"readonly> <br>
              Token: <br> <input type="text" name="token" value="'.$row["token"].'"  maxlength="255" readonly> <br>
              Playable: <br> <input type="checkbox" name="playable" value="'.$row["playable"].'" maxlength="6" readonly> <br>
              Icon: <br> <input type="file" name="icon" value="'.$row["icon"].'" maxlength="6" readonly> <br>
              <br>
              <button type="submit" name="submit" class="btn btn-success btn-sm">  Back  </button>
            </form>';

      }//end while
  }//end if
  else {
      echo "0 results";
  }//end else

?>



  </body>
</html>
