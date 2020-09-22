<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/puzzlemaster/bin/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/puzzlemaster/bin/PuzzleCreator.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


$puzzleCreatorId = -1;
$puzzle = null;
$puzzleCreator = null;

if (isset($_GET['id']) && $_GET['id'] > -1) {
    $puzzleCreatorId = $_GET['id'];
	$puzzleCreator = getPuzzleCreatorById($puzzleCreatorId);
	if($puzzleCreator == null)
	{
		printHeader();
		printerrorAndExit("Puzzle Creator Not Found.", "list.php");
	}

	if($puzzleCreator != null)
	{
		if(!validateUserAccess($_SESSION['creatorAccessId'], $puzzleCreator->puzzleCreatorId))
			{
				header('Location: login.php?logout=true&message=Invalid Access');
				exit;
			}
	}
}

header("Expires: Tue, 01 Jan 2019 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
	

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

    <title>Puzzle Creator Edit</title>

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


printHeader();

?>
<!-- Page Content -->
<div class="container">

<?php 
		
echo "<div class=\"row\">";	
if(isset($_GET['success']) && $_GET['success'] == 'true' )
{
	printSuccessMessage("Successfully Saved Puzzle Creator");
}
else if(isset($_GET['success']) && $_GET['success'] == 'false')
{
	printErrorMessage("Puzzle Creator either Failed to Save or Need to be Saved");	
}
	
displayPuzzleCreatorInformation($puzzleCreator);	
//echo "ID: " . $puzzleCreator->id;
//echo($puzzleCreator);
echo "</div>";
echo "</div>";
printFooter();
?>
</div>
<!-- /.container -->


</body>


</html>
