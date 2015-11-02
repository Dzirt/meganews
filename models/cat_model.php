<?php 
require_once("/core/db.php");
/**
 * summary
 */

class CategoryModel
{
	private $db;

    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    public function insert($name)
    {
    	$query = $this->db->prepare("INSERT INTO Categories (name) VALUES :name");
    	$query->bindValue(":name",$name);

    	return $query->execute();
    }
    public function delete($name)
    {
    	$query = $this->db->prepare("DELETE FROM Categories WHERE name = :name");
    	$query->bindValue(":name", $name);

    	return $query->execute();
    }
    public function get()
    {
    	$query = $this->db->prepare("SELECT name FROM Categories");
		$query->execute();

    	return $query->fetch();
    }
}