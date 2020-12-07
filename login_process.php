<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    session_start();
}
ob_start();
//Email and Password check
$pass = $db->escape_string($_POST['password']);
console_log(password_hash($pass, PASSWORD_DEFAULT));
$email = $db->escape_string($_POST['email']);
$result = $db->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo '<script>alert("User with that email does not exist!")</script>';
}
else { // User exists
    $user = $result->fetch_assoc();
    console_log($user['password']);

    if ( password_verify($pass, $user['password']) ) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logged_in'] = true;

        header("location: index.php");
    }
    else {
        echo '<script>alert("You have entered wrong password, try again!")</script>';
    }
}
?>