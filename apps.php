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
error_reporting(0);
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
		.image2 {
		padding: 20px 20px 20px 20px;
		transition: transform .2s;
		border: 3px solid darkgoldenrod;
		}

		.image:hover {
		transform: scale(1.2)
		}
		.image2:hover {
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
		width: 10%;
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

	<body onload="window.open(url, '_blank');">
	
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


	$numApp = count($topics);

    $columns = $column[0]['preference_value'];
    //$manyItems = count($topics); //tota apps number display
	$manyItems = $manyItem[0]['preference_value'];
	$app_height = $height[0]['preference_value'];
	$app_width = $height[0]['preference_value'];

//....................................	
	if(isset($_SESSION['logged_in'])){
		$email = $_SESSION['email'];
		$user1 = "SELECT `id` FROM `users` WHERE `email`= '$email'";
		$sql2 = "SELECT `name` FROM `apps`";

		$run1 = mysqli_query($db, $user1);

		if (mysqli_num_rows($run1) > 0) {
			while ($row = mysqli_fetch_assoc($run1)) {
				$ID[] = $row;
			}
		}
		$userID = $ID[0]['id'];
		//echo $userID;
		$app1 = "SELECT `app_id` FROM `users_apps` WHERE `user_id`= '$userID'";
		$run2 = mysqli_query($db, $app1);

		if (mysqli_num_rows($run2) > 0) {
			while ($row = mysqli_fetch_assoc($run2)) {
				$appID[] = $row;
			}
		}
		

	}
//.......................................
	if(isset($_SESSION['logged_in'])){
		$role = $_SESSION['role'];

		if($role == "ADMIN" || $role == "SUPER_ADMIN"){	//ADMIN
			echo "<table id = 'table_2'>";
			echo "<tr>";
	
			if($numApp <= $manyItems){
			$appRange = $numApp;
			}else{
			$appRange = $manyItems;
			}

    		for ($a = 0; $a < $appRange; $a) {
        		for ($b = 0; $b < $columns; $b++) {
            		if ($a >= $appRange) {
                		break;
           			 } else {

					$randIndex = array_rand($topics);
				
					$topic = $topics[$randIndex]['name'];
					$pic = $pics[$randIndex]['icon'];
					$location = $path[$randIndex]['path'];
					$note = $notes[$randIndex]['notes'];
					unset($topics[$randIndex]);
                    ?>
                    
                    <td id= "box"> 

                    <a href="<?php echo $location ?>" target="_blank"><img class="image" height="<?php echo $app_height ?>" width="<?php echo $app_width ?>" src = "images/apps/<?php echo $pic ?>" onerror=this.src="images/index_images/ImageNotFound.png"></img></a>
					<div id = "title"><b><?php echo $topic ?></b></div>
					<div><b>Description: </b><?php echo $note ?></div>
                    </td>
    
				<?php
			
                $a++;
            }
        }
        echo "</tr>";
    }
	echo "</table>";
		}else{	//USER

		echo "<table id = 'table_2'>";
		echo "<tr>";
		
		//$range = count($appID);
		//echo $range;

		if($numApp <= $manyItems){
			$appRange = $numApp;
			}else{
			$appRange = $manyItems;
			}
		$c = 0;
		for ($a = 0; $a < $appRange; $a) {
			for ($b = 0; $b < $columns; $b++) {
				if ($a >= $appRange) {
					break;
				} else {

						
						$userAppID = $appID[$c]['app_id']-1;
						$randIndex = $a;

						$topic = $topics[$randIndex]['name'];
						$pic = $pics[$randIndex]['icon'];
						$location = $path[$randIndex]['path'];
						$note = $notes[$randIndex]['notes'];


						if($userAppID == $a){
							$location = $path[$randIndex]['path'];
							$imageMod = "image2";
							$c++;
						}else{
							$location = "apps_error.php";
							$imageMod = "image";
						}
						?>
                    
                    <td id= "box"> 

                    <a href="<?php echo $location ?>" target="_blank"><img class="image" height="<?php echo $app_height ?>" width="<?php echo $app_width ?>" src = "images/apps/<?php echo $pic ?>" onerror=this.src="images/index_images/ImageNotFound.png"></img></a>

					<div id = "title"><b><?php echo $topic ?></b></div>
					<div><b>Description: </b><?php echo $note ?></div>
					
                    </td>
    
				<?php
					unset($topics[$randIndex]);
					$a++;
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	}
	else{
	echo "<table id = 'table_2'>";
	echo "<tr>";
	
	if($numApp <= $manyItems){
		$appRange = $numApp;
	}else{
		$appRange = $manyItems;
	}
    for ($a = 0; $a < $appRange; $a) {	//VISITOR
        for ($b = 0; $b < $columns; $b++) {
            if ($a >= $appRange) {
                break;
            } else {

					$randIndex = array_rand($topics);
				
					$topic = $topics[$randIndex]['name'];
					$pic = $pics[$randIndex]['icon'];
					$location = $path[$randIndex]['path'];
					$note = $notes[$randIndex]['notes'];
					unset($topics[$randIndex]);
                    ?>
                    
                    <td id= "box"> 
                    <a href="apps_error.php" target="_blank"><img class="image" height="<?php echo $app_height ?>" width="<?php echo $app_width ?>" src = "images/apps/thumbnails/<?php echo $pic ?>" onerror=this.src="images/index_images/ImageNotFound.png"></img></a>
					<div id = "title"><b><?php echo $topic ?></b></div>
					<div><b>Description: </b><?php echo $note ?></div>
                    </td>
    
				<?php
			
                $a++;
            }
        }
        echo "</tr>";
    }
	echo "</table>";
}
    ?>

		</body>

	</html>