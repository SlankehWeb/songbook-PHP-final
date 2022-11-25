<?php 
class Song {
	public $id;
	public $title;
	public $content;
	public $artist_id;
	public $created_at;
	public $updated_at;

	private $db;

	public function __construct()
	{	
		global $db;
		$this->db = $db;
	}


	public function list() {
		$sql = "SELECT id, title 
				FROM song 
				ORDER BY title";
		return $this->db->query($sql);
	}

	public function details($id) {
		$params = array(
			'id' => array($id, PDO::PARAM_INT)
		);

		$sql = "SELECT title, content, name, artist_id 
				FROM song 
				JOIN artist 
				ON song.artist_id = artist.id 
				WHERE song.id = :id";
		return $this->db->query($sql, $params, Db::RESULT_SINGLE);
	}

	public function create() {
		$params = array(
			'title' => array($this->title, PDO::PARAM_STR),
			'content' => array($this->content, PDO::PARAM_STR),
			'artist_id' => array($this->artist_id, PDO::PARAM_INT)
		);
		
		$sql = "INSERT INTO song(title, content, artist_id)
		VALUES(:title, :content, :artist_id)";
		$this->db->query($sql, $params);
		return  $this->db->lastInsertId();
	}
	
	public function update() {
		$params = array(
			'id' => array($this->id, PDO::PARAM_INT),
			'title' => array($this->title, PDO::PARAM_STR),
			'content' => array($this->content, PDO::PARAM_STR),
			'artist_id' => array($this->artist_id, PDO::PARAM_INT)
		);
		
		$sql = "UPDATE song SET
		title = :title,
		content = :content,
		artist_id = :artist_id
		WHERE id = :id";
		return  $this->db->query($sql, $params);
	}

	public function delete($id) {
		$params = array(
			'id' => array($id, PDO::PARAM_INT)
		);

		$sql = "DELETE FROM song
		WHERE id = :id";
		return $this->db->query($sql, $params);
	}
}
