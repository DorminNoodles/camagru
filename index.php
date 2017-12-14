<?php
// echo getcwd();


// $mysqli = new mysqli('localhost', 'root', 'qwerty');

// $strConnection = 'mysql:host=localhost';

// $pdo = new PDO($connStr, 'Utilisateur', 'Mot de passe', $arrExtraParam);

$pdo = new PDO('mysql:host=localhost;', 'root', 'qwerty');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = 'CREATE DATABASE pikmin';
$return = $pdo->exec($query);

// if ($mysqli->connect_errno)
// {
//   echo "REDRUM";
// }
// else
// {
//   echo "CA MARCHE TA MERE";
// }
//
// if ($mysqli->query("CREATE DATABASE hello") === TRUE)
// {
//     printf("Table myCity créée avec succès.\n");
// }



// $mysqli = new mysqli("localhost", "root", "qwerty", "world");
//
// /* Vérification de la connexion */
// if ($mysqli->connect_errno) {
//     printf("Connect failed: %s\n", $mysqli->connect_error);
//     exit();
// }


  // require_once('config/database.php');
  // require_once('config/setup.php');


?>
