<?php 
class User {
	public $id;
	public $username;
	public $code;
	public $email;

	private $db;

	public function __construct()
	{	
		global $db;
		$this->db = $db;
	}


	public function list() {
		$sql = "SELECT id, username
				FROM user 
				ORDER BY username";
		return $this->db->query($sql);
	}

	public function details($id) {
		$params = array(
			'id' => array($id, PDO::PARAM_INT)
		);

		$sql = "SELECT username, code, name
				FROM user 
				WHERE user.id = :id";
		return $this->db->query($sql, $params, Db::RESULT_SINGLE);
	}

	public function create() {
		$params = array(
			'username' => array($this->username, PDO::PARAM_STR),
			'code' => array($this->code, PDO::PARAM_STR),
		);
		
		$sql = "INSERT INTO user(username, code)
		VALUES(:username, :code)";
		$this->db->query($sql, $params);
		return  $this->db->lastInsertId();
	}
	
	public function update() {
		$params = array(
			'id' => array($this->id, PDO::PARAM_INT),
			'username' => array($this->username, PDO::PARAM_STR),
			'code' => array($this->code, PDO::PARAM_STR),

		);
		
		$sql = "UPDATE user SET
		username = :username,
		code = :code,
		WHERE id = :id";
		return  $this->db->query($sql, $params);
	}

	public function delete($id) {
		$params = array(
			'id' => array($id, PDO::PARAM_INT)
		);

		$sql = "DELETE FROM user
		WHERE id = :id";
		return $this->db->query($sql, $params);
	}
}
