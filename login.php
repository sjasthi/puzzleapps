<?php
$nav_selected = "LOGIN";
$left_buttons = "NO";
$left_selected = "";
ob_start();
require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>
<html>
<head>
  <title>Register/Login Form</title>
  <?php include 'css/css.html'; ?>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')

{
    if (isset($_POST['login'])) { //user logging in

        require 'login_process.php';
}

    elseif (isset($_POST['register'])) { //user registering

        require 'register.php';

    }
}
?>
<body>
  <div class="form" style="position: absolute;top: 400px; left: 50%;-moz-transform: translateX(-50%) translateY(-50%);-webkit-transform: translateX(-50%) translateY(-50%);transform: translateX(-50%) translateY(-50%) ">

     

      <div class="tab-content">

         <div id="login">
          <h1>Welcome To Indic Puzzle!</h1>

          <form action="login.php" method="post" autocomplete="off">

            <div class="field-wrap">
            <label>
              Email Address
              <span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>

          <button class="button button-block" name="login" />Log In</button>
          <br/>

          <!-- <ul class="tab-group">
            <li class= "tab active align = right"><a href="#register">Register</a></li>
            </ul> -->
          </form>

        </div>

        <!-- <div id="register">
        <ul class="tab-group">
            <li class= "tab active align = right"><a href="#login">Back</a></li>
            </ul>
          <h1>Register as a new user</h1>

          <form action="login.php" method="post" autocomplete="off">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name <span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='first_name' />
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='last_name' />
            </div>
          // </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div> -->

          <button class="button button-block" name="register" />Register</button> 
          
          </form>

        </div>

      </div>tab-content

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/loginForm.js"></script>
</body>
</html>



<?php include("footer.php"); ?>
