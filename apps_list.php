<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

$query = "SELECT *
      FROM apps";
$GLOBALS['appTableResults'] = mysqli_query($db, $query);

?>

<div class="right-content">
    <div class="container">

        <h1><a class="btn-xl" href="apps_create.php">Create A New App</a></h1>

        <table id="info" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
            <thead>
            <tr>

                <th>App Table Name</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if ($appTableResults->num_rows > 0) {
                // output data of each row
                while($row = $appTableResults->fetch_assoc()) {
                    echo '<tr>
                                          <td><p>'.$row["name"].'</p></td>
                                          <td>
                                               <img class="table_image" src="'.$row["icon"].'" alt="   Play ' . $row["name"]. '"></a>
                                               <a class="btn btn-warning btn-sm" href="apps_open.php?id='.$row["id"].'">Open</a>
                                               <a class="btn btn-warning btn-sm" href="apps_modify.php?id='.$row["id"].'">Update</a>
                                               <a class="btn btn-danger btn-sm" href="apps_delete.php?id='.$row["id"].'">Delete</a>
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
