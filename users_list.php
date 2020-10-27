<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

$query = "SELECT * FROM users";
$GLOBALS['userTableResults'] = mysqli_query($db, $query);

?>

<div class="right-content">
    <div class="container">

        <h1>Users</h1>

        <div id="tableView">
            <button><a class="btn btn-sm" href="users_create.php">Create A New User</a></button>
            <table id="usersTable" style="width:100%">
                <div>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Created At</th>
                        <th>Modified At</th>
                        <th>Last Login At</th>
                        <th>Notes</th>
                        <th>View</th>
                        <th>Modify</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div>
                        <strong> Toggle column: </strong>
                        <a id="toggle" class="toggle-vis" data-column="0">Id</a> |
                        <a id="toggle" class="toggle-vis" data-column="1">First Name</a> |
                        <a id="toggle" class="toggle-vis" data-column="2">Last Name</a> |
                        <a id="toggle" class="toggle-vis" data-column="3">Email</a> |
                        <a id="toggle" class="toggle-vis" data-column="4">Role</a> |
                        <a id="toggle" class="toggle-vis" data-column="5">Active</a> |
                        <a id="toggle" class="toggle-vis" data-column="6">Created At</a> |
                        <a id="toggle" class="toggle-vis" data-column="7">Modified At</a> |
                        <a id="toggle" class="toggle-vis" data-column="8">Last Login At</a> |
                        <a id="toggle" class="toggle-vis" data-column="9">Notes</a> |
                        <a id="toggle" class="toggle-vis" data-column="10">View</a> |
                        <a id="toggle" class="toggle-vis" data-column="10">Modify</a> |
                        <a id="toggle" class="toggle-vis" data-column="10">Delete</a> |
                    </div><br>
                    <?php
                    if ($userTableResults->num_rows > 0) {
                        while($row = $userTableResults->fetch_assoc()) {
                            $id = $row["id"];
                            $first_name = $row["first_name"];
                            $last_name = $row["last_name"];
                            $email = $row["email"];
                            $role = $row["role"];
                            $active = $row["active"];
                            $createdAt = $row["created_at"];
                            $modifiedAt = $row["modified_at"];
                            $lastLoginAt = $row["last_login_at"];
                            $notes = $row["notes"];
                            ?>
                            <tr>
                            <td><?php echo $id; ?></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'first_name', '<?php echo $id; ?>')"><?php echo $first_name; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'last_name', '<?php echo $id; ?>')"><?php echo $last_name; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'email', '<?php echo $id; ?>')"><?php echo $email; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'role', '<?php echo $id; ?>')"><?php echo $role; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'active', '<?php echo $id; ?>')"><?php echo $active; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'createdAt', '<?php echo $id; ?>')"><?php echo $createdAt; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'modifiedAt', '<?php echo $id; ?>')"><?php echo $modifiedAt; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'lastLoginAt', '<?php echo $id; ?>')"><?php echo $lastLoginAt; ?></div></td>
                            <td><div contenteditable="true" onBlur="updateValue(this, 'notes', '<?php echo $id; ?>')"><?php echo $notes; ?></div></td>
                            <?php echo '<td><a class="btn btn-info btn-sm" href="users_view.php?id='.$row["id"].'" target="_blank">View</a></td>' ?>
                            <?php echo '<td><a class="btn btn-warning btn-sm" href="users_modify.php?id='.$row["id"].'">Modify</a></td>' ?>
                            <?php echo '<td><a class="btn btn-danger btn-sm" href="users_delete.php?id='.$row["id"].'">Delete</a></td>' ?>
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
        $('#usersTable').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );
        var table = $('#usersTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
    } );

    $(document).ready(function() {
        var table = $('#usersTable').DataTable( {
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
                table: 'users',
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
