<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

$query = "SELECT * FROM books";
$GLOBALS['bookTableResults'] = mysqli_query($db, $query);
?>

<div class="right-content">
    <div class="container">

        <h1>Books</h1>

        <div id="tableView">
            <button><a class="btn btn-sm" href="books_create.php">Create A New Book</a></button>
            <table id="booksTable" style="width:100%">
                <div>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Sponsor</th>
                        <th>Notes</th>
                        <th>Front Cover</th>
                        <th>Back Cover</th>
                        <th>Open</th>
                        <th>Modify</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div>
                        <strong> Toggle column: </strong>
                        <a id="toggle" class="toggle-vis" data-column="0">Id</a> |
                        <a id="toggle" class="toggle-vis" data-column="1">Title</a> |
                        <a id="toggle" class="toggle-vis" data-column="2">Author</a> |
                        <a id="toggle" class="toggle-vis" data-column="3">Sponsor</a> |
                        <a id="toggle" class="toggle-vis" data-column="4">Description</a> |
                        <a id="toggle" class="toggle-vis" data-column="5">Front Cover</a> |
                        <a id="toggle" class="toggle-vis" data-column="6">Back Cover</a> |
                        <a id="toggle" class="toggle-vis" data-column="7">Open</a> |
                        <a id="toggle" class="toggle-vis" data-column="8">Modify</a> |
                        <a id="toggle" class="toggle-vis" data-column="9">Delete</a>
                    </div><br>
                    <?php
                    if ($bookTableResults->num_rows > 0) {
                        while($row = $bookTableResults->fetch_assoc()) {
                            $id = $row["id"];
                            $title = $row["title"];
                            // Get the author information
                            $authorId = $row["author_id"];
                            $authorQuery = "SELECT * from users WHERE id = $authorId";
                            $authorResult = $db->query($authorQuery);
                            $authorRow = $authorResult->fetch_array(MYSQLI_ASSOC);
                            $author = $authorRow["first_name"] . ' ' . $authorRow["last_name"];
                            // Get the sponsor information
                            $sponsorId = $row["sponsor_id"];
                            if ($sponsorId) {
                                $sponsorQuery = "SELECT * from users WHERE id = $sponsorId" ;
                                $sponsorResult = $db->query($sponsorQuery);
                                $sponsorRow = $sponsorResult->fetch_array(MYSQLI_ASSOC);
                                $sponsor = $sponsorRow["first_name"] . ' ' . $sponsorRow["last_name"];
                            } else {
                                $sponsor = '';
                            }
                            $description = $row["description"];
                            $front_cover = $row["front_cover"];
                            $back_cover = $row["back_cover"];
                            ?>
                            <tr>
                            <td><?php echo $id; ?></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'title', '<?php echo $id; ?>')"><?php echo $title; ?></div></td>
                            <td><?php echo $author; ?></td>
                            <td><?php echo $sponsor; ?></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'description', '<?php echo $id; ?>')"><?php echo $description; ?></div></td>
                            <?php echo '<td><img src="images/books/'.$row["front_cover"].'" style="width:80px;">' ?>
                            <?php echo '<td><img src="images/books/'.$row["back_cover"].'" style="width:80px;">' ?>
                            <?php echo '<td><a class="btn btn-info btn-sm" href="books_open.php?id='.$row["id"].'" target="_blank">Open</a></td>' ?>
                            <?php echo '<td><a class="btn btn-warning btn-sm" href="books_modify.php?id='.$row["id"].'">Modify</a></td>' ?>
                            <?php echo '<td><a class="btn btn-danger btn-sm" href="books_delete.php?id='.$row["id"].'">Delete</a></td>' ?>
                            </tr><?php
                        }
                    }
                    ?>
                    </tbody>
                </div>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

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
