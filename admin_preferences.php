<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PREFERENCES";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>
<style>

.container{
    position:center;
    text-align:left;
}

</style>

<div class="right-content">
    <div class="container">

        <h1>Admin --> Preferences</h1>

<?php
        

$sql1 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'apps_per_row'";
$sql2 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'apps_to_show'";
$sql3 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'app_height'";
$sql4 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'app_width'";
$sql5 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'puzzles_per_row'";
$sql6 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'puzzles_to_show'";
$sql7 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'puzzle_height'";
$sql8 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'puzzle_width'";
$sql9 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'books_per_row'";
$sql10 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'books_to_show'";
$sql11 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_height'";
$sql12 = "SELECT `preference_value` FROM `preferences` WHERE `preference_name`= 'book_width'";

$results1 = mysqli_query($db,$sql1);
$results2 = mysqli_query($db,$sql2);
$results3 = mysqli_query($db,$sql3);
$results4 = mysqli_query($db,$sql4);
$results5 = mysqli_query($db,$sql5);
$results6 = mysqli_query($db,$sql6);
$results7 = mysqli_query($db,$sql7);
$results8 = mysqli_query($db,$sql8);
$results9 = mysqli_query($db,$sql9);
$results10 = mysqli_query($db,$sql10);
$results11 = mysqli_query($db,$sql11);
$results12 = mysqli_query($db,$sql12);


if(mysqli_num_rows($results1)>0){   //app per row
    while($row = mysqli_fetch_assoc($results1)){
        $app1[] = $row;
    }
}
$appRows = $app1[0]['preference_value'];

if(mysqli_num_rows($results2)>0){   //app to show
    while($row = mysqli_fetch_assoc($results2)){
        $app2[] = $row;
    }
}
$appShow = $app2[0]['preference_value'];

if(mysqli_num_rows($results3)>0){   //app height
    while($row = mysqli_fetch_assoc($results3)){
        $app3[] = $row;
    }
}
$appHeight = $app3[0]['preference_value'];

if(mysqli_num_rows($results4)>0){   //app width
    while($row = mysqli_fetch_assoc($results4)){
        $app4[] = $row;
    }
}
$appWidth = $app4[0]['preference_value'];

if(mysqli_num_rows($results5)>0){   //puzzle per row
    while($row = mysqli_fetch_assoc($results5)){
        $puzzle1[] = $row;
    }
}
$puzzleRows = $puzzle1[0]['preference_value'];

if(mysqli_num_rows($results6)>0){   //puzzle to show
    while($row = mysqli_fetch_assoc($results6)){
        $puzzle2[] = $row;
    }
}
$puzzleShow = $puzzle2[0]['preference_value'];

if(mysqli_num_rows($results7)>0){   //puzzle height
    while($row = mysqli_fetch_assoc($results7)){
        $puzzle3[] = $row;
    }
}
$puzzleHeight = $puzzle3[0]['preference_value'];

if(mysqli_num_rows($results8)>0){   //puzzle width
    while($row = mysqli_fetch_assoc($results8)){
        $puzzle4[] = $row;
    }
}
$puzzleWidth = $puzzle4[0]['preference_value'];

if(mysqli_num_rows($results9)>0){   //book per row
    while($row = mysqli_fetch_assoc($results9)){
        $book1[] = $row;
    }
}
$bookRows = $book1[0]['preference_value'];

if(mysqli_num_rows($results10)>0){   //book to show
    while($row = mysqli_fetch_assoc($results10)){
        $book2[] = $row;
    }
}
$bookShow = $book2[0]['preference_value'];

if(mysqli_num_rows($results11)>0){   //book height
    while($row = mysqli_fetch_assoc($results11)){
        $book3[] = $row;
    }
}
$bookHeight = $book3[0]['preference_value'];

if(mysqli_num_rows($results12)>0){   //book width
    while($row = mysqli_fetch_assoc($results12)){
        $book4[] = $row;
    }
}
$bookWidth = $book4[0]['preference_value'];


