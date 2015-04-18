<?php
/* -----------------------------------------
 Question class
 Author: Tobias Dorra
 -------------------------------------------- */

class Question {

	//---- private --------------------------------------------------------------------------------------
	
	private $question = "";
	private $id;
	
	private function __construct($db_result){
		$this->id = $db_result["id"];
		$this->question = $db_result["question"];		
	}
	
	//---- public ---------------------------------------------------------------------------------------
	
	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @return string
	 */
	public function getQuestion()
	{
		return $this->question;
	}
	
	/**
	 * @param string $question
	 */
	public function setQuestion($question)
	{
		$this->question = $question;
	}
	
	/**
	 * Saves the changes to the Database
	 */
	public function save()
	{
		DBHandler::getDB()->query("UPDATE questions SET question = ? WHERE id = ?", array($this->question, $this->id));
	}
	
	//---- public static --------------------------------------------------------------------------------
	
	/**
	 * Returns the Question with the given ID
	 * If no such person exists, die() is called.
	 * @param int $id
	 * @return Question
	 */
	public static function findOneById($id) {
		$result = DbHandler::getDb()->fetch_assoc("SELECT * FROM questions WHERE id = ?", array($id));
		if($result === false) {
			die();
		}
		else {
			return new Question($result);
		}		
	}
	
	/**
	 * Creates a new Question.
	 * @param string $question The question to be asked.
	 * @return Question
	 */
	public static function create($question) {
		DBHandler::getDB()->query("INSERT INTO questions (question) VALUES (?)", array($question));
		$new_entry = DBHandler::getDB()->fetch_assoc("SELECT * FROM questions WHERE id = LAST_INSERT_ID()");
		if($new_entry === false) {
			die();
		} else {
			return new Question($new_entry);
		}
	}
}