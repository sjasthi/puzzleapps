<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/puzzlemaster/bin/Puzzle.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/puzzlemaster/bin/PuzzleInformation.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/puzzlemaster/bin/functions.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon"
      type="image/png"
      href="favicon.ico">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Puzzle View</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
    <!-- Custom CSS -->

    <!-- Custom Fonts -->
    <!--link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"-->
    <link href="css/dropzone.css" type="text/css" rel="stylesheet"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/dropzone.js"></script>
	
	
</head>
<body>	
	
	
<?php
$puzzle = null;

if (isset($_GET['id']) && $_GET['id'] > -1) {
    $puzzleId = $_GET['id'];
    $puzzle = getpuzzleById($puzzleId);
	//echo $puzzle->id;
	//echo($puzzleId);
	if($puzzle == null)
	{
		printHeader();
		printerrorAndExit("Puzzle Not Found.", "list.php");
	}
	
}
?>




<?php


printHeader();

?>
<!-- Page Content -->
<div class="container">

<?php 
		
echo "<div class=\"row\">";	

displayPuzzleView($puzzle);	

echo "</div>";
echo "</div>";
printFooter();
?>
</div>
<!-- /.container -->


</body>


</html>
