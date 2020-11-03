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
        echo '<form action="books_modify_a_book.php?id='.$row["id"].'" method="POST">
                <div class="form-row">
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
                <input type="file"  name="front_cover" value="'.$row["front_cover"].'" id="fileToUpload" required>
                <img src="images/books/'.$row["front_cover"].'">
            </div>
            
            <div class="form-group col-md-6">
                <label for="front_cover">Back Cover Image:</label><br>
                <input type="file" name="back_cover"  value="'.$row["back_cover"].'"id="fileToUpload" required>
                <img src="images/books/'.$row["back_cover"].'">
            </div>
            <br>
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Update Book</button>
            </div>
            </form>
    </div>
</div>';
    }} else {
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

<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        $('#booksTable').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );
        var table = $('#booksTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
    } );

    $(document).ready(function() {
        var table = $('#booksTable').DataTable( {
            retrieve: true,
            "scrollY": "200px",
            "paging": false
        } );
        $('a.toggle-vis').on( 'click', function (e) {
            e.preventDefault();
            // Get the column API object
            var column = table.column( $(this).attr('data-column') );
            // Toggle the visibility
            column.visible( ! column.visible() );
        } );
    } );


    function updateValue(element,column,id){
        var value = element.innerText
        $.ajax({
            url:'editable_list.php',
            type: 'post',
            data:{
                table: 'books',
                value: value,
                column: column,
                id: id
            },
            success:function(php_result){
                console.log(php_result);
            }
        })
    }
</script>
<script type="text/javascript">
    $(document).onfocus() ready(function(){
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
