<?php
/* -----------------------------------------
Loginklasse
Author: Steffen Lindner
Made for ConKreter
-------------------------------------------- */

session_save_path("session");

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
        if (empty($this->id) || !(RegEx::checkUsername($this->id))) {
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
		global $language;
        if ($this->db->num_rows("SELECT id FROM account WHERE username = ? AND password = ? LIMIT 1", array(
            $this->id,
            sha1($this->pw)
        )) == 1) {
			
            $data = $this->db->fetch_assoc("SELECT id, log_stat, affiliate, session_id, last_act, status, email, type, UNIX_TIMESTAMP(payed_til) as payed_til, username FROM account WHERE username = ?", array(
                $this->id
            ));
			
			if($data['log_stat'] == 1) {
				if(file_exists("session/sess_".$data['session_id'])) {
				   @unlink("session/sess_".$data['session_id']);
				}
				
			}
			
			/*if(file_exists("session/sess_".session_id())) {
				@unlink("session/sess_".session_id());
			}*/
				
				
				
		
			$this->db->query("UPDATE account SET last_login = ? WHERE id = ? LIMIT 1", array(time(), $data['id']));
			$this->db->query("UPDATE account SET log_stat = 1 WHERE id = ? LIMIT 1", array($data['id']));
			
            $_SESSION['username'] = $data['username'];
            $_SESSION['user_id']  = $data['id'];
			$_SESSION['type'] = $data['type'];
			$_SESSION['payed_til'] = $data['payed_til'];
			$_SESSION['status'] = $data['status'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['affiliate'] = $data['affiliate'];
			$this->db->query("UPDATE account SET session_id = ? WHERE id = ? LIMIT 1", array(session_id(), $data['id']));
			
            return true;
			
			
        } else {
            Error::$error[] = $language[$_SESSION['lang']]['lError'];
            return false;
        }
    }
}