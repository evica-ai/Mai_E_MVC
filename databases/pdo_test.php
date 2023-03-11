<?php

// single '/' always means 'localhost:8000/'
		$dsn = "mysql:host=localhost;dbname=pdo_users;charset=utf8mb4";
		try {
		  $connection = new PDO($dsn, 'root', 'root');
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}

		$stmt = $connection->prepare("SELECT * FROM tbl_users");
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		print_r($arr);
		$stmt = null;

?>