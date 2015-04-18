<?php
session_start();

require("inc/config.inc.php");

function __autoload($class_name) {
    include 'classes/'.strtolower($class_name) . '.class.php';
}


DBHandler::initDB();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="js/navi.js"></script>
        <script src="js/page.js"></script>
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php?s=home">
                <img alt="Brand" src="img/logo_klein.png"/>
              </a>
                <ul>
                    <li><a href="index.php?s=home">Suchen</a></li>
                    <?php echo isset($_SESSION['username']) ? '<li><a href="index.php?s=logout">Logout</a></li>' : '<li><a href="index.php?s=login">Login</a></li> <li><a href="index.php?s=register">Registrieren</a></li>';?>                    
                </ul>
            </div>
          </div>
        </nav>
        <section class="container">
            <?php	
            if(isset($_GET['s']) && !empty($_GET['s'])) {
                if(file_exists(realpath('./sites/')."/".$_GET['s'].".php")) {
                    include(realpath('./sites/')."/".$_GET['s'].".php");
                }
                else {
                    include(realpath('./sites/').'/404.php');
                }
            } 
	       else {
             include(realpath('./sites/home.php'));
           }
	
      
            ?>
        </section>
        <div id="notification"></div>
        
        <script type="text/javascript" href="js/login.js"></script>
        <script type="text/javscript" href="js/notificator.js"></script>
    </body>
</html>
