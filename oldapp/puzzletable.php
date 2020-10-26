<?php
  require_once __DIR__.'/bootstrap.php';
   require ROOT_DIR . '/bin/functions.php';
   require ROOT_DIR . '/db_configuration.php';
   session_start();

   $query = "SELECT *
      FROM puzzlecreator";
   $GLOBALS['puzzleTableResults'] = mysqli_query($db, $query);

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="styles/main_style.css" type="text/css">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
      <title>Puzzle Creator</title>
      <!-- Bootstrap core CSS -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
      <!-- Custom styles for this template -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

   </head>
   <body class="body_background">
     <div id="wrap">

      <div class="container">
      <h1>Puzzle Game Table</h1>

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
                                          <td><h1> '.$row["name"].'</h1></td>
                                          <td><a href="'.$row["game_loader"].'" target=”_blank”>Create Game</a>
                                               <img class="table_image" src="'.$row["image"].'" alt="   Play ' . $row["name"]. '"></a>
                                               <a class="btn btn-warning btn-sm" href="'.$row["game_loader"].'">View</a>
                                               <a class="btn btn-warning btn-sm" href="updateTable.php?id='.$row["id_number"].'">Update</a>
                                               <a class="btn btn-danger btn-sm" href="deleteTable.php?id='.$row["id_number"].'">Delete</a>
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
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>

         <script type="text/javascript">

            $(document).ready(function() {

                $('#info').DataTable();

            });

         </script>

   </body>
</html>
