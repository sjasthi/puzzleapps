<?php
$nav_selected = "BOOKS";
$left_buttons = "NO";
$left_selected = "";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';
error_reporting(0);
?>

<?php
if(isset($_SESSION['logged_in'])){
    //$pass = $db->escape_string($_GET['password']);
    //$email = $db->escape_string($_GET['email']);
    $userID = $_SESSION['userID'];
$sql = "INSERT INTO users_books (user_id, book_id)
                    VALUES ('$userID','1')";
$result = $db->query($sql);
echo "$userID";
header("location: books.php");

//echo hello;
}else{

    $_SESSION['bookSponsor'] = true;

    header("location: login.php");
}
?>