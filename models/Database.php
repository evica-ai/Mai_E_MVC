<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("./includes/config.php");

class Database {  // our base model class we will extend

	protected $connection;
	protected $table;
	public $rows;
	protected $fields = array();
	

	public function __construct() {
		$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8mb4";
		try {
		  $this->connection = new PDO($dsn, DB_USER, DB_PASS);
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}
	}
	
	public function getAll() {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table);
		$stmt->execute();
		$this->rows = $stmt->rowCount();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		return $arr;
		$stmt = null;
	}
	
	public function getOne($id) {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table." WHERE id = ?");
		$stmt->execute([$id]);
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		return $arr;
		$stmt = null;
	}

	public function search($fld, $str) {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table." WHERE ".$fld." LIKE ?");
		$stmt->execute(["%$str%"]);
		$this->rows = $stmt->rowCount();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No Results Found.');
		return $arr;
		$stmt = null;
	}

	protected function create($statement, $formvalues) {
		$stmt = $this->connection->prepare("INSERT INTO ".$this->table.$statement." VALUES(?,?,?,?,?,?)");
		$stmt = $this->connection->prepare($statement);
		$stmt->bindValue(1, $formvalues[0], PDO::PARAM_STR);
		$stmt->bindValue(2, $formvalues[1], PDO::PARAM_STR);
		$stmt->bindValue(3, $formvalues[2], PDO::PARAM_STR);
		$stmt->bindValue(4, $formvalues[3], PDO::PARAM_STR);
		$stmt->bindValue(5, $formvalues[4], PDO::PARAM_STR);
		$stmt->bindValue(6, $formvalues[5], PDO::PARAM_STR);
		$stmt->execute();
		$stmt = null;
	}


	protected function update($statement,$values) {
		$stmt = $this->connection->prepare("UPDATE ".$this->table.$statement." WHERE id=?");
		$stmt->execute($values);
		$stmt = null;
	}

	protected function delete($id) {
		$stmt = $this->connection->prepare("DELETE FROM ".$this->table." WHERE id=?");
		$stmt->execute([$id]);
		$stmt = null;
	}


}

?>