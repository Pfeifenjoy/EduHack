<?php

class Chat {
    
    public function getChats() {
        $chats = DBHandler::getDB()->fetch_all("SELECT * FROM chat WHERE user1 = ? OR user2 = ?", array($_SESSION['user_id'], $_SESSION['user_id']));
        
        return $chats;        
    }
    
    public function getUserNameById($id) {
        $username = DBHandler::getDB()->fetch_assoc("SELECT username FROM account WHERE id=? LIMIT 1", array($id));
        
        return $username['username'];
        
    }
}
?>