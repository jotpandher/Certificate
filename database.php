<?php
// Database information
$database    = 'dbase';
$dbHost      = 'dbhost';
$dbUser      = 'dbusername';
$dbPass      = 'dbpassword';
$connection  = mysql_connect ($dbHost, $dbUser, $dbPass);
mysql_select_db ($database, $connection);
?>
