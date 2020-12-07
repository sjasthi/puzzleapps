<?php
$nav_selected = "LOGIN";
$left_buttons = "NO";
$left_selected = "";


$pass = $db->escape_string($_GET['password']);
$email = $db->escape_string($_GET['email']);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$PassWord = $_POST['password'];

$password = password_hash($PassWord, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, last_name, email, password)
                    VALUES ('$first_name', '$last_name', '$email', '$password')";
$result = $db->query($sql);
echo "$first_name', '$last_name', '$email', '$password";


if( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    //header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['hash']) ) {

        
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['hash'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['role'] = $user['role'];


        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        //header("location: error.php");
    }
    }
    ?>

<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    session_start();
}
ob_start();
//Email and Password check
$pass = $db->escape_string($_POST['password']);
$email = $db->escape_string($_POST['email']);
$result = $db->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo '<script>alert("User with that email does not exist!")</script>';
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        //$_SESSION['active'] = $user['active'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logged_in'] = true;

        if(isset($_SESSION['bookSponsor'])){
            $emaill = $_SESSION['email'];
            $user1 = "SELECT `id` FROM `users` WHERE `email`= '$emaill'";
            $run1 = mysqli_query($db, $user1);
            if (mysqli_num_rows($run1) > 0) {
                while ($row = mysqli_fetch_assoc($run1)) {
                    $ID[] = $row;
                }
            }
            $bookID = $_SESSION['bookID'];
            $userID = $ID[0]['id'];
            $sql = "INSERT INTO users_books (user_id, book_id)
                    VALUES ('$userID','$bookID')";
            $result = $db->query($sql);
            //echo $userID;
            //unset($_SESSION['bookSponsor']);
            unset($_SESSION['bookID']);
            header("location: books.php");
        }else{
         header("location: index.php");
        }
    }
    else {
        echo '<script>alert("You have entered wrong password, try again!")</script>';
    }
}
?>
