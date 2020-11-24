<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = '$userId'";
    $result = $db->query($sql);
}

$removeSponsorshipsQuery = "SELECT books.* FROM users_books JOIN books ON users_books.book_id = books.id WHERE users_books.user_id = '$userId'";
$removeSponsorshipsResults = $db->query($removeSponsorshipsQuery);

$addSponsorshipsQuery = "SELECT * FROM books WHERE books.id NOT IN (SELECT book_id FROM users_books WHERE users_books.user_id = '$userId')";

//$addSponsorshipsQuery = "SELECT books.* FROM users_books JOIN books on users_books.book_id = books.id WHERE users_books.user_id != '$userId'";
$addSponsorshipsResults = $db->query($addSponsorshipsQuery);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $email = $row['email'];
        $role = $row['role'];

        echo '<div class="right-content">';
        echo '<div class="container">';

        echo '<h1>Manage User</h1>';
        echo '<form id="modifyUserForm" action="users_modify_a_user.php?id='.$row["id"].'" method="POST">
        <div class="form-row">
            <div class="control-group form-group col-md-12">
                <label for="first_name">First Name:</label><br>
                <input class="form-control" name="first_name" value="' .$row["first_name"].'" required data-validation-required-message="Please enter the first name."
                       maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>
            <div class="control-group form-group col-md-12">
                <label for="last_name">Last Name:</label><br>
                <input class="form-control" name="last_name" value="' .$row["last_name"].'" required data-validation-required-message="Please enter the last name."
                       maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>
            <div class="form-group col-md-12">
                <label for="email">Email Address:</label><br>
                <input class="form-control" name="email" value="' .$row["email"].'" required data-validation-required-message="Email address is required."
                       maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>
            <div class="form-group col-md-4">
                <label for="role">Role:</label><br>
                <select name="role" required data-validation-required-message="Select a role.">';
                    $roleQuery = "SELECT column_type FROM information_schema.COLUMNS WHERE TABLE_NAME = 'users' AND COLUMN_NAME = 'role'";
                    $rolesResult = mysqli_query($db, $roleQuery);
                    if (mysqli_num_rows($rolesResult) > 0) {
                        $roles = mysqli_fetch_array($rolesResult);
                        $rolesSubstring = explode("','", substr($roles[0], 6, -2));
                        foreach ($rolesSubstring as $option) {
                            if ($option == $role) {
                                print("<option selected='selected'>$option</option>");
                            } else {
                                print("<option>$option</option>");
                            }
                        }
                    }
                    echo '</select>
            </div>
            <div class="form-group col-md-12">
                <label for="notes">Notes:</label><br>
                <input rows="5" class="form-control" name="notes"   maxlength="500"
                       data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
            </div>
    
            <br><br><br>
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Update User</button>
            </div>
        </form>
        <hr>
        <h2>Manage Book Sponsorships</h2>
        <p>This user sponsors the following books.</p>
        <p>Select books and click the "Stop Sponsorships" button to remove book sponsorships from this user.</p>
        <form id="removeSponsorshipsForm" action="users_remove_sponsorships.php" method="POST">
            <div id="tableView">
                <table id="removeSponsorshipsTable" style="width:100%" width="100%" class="display" cellspacing="0">
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
        if ($removeSponsorshipsResults->num_rows > 0) {
            while($row = $removeSponsorshipsResults->fetch_assoc()) {
                $removeSponsorshipId = $row["id"];
                $title = $row["title"];
                $description = $row["description"];
                $notes = $row["notes"];
                ?>
                <tr>
                    <td><?php echo $removeSponsorshipId; ?></td>
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
            <input type="hidden" name="user-id" value="'.$userId.'">
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="remove-sponsorships-submit" class="btn btn-primary btn-md align-items-center">Stop Sponsorships</button>
            </div>
        </form>
        <hr/>
        <p>This user does not sponsor the following books.<br>
        Select books and click the "Start Sponsorships" button to add book sponsorships to this user.</p>
        <form id="addSponsorshipsForm" action="users_add_sponsorships.php" method="POST">
            <div id="tableView">
                <table id="addSponsorshipsTable" style="width:100%" width="100%" class="display" cellspacing="0">
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
        if ($addSponsorshipsResults->num_rows > 0) {
            while($row = $addSponsorshipsResults->fetch_assoc()) {
                $addSponsorshipId = $row["id"];
                $title = $row["title"];
                $description = $row["description"];
                $notes = $row["notes"];
                ?>
                <tr>
                    <td><?php echo $addSponsorshipId; ?></td>
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
            <input type="hidden" name="user-id" value="'.$userId.'">
            <div class="control-group text-left" id="wrap">
                <button type="submit" name="add-sponsorships-submit" class="btn btn-primary btn-md align-items-center">Start Sponsorships</button>
            </div>
        </form>
    </div>
    </div>';}}
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
        var removeSponsorshipsTable = $('#removeSponsorshipsTable').DataTable( {
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
        var addSponsorshipsTable = $('#addSponsorshipsTable').DataTable( {
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
        $('#removeSponsorshipsForm').on('submit', function(e){
            var form = this;
            var rows_selected = removeSponsorshipsTable.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'removeSponsorshipsId[]')
                        .val(rowId)
                );
            });
        });
        // Handle form submission event
        $('#addSponsorshipsForm').on('submit', function(e){
            var form = this;
            var rows_selected = addSponsorshipsTable.column(0).checkboxes.selected();

            // Iterate over all selected checkboxes
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'addSponsorshipsId[]')
                        .val(rowId)
                );
            });
        });
    });
</script>
