<?php
//require 'bin/functions.php';
$nav_selected = "APPS";
$left_buttons = "NO";
$left_selected = "";
require 'db_configuration.php';
include('nav.php');

?>

<html>

	<head>
		<title>Indic Puzzles</title>
	</head>
	<style>
		.image {
		width: 842px;
		height: 595px;
		padding: 20px 20px 20px 20px;
		transition: transform .2s;
		}

		.image:hover {
		transform: scale(1.2)
		}

		#table_1 {
		border-spacing: 300px 0px;
		}

		#table_2 {
		margin-left: auto;
		margin-right: auto;
		}

		#silc {
		width: 300;
		}

		#welcome {
		text-align: center;
		}

		#directions {
		text-align: center;
		}

		#title {
		color: black;
		text-align: center;
		}

		a:visited,
		a:link,
		a:active {
		text-decoration: none;
		}

		#title2 {
		text-align: center;
		color: darkgoldenrod;
		}
	</style>

	<body>
	<h1 id="title2">HomePage</h1>
	<?php
		if(isset($_SESSION['logged_in'])){
			
			echo "<h1>Successful logged in as ";
			echo $_SESSION['role'];
			echo "</h1>";

		}

	?>




	</body>

	</html>