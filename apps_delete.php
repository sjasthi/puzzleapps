<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "APPS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>
<div class="right-content">
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM apps WHERE id = '$id'";
            $result = $db->query($sql);
            if(!$result) {
                echo '<script type="text/javascript">
                alert("Error deleting app.");
                window.location = "apps_list.php"
                </script>';
            } else {
                echo '<script type="text/javascript">
                alert("App deleted!");
                window.location = "apps_list.php"
                </script>';
            }

        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>