?>
<style>#title {text-align: center;color: darkgoldenrod;}</style>
<html>
	<head>
		<title>Preferences</title>
		<style>
			input {
			text-align: center;
			}
		</style>
	</head>
	<body>
		<br>
			<h1 id="title">Update Preferences</h1><br>
			</body>
			<div class="container">
				<!--Check the CeremonyCreated and if Failed, display the error message-->
                <?php
                    if (isset($_GET['preferencesUpdated'])) {
                        if ($_GET["preferencesUpdated"] == "Success") {
                            echo "<br><h3 align=center style='color:green'>Success! The Preferences have been updated!</h3>";
                        }
                    }
                ?>

				<form action="modifyThePreferences.php" method="POST" align=center>
					<table style="width:500px" class="container">
						<tr>
							<th style="width:200px"></th>
							<th>Current Value</th> 
							<th>Update Value</th>
						</tr>
						<tr>
							<td class="width:200px">Number of Apps Per Row:</td>
							<td><input disabled type="int" maxlength="2" size="10" value="<?php echo $appRows; ?>" title="Current value"></td> 
							<td><input required type="int" name="app_rows" maxlength="2" size="10" title="Enter a number" value="<?php echo $appRows; ?>"></td>
						</tr>
						<tr>
							<td class="width:200px">Number of Apps to show:</td>
							<td><input disabled type="int" maxlength="2" size="10" value="<?php echo $appShow; ?>" title="Current value"></td> 
							<td><input required type="int" name="app_show" maxlength="2" size="10" title="Enter a number" value="<?php echo $appShow; ?>"></td>
						</tr>
                        <tr>
							<td class="width:200px">Adjust Apps height:</td>
							<td><input disabled type="int" maxlength="4" size="10" value="<?php echo $appHeight; ?>" title="Current value"></td> 
							<td><input required type="int" name="app_height" maxlength="4" size="10" title="Enter a number" value="<?php echo $appHeight; ?>"></td>
						</tr>
                        <tr>
							<td style="width:200px">Adjust Apps width:</td>
							<td><input disabled type="int" maxlength="4" size="10" value="<?php echo $appWidth; ?>" title="Current value"></td> 
							<td><input required type="int" name="app_width" maxlength="4" size="10" title="Enter a number" value="<?php echo $appWidth; ?>"></td>
						</tr>
                        <tr>
							<td style="width:200px">Number of Puzzles Per Row:</td>
							<td><input disabled type="int" maxlength="2" size="10" value="<?php echo $puzzleRows; ?>" title="Current value"></td> 
							<td><input required type="int" name="puzzle_rows" maxlength="2" size="10" title="Enter a number" value="<?php echo $puzzleRows; ?>"></td>
						</tr>
						<tr>
							<td style="width:200px">Number of Puzzles to show:</td>
							<td><input disabled type="int" maxlength="2" size="10" value="<?php echo $puzzleShow; ?>" title="Current value"></td> 
							<td><input required type="int" name="puzzle_show" maxlength="2" size="10" title="Enter a number" value="<?php echo $puzzleShow; ?>"></td>
						</tr>
                        <tr>
							<td style="width:200px">Adjust Puzzles height:</td>
							<td><input disabled type="int" maxlength="4" size="10" value="<?php echo $puzzleHeight; ?>" title="Current value"></td> 
							<td><input required type="int" name="puzzle_height" maxlength="4" size="10" title="Enter a number" value="<?php echo $puzzleHeight; ?>"></td>
						</tr>
                        <tr>
							<td style="width:200px">Adjust Puzzles width:</td>
							<td><input disabled type="int" maxlength="4" size="10" value="<?php echo $puzzleWidth; ?>" title="Current value"></td> 
							<td><input required type="int" name="puzzle_width" maxlength="4" size="10" title="Enter a number" value="<?php echo $puzzleWidth; ?>"></td>
						</tr>
                        <tr>
							<td style="width:200px">Number of Books Per Row:</td>
							<td><input disabled type="int" maxlength="2" size="10" value="<?php echo $bookRows; ?>" title="Current value"></td> 
							<td><input required type="int" name="book_rows" maxlength="2" size="10" title="Enter a number" value="<?php echo $bookRows; ?>"></td>
						</tr>
						<tr>
							<td style="width:200px">Number of Books to show:</td>
							<td><input disabled type="int" maxlength="2" size="10" value="<?php echo $bookShow; ?>" title="Current value"></td> 
							<td><input required type="int" name="book_show" maxlength="2" size="10" title="Enter a number" value="<?php echo $bookShow; ?>"></td>
						</tr>
                        <tr>
							<td style="width:200px">Adjust Books height:</td>
							<td><input disabled type="int" maxlength="4" size="10" value="<?php echo $bookHeight; ?>" title="Current value"></td> 
							<td><input required type="int" name="book_height" maxlength="4" size="10" title="Enter a number" value="<?php echo $bookHeight; ?>"></td>
						</tr>
                        <tr>
							<td style="width:200px">Adjust Books width:</td>
							<td><input disabled type="int" maxlength="4" size="10" value="<?php echo $bookWidth; ?>" title="Current value"></td> 
							<td><input required type="int" name="book_width" maxlength="4" size="10" title="Enter a number" value="<?php echo $bookWidth; ?>"></td>
						</tr>
					</table><br>
							<button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">UPDATE</button>
				</form>
			</div>
	</body>
</html>

    </div>
</div>

<?php include("footer.php"); ?>
