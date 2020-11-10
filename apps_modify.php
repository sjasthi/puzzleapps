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
            echo '<form action="apps_modify_an_app.php?id='.$row["id"].'" method="POST" enctype="multipart/form-data">
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

        <div class="form-group col-md-6">
                <label for="icon">Application Image:</label><br>
                <input type="file" name="icon" id="icon" value="'.$row["icon"].'" >
                <img id="preview" src="images/apps/'.$row["icon"].'"/>
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
<script>
(function() {
    var URL = window.URL || window.webkitURL;
    var input = document.getElementById('icon');
    var preview = document.querySelector('#preview');
    var previewSource = preview.src

    // When the file input changes, create a object URL around the file.
    input.addEventListener('change', function () {
        if (input.value.length) {
            preview.src = URL.createObjectURL(this.files[0]);
        } else {
            preview.src = previewSource
        }
    });
    // When the image loads, release object URL
    preview.addEventListener('load', function () {
        URL.revokeObjectURL(this.src);
    });
})();
</script>
