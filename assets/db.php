<?php

$servername = "borilabs.com";
$username = "borilabs_text";
$password = "Swift123!";
$dbname = 'borilabs_textline';
$dbport = '3306';

$dbh=mysql_connect ($servername, $username, $password)
or die ('I cannot connect to the database.');
mysql_select_db ($dbname);

// // Create connection
// $connec = new mysqli($servername, $username, $password, $dbname);
// 
// // Check connection
// if ($connec->connect_error) {
//   die("Connection failed: " . $connec->connect_error);
// } 

?>
