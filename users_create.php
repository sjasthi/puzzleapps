<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

echo '<div class="right-content">';
echo '<div class="container">';

echo '<h1>Create A User</h1>';
echo '<form action="users_create_a_user.php" method="POST">
        <div class="form-row">
            <div class="control-group form-group col-md-12">
                <label for="first_name">First Name:</label><br>
                <input class="form-control" name="first_name" required data-validation-required-message="Please enter the first name."  
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>
            <div class="control-group form-group col-md-12">
                <label for="last_name">Last Name:</label><br>
                <input class="form-control" name="last_name" required data-validation-required-message="Please enter the last name."  
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>
            <div class="form-group col-md-12">
                <label for="email">Email Address:</label><br>
                <input class="form-control" name="email" required data-validation-required-message="Email address is required."
                maxlength="500" data-validation-maxlength-message="Enter fewer characters." aria-invalid="false">
            </div>
            <div class="form-group col-md-4">
                <label for="role">Role:</label><br>
                <select name="role" required data-validation-required-message="Select a role.">';
                        $roleQuery = "SELECT column_type FROM information_schema.COLUMNS WHERE TABLE_NAME = 'users' AND COLUMN_NAME = 'role'";
                        $selectedQuery = "SELECT COLUMN_DEFAULT FROM information_schema.COLUMNS WHERE TABLE_NAME = 'users' AND COLUMN_NAME = 'role'";
                        $rolesResult = mysqli_query($db, $roleQuery);
                        $selectedResult = mysqli_query($db, $selectedQuery);
                        $selected = mysqli_fetch_array($selectedResult);
                        $selectedSubstring = explode("''", substr($selected[0], 1, -1));
                        if (mysqli_num_rows($rolesResult) > 0) {
                            $roles = mysqli_fetch_array($rolesResult);
                            $rolesSubstring = explode("','", substr($roles[0], 6, -2));
                            foreach ($rolesSubstring as $option) {
                                if ($option == $selectedSubstring[0]) {
                                    print("<option selected='selected'>$option</option>");
                                } else {
                                    print("<option>$option</option>");
                                }
                            }
                        }
                echo '</select>
            </div>
            <div class="form-group col-md-12">
                <label for="notes">Notes:</label><br>
                <input rows="5" class="form-control" name="notes"   maxlength="500"
                    data-validation-maxlength-message="Enter fewer characters." aria-invalid="false"></input>
            </div>

        <br><br><br>
        <div class="control-group text-left" id="wrap">
            <button type="submit" name="add-user-submit" class="btn btn-primary btn-md align-items-center">Add User</button>
        </div>
    </form>
    </div>
</div>';

include("footer.php");
