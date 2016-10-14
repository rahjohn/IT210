<?php
session_start();
function amIActive($navTab){
    global $currentPage;
    if ($currentPage == $navTab)
        echo 'class="active"';
}
?>
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" type="text/css" href="css/mycss.css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/myjs.js"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title><?php echo $currentPage?></title>
    <link rel="icon" type="image/png" href="favicon.png">
</head>
<body id="who">
<section class="section">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">
                    Rachel Johnson
                </a>
            </div>
            <ul class="nav navbar-nav">
                <li <?php amIActive("Home"); ?> ><a href="home.php">
                    <span class="glyphicon glyphicon-home"></span>
                    Home
                </a></li>
                <li <?php amIActive("Endorsements"); ?> ><a href="endorsements.php">
                    <span class="glyphicon glyphicon-thumbs-up"></span>
                    Endorsements
                </a></li>
                <li class="dropdown" <?php amIActive("Projects"); ?> >
                    <a class="dropdown-toggle" data-toggle="dropdown" href="projects.php">
                        <span class="glyphicon glyphicon-pencil"></span>
                        Projects
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!-- Options for my projects -->
                        <li><a href="projects.php?slide=0">Project 1</a></li>
                        <li><a href="projects.php?slide=1">Project 2</a></li>
                        <li><a href="projects.php?slide=2">Project 3</a></li>
                    </ul>
                </li>
                <li <?php amIActive("Bio"); ?> ><a href="bio.php">
                    <span class="glyphicon glyphicon-user"></span>
                    Bio
                </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?php amIActive("Contact"); ?> ><a href="contact.php">
                    <span class="glyphicon glyphicon-envelope"></span>
                    Contact
                </a></li>
                <?php if (isset($_SESSION['login_user'])) echo "<li><a href=\"logout.php\">Logout</a></li>";
                    else echo "<li " . amIActive("Login") . "><a href=\"login.php\">Login</a></li><li " . amIActive("Register") . "><a href=\"register.php\">Register</a></li>" ?>
            </ul>
        </div>
    </nav>