<?php
/* -----------------------------------------
Registerklasse
Author: Steffen Lindner

-------------------------------------------- */



class Register {
	private $id;
	private $pw;
	private $db;
	private $email;
	private $type;
	private $status = true;
	private $stuff;
	
	public function __construct($db, $id, $pw, $email, $type, $stuff) {
		$this->db = $db;
		$this->id = $id;
		$this->pw = $pw;
		$this->email = $email;
		$this->type = $type;
		$this->stuff = $stuff;
	}
	
	/* -------------------------------------
	Verifiziert die angegebenen Daten
	-----------------------------------------*/
	public function verifyRegister() {
		global $language;
		if(empty($this->id) || !(RegEx::checkUsername($this->id))) {
			$this->status = false;
		}
		
		if(empty($this->pw) || !(RegEx::checkPW($this->pw))) {
			$this->status = false;
		}
		
		if(empty($this->email) || !(RegEx::checkEmail($this->email))) {
			$this->status = false;
		}
		
		if(!isset($this->stuff['agb'])) {
			Error::$error[] = $language[$_SESSION['lang']]['agbErr'];
			$this->status = false;
		}
		
		if(!isset($this->stuff['risk'])) {
			Error::$error[] = $language[$_SESSION['lang']]['riskErr'];
			$this->status = false;
		}
		
		if($this->stuff['captcha'] != $_SESSION['captchaID']) {
			Error::$error[] = $language[$_SESSION['lang']]['captchaErr'];
			$this->status = false;
		}
		
		return $this->status;
	}
	
		
	/* ---------------------------------------------
	Prüft ob der User existiert
	-----------------------------------------------*/
	public function existsUser() {		
	    global $language;
		if($this->db->num_rows("SELECT id FROM account WHERE username = ? LIMIT 1", array($this->id))) {
			Error::$error[] = $language[$_SESSION['lang']]['userExists'];
			return true;
		}
		else {
			return false;
		}
	}
	
	
	/* ----------------------------------------------
	Prüft ob es bereits einen User mit dieser Email gibt
	--------------------------------------------------- */
	public function existsEmail() {
		global $language;
		if($this->db->num_rows("SELECT id FROM account WHERE email = ?  LIMIT 1", array($this->email))) {
			Error::$error[] = $language[$_SESSION['lang']]['emailExists'];
			return true;
		}
		else {
			return false;
		}
	}
	
	/* ------------------------------------------------
	Registriert den User
	----------------------------------------------------- */
    public function register() {
		global $language;
		if(isset($this->stuff['affiliate'])) {
			$aff = $this->stuff['affiliate'];
		}
		else {
			$aff = 0;
		}
		
		$time = time();
		$ip = $_SERVER['REMOTE_ADDR'];
		$this->pw = sha1($this->pw);
		if($this->type == 0) {
			$content = $language[$_SESSION['lang']]['weMessageClient'].' http://www.hotbinarytrader.com/index.php?s=activateAccount&email='.$this->email.'  '.$language[$_SESSION['lang']]['weMessageClient2'];
		}
		else {
		   $content = $language[$_SESSION['lang']]['weMessage'].' http://www.hotbinarytrader.com/index.php?s=activateAccount&email='.$this->email.$language[$_SESSION['lang']]['weMessage2'];
		}
		if($this->db->query("INSERT INTO account (username, password, email, type, ip, reg_time, status, affiliate, log_stat) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)", array($this->id, $this->pw, $this->email, $this->type, $ip, $time, 0, $aff, 0))) {
			$mail = new Mail($this->email, $language[$_SESSION['lang']]['weMessageSubject'], $content);
			if($mail->sendMail());
			return true;
		}
		else {
			return false;
		}
	}
	
	
}
?>