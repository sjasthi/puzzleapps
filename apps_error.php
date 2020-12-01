
<?php 
// PHP program to pop an alert 
// message box on the screen 
  
// Display the alert box  
alert("You do not have permission to access this application. Please contact the administrator");

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
header("refresh:0;url=apps.php");
?> 