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

	<body>
		<?php
    if (isset($_GET['sponsor'])) {
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
    $sql2 = "SELECT `title` FROM `books`";
    $sql3 = "SELECT `front_cover` FROM `books`";
    $sql4 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'books_to_show'";
    $sql5 = "SELECT `back_cover` FROM `books`";
    $sql6 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_height'";
    $sql7 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_width'";
    $sql8 = "SELECT `description` FROM `books`";


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
    if (mysqli_num_rows($results8) > 0) {
        while ($row = mysqli_fetch_assoc($results8)) {
            $descrition[] = $row;
        }
	}


    $columns = $column[0]['preference_value'];
    $manyItems = $manyItem[0]['preference_value'];
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
    
                    // get random index from array $topics
                    $randIndex = array_rand($topics);
                    $topic = $topics[$randIndex]['title'];
                    $pic = $pics[$randIndex]['front_cover'];
                    $pic2 = $pics2[$randIndex]['back_cover'];
                    $des = $descrition[$randIndex]['description'];
                    //unset($topics[$randIndex]);
    
                    if(!isset($_POST['front']) && !isset($_POST['back'])){
    
                        echo "
                        
                        <td id= 'box'> 
                        <img class='image' height='$book_height' width='$book_width' src = 'images/books/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                        <div id = 'title3'>Please sponsor to view all books!</div>
                        <div id = 'title'>$topic</div>
                        <div><b>Description: </b> $des </div>
                        <form class='form' method='post' action='books_sponsor.php'> 
                        <div style='font-size:20px; display: inline-block'><input type='submit' name='sponsor' value='Sponsor' /> </div>

                        </td>";
        
                        }
                    if(isset($_POST['front'])){
    
                    echo "
                    
                    <td id= 'box'> 
                    <img class='image' height='$book_height' width='$book_width' src = 'images/books/thumbnails/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                    <div id = 'title3'>Please sponsor to view all books!</div>
                    <div id = 'title'>$topic</div>
                    <div><b>Description: </b> $des </div>
                    <form class='form' method='post' action='books_sponsor.php'> 
                        <div style='font-size:20px; display: inline-block'><input type='submit' name='sponsor' value='Sponsor' /> </div>
                    </td>";
    
                    }
                    if(isset($_POST['back'])){
    
                        echo "
                        
                        <td id= 'box'> 
                        <img class='image' height='$book_height' width='$book_width' src = 'images/books/thumbnails/$pic2' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                        <div id = 'title3'>Please sponsor to view all books!</div>
                        <div id = 'title'>$topic</div>
                        <div><b>Description: </b> $des </div>
                        <form class='form' method='post' action='books_sponsor.php'> 
                        <div style='font-size:20px; display: inline-block'><input type='submit' name='sponsor' value='Sponsor' /> </div>
                        </td>";
        
                        }
                    $a++;
                }
            
            echo "</tr>";
        }

    }
    else{
//...........................................
    for ($a = 0; $a < $manyItems; $a) {
        for ($b = 0; $b < $columns; $b++) {
            if ($a >= $manyItems) {
                break;
            } else {

                // get random index from array $topics
                $randIndex = array_rand($topics);
                $topic = $topics[$randIndex]['title'];
                $pic = $pics[$randIndex]['front_cover'];
                $pic2 = $pics2[$randIndex]['back_cover'];
                $des = $descrition[$randIndex]['description'];
                //unset($topics[$randIndex]);

                if(!isset($_POST['front']) && !isset($_POST['back'])){

                    echo "
                    
                    <td id= 'box'> 
                    <img class='image' height='$book_height' width='$book_width' src = 'images/books/thumbnails/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                    <div id = 'title'>$topic</div>
                    <div><b>Description: </b> $des </div>
                    </td>";
    
                    }
                if(isset($_POST['front'])){

                echo "
                
                <td id= 'box'> 
                <img class='image' height='$book_height' width='$book_width' src = 'images/books/thumbnails/$pic' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                <div id = 'title'>$topic</div>
                <div><b>Description: </b> $des </div>
                </td>";

                }
                if(isset($_POST['back'])){

                    echo "
                    
                    <td id= 'box'> 
                    <img class='image' height='$book_height' width='$book_width' src = 'images/books/thumbnails/$pic2' onerror=this.src='Images/index_images/ImageNotFound.png'></img>
                    <div id = 'title'>$topic</div>
                    <div><b>Description: </b> $des </div>
                    </td>";
    
                    }
                $a++;
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

    </div>

		</body>

	</html>