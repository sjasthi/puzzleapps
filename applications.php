<?php
   require_once __DIR__.'/bootstrap.php';
   require_once ROOT_DIR . '/bin/functions.php';
   require_once ROOT_DIR . '/db_configuration.php';
   session_start();

   printHeader();

   $query = "SELECT *
      FROM applications";
   $GLOBALS['appResults'] = mysqli_query($db, $query);

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
<!--      <link rel="stylesheet" href="styles/main_style.css" type="text/css">-->
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--      <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">-->
      <title>Apps</title>
      <!-- Bootstrap core CSS -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
      <!-- Custom styles for this template -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

   </head>
   <body class="body_background">
     <div id="wrap">

      <div class="container">
        <br> <br><br><br><br>

      <h1>Apps</h1>

        <div id="puzzleFields">
               <form class="form" action="createPuzzleCreator.php" method="POST">
                  
                  <button type="submit" name="submit" class="btn btn-success btn-sm">Add An App</button>
                  <br>
                  <br>
               </form>
            </div>

            <table id="info" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
                  <thead>
                     <tr>
                       
                        <th>Name</th>
                        <th>Description</th>
                        <th>Notes</th>
                        <th>Developer</th>
                        <th>Actions</th>
                        
                     </tr>
                  </thead>
                  <tbody>
                      <?php
                        if ($appResults->num_rows > 0) {
                            // output data of each row
                            while($row = $appResults->fetch_assoc()) {
                                echo '<tr>
                                          <td> 
                                                <a href="'.$row["token"].'" target=”_blank”>Launch
                                               <img class="table_image" src="'.$row["icon"].'" alt="   Play ' . $row["name"]. '"></a>
                                               '.$row["name"].'
                                          </td>
                                          <td> '.$row["description"].'</td>
                                          <td> '.$row["notes"].'</td>
                                          <td> '.$row["developer"].'</td>
                                          <td><br> <a class="btn btn-success btn-sm" href="viewPuzzleCreator.php?id=' .$row["id"]. '"> View </a>
                                               <a class="btn btn-warning btn-sm" href="updatePuzzleCreator.php?id=' .$row["id"]. '"> Update </a>
                                               <a class="btn btn-danger btn-sm" href="deletePuzzleCreator.php?id=' .$row["id"]. '"> Delete </a>
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
            <?php
              printFooter();
            ?>
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
