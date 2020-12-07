<?php
require_once __DIR__ . '/bootstrap.php';
require_once ROOT_DIR . '/functions.php';
require_once ROOT_DIR . '/db_configuration.php';
require_once ROOT_DIR . '/App.php';

 printHeader();  
 
?>

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
      <title>Create App</title>
   </head>

<body class="body_background">

<div class="container">
    <!--Check the CeremonyCreated and if Failed, display the error message-->
    <?php
    if(isset($_GET['PuzzleCreatorCreated'])){
        if($_GET["PuzzleCreatorCreated"] == "Failed"){
            echo '<br><h3 class="bg-danger">An Application with the NAME already exists. Please try again with a new NAME! </h3>';
        }
    }

    ?>
    <form action="creators.php" method="POST">
        <br><br> <br><br><br><br>
        <h3>Create New Application: </h3> <br>
        <div class="form-row">
            <div class="control-group form-group col-md-12">
                <label for="name">Name:</label><br>
                <input class="form-control" name="name" required data-validation-required-message="Please enter the name."  
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
                    <p class="help-block"></p><br><br>
            </div>

            <div class="form-group col-md-12">
                <label for="path">Path:</label><br>
                <input class="form-control" name="path" required data-validation-required-message="Path is required."
                       maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"><br><br>
            </div>

            <div class="control-group form-group col-lg-12">
                <label for="description">Description:</label><br>
                <input rows="5" class="form-control" name="description" maxlength="500"
                    data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
             <p class="help-block"></p><br><br>
            </div>

            <div class="form-group col-md-12">
                <label for="notes">Notes:</label><br>
                <input rows="5" class="form-control" name="notes"   maxlength="500"
                    data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
             <p class="help-block"></p><br><br>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputFromDB">input From DB:</label><br>
                    <input type="checkbox" class="form-control checkbox-inline" name="inputFromDB"  maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputFromUI">Input From UI:</label><br>
                    <input type="checkbox" class="form-control" name="inputFromUI"  maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="outputToDB">output To DB:</label><br>
                    <input type="checkbox" class="form-control" name="outputToDB"   maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="outputToUI">Output To UI:</label><br>
                    <input type="checkbox" class="form-control" name="outputToUI"  maxlength="5">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="developer">Developer:</label><br>
                    <input type="text" class="form-control" name="developer"  maxlength="50"><br><br>
                </div>

            <div class="form-group col-md-12">
                <label for="status">Status:</label><br>
                <input type="text" class="form-control" name="status"  maxlength="20"><br><br>
            </div>

            <div class="form-group col-md-12">
                <label for="token">Token:</label><br>
                <input type="text" class="form-control" name="token"  maxlength="50"><br><br>
            </div>

            <div class="control-group form-group col-md-3">
                <label for="playable">Playable:</label><br>
                <input type="checkbox" class="form-control" name="playable"   maxlength="1">
            </div>
        </div>

        <div class="controls">
                <label for="image">Application Image:</label><br>
                <input type="file" name="imageFile"  id="imageFile" >
                <p class="help-block"></p>

        </div>
        <br><br><br>
        <div class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Add Application</button>
        </div>
        <br> <br>

    </form>
    <?php
        printFooter();
    ?>
</div>
 </body>
</html>
