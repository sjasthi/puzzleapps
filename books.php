<?php
require 'bin/functions.php';
require 'db_configuration.php';
include('nav.php');

?>

<html>

	<head>
		<title>Books List</title>
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
        font-size:20px;
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
        .flip-card {
  background-color: transparent;
  width: 100px;
  height: 100px;
 
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
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
		<h1 id="title2">Books List</h1>
        
        </br>
        <form method="post">
        <div style="font-size:20px;" id="title2">Show:   
        <div style="font-size:20px; display: inline-block"><input type="submit" name="front" value="Front Cover" />   </div>
        <div style="font-size:20px; display: inline-block"><input type="submit" name="back" value="Back Cover" />  </div>
		</div>
    
        </form>

    <?php


    $sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_PUZZLES_PER_ROW'";
    $sql2 = "SELECT `book_name` FROM `books`";
    $sql3 = "SELECT `book_frontCover` FROM `books`";
    $sql4 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_PUZZLES_TO_SHOW'";
    $sql5 = "SELECT `book_backCover` FROM `books`";

    $results1 = mysqli_query($db, $sql1);
    $results2 = mysqli_query($db, $sql2);
    $results3 = mysqli_query($db, $sql3);
    $results4 = mysqli_query($db, $sql4);
    $results5 = mysqli_query($db, $sql5);

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
        while ($row = mysqli_fetch_assoc($results5)) {
            $pics2[] = $row;
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
                $topic = $topics[$randIndex]['book_name'];
                $pic = $pics[$randIndex]['book_frontCover'];
                $pic2 = $pics2[$randIndex]['book_backCover'];

                if(!isset($_POST['front']) && !isset($_POST['back'])){

                    echo "
                    
                    <td> 
                    <img class = 'image' src = 'books/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                    <div id = 'title'>$topic</div>
                    </td>";
    
                    }
                if(isset($_POST['front'])){

                echo "
                
                <td> 
                <img class = 'image' src = 'books/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                <div id = 'title'>$topic</div>
                </td>";

                }
                if(isset($_POST['back'])){

                    echo "
                    
                    <td> 
                    <img class = 'image' src = 'books/$pic2' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                    <div id = 'title'>$topic</div>
                    </td>";
    
                    }
                $a++;
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>

    </div>

		</body>

	</html>