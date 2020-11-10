<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

$query = "SELECT * FROM apps";
$GLOBALS['appTableResults'] = mysqli_query($db, $query);

?>

<div class="right-content">
    <div class="container">

        <h1>Apps</h1>

        <div id="tableView">
            <button><a class="btn btn-sm" href="apps_create.php">Create A New App</a></button>
            <table id="appsTable" style="width:100%">
                <div>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Developer</th>
                        <th>Notes</th>
                        <th>Image</th>
                        <th>Open</th>
                        <th>Modify</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div>
                        <strong> Toggle column: </strong>
                        <a id="toggle" class="toggle-vis" data-column="0">Id</a> |
                        <a id="toggle" class="toggle-vis" data-column="1">Name</a> |
                        <a id="toggle" class="toggle-vis" data-column="2">Description</a> |
                        <a id="toggle" class="toggle-vis" data-column="3">Developer</a> |
                        <a id="toggle" class="toggle-vis" data-column="4">Notes</a> |
                        <a id="toggle" class="toggle-vis" data-column="5">Image</a> |
                        <a id="toggle" class="toggle-vis" data-column="6">Open</a> |
                        <a id="toggle" class="toggle-vis" data-column="7">Modify</a> |
                        <a id="toggle" class="toggle-vis" data-column="8">Delete</a>
                    </div><br>
                    <?php
                    if ($appTableResults->num_rows > 0) {
                        while($row = $appTableResults->fetch_assoc()) {
                            $id = $row["id"];
                            $name = $row["name"];
                            $description = $row["description"];
                            $developer = $row["developer"];
                            $notes = $row["notes"];
                            $image = $row["icon"];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><div contenteditable="true" onBlur="updateValue(this, 'name', '<?php echo $id; ?>')"><?php echo $name; ?></div></td>
                                <td><div contenteditable="true" onBlur="updateValue(this, 'description', '<?php echo $id; ?>')"><?php echo $description; ?></div></td>
                                <td><div contenteditable="true" onBlur="updateValue(this, 'developer', '<?php echo $id; ?>')"><?php echo $developer; ?></div></td>
                                <td><div contenteditable="true" onBlur="updateValue(this, 'notes', '<?php echo $id; ?>')"><?php echo $notes; ?></div></td>
                                <?php echo '<td><img src="images/apps/'.$row["icon"].'" style="width:80px;">' ?>
                                <?php echo '<td><a class="btn btn-info btn-sm" href="'.$row["path"].'" target="_blank">Open</a></td>' ?>
                                <?php echo '<td><a class="btn btn-warning btn-sm" href="apps_modify.php?id='.$row["id"].'">Modify</a></td>' ?>
                                <?php echo '<td><a class="btn btn-danger btn-sm" href="apps_delete.php?id='.$row["id"].'">Delete</a></td>' ?>
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
        $('#appsTable').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );
        var table = $('#appsTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
    } );

    $(document).ready(function() {
        var table = $('#appsTable').DataTable( {
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
                table: 'apps',
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
