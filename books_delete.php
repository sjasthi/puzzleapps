<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>
<div class="right-content">
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM books WHERE id = '$id'";
            $result = $db->query($sql);
            if(!$result) {
                echo '<script type="text/javascript">
                alert("Error deleting book.");
                window.location = "books_list.php"
                </script>';
            } else {
                echo '<script type="text/javascript">
                alert("Book deleted!");
                window.location = "books_list.php"
                </script>';
            }
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>
