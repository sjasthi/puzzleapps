<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM apps WHERE id = '$id'";
    $result = $db->query($sql);
}

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo '<div class="right-content">';
    echo '<div class="container">';

        echo '<h1>Update App</h1>';
//        echo '<form class="form" action="apps_modify_an_app.php?id='.$row["id"].'" method="POST">
//        Name: <br> <input type="text" name="name" value="' .$row["name"].'" maxlength="65" required> <br>
//        Puzzle Creator Description: <br> <input type="textarea" name="description" value="'.$row["description"].'" maxlength="255" required> <br>
//        Path: <br> <input type="text" name="path" value="' .$row["path"].'" maxlength="250" required> <br>
//        Notes: <br> <input type="textarea" name="notes" value="'.$row["notes"].'"  maxlength="255" required> <br>
//        Input From DB: <br> <input type="text" name="inputFromDB" value="'.$row["inputFromDB"].'"  maxlength="4"> <br>
//        Input From UI: <br> <input type="text" name="inputFromUI" value="'.$row["inputFromUI"].'"  maxlength="255"> <br>
//        Output To DB: <br> <input type="text" name="outputToDB" value="'.$row["outputToDB"].'"  maxlength="4"> <br>
//        Output To UI: <br> <input type="text" name="outputToUI" value="'.$row["outputToUI"].'"  maxlength="255"> <br>
//        Developer: <br> <input type="text" name="developer" value="'.$row["developer"].'"  maxlength="50"> <br>
//        Status: <br> <input type="text" name="status" value="'.$row["status"].'"  maxlength="14"> <br>
//        Token: <br> <input type="text" name="token" value="'.$row["token"].'"  maxlength="255"> <br>
//        Playable: <br> <input type="text" name="playable" value="'.$row["playable"].'" maxlength="6"> <br>
//        Icon: <br> <input type="text" name="icon" value="'.$row["icon"].'" maxlength="6"> <br>
//
//        <button type="submit" name="submit" class="btn btn-success btn-sm">Update App</button>
//        </form>'
            echo '<form action="apps_modify_an_app.php?id='.$row["id"].'" method="POST">
        <div class="form-row">
            <div class="control-group form-group col-md-12">
                <label for="name">Name:</label><br>
                <input class="form-control" name="name" value="' .$row["name"].'" required data-validation-required-message="Please enter the name."  
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>

            <div class="form-group col-md-12">
                <label for="path">Path:</label><br>
                <input class="form-control" name="path" value="' .$row["path"].'" required data-validation-required-message="Path is required."
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>

            <div class="control-group form-group col-lg-12">
                <label for="description">Description:</label><br>
                <input rows="5" class="form-control" name="description" value="'.$row["description"].'" required data-validation-required-message="Description is required."
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
            </div>

            <div class="form-group col-md-12">
                <label for="notes">Notes:</label><br>
                <input rows="5" class="form-control" name="notes" value="'.$row["notes"].'" maxlength="500"
                    data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputFromDB">input From DB:</label><br>';
                    $inDB = (bool)$row["inputFromDB"];
                    $checked = ($inDB) ? 'checked="checked"' : '';
                    echo '<input type="checkbox" class="form-control checkbox-inline" name="inputFromDB" 
                     value="'.$row["inputFromDB"].'" '; echo $checked; echo 'maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputFromUI">Input From UI:</label><br>';
                    $inUI = (bool)$row["inputFromUI"];
                    $checked = ($inUI) ? 'checked="checked"' : '';
                    echo '<input type="checkbox" class="form-control" name="inputFromUI"
                    value="'.$row["inputFromUI"].'" '; echo $checked; echo 'maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="outputToDB">output To DB:</label><br>';
                    $outDB = (bool)$row["outputToDB"];
                    $checked = ($outDB) ? 'checked="checked"' : '';
                    echo '<input type="checkbox" class="form-control" name="outputToDB"
                    value="'.$row["outputToDB"].'" '; echo $checked; echo 'maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="outputToUI">Output To UI:</label><br>';
                    $outUI = (bool)$row["outputToUI"];
                    $checked = ($outUI) ? 'checked="checked"' : '';
                    echo '<input type="checkbox" class="form-control" name="outputToUI"
                    value="'.$row["outputToUI"].'" '; echo $checked; echo 'maxlength="5">
                    
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="developer">Developer:</label><br>
                    <input type="text" class="form-control" name="developer" value="'.$row["developer"].'" maxlength="50">
                </div>

            <div class="form-group col-md-12">
                <label for="token">Token:</label><br>
                <input type="text" class="form-control" name="token" value="'.$row["token"].'" maxlength="50">
            </div>
            
            <div class="form-group col-md-3">
                <label for="status">Status:</label><br>';
                $status = (bool)$row["status"];
                $checked = ($status) ? 'checked="checked"' : '';
                echo '<input type="checkbox" class="form-control" name="status"
                value="'.$row["status"].'" '; echo $checked; echo 'maxlength="5">
            </div>

            <div class="control-group form-group col-md-3">
                <label for="playable">Playable:</label><br>';
                $playable = (bool)$row["playable"];
                $checked = ($playable) ? 'checked="checked"' : '';
                echo '<input type="checkbox" class="form-control" name="playable"
                value="'.$row["playable"].'" '; echo $checked; echo 'maxlength="5">
            </div>
        </div>

        <div class="controls">
                <label for="icon">Application Image:</label><br>
                <input type="file" name="icon" value="'.$row["icon"].'" id="fileToUpload" >
        </div>
        <br><br><br>
        <div class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Update App</button>
        </div>
    </form>
        

    </div>
</div>';
}} else {
    echo 'No record found.';
}

include("footer.php"); ?>
