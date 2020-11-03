<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<div class="right-content">
    <div class="container">

        <?php

        if (isset($_GET['id'])){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $path = mysqli_real_escape_string($db, $_POST['path']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $notes = mysqli_real_escape_string($db, $_POST['notes']);
        $inputFromDB = ( isset($_POST['inputFromDB']) ) ? 1 : 0;
        $inputFromUI = ( isset($_POST['inputFromUI']) ) ? 1 : 0;
        $outputToDB = ( isset($_POST['outputToDB']) ) ? 1 : 0;
        $outputToUI = ( isset($_POST['outputToUI']) ) ? 1 : 0;
        $developer = mysqli_real_escape_string($db, $_POST['developer']);
        $status = ( isset($_POST['status']) ) ? 1 : 0;
        $token = mysqli_real_escape_string($db, $_POST['token']);
        $playable = ( isset($_POST['playable']) ) ? 1 : 0;
        $icon = mysqli_real_escape_string($db, $_POST['icon']);


        $sql = "
        UPDATE apps
        SET name='$name',
            path='$path',
            description='$description',
            notes = '$notes',
            inputFromDB = '$inputFromDB',
            inputFromUI = '$inputFromUI',
            outputToDB = '$outputToDB',
            outputToUI = '$outputToUI',
            developer = '$developer',
            status = '$status',
            token = '$token',
            playable = '$playable',
            icon = '$icon'
        WHERE id = '$id'";

        mysqli_query($db, $sql);
        }
        ?>
    <h1>App Updated!</h1>
    </div>
</div>

<?php include("footer.php"); ?>
