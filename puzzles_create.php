<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

echo '<div class="right-content">';
    echo '<div class="container">';

        echo '<h1>Create A Puzzle</h1>';
        echo '<form action="puzzles_create_a_puzzle.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="control-group form-group col-md-12">
                    <label for="title">Title:</label><br>
                    <input class="form-control" name="title" required data-validation-required-message="Please enter the puzzle title."
                           maxlength="100" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
                </div>
                <div class="control-group form-group col-md-12">
                    <label for="sub-title">Sub-Title:</label><br>
                    <input class="form-control" name="sub-title"
                           maxlength="100" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
                </div>
                <div class="form-group col-md-12 app-search-box">
                    <label for="app">App:</label><br>
                    <input type="text" name="app" id="app" autocomplete="off" placeholder="Search apps..." class="form-control"
                           maxlength="100" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
                    <input type="hidden" value="" name="app_id" id="app_id">
                    <div class="app_result"></div>
                </div>
                <div class="form-group col-md-12 user-search-box">
                    <label for="author">Author:</label><br>
                    <input type="text" name="author" id="author" autocomplete="off" placeholder="Search users..." class="form-control"
                           maxlength="100" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
                    <input type="hidden" value="" name="author_id" id="author_id">
                    <div class="user_result"></div>
                </div>
                <div class="control-group form-group col-lg-12">
                    <label for="directions">Directions:</label><br>
                    <input rows="5" class="form-control" name="directions"
                           maxlength="5000" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
                </div>

                <div class="form-group col-md-12">
                    <label for="notes">Notes:</label><br>
                    <input rows="5" class="form-control" name="notes" maxlength="1000"
                           data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
                </div>

                <div class="form-group col-md-6">
                    <label for="puzzle_image">Puzzle Image:</label><br>
                    <input type="file"  name="puzzle_image" id="puzzle_image" required>
                    <img id="puzzleImage" src="about:blank">
                </div>

                <div class="form-group col-md-6">
                    <label for="solution_image">Solution Image:</label><br>
                    <input type="file" name="solution_image" id="solution_image" required>
                    <img id="solutionImage" src="about:blank">
                </div>
                <br>
                <div class="control-group text-left" id="wrap">
                    <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Add Puzzle</button>
                </div>
        </form>
    </div>
</div>';

include("footer.php");

?>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var users = '';
        $('.user-search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".user_result");
            if(inputVal.length){
                $.get("user_search.php", {term: inputVal}).done(function(data){
                    users = JSON.parse(data);
                    let usersHTML = '';
                    // Display the returned data in browser
                    for (var i = 0; i < users.length; i++) {
                        usersHTML += "<p>" + users[i].first_name + " " + users[i].last_name + "</p>";
                    }
                    resultDropdown.html(usersHTML);
                });
            } else{
                resultDropdown.empty();
            }
        });

        var apps = '';
        $('.app-search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".app_result");
            if(inputVal.length){
                $.get("app_search.php", {term: inputVal}).done(function(data){
                    apps = JSON.parse(data);
                    let appsHTML = '';
                    // Display the returned data in browser
                    for (var i = 0; i < apps.length; i++) {
                        appsHTML += "<p>" + apps[i].name + "</p>";
                    }
                    resultDropdown.html(appsHTML);
                });
            } else{
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".user_result p", function(event){
            $(this).parents(".user-search-box").find('input[type="text"]').val($(this).text());
            $(this).parents(".user-search-box").find('input[type="hidden"]').val(users[0].id);
            $(this).parent(".user_result").empty();
        });
        $(document).on("click", ".app_result p", function(event){
            $(this).parents(".app-search-box").find('input[type="text"]').val($(this).text());
            $(this).parents(".app-search-box").find('input[type="hidden"]').val(apps[0].id);
            $(this).parent(".app_result").empty();
        });
    });
</script>
<script>
    (function() {
        var URL = window.URL || window.webkitURL;
        var puzzleImageInput = document.getElementById('puzzle_image');
        var solutionImageInput = document.getElementById('solution_image');
        var puzzleImagePreview = document.querySelector('#puzzleImage');
        var solutionImagePreview = document.querySelector('#solutionImage');

        // When the file input changes, create a object URL around the file.
        puzzleImageInput.addEventListener('change', function () {
            puzzleImagePreview.src = URL.createObjectURL(this.files[0]);
        });
        // When the image loads, release object URL
        puzzleImagePreview.addEventListener('load', function () {
            URL.revokeObjectURL(this.src);
        });

        // When the file input changes, create a object URL around the file.
        solutionImageInput.addEventListener('change', function () {
            solutionImagePreview.src = URL.createObjectURL(this.files[0]);
        });
        // When the image loads, release object URL
        solutionImagePreview.addEventListener('load', function () {
            URL.revokeObjectURL(this.src);
        });
    })();
</script>


<?php include("footer.php"); ?>
