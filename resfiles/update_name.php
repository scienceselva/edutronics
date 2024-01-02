<?php

include('../secure/lock.php');

$studentroll = mysql_escape_String($_POST['roll']);
$studentname = mysql_escape_String($_POST['studentname']);


$schoolcode = $_SESSION['login_user'];
$classcode = $_SESSION['login_class'];

$sql = "update student set STNAME='$studentname' where STROLL='$studentroll' and SHCODE='$schoolcode' and SHCLASS='$classcode' ";
$resultqr = mysql_query($sql);
if (!$resultqr) {
	die('Query failed: ' . mysql_error());
}


?>

	