<?php
$nav_selected = "BOOKS";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';
error_reporting(0);
?>
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
        #title3 {
        font-size: 20px;
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
<?php
if(isset($_SESSION['logged_in'])){

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql1 = "SELECT `puzzle_id` FROM `books_puzzles` WHERE `book_id`= '$id'";
        $sql2 = "SELECT `title` FROM `books` WHERE `id`= '$id'";
        $sql3 = "SELECT `front_cover` FROM `books` WHERE `id`= '$id'";
        $sql8 = "SELECT `description` FROM `books` WHERE `id`= '$id'";
        $sql6 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_height'";
        $sql7 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_width'";

        $results1 = mysqli_query($db, $sql1);
        $results2 = mysqli_query($db, $sql2);
        $results3 = mysqli_query($db, $sql3);
        $results6 = mysqli_query($db, $sql6);
        $results7 = mysqli_query($db, $sql7);
        $results8 = mysqli_query($db, $sql8);

        if (mysqli_num_rows($results1) > 0) {
            while ($row = mysqli_fetch_assoc($results1)) {
                $puzzles[] = $row;
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
        if (mysqli_num_rows($results8) > 0) {
            while ($row = mysqli_fetch_assoc($results8)) {
                $descrition[] = $row;
            }
        }

        $range = count($puzzles);

        $topic = $topics[0]['title'];
        $pic1 = $pics[0]['front_cover'];
        $des = $descrition[0]['description'];

        $frontPic = "images/books/thumbnails/$pic1";
        $image = $frontPic;

        echo "<table id = 'table_2'>";
        echo "<tr>";

        echo "
                    
                    <td id= 'box'> 
                    <img class='image' height='$book_height' width='$book_width' src = '$image' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                    <div id = 'title'>$topic</div>
                    <div><b>Description: </b> $des </div>
                    </td>";
        echo "</table>";

        echo "<table id = 'table_2'>";
        echo "<tr>";

           
            for ($a = 0; $a < $range; $a) {
                for ($b = 0; $b < 5; $b++) {
                    if ($a >= $range) {
                        break;
                    } else {

                        $puzzleID = $puzzles[$a]['puzzle_id'];

                        $sql9 = "SELECT `puzzle_image` FROM `puzzles` WHERE `id`= '$puzzleID'";


                        $results9 = mysqli_query($db, $sql9);

                        if (mysqli_num_rows($results9) > 0) {
                            while ($row = mysqli_fetch_assoc($results9)) {
                                $puzzle[] = $row;
                             }
                        }

                        $pic = $puzzle[$a]['puzzle_image'];

                        $image = "images/puzzles/$pic";
                        
                        $userAppID = $appID[$a]['app_id']-1;
    
                        
                       
                        echo "
                    
                        <td id= 'box'> 
                         <img class='image' height='$book_height' width='$book_width' src = '$image' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                        </td>";

                
                        $a++;
                    }
                }
                echo "</tr>";
            }
            echo "</table>";

            }



}else{
       // header('location: books.php');
    }

?>