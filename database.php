<?php
// Database information
$database    = 'abc';
$dbHost      = 'localhost';
$dbUser      = 'root';
$dbPass      = '1234';
$connection  = mysql_connect ($dbHost, $dbUser, $dbPass);
mysql_select_db ($database, $connection);
?>
