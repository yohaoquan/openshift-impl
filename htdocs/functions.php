<?php
include 'include/config.php';
/*
Defines functions to connect to the Database, retrieve the result and 
return them. You need several functions for different questions
*/

function getDB()
{
	// require_once('include/config.php');
	// $connection = mysqli_connect("database", "root", "examplepasswd", "artDB");
	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	
	return $connection;
}

function runQuery($db, $query) {

	$result = mysqli_query($db, $query);
	return $result;
}


?>
