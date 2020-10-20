<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <title>Update App</title>
</head>

  <body class="body_background">
  <div class="container">

<?php
  require_once __DIR__ . '/bootstrap.php';
  require_once ROOT_DIR . '/db_configuration.php';
  require_once ROOT_DIR . '/src/lib/functions.php';
  require_once ROOT_DIR . '/src/models/App.php';
 
  printHeader();

  if (isset($_GET['id'])){

    $update_id = $_GET['id'];

    $sql = "SELECT * FROM applications
            WHERE id = '$update_id'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
  }//end if

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
            echo '<div class="container"><form class="form" action="update.php" method="POST">
                            <br><br><br><br><br><br>
                            <h3>Update App: </h3> <br>
                                <div class="control-group form-group col-md-12">
                                    <label for="name">Name:</label><br>
                                    <input class="form-control" name="name" value="'.$row["name"].'" maxLength="500 "required>
                                </div>
              Path: <br> <input type="text" name="path" value="'.$row["path"].'" maxlength="65" required> <br>
              Puzzle Creator Description: <br> <input type="textarea" name="puzzleCreatorDescription" value="'.$row["description"].'" maxlength="255" required> <br>
              Notes: <br> <input type="textarea" name="notes" value="'.$row["notes"].'"  maxlength="255" required> <br>
              Input From DB: <br> <input type="checkbox" name="inputFromDB" value="'.$row["inputFromDB"].'"  maxlength="4"> <br>
              Input From UI: <br> <input type="checkbox" name="inputFromUI" value="'.$row["inputFromUI"].'"  maxlength="4"> <br>
              Output To DB: <br> <input type="checkbox" name="outputToDB" value="'.$row["outputToDB"].'"  maxlength="4"> <br>
              Output To UI: <br> <input type="checkbox" name="OutputToUI" value="'.$row["outputToUI"].'"  maxlength="4"> <br>
              Developer: <br> <input type="text" name="developer" value="'.$row["developer"].'"  maxlength="65"> <br>
              Status: <br> <input type="text" name="status" value="'.$row["status"].'"  maxlength="65"> <br>
              Token: <br> <input type="text" name="token" value="'.$row["token"].'"  maxlength="255"> <br>
              Playable: <br> <input type="checkbox" name="playable" value="'.$row["playable"].'" maxlength="4"> <br>
            
              Icon: <br> <input type="file" name="icon" maxlength="75"> <br> <br>
              <button type="submit" name="submit" class="btn btn-success btn-sm">Update App</button>
            </form></div>';

      }//end while
  }//end if
  else {
      echo "0 results";
  }//end else
printFooter();
?>


</div>
  </body>
</html>
