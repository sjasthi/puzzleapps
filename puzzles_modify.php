<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $puzzleId = $_GET['id'];
    $sql = "SELECT * FROM puzzles WHERE id = '$puzzleId'";
    $result = $db->query($sql);
}

$removeBooksQuery = "SELECT books.* FROM books_puzzles JOIN books ON books_puzzles.book_id = books.id WHERE books_puzzles.puzzle_id = '$puzzleId'";
$removeBooksResults = $db->query($removeBooksQuery);

$addBooksQuery = "SELECT * FROM books WHERE books.id NOT IN (SELECT book_id FROM books_puzzles WHERE books_puzzles.puzzle_id = '$puzzleId')";
$addBooksResults = $db->query($addBooksQuery);


if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $authorName = "";
        $authorId = null;
        if ($row['author_id'] != null) {
            $authorId = $row['author_id'];
            $authorQuery = "SELECT * FROM users WHERE id = '$authorId'";
            $authorResult = $db->query($authorQuery);
            $authorRow = $authorResult->fetch_array(MYSQLI_ASSOC);
            $authorName = $authorRow["first_name"] . ' ' . $authorRow["last_name"];
        }
        $appName = "";
        $appId = null;
        if ($row['app_id'] != null) {
            $appId = $row['app_id'];
            $appQuery = "SELECT * FROM apps WHERE id = '$appId'";
            $appResult = $db->query($appQuery);
            $appRow = $appResult->fetch_array(MYSQLI_ASSOC);
            $appName = $appRow["name"];
        }



        echo '<div class="right-content">';
        echo '<div class="container">';

        echo '<h1>Manage Puzzle</h1>';
        echo '<form id="modifyPuzzleForm" action="puzzles_modify_a_puzzle.php?id='.$row["id"].'" method="POST" enctype="multipart/form-data">
            <div class="control-group form-group col-md-12">
                <label for="title">Title:</label><br>
                <input class="form-control" name="title" value="' .$row["title"].'" required data-validation-required-message="Please enter the title."  
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>
            <div class="form-group col-md-12 app-search-box">
                <label for="app">App:</label><br>
                <input type="text" name="app" id="app" autocomplete="off" placeholder="No app selected..." value="'.$appName.'" class="form-control"
                       maxlength="100" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
                <input type="hidden" value="'.$appId.'" name="app_id" id="app_id">
                <div class="app_result"></div>
            </div>
            <div class="form-group col-md-12 user-search-box">                                                                                                                             
                 <label for="author">Author:</label><br>                                                                                                                                 
                 <input type="text" id="author_name" name="author_name" autocomplete="off" placeholder="No author selected..." value="'.$authorName.'" class="form-control"
                 aria-invalid="false">                                                                     
                 <input type="hidden" value="'.$authorId.'" name="author_id" id="author_id">                                                                                                                         
                 <div class="user_result"></div>                                                                                                                                            
            </div>                                                                                                                                                                   
            <div class="control-group form-group col-lg-12">
                <label for="directions">Directions:</label><br>
                <input rows="5" class="form-control" name="directions" value="'.$row["directions"].'"
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
            </div>
            <div class="form-group col-md-12">
                <label for="notes">Notes:</label><br>
                <input rows="5" class="form-control" name="notes" value="'.$row["notes"].'" maxlength="500"
                    data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
            </div>           
            <div class="form-group col-md-6">
                <label for="puzzle_image">Puzzle Image:</label><br>
                <input type="file"  name="puzzle_image" id="puzzle_image">
                <img id="puzzleImagePreview" src="images/puzzles/'.$row["puzzle_image"].'">
            </div>            
            <div class="form-group col-md-6">
                <label for="solution_image">Solution Image:</label><br>
                <input type="file" name="solution_image" id="solution_image">
                <img id="solutionImagePreview" src="images/puzzles/'.$row["solution_image"].'">
            </div>
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Update Puzzle Metadata</button>
            </div>
        </form>
        <hr>
        <h2>Manage Puzzle Books</h2>
        <h3 style="text-align:left">Remove Books</h3>
        <p>These books include this puzzle.<br>
        Select books and click the "Remove From Books" button to remove this puzzle from the selected books.</p>
        <form id="removeBooksForm" action="puzzles_remove_books.php" method="POST">
            <div id="tableView">
                <table id="removeBooksTable" style="width:100%" width="100%" class="display" cellspacing="0">
                    <div>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>';
                    if ($removeBooksResults->num_rows > 0) {
                        while($row = $removeBooksResults->fetch_assoc()) {
                            $removeBookId = $row["id"];
                            $title = $row["title"];
                            $description = $row["description"];
                            $notes = $row["notes"];
                            ?>
                            <tr>
                                <td><?php echo $removeBookId; ?></td>
                                <td><div><?php echo $title; ?></div></td>
                                <td><div><?php echo $description; ?></div></td>
                                <td><div><?php echo $notes; ?></div></td>
                            </tr>
                            <?php
                        }
                    }
                    echo'
                        </tbody>
                    </div>
                </table>
            </div>
            <input type="hidden" name="puzzle-id" value="'.$puzzleId.'">
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="remove-books-submit" class="btn btn-primary btn-md align-items-center">Remove From Books</button>
            </div>
        </form>
        <hr/>
        <h3 style="text-align:left">Add Books</h3>
        <p>These books do not include this puzzle.<br>
        Select books and click the "Add To Books" button to add this puzzle to the selected books.</p>
        <form id="addBooksForm" action="puzzles_add_books.php" method="POST">
            <div id="tableView">
                <table id="addBooksTable" style="width:100%" width="100%" class="display" cellspacing="0">
                    <div>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>';
                    if ($addBooksResults->num_rows > 0) {
                        while($row = $addBooksResults->fetch_assoc()) {
                            $bookId = $row["id"];
                            $title = $row["title"];
                            $description = $row["description"];
                            $notes = $row["notes"];
                            ?>
                            <tr>
                                <td><?php echo $bookId; ?></td>
                                <td><div><?php echo $title; ?></div></td>
                                <td><div><?php echo $description; ?></div></td>
                                <td><div><?php echo $notes; ?></div></td>
                            </tr>
                            <?php
                        }
                    }
                    echo'
                        </tbody>
                    </div>
                </table>
            </div>
            <input type="hidden" name="puzzle-id" value="'.$puzzleId.'">
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="add-books-submit" class="btn btn-primary btn-md align-items-center">Add To Books</button>
            </div>
        </form>
    </div>
