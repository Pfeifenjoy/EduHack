<?php
require("../inc/config.inc.php");
require("../classes/db.class.php");
require("../classes/dbhandler.class.php");
require("../classes/regex.class.php");
require("../classes/login.class.php");
require("../classes/error.class.php");
// init login

DBHandler::initDB();

$_POST['login'] = "test";
$_POST['id'] = "ne4y";
$_POST['pw'] = "test";


if(isset($_POST['login'])) {
    $log = new Login($_POST['id'], $_POST['pw']);
    
    if($log->verifyLogin()) {
        if($log->doLogin()) {
            echo'<p class="success">Erfolgreich eingeloggt.</p>';            
        }
        else {
            Error::showError();
        }
    }
    else {
        Error::showError();
    }
}
?>