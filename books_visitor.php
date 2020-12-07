<?php
$nav_selected = "BOOKS";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';
error_reporting(0);
?>

<html>

	<head>
		<title>Would you like to sponsor this book?</title>
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
        #title3 {
        font-size: 20px;
		text-align: center;
		color: darkgoldenrod;
		}
        #title4 {
		text-align: center;
		color: black;
		}
        #box{
		/* background-color: pink;
		grid-gap: 10px;
		padding: 10px;
		border: 1px solid darkgoldenrod; */
		text-align: center;
        }
        .filter{
            text-indent: 50px;
        }
        .sponsor{
            font-size: 20px;
            color: darkgoldenrod;
        }
        .filter:hover {
		transform: scale(1.2);
        color: green;
		}
        .sponsor:hover {
		transform: scale(1.2);
        color: green;
		}

	</style>

	<body>
		<?php
    // if (isset($_GET['sponsor'])) {
    //     if ($_GET["preferencesUpdated"] == "Success") {
    //         echo "<br><h3 align=center style='color:green'>Success! The Preferences have been updated!</h3>";
    //     }
    // }
    ?>
		<h1 id="title2">Would you like to sponsor this book? </h1>
        <h4 id="title4">Only sponsors can access the content of the books.
Sponsor a book to access the content for 100 books. </h4>
        
        </br>
        <form class="form" method="post">
        <div style="font-size:20px;" id="title2">Show:   
        <div class="filter" style="font-size:15px; display: inline-block"><input type="submit" name="front" value="Front Cover" />   </div>
        <div class="filter" style="font-size:15px; display: inline-block"><input type="submit" name="back" value="Back Cover" />  </div>
        <div class="filter" style="font-size:15px; display: inline-block"><input type="submit" name="sample" value="Sample Puzzle" />  </div>
        <!--<div class="filter" style="font-size:15px; display: inline-block"><input type="submit" name="sponsor" value="Sponsors" />  </div>-->
		</div>
    
        </form>
        
    <?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
      
        $sql1 = "SELECT `puzzle_id` FROM `books_puzzles` WHERE `book_id`= '$id'";
        $sql2 = "SELECT `title` FROM `books` WHERE `id`= '$id'";
        $sql3 = "SELECT `front_cover` FROM `books` WHERE `id`= '$id'";
        $sql4 = "SELECT `back_cover` FROM `books` WHERE `id`= '$id'";
        $sql8 = "SELECT `description` FROM `books` WHERE `id`= '$id'";
        $sql6 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_height'";
        $sql7 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_width'";
        $sql9 = "SELECT `puzzle_id` FROM `books_puzzles` WHERE `book_id`= '$id'"; 
        $sqlBook = "SELECT `book_id` FROM `users_books`";

        $result9 = mysqli_query($db, $sql9);
        $resultBook = mysqli_query($db, $sqlBook);
                

        $row = mysqli_fetch_row($result9);
    
        $puzID = $row[0];
                
               
        $sql10 = "SELECT `puzzle_image` FROM `puzzles` WHERE `id`= '$puzID'";

        $result10 = mysqli_query($db, $sql10);

        $puzzleImage = mysqli_fetch_row($result10);

        $puzImage = $puzzleImage[0];

        $results1 = mysqli_query($db, $sql1);
        $results2 = mysqli_query($db, $sql2);
        $results3 = mysqli_query($db, $sql3);
        $results4 = mysqli_query($db, $sql4);
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
        if (mysqli_num_rows($results4) > 0) {
            while ($row = mysqli_fetch_assoc($results4)) {
                $pics2[] = $row;
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

    $numBook = count($topics);
      
    $book_height = $height[0]['preference_value'];
	$book_width = $width[0]['preference_value'];

    echo "<table id = 'table_2'>";
    echo "<tr>";
//..............................................
    

if(isset($_SESSION['logged_in'])){
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];

    $user1 = "SELECT `id` FROM `users` WHERE `email`= '$email'";
    $sql2 = "SELECT `name` FROM `apps`";

    $run1 = mysqli_query($db, $user1);

    if (mysqli_num_rows($run1) > 0) {
        while ($row = mysqli_fetch_assoc($run1)) {
            $ID[] = $row;
        }
    }
    $userID = $ID[0]['id'];
    $_SESSION['userID'] = $userID;
    $app1 = "SELECT `book_id` FROM `users_books` WHERE `user_id`= '$userID'";
    $run2 = mysqli_query($db, $app1);

    if (mysqli_num_rows($run2) > 0) {
        while ($row = mysqli_fetch_assoc($run2)) {
            $bookID[] = $row;
        }
    }
    $bID = $bookID[0]['book_id'];

    if($bID == 1){
        $isSponsor = true;
    }elseif($role == "ADMIN"){
        $isSponsor = true;
    }else{
        $isSponsor = false;
    }

}
    if($isSponsor == false){
        for ($a = 0; $a < 1; $a) {
                if ($a >= 1) {
                    break;
                } else {
                    $randIndex = array_rand($topics);
                    $topic = $topics[$randIndex]['title'];
                    $pic1 = $pics[$randIndex]['front_cover'];
                    $pic2 = $pics2[$randIndex]['back_cover'];
                    $des = $descrition[$randIndex]['description'];
                    $frontPic = "images/books/$pic1";
                    $backPic = "images/books/$pic2";
                    $samplePic = "images/puzzles/main/$puzImage";
                    
                    unset($topics[$randIndex]);
    
                    $image = $frontPic;
    
                    if(isset($_POST['front'])){
    
                        $image = $frontPic;
                    }
                    elseif(isset($_POST['back'])){
    
                        $image = $backPic;
    
                        }
                    elseif(isset($_POST['sample'])){
    
                        $image = $samplePic;
    
                        }

                        $_SESSION['bookID'] = $id;

                        echo "
                        
                        <td id= 'box'> 
                        <img class='image' height='$book_height' width='$book_width' src = '$image' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                        <div id = 'title'>$topic</div>
                        <div><b>Description: </b> $des </div>
                        <div style='font-size:20px; color: darkgoldenrod'>Click here to sponsor this book</div>
                        <form action=books_sponsor.php>  
                        <div class='sponsor' style='display: inline-block'><input type='submit' name='sponsor' value='Sponsor'></div>
                        </form>
                        </td>";

                    $a++;
                }
            
            echo "</tr>";
        }

        
    }
    
    }
?>

    </div>

		</body>

	</html>