</div>';
    }
} else {
    echo 'No record found.';
}

include("footer.php");?>
<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!--Data Table-->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/sl-1.3.1/datatables.min.css"/>-->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/sl-1.3.1/datatables.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var removeBooksTable = $('#removeBooksTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true,
            paging: true,
            columnDefs: [
                {
                    targets: 0,
                    checkboxes: true
                }
            ],
            order: [[1, 'asc']]
        } );

        var addBooksTable = $('#addBooksTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true,
            paging: true,
            columnDefs: [
                {
                    targets: 0,
                    checkboxes: true
                }
            ],
            order: [[1, 'asc']]
        } );

        // Handle form submission events
        $('#removeBooksForm').on('submit', function(e){
            var form = this;
            var rows_selected = removeBooksTable.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'removeBooksId[]')
                        .val(rowId)
                );
            });
        });
        $('#addBooksForm').on('submit', function(e){
            var form = this;
            var rows_selected = addBooksTable.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'addBooksId[]')
                        .val(rowId)
                );
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var URL = window.URL || window.webkitURL;
        var puzzleImageInput = document.getElementById('puzzle_image');
        var solutionImageInput = document.getElementById('solution_image');
        var puzzleImagePreview = document.querySelector('#puzzleImagePreview');
        var solutionImagePreview = document.querySelector('#solutionImagePreview');
        var puzzleImagePreviewSource = puzzleImagePreview.src;
        var solutionImagePreviewSource = solutionImagePreview.src;

        // When the file input changes, create a object URL around the file.
        puzzleImageInput.addEventListener('change', function () {
            if (puzzleImageInput.value.length) {
                puzzleImagePreview.src = URL.createObjectURL(this.files[0]);
            } else { puzzleImagePreview = puzzleImagePreviewSource }
        });
        // When the image loads, release object URL
        puzzleImagePreview.addEventListener('load', function () {
            URL.revokeObjectURL(this.src);
        });

        solutionImageInput.addEventListener('change', function () {
            if (solutionImageInput.value.length) {
                solutionImagePreview.src = URL.createObjectURL(this.files[0]);
            } else { solutionImagePreview = solutionImagePreviewSource }
        });
        // When the image loads, release object URL
        solutionImagePreview.addEventListener('load', function () {
            URL.revokeObjectURL(this.src);
        });

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
                        usersHTML += "<p userId='" + users[i].id + "'>" + users[i].first_name + " " + users[i].last_name + "</p>";
                    }
                    resultDropdown.html(usersHTML);
                });
            } else{
                resultDropdown.empty();
                $(this).parents(".user-search-box").find('input[type="hidden"]').val(null);
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
                        appsHTML += "<p appId='" + apps[i].id + "'>" + apps[i].name + "</p>";
                    }
                    resultDropdown.html(appsHTML);
                });
            } else{
                resultDropdown.empty();
                $(this).parents(".app-search-box").find('input[type="hidden"]').val(null);
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".user_result p", function(event){
            $(this).parents(".user-search-box").find('input[type="text"]').val($(this).text());
            $(this).parents(".user-search-box").find('input[type="hidden"]').val($(this).attr("userId"));
            $(this).parent(".user_result").empty();
        });
        $(document).on("click", ".app_result p", function(event){
            $(this).parents(".app-search-box").find('input[type="text"]').val($(this).text());
            $(this).parents(".app-search-box").find('input[type="hidden"]').val($(this).attr("appId"));
            $(this).parent(".app_result").empty();
        });
    });
</script>
