<?php 
/**
* Модель работы с новостными постами
*/
require_once("core/db.php");

class PostModel
{
	private $db;
	function __construct() {
		$this->db = DataBase::getInstance();
	}
	//Create
	public function insert(array $data) {
		$query = $this->db->prepare("INSERT INTO posts(title,short_text,full_text,author,date,image) 
												values (:title,:short_text,:full_text,:author,NOW(),:image)");
		$query->bindValue(':title',$data['title']);
		$query->bindValue(':short_text',$data['short_text']);
		$query->bindValue(':full_text',$data['full_text']);
		$query->bindValue(':author',$data['author']);
		$query->bindValue(':image',$data['image']);

		return $query->execute();
	}

	//Read
	public function getAll() {
		$query = $this->db->prepare("SELECT * from posts ORDER BY date desc");
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getPage($num =1, $per_page = 10) {
		$num = ($num-1) * $per_page;
		$query = $this->db->prepare("SELECT * from posts order by date desc limit :start , :per_page");
		$query->bindValue(':start', $num, PDO::PARAM_INT);
		$query->bindValue(':per_page',$per_page,PDO::PARAM_INT);

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getPost($id) {
		$query = $this->db->prepare("SELECT * from posts where id = :id");
		$query->bindValue(':id',$id,PDO::PARAM_INT);

		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);

	}
	public function getRand() {
		$row_count = $this->countPosts();
		$query = $this->db->prepare("SELECT * FROM posts LIMIT ".rand(0,$row_count).", 1");
		$query->execute();
		return $query->fetch();
	}


	//Update
	public function update($id,array $data) {
		$query = $this->db->prepare("UPDATE posts SET title=:title,short_text=:short_text,full_text=:full_text,author=:author WHERE `id`=:id");
		$query->bindValue(':title',$data['title']);
		$query->bindValue(':short_text',$data['short_text']);
		$query->bindValue(':full_text',$data['full_text']);
		$query->bindValue(':author',$data['author']);
		$query->bindValue(':id',$id,PDO::PARAM_INT);

		return $query->execute();
	}

	//Delete
	public function deleteByID($id) {
		$query = $this->db->prepare("DELETE from posts where id = :id");
		$query->bindValue(':id',$id,PDO::PARAM_INT);
		return $query->execute();
	}

	//Other
	public function countPosts() {
		$query = $this->db->prepare("SELECT count(id) as count FROM `posts`");
		$query->execute();
		return $query->fetch()['count'];
	}
	public function countPages() {

	}
}