<?php

$message001 = 0;

if(isset($_POST['posti']))
{
	$insschol = $_SESSION['login_user'];
	$insclass = $_SESSION['login_class'];
	$insroll = $_POST['attroll'];
	$insname = $_POST['attname'];


   	$insquery = "INSERT INTO student (SHCODE, SHCLASS, STROLL, STNAME) VALUES('$insschol', '$insclass', '$insroll', '$insname')";
	$resultqr = mysql_query($insquery);

	if (!$resultqr) {
		die('Query failed: ' . mysql_error());
		$message001 = 2;
	}

	$message001 = 1;	

}

?>