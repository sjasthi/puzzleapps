<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

$query = "SELECT *
      FROM users";
$GLOBALS['userTableResults'] = mysqli_query($db, $query);

?>

<div class="right-content">
    <div class="container">

        <h1><a href="users_create.php">Create A New User</a></h1>

        <table id="info" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
            <thead>
            <tr>

                <th>Users Table Name</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if ($userTableResults->num_rows > 0) {
                // output data of each row
                while($row = $userTableResults->fetch_assoc()) {
                    echo '<tr>
                          <td><p> '.$row["email"].'</p></td>
                          <td>
                               <a class="btn btn-warning btn-sm" href="users_view.php?id='.$row["id"].'">View User</a>
                               <a class="btn btn-warning btn-sm" href="users_apps.php?id='.$row["id"].'">View User Apps</a>
                               <a class="btn btn-warning btn-sm" href="users_books.php?id='.$row["id"].'">View User Books</a>
                               <a class="btn btn-warning btn-sm" href="users_modify.php?id='.$row["id"].'">Update User</a>
                               <a class="btn btn-warning btn-sm" href="users_role.php?id='.$row["id"].'">Update User Role</a>
                               <a class="btn btn-danger btn-sm" href="users_delete.php?id='.$row["id"].'">Delete</a>
                               </td>                                 
                    </tr>';

                }//end while
            }//end if
            else {
                echo "0 results";
            }//end else
            ?>
            </tbody>

        </table>

    </div>
</div>

<?php include("footer.php"); ?>
