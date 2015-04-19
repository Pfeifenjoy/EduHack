<?php
class Profile
{
	//---- private -------------------------------------------------------------------------------
	private $id;
	private $email;
	private $username;
	private $creationDate;
	
	private function __construct($db_entry)
	{
		$this->id = $db_entry["id"];
		$this->email = $db_entry["email"];
		$this->username = $db_entry["username"];	
		$this->creationDate = $db_entry["createTime"];
		
	}
	
	
	public function getId()
	{
		return $this->id;	
	}
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function getRegistrationDate()
	{
		return $this->creationDate;
	}
	
	
	
	public function getPictureUrl()
	{
		$hash = md5(strtolower(trim($this->email)));
		return "http://www.gravatar.com/avatar/" . $hash . "?default=retro&s=250";
	}
	
	//---- public --------------------------------------------------------------------------------
	
	//---- public static -------------------------------------------------------------------------
	
	/**
	 * @param int $id
	 * @return Profile
	 */
	public static function findOneById($id)
	{
		$result = DbHandler::getDb()->fetch_assoc("SELECT * FROM account WHERE id = ?", array($id));
		if($result === false) {
			die();
		}
		else {
			return new Profile($result);
		}
	}
	
	/**
	 * @return Profile
	 */
	public static function findOneByCurrentSession()
	{
		if(isset($_SESSION["user_id"]))
		{
			return self::findOneById($_SESSION["user_id"]);
		}
		else
		{
			die();
		}
	}
}