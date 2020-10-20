<div id="menu-left">

    <a href="puzzles_list.php">
        <div <?php if($left_selected == "PUZZLES")
        { echo 'class="menu-left-current-page"'; } ?>>
            <img src="images/ui/puzzles.png">
            <br/>Manage Puzzles<br/></div>
    </a>


    <a href="apps_list.php">
        <div <?php if($left_selected == "APPS")
        { echo 'class="menu-left-current-page"'; } ?>>
            <img src="images/ui/apps.png">
            <br/>Manage Apps<br/></div>
    </a>

    <a href = "books_list.php">
        <div <?php if($left_selected == "BOOKS")
        { echo 'class="menu-left-current-page"'; } ?>>
            <img src="images/ui/books.png">
            <br/>Manage Books<br/></div>
    </a>

    <a href = "users_list.php">
        <div <?php if($left_selected == "USERS")
        { echo 'class="menu-left-current-page"'; } ?>>
            <img src="images/ui/admin_users.png">
            <br/>Manage Users<br/></div>
    </a>

    <a href = "admin_reports.php">
        <div <?php if($left_selected == "REPORTS")
        { echo 'class="menu-left-current-page"'; } ?>>
            <img src="images/ui/reports.png">
            <br/>Reports<br/></div>
    </a>

    <a href = "admin_preferences.php">
        <div <?php if($left_selected == "PREFERENCES")
        { echo 'class="menu-left-current-page"'; } ?>>
            <img src="images/ui/setup.png">
            <br/>Preferences<br/></div>
    </a>

</div>
