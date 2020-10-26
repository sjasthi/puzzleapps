<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

$query = "SELECT *
      FROM puzzles";
$GLOBALS['puzzleTableResults'] = mysqli_query($db, $query);

?>

<div class="right-content">
    <div class="container">

        <h1><a href="puzzles_create.php">Create A New Puzzle</a></h1>

        <table id="info" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
            <thead>
            <tr>

                <th>Puzzle Table Name</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            if ($puzzleTableResults->num_rows > 0) {
                // output data of each row
                while($row = $puzzleTableResults->fetch_assoc()) {
                    echo '<tr>
                                          <td><p> '.$row["title"].'</p></td>
                                          <td>
                                               <img class="table_image" src="'.$row["puzzle_image"].'"></a>
                                               <a class="btn btn-warning btn-sm" href="puzzles_view.php?id='.$row["id"].'">View</a>
                                               <a class="btn btn-warning btn-sm" href="puzzles_play.php?id='.$row["id"].'">Play</a>
                                               <a class="btn btn-warning btn-sm" href="puzzles_modify.php?id='.$row["id"].'">Update</a>
                                               <a class="btn btn-danger btn-sm" href="puzzles_delete.php?id='.$row["id"].'">Delete</a>
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
