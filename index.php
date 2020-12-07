<?php
$nav_selected = "PUZZLES";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>

<div class="right-content">
    <div class="container">

    <h1 id="title2">What do you like to play today?</h1>
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
<?php

$sql1 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'puzzles_per_row'";
$sql2 = "SELECT `title` FROM `puzzles`";
$sql3 = "SELECT `puzzle_image` FROM `puzzles`";
//$sql4 = "SELECT `path` FROM `puzzles`";
$sql5 = "SELECT `sub_title` FROM `puzzles`";
$sql6 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'puzzles_to_show'";
$sql7 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'puzzle_height'";
$sql8 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'puzzle_width'";

$results1 = mysqli_query($db, $sql1);
$results2 = mysqli_query($db, $sql2);
$results3 = mysqli_query($db, $sql3);
//$results4 = mysqli_query($db, $sql4);
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

// if (mysqli_num_rows($results4) > 0) {
// while ($row = mysqli_fetch_assoc($results4)) {
// $path[] = $row;
// }
//}
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
//$manyItems = count($topics); //tota puzzles number display
$manyItems = $manyItem[0]['preference_value'];
$puzzle_height = $height[0]['preference_value'];
$puzzle_width = $height[0]['preference_value'];

echo "<table id = 'table_2'>";
echo "<tr>";

for ($a = 0; $a < $manyItems; $a) {
for ($b = 0; $b < $columns; $b++) {
if ($a >= $manyItems) {
    break;
} else {

    
    $randIndex = array_rand($topics);
    
    $topic = $topics[$randIndex]['title'];
    $pic = $pics[$randIndex]['puzzle_image'];
    //$location = $path[$randIndex]['path'];
    $note = $notes[$randIndex]['sub_title'];
   // unset($topics[$randIndex]);

   
        echo "
        
        <td id= 'box'> 
        <img class='image' height='$puzzle_height' width='$puzzle_width' src = 'images/puzzles/$pic' onerror=this.src='images/index_images/ImageNotFound.png'></img>
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


    </div>
</div>

<?php include("footer.php"); ?>
