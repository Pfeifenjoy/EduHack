<?php
/* ---------------------------------
Errorklasse zum Anzeigen von Fehlern

Autor: Steffen Lindner
------------------------------------ */

class Error {
	public static $error = array();
    public static function showError() {
		global $language;
    	for($i=0;$i<count(self::$error);$i++) {
        	echo '<p class="error">'.$language[$_SESSION['lang']]['err'].': '.self::$error[$i].'</p>';
	    }
    }
}
?>