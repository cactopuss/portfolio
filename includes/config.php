<?php

require 'includes/functions.php';

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'portfolio';

$dbh = connectDatabase($host, $database, $user, $pass);
$projects = getProjects($dbh);

// die(var_dump($projects));

