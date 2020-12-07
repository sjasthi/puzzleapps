<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

echo '<div class="right-content">';
echo '<div class="container">';

echo '<h1>Create A Book</h1>';
echo '<form action="books_create_a_book.php" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="control-group form-group col-md-12">
                <label for="title">Title:</label><br>
                <input class="form-control" name="title" required data-validation-required-message="Please enter the book title."  
                maxlength="100" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>

            <div class="form-group col-md-12 author-search-box">
                <label for="author">Author:</label><br>
                <input type="text" name="author" id="author" autocomplete="off" placeholder="Search users..." class="form-control"
                maxlength="100" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
                <input type="hidden" value="" name="author_id" id="author_id">
                <div class="author_result"></div>
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

            <div class="form-group col-md-6">
                <label for="front_cover">Front Cover Image:</label><br>
                <input type="file"  name="front_cover" id="front_cover" required>
                <img id="frontPreview" src="about:blank">
            </div>
            
            <div class="form-group col-md-6">
                <label for="front_cover">Back Cover Image:</label><br>
                <input type="file" name="back_cover" id="back_cover" required>
                <img id="backPreview" src="about:blank">
            </div>
        <br>
        <div class="control-group text-left" id="wrap">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Add Book</button>
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
        $('.author-search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".author_result");
            if(inputVal.length){
                $.get("user_search.php", {term: inputVal}).done(function(data){
                    users = JSON.parse(data);
                    let usersHTML = '';
                    // Display the returned data in browser
                    for (var i = 0; i < users.length; i++) {
                        usersHTML += "<p userId='" + users[i].id + "'>" + users[i].first_name + " " + users[i].last_name + "</p>";
                    }
                    resultDropdown.html(usersHTML);
                });
            } else{
                resultDropdown.empty();
                $(this).parents(".author-search-box").find('input[type="hidden"]').val(null);
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".author_result p", function(event){
            $(this).parents(".author-search-box").find('input[type="text"]').val($(this).text());
            $(this).parents(".author-search-box").find('input[type="hidden"]').val($(this).attr("userId"));
            $(this).parent(".author_result").empty();
        });
    });
</script>
<script>
    (function() {
        var URL = window.URL || window.webkitURL;
        var frontCoverInput = document.getElementById('front_cover');
        var backCoverInput = document.getElementById('back_cover');
        var frontCoverPreview = document.querySelector('#frontPreview');
        var backCoverPreview = document.querySelector('#backPreview');

        // When the file input changes, create a object URL around the file.
        frontCoverInput.addEventListener('change', function () {
            frontCoverPreview.src = URL.createObjectURL(this.files[0]);
        });
        // When the image loads, release object URL
        frontCoverPreview.addEventListener('load', function () {
            URL.revokeObjectURL(this.src);
        });

        // When the file input changes, create a object URL around the file.
        backCoverInput.addEventListener('change', function () {
            backCoverPreview.src = URL.createObjectURL(this.files[0]);
        });
        // When the image loads, release object URL
        backCoverPreview.addEventListener('load', function () {
            URL.revokeObjectURL(this.src);
        });
    })();
</script>

<?php include("footer.php"); ?>
