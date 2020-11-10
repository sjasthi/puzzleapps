<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
include(ROOT_DIR . '/user_search.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id = '$id'";
    $result = $db->query($sql);
}

$currentPuzzlesQuery = "SELECT puzzles.* FROM books_puzzles JOIN puzzles ON books_puzzles.puzzle_id = puzzles.id WHERE books_puzzles.book_id = '$id'";
$currentPuzzleResults = $db->query($currentPuzzlesQuery);

$addPuzzlesQuery = "SELECT * FROM puzzles WHERE puzzles.id NOT IN (SELECT puzzle_id FROM books_puzzles WHERE books_puzzles.book_id = '$id')";
$addPuzzleResults = $db->query($addPuzzlesQuery);


if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $authorId = $row['author_id'];
        $authorQuery = "SELECT * FROM users WHERE id = '$authorId'";
        $authorResult = $db->query($authorQuery);
        $authorRow = $authorResult->fetch_array(MYSQLI_ASSOC);
        $authorName = $authorRow["first_name"] . ' ' . $authorRow["last_name"];

        $sponsorId = $row['sponsor_id'];
        $sponsorQuery = "SELECT * FROM users WHERE id = '$sponsorId'";
        $sponsorResult = $db->query($sponsorQuery);
        $sponsorRow = $sponsorResult->fetch_array(MYSQLI_ASSOC);
        $sponsorName = $sponsorRow["first_name"] . ' ' . $sponsorRow["last_name"];

        echo '<div class="right-content">';
        echo '<div class="container">';

        echo '<h1>Update Book</h1>';
        echo '<form id="modifyBookForm" action="books_modify_a_book.php?id='.$row["id"].'" method="POST" enctype="multipart/form-data">
            <div class="control-group form-group col-md-12">
                <label for="name">Title:</label><br>
                <input class="form-control" name="title" value="' .$row["title"].'" required data-validation-required-message="Please enter the title."  
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>
            <div class="form-group col-md-12 search-box">                                                                                                                             
                 <label for="path">Author:</label><br>                                                                                                                                 
                 <input type="text" name="author_name" required autocomplete="off" placeholder="'.$authorName.'" value="'.$authorName.'" class="form-control" data-validation-required-message="Author is required."
                 aria-invalid="false">                                                                     
                 <input type="hidden" value="'.$authorId.'" name="author_id" id="author_id">                                                                                                                         
                 <div class="result"></div>                                                                                                                                            
            </div>  
            <div class="form-group col-md-12 search-box">                                                                                                                             
                 <label for="path">Sponsor:</label><br>                                                                                                                                 
                 <input type="text" name="sponsor_name" autocomplete="off" placeholder="'.$sponsorName.'" value="'.$sponsorName.'" class="form-control" aria-invalid="false">                                                                     
                 <input type="hidden" value="'.$sponsorId.'" name="sponsor_id" id="sponsor_id">                                                                                                                         
                 <div class="result"></div>                                                                                                                                            
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
            <div class="form-group col-md-6">
                <label for="front_cover">Front Cover Image:</label><br>
                <input type="file"  name="front_cover" id="front_cover">
                <img id="frontPreview" src="images/books/'.$row["front_cover"].'">
            </div>            
            <div class="form-group col-md-6">
                <label for="front_cover">Back Cover Image:</label><br>
                <input type="file" name="back_cover" id="back_cover">
                <img id="backPreview" src="images/books/'.$row["back_cover"].'">
            </div>
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Update Book Metadata</button>
            </div>
        </form>
        <hr>
        <h2>Manage Book Puzzles</h2>
        <h3 style="text-align:left">Remove Puzzles</h3>
        <p>These puzzles are in this book.</p>
        <p>Select puzzles and click the "Remove Puzzles" button to remove puzzles from this book.</p>
        <form id="removePuzzlesForm" action="books_remove_puzzles.php" method="POST">
            <div id="tableView">
                <table id="currentPuzzlesTable" style="width:100%" width="100%" class="display" cellspacing="0">
                    <div>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Sub-Title</th>
                                <th>Directions</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>';
                    if ($currentPuzzleResults->num_rows > 0) {
                        while($row = $currentPuzzleResults->fetch_assoc()) {
                            $id = $row["id"];
                            $title = $row["title"];
                            $subtitle = $row["sub_title"];
                            $directions = $row["directions"];
                            $notes = $row["notes"];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><div><?php echo $title; ?></div></td>
                                <td><div><?php echo $subtitle; ?></div></td>
                                <td><div><?php echo $directions; ?></div></td>
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
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Remove Puzzles</button>
            </div>
        </form>
        <hr/>
        <h3 style="text-align:left">Add Puzzles To Book</h3>
        <p>These puzzles are not in this book.</p>
        <p>Select puzzles and click the "Add Puzzles" button to add puzzles to this book.</p>
        <form id="addPuzzlesForm" action="books_add_puzzles.php" method="POST">
            <div id="tableView">
                <table id="addPuzzlesTable" style="width:100%" width="100%" class="display" cellspacing="0">
                    <div>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Sub-Title</th>
                                <th>Directions</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>';
                    if ($addPuzzleResults->num_rows > 0) {
                        while($row = $addPuzzleResults->fetch_assoc()) {
                            $id = $row["id"];
                            $title = $row["title"];
                            $subtitle = $row["sub_title"];
                            $directions = $row["directions"];
                            $notes = $row["notes"];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><div><?php echo $title; ?></div></td>
                                <td><div><?php echo $subtitle; ?></div></td>
                                <td><div><?php echo $directions; ?></div></td>
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
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Add Puzzles</button>
            </div>
        </form>
    </div>
</div>';
    }
} else {
    echo 'No record found.';
}

include("footer.php"); ?>
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
        var currentPuzzlesTable = $('#currentPuzzlesTable').DataTable( {
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
        $('#addPuzzlesTable').DataTable( {
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

        // Handle form submission event
        $('#removePuzzlesForm').on('submit', function(e){
            var form = this;
            var rows_selected = table.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', this.name)
                        .val(this.value)
                );
            });
            console.log(form);
        });
        // Handle form submission event
        $('#addPuzzlesForm').on('submit', function(e){
            var form = this;
            var rows_selected = table.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'id[]')
                        .val(rowId)
                );
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var URL = window.URL || window.webkitURL;
        var frontCoverInput = document.getElementById('front_cover');
        var backCoverInput = document.getElementById('back_cover');
        var frontCoverPreview = document.querySelector('#frontPreview');
        var backCoverPreview = document.querySelector('#backPreview');
        var frontCoverPreviewSource = frontCoverPreview.src;
        var backCoverPreviewSource = backCoverPreview.src;

        // When the file input changes, create a object URL around the file.
        frontCoverInput.addEventListener('change', function () {
            if (frontCoverInput.value.length) {
                frontCoverPreview.src = URL.createObjectURL(this.files[0]);
            } else { frontCoverPreview = frontCoverPreviewSource }
        });
        // When the image loads, release object URL
        frontCoverPreview.addEventListener('load', function () {
            URL.revokeObjectURL(this.src);
        });

        backCoverInput.addEventListener('change', function () {
            if (backCoverInput.value.length) {
                backCoverPreview.src = URL.createObjectURL(this.files[0]);
            } else { backCoverPreview = backCoverPreviewSource }
        });
        // When the image loads, release object URL
        backCoverPreview.addEventListener('load', function () {
            URL.revokeObjectURL(this.src);
        });

        var users = '';
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
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

        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $((this).name+"_id").val(users[0].id);
            $(this).parent(".result").empty();
        });
    });
</script>
