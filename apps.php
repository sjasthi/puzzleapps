<?php
$nav_selected = "APPS";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';
//require 'bin/functions.php';
//require 'db_configuration.php';
//include(ROOT_DIR . '/nav.php');

?>

<html>

	<head>
		<title>Indic Puzzles -> Apps</title>
	</head>
	<style>
		.image {
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
		
		#box{
		/* background-color: pink;
		grid-gap: 10px;
		padding: 10px;
		border: 1px solid darkgoldenrod; */
		text-align: center;
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
		color: darkgoldenrod;
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
	
		<h1 id="title2">What do you like to play today?</h1>

			<?php

	$sql1 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'apps_per_row'";
	$sql2 = "SELECT `name` FROM `apps`";
    $sql3 = "SELECT `icon` FROM `apps`";
	$sql4 = "SELECT `path` FROM `apps`";
	$sql5 = "SELECT `notes` FROM `apps`";
	$sql6 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'apps_to_show'";
	$sql7 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'app_height'";
	$sql8 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'app_width'";
	
	
    $results1 = mysqli_query($db, $sql1);
	$results2 = mysqli_query($db, $sql2);
    $results3 = mysqli_query($db, $sql3);
	$results4 = mysqli_query($db, $sql4);
	$results5 = mysqli_query($db, $sql5);
	$results6 = mysqli_query($db, $sql6);
	$results7 = mysqli_query($db, $sql7);
	$results8 = mysqli_query($db, $sql8);


    if (mysqli_num_rows($results1) > 0) {
        while ($row = mysqli_fetch_assoc($results1)) {
            $column[] = $row;
        }
    }

        if (mysqli_num_rows($results2) > 0) {
        while ($row = mysqli_fetch_assoc($results2)) {
            $topics[] = $row;
        }
    }

    if (mysqli_num_rows($results3) > 0) {
        while ($row = mysqli_fetch_assoc($results3)) {
            $pics[] = $row;
        }
    }

    if (mysqli_num_rows($results4) > 0) {
        while ($row = mysqli_fetch_assoc($results4)) {
            $path[] = $row;
        }
	}
	if (mysqli_num_rows($results5) > 0) {
        while ($row = mysqli_fetch_assoc($results5)) {
            $notes[] = $row;
        }
    }
    if (mysqli_num_rows($results6) > 0) {
        while ($row = mysqli_fetch_assoc($results6)) {
            $manyItem[] = $row;
        }
	}
	if (mysqli_num_rows($results7) > 0) {
        while ($row = mysqli_fetch_assoc($results7)) {
            $height[] = $row;
        }
	}
	if (mysqli_num_rows($results8) > 0) {
        while ($row = mysqli_fetch_assoc($results8)) {
            $width[] = $row;
        }
	}



    $columns = $column[0]['preference_value'];
    //$manyItems = count($topics); //tota apps number display
	$manyItems = $manyItem[0]['preference_value'];
	$app_height = $height[0]['preference_value'];
	$app_width = $height[0]['preference_value'];

	echo "<table id = 'table_2'>";
	echo "<tr>";

    for ($a = 0; $a < $manyItems; $a) {
        for ($b = 0; $b < $columns; $b++) {
            if ($a >= $manyItems) {
                break;
            } else {

				
				$randIndex = array_rand($topics);
				
                $topic = $topics[$randIndex]['name'];
				$pic = $pics[$randIndex]['icon'];
				$location = $path[$randIndex]['path'];
				$note = $notes[$randIndex]['notes'];
				unset($topics[$randIndex]);

			   
                    echo "
                    
                    <td id= 'box'> 
                    <a href='$location'><img class='image' height='$app_height' width='$app_width' src = '$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img></a>
					<div id = 'title'><b>$topic</b></div>
					<div><b>Description: </b>$note</div>
                    </td>";
    
                    
			
                $a++;
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

		</body>

	</html>