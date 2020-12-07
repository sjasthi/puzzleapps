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
        #sponsors{
		/*border: 1px solid darkgoldenrod; */
		text-align: left;
        font-weight: bold;
        overflow: auto;
        align:center;
        }
        #sponsorsImage{
        background-repeat: no-repeat;
        background-size: cover;
        
        }
        .filter{
        text-indent: 50px;
        }
        .filter:hover {
		transform: scale(1.2);
        color: green;
		}
        .filter2{
        text-indent: 50px;
        }
        .filter2:hover {
		
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
		<h1 id="title2">Books List </h1>
        
        </br>
        <form class="form" method="post">
        <div style="font-size:20px;" id="title2">Show:   
        <div class="filter" style="font-size:15px; display: inline-block"><input type="submit" name="front" value="Front Cover" />   </div>
        <div class="filter" style="font-size:15px; display: inline-block"><input type="submit" name="back" value="Back Cover" />  </div>
        <div class="filter" style="font-size:15px; display: inline-block"><input type="submit" name="sample" value="Sample Puzzle" />  </div>
        <div class="filter" style="font-size:15px; display: inline-block"><input type="submit" name="sponsor" value="Sponsors" />  </div>
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
    $sqlBookID1 = "SELECT `user_id` FROM `users_books`";
    $sqlBookID2 = "SELECT `book_id` FROM `users_books`";

    $results1 = mysqli_query($db, $sql1);
    $results2 = mysqli_query($db, $sql2);
    $results3 = mysqli_query($db, $sql3);
    $results4 = mysqli_query($db, $sql4);
    $results5 = mysqli_query($db, $sql5);
    $results6 = mysqli_query($db, $sql6);
    $results7 = mysqli_query($db, $sql7);
    $results8 = mysqli_query($db, $sql8);
    $resultBookID1 = mysqli_query($db, $sqlBookID1);
    $resultBookID2 = mysqli_query($db, $sqlBookID2);

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
    if (mysqli_num_rows($resultBookID1) > 0) {
        while ($row = mysqli_fetch_assoc($resultBookID1)) {
            $allUsers[] = $row; //all books
        }
        
    }
    if (mysqli_num_rows($resultBookID2) > 0) {
        while ($row = mysqli_fetch_assoc($resultBookID2)) {
            $bookSponsored[] = $row; //all books
        }
        
    }

    $totalBooks = count($bookSponsored);

    for($h = 0; $h < $totalBooks; $h++){
        $sponsoredBooks[] = $bookSponsored[$h]['book_id'];
    }
  
    $totalSponsored = count($allUsers);
    $numBook = count($topics);
    $columns = $column[0]['preference_value'];
    $manyItems = $manyItem[0]['preference_value'];
    $book_height = $height[0]['preference_value'];
	$book_width = $width[0]['preference_value'];

    echo "<table id = 'table_2'>";
    echo "<tr>";
//..............................................SAVE
 
if(isset($_SESSION['logged_in'])){
    $role = $_SESSION['role'];
    if($role == "ADMIN" || $role === "SUPER_ADMIN" ){
        $link = "books_sponsored.php";
    }elseif($role == "USER"){   
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
        $bookSQL2 = "SELECT `book_id` FROM `users_books` WHERE `user_id`= '$userID'";
        $bookSQL3 = "SELECT `book_id` FROM `users_books`";
        $bookSQL4 = "SELECT `user_id` FROM `users_books`";

        $run2 = mysqli_query($db, $bookSQL2);
        $run3 = mysqli_query($db, $bookSQL3);
        $run4 = mysqli_query($db, $bookSQL4);

        if (mysqli_num_rows($run2) > 0) {
            while ($row = mysqli_fetch_assoc($run2)) {
                $bookID[] = $row;
            }
        }
        if (mysqli_num_rows($run3) > 0) {
            while ($row = mysqli_fetch_assoc($run3)) {
                $bookID2[] = $row;
            }
        }
        if (mysqli_num_rows($run4) > 0) {
            while ($row = mysqli_fetch_assoc($run4)) {
                $bookID3[] = $row;
            }
        }
        $bID = $bookID[0]['book_id'];
        $bookIdRange = count($bookID2);

        $access = false;
        for($z = 0; $z < $bookIdRange; $z++){
            if($userID == $bookID3[$z]['user_id']){
                for($y = 0; $y < $bookIdRange; $y++){
                    if($bID == $bookID2[$y]['book_id']){
                        $access = true;
                    }
                }
            }
        }

        if($access == true){
            $link = "books_sponsored.php";
        }else{
            $link = "books_visitor.php";
        }

        }
    }else{
    $link = "books_visitor.php";
}
//...........................................
    if($numBook <= $manyItems){
        $bookRange = $numBook;
    }else{
        $bookRange = $manyItems;
    }
    for ($a = 0; $a < $bookRange; $a) {
        for ($b = 0; $b < $columns; $b++) {
            if ($a >= $bookRange) {
                break;
            } else {

                // get random index from array $topics
                $randIndex = $a;
                $puzzleIndex = $randIndex + 1;
                $sql9 = "SELECT `puzzle_id` FROM `books_puzzles` WHERE `book_id`= '$puzzleIndex'"; 

                $result9 = mysqli_query($db, $sql9);

                $row = mysqli_fetch_row($result9);

                $puzID = $row[0];
       
                $sql10 = "SELECT `puzzle_image` FROM `puzzles` WHERE `id`= '$puzID'";

                $result10 = mysqli_query($db, $sql10);

                $puzzleImage = mysqli_fetch_row($result10);

                $puzImage = $puzzleImage[0];

                $topic = $topics[$randIndex]['title'];
                $pic1 = $pics[$randIndex]['front_cover'];
                $pic2 = $pics2[$randIndex]['back_cover'];
                $des = $descrition[$randIndex]['description'];

                $frontPic = "images/books/$pic1";
                $backPic = "images/books/$pic2";
                $samplePic = "images/puzzles/main/$puzImage";
                
                $bookID = $randIndex+1;

                $image = $frontPic;

                if(isset($_POST['front'])){

                    $image = $frontPic;
                }elseif(isset($_POST['back'])){

                    $image = $backPic;

                }elseif(isset($_POST['sample'])){

                    $image = $samplePic;

                }

                
                
                //$des = wordwrap($des, 20, "<br />");
                //echo "<br>bID:".$bookID;
                //echo " range:".$sponsoredBookRange;
                
                if(isset($_POST['sponsor'])){
                    
                    echo "<td id= 'box'> ";
                    echo "<div style='text-align:left; color: darkgoldenrod; font-weight: bold'>Sponsored by:</div>";
                    
                    echo "<div id = 'sponsors' style='height: $book_height; width: $book_width;'>";
                    
                    
                    if(!in_array($bookID, $sponsoredBooks)){
                        echo "<a href='$link?id=$bookID' target='_blank'><img height='$book_height' width='$book_width' src = 'images/index_images/sponsor_a_book.png' onerror=this.src='images/index_images/ImageNotFound.png'></img></a>";
                    }
                    
                
                    for($s = 0; $s < $totalSponsored; $s++){
                        $userIdz = $allUsers[$s]['user_id'];
                        
                        $sqlUsers = "SELECT `book_id` FROM `users_books` WHERE `user_id`= '$userIdz'";
                        $resultUsers = mysqli_query($db, $sqlUsers);

                        if (mysqli_num_rows($resultUsers) > 0) {
                            while ($row = mysqli_fetch_assoc($resultUsers)) {
                                $bookIDs[] = $row;
                            }
                        }

                        $book_ID = $bookIDs[$s]['book_id'];

                       

                        if($bookID == $book_ID){
                    
    
                            $sqlFirst = "SELECT `first_name` FROM `users` WHERE `id`= '$userIdz'";
                            $sqlLast = "SELECT `last_name` FROM `users` WHERE `id`= '$userIdz'";

                            $firstNames = mysqli_query($db, $sqlFirst);
                            $lastNames = mysqli_query($db, $sqlLast);
                            
                            $firstName = mysqli_fetch_row($firstNames);
                            $lastName = mysqli_fetch_row($lastNames);

                            echo"<br>";
                            echo "<div class='filter2'>$firstName[0] $lastName[0]</div>";
                                //unset($allBooks[$k]['user_id']);
                        }
                       
                    }
       
                       
                        
                  
                    echo "</div>";
                    
                  
                    
                   
                    echo "
                    
                    <a href='$link?id=$bookID' target='_blank'><div id = 'title'>$topic</div></a>
                    
                    <div><b>Description: </b> $des  
                    </div>
                    </td>";
                    unset($topics[$randIndex]);

    
                }else{
                    
                    echo "
                    
                    <td id= 'box'> 
                     <a href='$link?id=$bookID' target='_blank'><img class='image' height='$book_height' width='$book_width' src = '$image' onerror=this.src='images/index_images/ImageNotFound.png'></img></a>
                    <div id = 'title'>$topic</div>
                    <div><b>Description: </b> $des </div>
                    </td>";
                    unset($topics[$randIndex]);
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