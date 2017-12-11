<?php

echo "fuck you jack";

$db = mysql_connect('localhost', 'root', 'root');

$sql = 'CREATE DATABASE myDB';

mysql_query($sql);

// $conn->query("CREATE DATABASE myDB");


// $servername = "localhost";
// $username = "root";
// $password = "root";
//
// // Create connection
// // echo "fuck";
// $conn = new mysqli($servername, $username, $password);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
//
// // Create database
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }
//
// $conn->close();
?>
