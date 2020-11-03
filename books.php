<?php
$nav_selected = "BOOKS";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<html>

	<head>
		<title>Books List</title>
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

        #box{
		/* background-color: pink;
		grid-gap: 10px;
		padding: 10px;
		border: 1px solid darkgoldenrod; */
		text-align: center;
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
		<h1 id="title2">Books List </h1>
        
        </br>
        <form class="form" method="post">
        <div style="font-size:20px;" id="title2">Show:   
        <div style="font-size:20px; display: inline-block"><input type="submit" name="front" value="Front Cover" />   </div>
        <div style="font-size:20px; display: inline-block"><input type="submit" name="back" value="Back Cover" />  </div>
		</div>
    
        </form>
        
    <?php


    $sql1 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'books_per_row'";
    $sql2 = "SELECT `book_name` FROM `books`";
    $sql3 = "SELECT `book_frontCover` FROM `books`";
    $sql4 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'books_to_show'";
    $sql5 = "SELECT `book_backCover` FROM `books`";
    $sql6 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_height'";
    $sql7 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_width'";



    $results1 = mysqli_query($db, $sql1);
    $results2 = mysqli_query($db, $sql2);
    $results3 = mysqli_query($db, $sql3);
    $results4 = mysqli_query($db, $sql4);
    $results5 = mysqli_query($db, $sql5);
    $results6 = mysqli_query($db, $sql6);
    $results7 = mysqli_query($db, $sql7);


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
    if (mysqli_num_rows($results6) > 0) {
        while ($row = mysqli_fetch_assoc($results6)) {
            $height[] = $row;
        }
	}
	if (mysqli_num_rows($results7) > 0) {
        while ($row = mysqli_fetch_assoc($results7)) {
            $width[] = $row;
        }
	}


    $columns = $column[0]['preference_value'];
    $manyItems = $manyItem[0]['preference_value'];
    $book_height = $height[0]['preference_value'];
	$book_width = $width[0]['preference_value'];

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
                //unset($topics[$randIndex]);

                if(!isset($_POST['front']) && !isset($_POST['back'])){

                    echo "
                    
                    <td id= 'box'> 
                    <img class='image' height='$book_height' width='$book_width' src = 'books/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                    <div id = 'title'>$topic</div>
                    </td>";
    
                    }
                if(isset($_POST['front'])){

                echo "
                
                <td id= 'box'> 
                <img class='image' height='$book_height' width='$book_width' src = 'books/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                <div id = 'title'>$topic</div>
                </td>";

                }
                if(isset($_POST['back'])){

                    echo "
                    
                    <td id= 'box'> 
                    <img class='image' height='$book_height' width='$book_width' src = 'books/$pic2' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
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