<?php

	define('USERNAME', 'root');
    define('PSSWD', 'root');

	$path = '/Users/lchety/projet/web/camagru/';
	define('HOST', 'localhost');

	try {
		$db = new PDO('mysql:host='.HOST.';dbname=camagru;', 'root', 'qwerty');
		$db->exec('DROP DATABASE camagru');
		echo "Database reset...";
	}
	catch ( PDOException $Exception ){
		echo "Database created !";

	}
		// echo 'error DB NOT EXIST';

		$db = new PDO('mysql:host='.HOST.'', 'root', 'qwerty');
		$db->exec('CREATE DATABASE camagru');
		$db = new PDO('mysql:host='.HOST.';dbname=camagru;', 'root', 'qwerty');

		$db->exec('CREATE TABLE users (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(30) NOT NULL,
					pwd VARCHAR(255) NOT NULL,
					likes BLOB(65535)
				)');

		$db->exec('INSERT INTO users (name, pwd) VALUES (\'admin\',\'qwerty\')');
		$db->exec('INSERT INTO users (name, pwd) VALUES (\'mickey\',\'qwerty\')');
		$db->exec('INSERT INTO users (name, pwd) VALUES (\'monsieur\',\'qwerty\')');
		$db->exec('CREATE TABLE photos (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					user_id INT(6) UNSIGNED,
					date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
					-- ALTER TABLE `ddddd` ADD `dsdfs` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `date`;
		)');
		$db->exec('CREATE TABLE comments (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			id_photo INT(6) UNSIGNED,
			login VARCHAR(30) NOT NULL,
			title VARCHAR(60) NOT NULL,
			content TEXT(3000)
		)');
		mkdir($path . "photos", 0700);



?>
