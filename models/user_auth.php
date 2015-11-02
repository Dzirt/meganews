<?php
require_once("core/db.php");

class UserAuth
{
	private $db;
	function __construct() {
		$this->db = DataBase::getInstance();
	}

	public function login($username) {
		$query = $this->db->prepare("SELECT * FROM users WHERE username = :username");
		$query->bindValue(':username', $username);
		$query->execute();
		return $query->fetch();
	}
}