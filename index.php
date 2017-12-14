<?php

define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECT_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));

require CORE.DS.'includes.php';
new Dispatcher();

echo '@index.php';
echo '<br />';
echo WEBROOT;
echo '<br />';
echo 'BASE_URL :' + BASE_URL;

// // $mysqli = new mysqli('localhost', 'root', 'qwerty');
//
// // $strConnection = 'mysql:host=localhost';
//
// $pdo = new PDO($connStr, 'Utilisateur', 'Mot de passe', $arrExtraParam);
//
// $pdo = new PDO('mysql:host=localhost;', 'root', 'qwerty');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
// $query = 'CREATE DATABASE pikmin';
// $return = $pdo->exec($query);
//
// // if ($mysqli->connect_errno)
// // {
// //   echo "REDRUM";
// // }
// // else
// // {
// //   echo "CA MARCHE TA MERE";
// // }
// //
// // if ($mysqli->query("CREATE DATABASE hello") === TRUE)
// // {
// //     printf("Table myCity créée avec succès.\n");
// // }

if (isset($_GET['url']))
{
	echo $_GET['url'];
}

echo '<br />';
echo $_SERVER['REQUEST_URI'];
?>

<pre>
<?php print_r($_SERVER); ?>
</pre>
