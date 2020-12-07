<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "USERS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>
<div class="right-content">
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM users WHERE id = '$id'";
            $result = $db->query($sql);
        }
        if (!$result) {
            echo '<script type="text/javascript">
            alert("Error deleting user.");
            window.location = "users_list.php"
            </script>';
        } else {
            echo '<script type="text/javascript">
            alert("User deleted!");
            window.location = "users_list.php"
            </script>';
        }?>

    </div>
</div>

<?php include("footer.php"); ?>
