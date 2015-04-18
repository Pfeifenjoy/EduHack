

<div class="login">
  <h1>Login to Web App</h1>
  <form method="post" action="index.html">
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input name="id" type="text" class="form-control" placeholder="Username or Email" aria-describedby="basic-addon1">
    </div>

    <div class="input-group">
        <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"></span>
        <input name="pw" type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
    </div>
    
    <div class="input-group">
        <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"></span>
        <input name="repw" type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
    </div>
    <input class="btn btn-primary" type="submit" value="Login" />
  </form>
</div>
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
    }
    else {
            Error::showError();
    }
}

?>
