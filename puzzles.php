<?php
require 'bin/functions.php';
require 'db_configuration.php';
include('nav.php');

?>

<html>

	<head>
		<title>Indic Puzzles</title>
	</head>
	<style>
		.image {
		width: 100px;
		height: 100px;
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
		<?php
    if (isset($_GET['preferencesUpdated'])) {
        if ($_GET["preferencesUpdated"] == "Success") {
            echo "<br><h3 align=center style='color:green'>Success! The Preferences have been updated!</h3>";
        }
    }
    ?>
		<h1 id="title2">What do you like to play today?</h1>

			<?php

    $sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_PUZZLES_PER_ROW'";
    $sql2 = "SELECT `puzzle_name` FROM `gpuzzles`";
    $sql3 = "SELECT `puzzle_image` FROM `gpuzzles`";
    $sql4 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_PUZZLES_TO_SHOW'";

    $results1 = mysqli_query($db, $sql1);
    $results2 = mysqli_query($db, $sql2);
    $results3 = mysqli_query($db, $sql3);
    $results4 = mysqli_query($db, $sql4);

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
            $manyItem[] = $row;
        }
    }

    $columns = $column[0]['value'];
    $manyItems = $manyItem[0]['value'];

    echo "<table id = 'table_2'>";
    echo "<tr>";
    for ($a = 0; $a < $manyItems; $a) {
        for ($b = 0; $b < $columns; $b++) {
            if ($a >= $manyItems) {
                break;
            } else {

                // get random index from array $topics
                $randIndex = array_rand($topics);
                $topic = $topics[$randIndex]['puzzle_name'];
                $pic = $pics[$randIndex]['puzzle_image'];
                echo "
        <td>
                <img class = 'image' src = 'Images/puzzle_images/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                <div id = 'title'>$topic</div>
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