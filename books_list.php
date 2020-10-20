<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

$query = "SELECT *
      FROM books";
$GLOBALS['bookTableResults'] = mysqli_query($db, $query);
?>

<div class="right-content">
    <div class="container">

        <h1><a href="books_create.php">Create A New Book</a></h1>

        <table id="info" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
            <thead>
            <tr>

                <th>Books Table Name</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if ($bookTableResults->num_rows > 0) {
                // output data of each row
                while($row = $bookTableResults->fetch_assoc()) {
                    echo '<tr>
                                          <td><p> '.$row["name"].'</p></td>
                                          <td>
                                               <img class="table_image" src="'.$row["front_cover"].'" alt="   Play ' . $row["name"]. '"></a>
                                               <a class="btn btn-warning btn-sm" href="books_open.php?id='.$row["id"].'">Open</a>
                                               <a class="btn btn-warning btn-sm" href="books_modify.php?id='.$row["id"].'">Update</a>
                                               <a class="btn btn-danger btn-sm" href="books_delete.php?id='.$row["id"].'">Delete</a>
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
