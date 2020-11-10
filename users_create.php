<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

echo '<div class="right-content">';
echo '<div class="container">';

echo '<h1>Create A User</h1>';
echo '<form action="apps_create_an_app.php" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="control-group form-group col-md-12">
                <label for="name">Name:</label><br>
                <input class="form-control" name="name" required data-validation-required-message="Please enter the name."  
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>

            <div class="form-group col-md-12">
                <label for="path">Path:</label><br>
                <input class="form-control" name="path" required data-validation-required-message="Path is required."
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>

            <div class="control-group form-group col-lg-12">
                <label for="description">Description:</label><br>
                <input rows="5" class="form-control" name="description" required data-validation-required-message="Description is required."
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
            </div>

            <div class="form-group col-md-12">
                <label for="notes">Notes:</label><br>
                <input rows="5" class="form-control" name="notes"   maxlength="500"
                    data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
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
                    <input type="text" class="form-control" name="developer"  maxlength="50">
                </div>

            <div class="form-group col-md-12">
                <label for="token">Token:</label><br>
                <input type="text" class="form-control" name="token"  maxlength="50">
            </div>
            
            <div class="form-group col-md-3">
                <label for="status">Status:</label><br>
                <input type="checkbox" class="form-control" name="status"  maxlength="1">
            </div>

            <div class="control-group form-group col-md-3">
                <label for="playable">Playable:</label><br>
                <input type="checkbox" class="form-control" name="playable"   maxlength="1">
            </div>
        </div>

        <div class="form-group col-md-6">
                <label for="icon">Application Image:</label><br>
                <input type="file" name="icon" id="icon" required>
                <img id="preview" src="about:blank"/>
        </div>
        <br><br><br>
        <div class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Add Application</button>
        </div>
    </form>
    </div>
</div>';

include("footer.php"); ?>

<?php include("footer.php"); ?>
