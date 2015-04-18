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
	
	/**
	 * Associates a hashtag with the question.
	 * @param Hashtag $hashtag
	 */
	public function addHashtag(Hashtag $hashtag)
	{
		DBHandler::getDB()->query("INSERT INTO questions_hashtags (question, hashtag) VALUES (?, ?)", array($this->id, $hashtag->getId()));
	}
	
	/**
	 * Removes the given hashtag from the question. 
	 * @param Hashtag $hashtag
	 */
	public function removeHashtag(Hashtag $hashtag)
	{
		DBHandler::getDB()->query("DELETE FROM questions_hashtags WHERE question = ? AND hashtag = ?", array($this->id, $hashtag->getId()));
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
	 * Returns an array containing all questions that are assosiciated with a specific hashtag.
	 * @param Hashtag $hashtag
	 * @param int $limit
	 * @param int $offset
	 * @return array:Question
	 */
	public static function findManyByHashtag(Hashtag $hashtag, $limit = false, $offset = 0)
	{
		if($limit === false)
		{
			$db_result = DBHandler::getDB()->fetch_all("SELECT * FROM questions WHERE id IN (SELECT question FROM questions_hashtags WHERE hashtag = ?)", array($hashtag->getId()));
		}
		else 
		{
			$db_result = DBHandler::getDB()->fetch_all("SELECT * FROM questions WHERE id IN (SELECT question FROM questions_hashtags WHERE hashtag = ? LIMIT ? OFFSET ?)", array($hashtag->getId(), $limit, $offset));
		}
		$result = array();
		foreach ($db_result as $entry) {
			$result[] = new Question($entry);
		}
		return $result;
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