<?php
	$inpins = $_SESSION['login_user'];
	$result = mysql_query("select SHCLASS from class where SHCODE='$inpins' ");

	while ($row = mysql_fetch_array($result)) 
	{ 
		$classopt = $row['SHCLASS']; 
		echo "<option value = $classopt>$classopt</option>"; 
	} 
?>