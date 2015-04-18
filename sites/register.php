<?php

// init register

if(isset($_POST['register'])) {
    $reg = new Register($_POST['id'], $_POST['pw'], $_POST['mail']);
    
    if($reg->verifyRegister()) {
        if($reg->register()) {
            echo'<p class="success">Registration erfolgreich.';
        }
        else {
            Error::showError();
        }
        else {
            Error::showError();
        }
    }
}

?>