<?php
/* -----------------------------------------
Loginklasse
Author: Steffen Lindner
-------------------------------------------- */


class Login {
    private $db;
    private $id;
    private $pw;
    private $error;
    private $status = true;
    
    public function __construct($db, $id, $pw) {
        $this->db = $db;
        $this->id = $id;
        $this->pw = $pw;
    }
    
    /* ---------------------------------------
    Verfiziert den Login und erstellt die Sessions
    --------------------------------------------- */
    public function verifyLogin() {
        if (empty($this->id) || (!(RegEx::checkUsername($this->id)) && !(RegEx::checkEmail($this->id)))) {
            $this->status   = false;
        }
        
        if (empty($this->pw) || !(RegEx::checkPW($this->pw))) {
            $this->status   = false;
        }
        
        return $this->status;
    }
   
    /* -------------------------------------------
    Loggt den User ein
    ------------------------------------------------ */
    public function doLogin() {
        if (DBHandler::getDB()->num_rows("SELECT id FROM account WHERE (username = ? OR email = ?) AND password = ? LIMIT 1", array(
            $this->id, $this->id,
            sha1($this->pw)
        )) == 1) {
			
            $data = DBHandler::getDB()->fetch_assoc("SELECT id, log_stat, affiliate, session_id, last_act, status, email, type, UNIX_TIMESTAMP(payed_til) as payed_til, username FROM account WHERE username = ?", array(
                $this->id
            ));
			
			
			
		
				
				
		
		
			
            $_SESSION['username'] = $data['username'];
            $_SESSION['user_id']  = $data['id'];
			$_SESSION['email'] = $data['email'];
			
            return true;
			
			
        } else {
            Error::$error[] = "Login nicht erfolgreich. Überprüfe deine Logindaten.";
            return false;
        }
    }
}