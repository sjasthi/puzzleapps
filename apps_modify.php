<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $appId = $_GET['id'];
    $sql = "SELECT * FROM apps WHERE id = '$appId'";
    $result = $db->query($sql);
}

$removeUsersQuery = "SELECT users.* FROM users_apps JOIN users ON users_apps.user_id = users.id WHERE users_apps.app_id = '$appId'";
$removeUserResults = $db->query($removeUsersQuery);

$addUsersQuery = "SELECT * FROM users WHERE users.id NOT IN (SELECT user_id FROM users_apps WHERE users_apps.app_id = '$appId')";
$addUserResults = $db->query($addUsersQuery);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo '<div class="right-content">';
    echo '<div class="container">';

        echo '<h1>Manage App</h1>';
            echo '<form action="apps_modify_an_app.php?id='.$row["id"].'" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="control-group form-group col-md-12">
                <label for="name">Name:</label><br>
                <input class="form-control" name="name" value="' .$row["name"].'" required data-validation-required-message="Please enter the name."  
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>

            <div class="form-group col-md-12">
                <label for="path">Path:</label><br>
                <input class="form-control" name="path" value="' .$row["path"].'" required data-validation-required-message="Path is required."
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
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

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputFromDB">input From DB:</label><br>';
                    $inDB = (bool)$row["inputFromDB"];
                    $checked = ($inDB) ? 'checked="checked"' : '';
                    echo '<input type="checkbox" class="form-control checkbox-inline" name="inputFromDB" 
                     value="'.$row["inputFromDB"].'" '; echo $checked; echo 'maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputFromUI">Input From UI:</label><br>';
                    $inUI = (bool)$row["inputFromUI"];
                    $checked = ($inUI) ? 'checked="checked"' : '';
                    echo '<input type="checkbox" class="form-control" name="inputFromUI"
                    value="'.$row["inputFromUI"].'" '; echo $checked; echo 'maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="outputToDB">output To DB:</label><br>';
                    $outDB = (bool)$row["outputToDB"];
                    $checked = ($outDB) ? 'checked="checked"' : '';
                    echo '<input type="checkbox" class="form-control" name="outputToDB"
                    value="'.$row["outputToDB"].'" '; echo $checked; echo 'maxlength="5">
                </div>

                <div class="form-group col-md-3">
                    <label for="outputToUI">Output To UI:</label><br>';
                    $outUI = (bool)$row["outputToUI"];
                    $checked = ($outUI) ? 'checked="checked"' : '';
                    echo '<input type="checkbox" class="form-control" name="outputToUI"
                    value="'.$row["outputToUI"].'" '; echo $checked; echo 'maxlength="5">
                    
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="developer">Developer:</label><br>
                    <input type="text" class="form-control" name="developer" value="'.$row["developer"].'" maxlength="50">
                </div>

            <div class="form-group col-md-12">
                <label for="token">Token:</label><br>
                <input type="text" class="form-control" name="token" value="'.$row["token"].'" maxlength="50">
            </div>
            
            <div class="form-group col-md-3">
                <label for="status">Status:</label><br>';
                $status = (bool)$row["status"];
                $checked = ($status) ? 'checked="checked"' : '';
                echo '<input type="checkbox" class="form-control" name="status"
                value="'.$row["status"].'" '; echo $checked; echo 'maxlength="5">
            </div>

            <div class="control-group form-group col-md-3">
                <label for="playable">Playable:</label><br>';
                $playable = (bool)$row["playable"];
                $checked = ($playable) ? 'checked="checked"' : '';
                echo '<input type="checkbox" class="form-control" name="playable"
                value="'.$row["playable"].'" '; echo $checked; echo 'maxlength="5">
            </div>
        </div>

        <div class="form-group col-md-6">
                <label for="icon">Application Image:</label><br>
                <input type="file" name="icon" id="icon" value="'.$row["icon"].'" >
                <img id="preview" src="images/apps/'.$row["icon"].'"/>
        </div>
        <br><br><br>
        <div class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Update App</button>
        </div>
    </form>
    <hr>
    <h2>Manage App Users</h2>
    <h3 style="text-align:left">Remove Users</h3>
    <p>This app is associated with the following users.<br>
    Select users and click the "Remove Users" button to disassociate users from this app.</p>
    <form id="removeUsersForm" action="apps_remove_users.php" method="POST">
        <div id="tableView">
            <table id="removeUsersTable" style="width:100%" width="100%" class="display" cellspacing="0">
                <div>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>';
                if ($removeUserResults->num_rows > 0) {
                    while($row = $removeUserResults->fetch_assoc()) {
                        $removeUserId = $row["id"];
                        $name = $row["first_name"] . " " . $row["last_name"];
                        ?>
                        <tr>
                            <td><?php echo $removeUserId; ?></td>
                            <td><div><?php echo $name; ?></div></td>
                        </tr>
                        <?php
                    }
                }
                echo'
                    </tbody>
                </div>
            </table>
        </div>
        <input type="hidden" name="app-id" value="'.$appId.'">
        <div class="control-group text-left" id="wrap">
            <button type="submit" name="remove-users-submit" class="btn btn-primary btn-md align-items-center">Remove Users</button>
        </div>
    </form>
    <hr/>
    <h3 style="text-align:left">Add Users</h3>
    <p>This app is not associated with the following users.<br>
    Select users and click the "Add Users" button to associate users to this app.</p>
    <form id="addUsersForm" action="apps_add_users.php" method="POST">
        <div id="tableView">
            <table id="addUsersTable" style="width:100%" width="100%" class="display" cellspacing="0">
                <div>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>';
                if ($addUserResults->num_rows > 0) {
                    while($row = $addUserResults->fetch_assoc()) {
                        $addUserId = $row["id"];
                        $name = $row["first_name"] . " " . $row["last_name"];
                        ?>
                        <tr>
                            <td><?php echo $addUserId; ?></td>
                            <td><div><?php echo $name; ?></div></td>
                        </tr>
                        <?php
                    }
                }
                echo'
                    </tbody>
                </div>
            </table>
        </div>
        <input type="hidden" name="app-id" value="'.$appId.'">
        <div class="control-group text-left" id="wrap">
            <button type="submit" name="add-users-submit" class="btn btn-primary btn-md align-items-center">Add Users</button>
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
        var removeUsersTable = $('#removeUsersTable').DataTable({
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
        });
        var addUsersTable = $('#addUsersTable').DataTable({
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
        });

        // Handle form submission events
        $('#removeUsersForm').on('submit', function (e) {
            var form = this;
            var rows_selected = removeUsersTable.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function (index, rowId) {
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'removeUsersId[]')
                        .val(rowId)
                );
            });
        });
        $('#addUsersForm').on('submit', function (e) {
            var form = this;
            var rows_selected = addUsersTable.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function (index, rowId) {
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'addUsersId[]')
                        .val(rowId)
                );
            });
        });
    });
</script>
<script>
(function() {
    var URL = window.URL || window.webkitURL;
    var input = document.getElementById('icon');
    var preview = document.querySelector('#preview');
    var previewSource = preview.src

    // When the file input changes, create a object URL around the file.
    input.addEventListener('change', function () {
        if (input.value.length) {
            preview.src = URL.createObjectURL(this.files[0]);
        } else {
            preview.src = previewSource
        }
    });
    // When the image loads, release object URL
    preview.addEventListener('load', function () {
        URL.revokeObjectURL(this.src);
    });
})();
</script>
