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

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">
                <img alt="Brand" src=""/>
              </a>
            </div>
            <div class="navbar navbar-nav navbar-left">
              <button type="button" class="btn btn-default navbar-btn">Search</button>
            </div>
            <div class="navbar navbar-nav navbar-right">
                <button type="button" class="btn btn-default navbar-btn">Login</button>
                <button type="button" class="btn btn-default navbar-btn">Register</button>
            </div>
          </div>
        </nav>
        <section class="container">
            <img id="mainLogo" alt="SolveIt" />
            <div class="input-group" id="mainSearch">
                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
            </div>
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
             include(realpath('./sites/register.php'));
           }
	
            ?>
        </section>
    </body>
</html>
