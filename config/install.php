<?php

	define('HOST', 'localhost');

	try {
		$db = new PDO('mysql:host='.HOST.';dbname=camagru;', 'root', 'qwerty');
		echo "Database already exist...";
	}
	catch ( PDOException $Exception ){
		// echo 'error DB NOT EXIST';

		$db = new PDO('mysql:host='.HOST.'', 'root', 'qwerty');
		$db->exec('CREATE DATABASE camagru');
		$db = new PDO('mysql:host='.HOST.';dbname=camagru;', 'root', 'qwerty');

		// echo "HELLO";
		$db->exec('CREATE TABLE users (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(30) NOT NULL,
					pwd VARCHAR(255) NOT NULL
				)');
		echo "Database created !";
	}


?>
