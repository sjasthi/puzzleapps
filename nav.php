<?php
require_once('initialize.php');
require_once __DIR__ . '/bootstrap.php';
//session_start();
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Indic Puzzles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="mainStyleSheet.css">
</head>

<body class="body_background">
<div id="wrap">
    <div id="topnav">
        <ul>
            <a href="index.php">
                <li class="horizontal-li-logo">
                    <img src ="images/logo.png">
                    <br/>Indic Puzzles</li>
            </a>
            <div class="topnav-right">
                <a href="puzzles.php">
                    <li <?php if($nav_selected == "PUZZLES"){ echo 'class="current-page"'; } ?>>
                        <img src="images/ui/puzzles.png">
                        <br/>Puzzles</li>
                </a>

                <a href="apps.php">
                    <li <?php if($nav_selected == "APPS"){ echo 'class="current-page"'; } ?>>
                        <img src="images/ui/apps.png">
                        <br/>Apps</li>
                </a>

                <a href="books.php">
                    <li <?php if($nav_selected == "BOOKS"){ echo 'class="current-page"'; } ?>>
                        <img src="images/ui/books.png">
                        <br/>Books</li>
                </a>

                <a href="sponsor.php">
                    <li <?php if($nav_selected == "SPONSOR"){ echo 'class="current-page"'; } ?>>
                        <img src="images/ui/sponsor.png">
                        <br/>Sponsor</li>
                </a>

                <a href="admin.php">
                    <li <?php if($nav_selected == "ADMIN"){ echo 'class="current-page"'; } ?>>
                        <img src="images/ui/admin.png">
                        <br/>Admin</li>
                </a>

                <a href="about.php">
                    <li <?php if($nav_selected == "ABOUT"){ echo 'class="current-page"'; } ?>>
                        <img src="images/ui/about.png">
                        <br/>About</li>
                </a>


                <a href="login.php">
                    <li <?php if($nav_selected == "LOGIN"){ echo 'class="current-page"'; } ?>>
                        <img src="images/ui/login.png">
                        <br/>Login</li>
                </a>
            </div>
        <br />
    </div>
</div>
<table id="main">
    <tbody>
    <tr>
        <td id="menu-left">

                    <?php
                        if ($nav_selected == "ADMIN") {
                            include("./left_menu_admin.php");
                        } else {
                            include("./left_menu.php");
                        }
                    ?></td>
        <td style="vertical-align: top">
