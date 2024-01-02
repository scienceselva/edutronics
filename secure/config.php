<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "test";

// Create the mysql Connection
$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) ;
if (!$con)
  {
	die('Could not connect: ' . mysql_error());
  }
// Select the database for our project
 $sqlrc = mysql_select_db($mysql_database, $con);
  if ($sqlrc)
  {
	// databse is selected successfully
  }
 else
  {
    // Create Database if it does not exist already
	mysql_query("CREATE DATABASE IF NOT EXISTS spmc",$con) or die("Cannot Create the database");
    mysql_select_db($mysql_database, $con) or die("Cannot SELECT the database") ;
  } 

?>