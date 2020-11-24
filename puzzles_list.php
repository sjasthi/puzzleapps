<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

$query = "SELECT * FROM puzzles";
$GLOBALS['puzzleTableResults'] = mysqli_query($db, $query);

?>

<div class="right-content">
    <div class="container">

        <h1>Puzzles</h1>

        <div id="tableView">
            <button><a class="btn btn-sm" href="puzzles_create.php">Create A New Puzzle</a></button>
            <button><a class="btn btn-sm" href="puzzles_import.php">Import Puzzles</a></button>
            <table id="puzzlesTable" style="width:100%">
                <div>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sub-Title</th>
                        <th>Directions</th>
                        <th>Notes</th>
                        <th>Puzzle Image</th>
                        <th>Solution Image</th>
                        <th>View</th>
                        <th>Play</th>
                        <th>Manage</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div>
                        <strong> Toggle column: </strong>
                        <a id="toggle" class="toggle-vis" data-column="0">Id</a> |
                        <a id="toggle" class="toggle-vis" data-column="1">Title</a> |
                        <a id="toggle" class="toggle-vis" data-column="2">Sub-Title</a> |
                        <a id="toggle" class="toggle-vis" data-column="3">Directions</a> |
                        <a id="toggle" class="toggle-vis" data-column="4">Notes</a> |
                        <a id="toggle" class="toggle-vis" data-column="5">Puzzle Image</a> |
                        <a id="toggle" class="toggle-vis" data-column="5">Solution Image</a> |
                        <a id="toggle" class="toggle-vis" data-column="6">View</a> |
                        <a id="toggle" class="toggle-vis" data-column="7">Play</a> |
                        <a id="toggle" class="toggle-vis" data-column="8">Manage</a> |
                        <a id="toggle" class="toggle-vis" data-column="8">Delete</a>
                    </div><br>
                    <?php
                    if ($puzzleTableResults->num_rows > 0) {
                        while($row = $puzzleTableResults->fetch_assoc()) {
                            $id = $row["id"];
                            $title = $row["title"];
                            $subtitle = $row["sub_title"];
                            $directions = $row["directions"];
                            $notes = $row["notes"];
                            $puzzle_image = $row["puzzle_image"];
                            $solution_image = $row["solution_image"];
                            ?>
                            <tr>
                            <td><?php echo $id; ?></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'title', '<?php echo $id; ?>')"><?php echo $title; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'sub_title', '<?php echo $id; ?>')"><?php echo $subtitle; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'directions', '<?php echo $id; ?>')"><?php echo $directions; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'notes', '<?php echo $id; ?>')"><?php echo $notes; ?></div></td>
                            <?php echo '<td><img src="images/puzzles/main/'.$row["puzzle_image"].'" style="width:80px;">' ?>
                            <?php echo '<td><img src="images/puzzles/solution/'.$row["solution_image"].'" style="width:80px;">' ?>
                            <?php echo '<td><a class="btn btn-info btn-sm" href="puzzles_view.php?id='.$row["id"].'" target="_blank">View</a></td>' ?>
                            <?php echo '<td><a class="btn btn-primary btn-sm" href="puzzles_play.php?id='.$row["id"].'" target="_blank">Play</a></td>' ?>
                            <?php echo '<td><a class="btn btn-warning btn-sm" href="puzzles_modify.php?id='.$row["id"].'">Manage</a></td>' ?>
                            <?php echo '<td><a class="btn btn-danger btn-sm" href="puzzles_delete.php?id='.$row["id"].'">Delete</a></td>' ?>
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
    $(document).ready(function() {
        var table = $('#puzzlesTable').DataTable( {
            dom: 'lfrtBip',
            retrieve: true,
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ]
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
                table: 'puzzles',
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
