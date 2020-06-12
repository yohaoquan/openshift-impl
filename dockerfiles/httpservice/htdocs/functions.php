<?php
include 'include/config.php';
/*
Defines functions to connect to the Database, retrieve the result and 
return them. You need several functions for different questions
*/

function getDB()
{
	// connect to the DB and returns a reference to the DB$dbhost = "localhost";
     $conn = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
    if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    return $conn;
    
}

function runQuery($db, $query) {

	// takes a reference to the DB and a query and returns the results of running the query on the database
    $result = mysqli_query($db, $query);
    return $result;
}
function _get($str){

    $val = !empty($_GET[$str]) ? $_GET[$str] : null;

    return $val;

}

?>
