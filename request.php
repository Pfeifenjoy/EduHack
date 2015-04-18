
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
