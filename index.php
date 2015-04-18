<!DOCTYPE html>

<html>
    <head>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">
                <img alt="Brand" src="img/logo_klein.png"/>
              </a>
                <ul>
                    <li><a>Suchen</a></li>
                    <li><a>Login</a></li>
                    <li><a>Registrieren</a></li>
                </ul>
            </div>
          </div>
        </nav>
        <section class="container">
            <div id="mainsearch">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Gib hier dein Problem ein!">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </input>
                </div><!-- /input-group -->
            </div>
            <?php
                include("sites/login.php");
            ?>
        </section>
    </body>
</html>
